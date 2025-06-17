<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css'])
    <title>HAT - Xác thực 2 bước</title>
    <!-- Import CSS for Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center h-screen w-full dark:bg-gray-200">
    <div class="w-full max-w-md px-8 py-12 bg-white rounded-lg shadow-md bg-white-950 dark:text-gray-900">
        <h1 class="text-2xl font-semibold text-center mb-5">Xác thực 2 bước</h1>
        <p class="text-gray-600 text-center mb-4">Mã OTP được gửi đến Email: {{ session('email_masked')}}</p>
        <div class="grid grid-cols-6 gap-x-4 mt-2 mb-5" id="otp-container">
            @for ($i = 0; $i < 6; $i++)
            <input type="text" maxlength="1" class="otp-input rounded-lg bg-gray-100 cursor-text dark:bg-gray-300 w-14 aspect-square flex items-center justify-center text-center text-xl">
            @endfor
        </div>
        <div class="flex items-center flex-col justify-between mb-5">
            <p class="text-gray-600 text-sm">Bạn chưa nhận được mã?</p>
            <div class="flex items-center space-x-2">
                <button
                    class="px-3 py-2 text-sm font-medium text-center rounded text-gray-500 hover:text-blue-500">Thay đổi địa chỉ Email
                </button>
                <button id="resend-otp-button"
                    class="px-3 py-2 text-sm font-medium text-center rounded text-gray-500 hover:text-blue-500">Gửi lại mã 
                </button>
            </div>
            <!-- THÔNG BÁO PHẢN HỒI -->
            <div id="otp-feedback" class="text-center text-sm font-medium hidden"></div>
        </div>
        <button class="w-full px-4 py-2 text-lg font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Xác nhận</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // const a = JSON.stringify({ otp: otpCode });
        // console.log(a);
        
        // Xử lý phần chuyển ô
        const inputs = document.querySelectorAll('.otp-input');
        inputs[0].focus();
        inputs.forEach((input, index) => {
            // Tiến lên khi nhập
            input.addEventListener('input', () => {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[ index + 1 ].focus();
                };
            });
            // Lùi lại khi Backspace
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && input.value === '' && index > 0) {
                    inputs[ index - 1].focus();
                }
            });
        });

        // Gửi xác nhận OTP (AJAX)
        function handleOTPComplete() {
            const email = @json(session('email'));
            // Chuyển các giá trị input sang dạng mảng sau đó gộp lại thành chuỗi
            const otpCode = Array.from(inputs).map(input => input.value).join('');
            if (otpCode.length === 6) {
                fetch('/two-factor-auth', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ 
                        otpCode: otpCode,
                        email: email,
                    })
                })
                .then(response => response.json())
                .then(data => {
                    switch (data.status) {
                        case 'success':
                            // toastr.success(data.message, 'Thành công'); -> chưa sử dụng đưuọc hoặc phải dùng cách khác
                            window.location.href = data.redirect;
                            break;
                        case 'user_not_found':
                            showOtpFeedback('⚠️ Người dùng không tồn tại.', 'error');
                            inputs.forEach(input => input.value = '');
                            inputs[0].focus();
                            break;
                        case 'otp_expired':
                            showOtpFeedback('⌛ Mã OTP đã hết hạn. Vui lòng yêu cầu mã mới.', 'error');
                            inputs.forEach(input => input.value = '');
                            inputs[0].focus();
                            break;
                        case 'otp_invalid':
                            showOtpFeedback('❌ Mã OTP không chính xác.', 'error');
                            inputs.forEach(input => input.value = '');
                            inputs[0].focus();
                            break;
                        default:
                            showOtpFeedback('⚠️ Có lỗi xảy ra. Vui lòng thử lại.', 'error');
                            inputs.forEach(input => input.value = '');
                            inputs[0].focus();
                            break;
                    }
                })   
                .catch(error => {
                    console.error('fetch error: '. error);
                    // alert("Lỗi kết nối đến server. Vui lòng thử lại!");
                    showOtpFeedback('⚠️ Đã xảy ra lỗi. Vui lòng thử lại sau.', 'error');
                    inputs.forEach(input => input.value = '');
                    inputs[0].focus();
                    inputs[0].focus();
                    // location.reload(); // Reload lại trang
                })       
            }
        }

        //Xử lý paste 
        document.getElementById('otp-container').addEventListener('paste', (e) => {
            e.preventDefault();
            const pasteData = e.clipboardData.getData('text').trim().slice(0, 6);
            pasteData.split('').forEach((char, i) => {
                if (inputs[i]) {
                    inputs[i].value = char;
                }

                if (pasteData.length === 6) {
                    handleOTPComplete();
                }
            }); 
        });

        // Tự động gửi cho đến khi nhập ô cuối và đủ tất cả các ô
        inputs[5].addEventListener('input', () => {
            if (inputs[5].value.length === 1 && Array.from(inputs).every(input => input.value !== '')) {
                handleOTPComplete();
            }
        });

        // Hiển thị thông báo (JQuery)
        function showOtpFeedback(message, type = 'error') {
            const feedbackEl = $('#otp-feedback');
            feedbackEl
                .removeClass('hidden text-red-500 text-green-500')
                .addClass(type === 'success' ? 'text-green-500' : 'text-red-500')
                .text(message);
        }

        //Gửi lại otp (AJAX JQuery)
        $('#resend-otp-button').on('click', function () {
            $.ajax({
                url: '/send-otp-2fa',
                method: 'POST',
                data: { _token: '{{ csrf_token() }}' },
                success: function () {
                    showOtpFeedback('📩 Mã OTP đã được gửi. Vui lòng kiểm tra lại email!', 'success');
                    inputs.forEach(input => input.value = '');
                    inputs[0].focus();
                },
                error: function () {
                    showOtpFeedback('⚠️ Không thể gửi lại mã. Vui lòng thử lại.', 'error');
                    inputs.forEach(input => input.value = '');
                    inputs[0].focus();
                }
            });
        });


        //  - Hiện tại paste được nhưng chưa tối ưu
        //  - paste 5 số thì nó con trỏ đang ko ở số 5 
        //  - Con trỏ đặt trước ký tụ được khiến backspace khó khăn
        //  - Loading state, đếm ngược thời gian nhấn gửi lại, chức năng thay đổi email
        //  - Tách hàm xử lý OTP thành service riêng
        //  - Các thông báo hiển thị bảng chứ không nên qua alert nữa
        //  - Thử nhập có chữ mà xem, nhập space không nữa - bay email luôn ;)) - sau đó nhập số bình thường thì userID = null và gây lỗi 500 vì sao nhỉ -> khăc phục bằng cách khoogn reload lại trang rồi, nhưng nếu người dùng f5 thì các bug trên vẫn thế.(session()->keep(['user_id', 'email']); -> tìm hiểu)
    </script>
</body>
</html>
