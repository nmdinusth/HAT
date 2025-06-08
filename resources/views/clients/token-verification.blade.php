@include('clients.blocks.header_home')

<div class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden py-6 sm:py-12 bg-white">
    <div class="max-w-xl px-5 text-center">
        <h2 class="mb-4 text-[36px] font-bold text-zinc-800">Vui lòng kiểm tra email của bạn</h2>

        <p class="mb-4 text-lg text-zinc-600">
            Chúng tôi đã gửi một email xác nhận tới địa chỉ <span
                class="font-semibold text-indigo-600">{{ session('email') }}</span>.
            <br>Vui lòng mở hộp thư đến và nhấp vào liên kết để kích hoạt tài khoản.
        </p>

        <p class="mb-3 text-sm text-zinc-500">
            Nếu bạn không thấy email trong vài phút, hãy kiểm tra thư mục <strong>Spam</strong> hoặc <strong>Quảng
                cáo</strong>.
        </p>
        <!-- THÔNG BÁO PHẢN HỒI -->
            <div id="token-feedback" class="mb-3 text-center text-sm font-medium hidden"></div>

        <div class="flex flex-col gap-3 items-center">
            <button id="resend-activation-email"
                class="w-96 rounded bg-blue-500 px-5 py-3 font-medium text-white shadow-md shadow-blue-500/20 hover:bg-blue-600 transition">
                Gửi lại email xác nhận
            </button>

            {{-- Nút mở Gmail (GET) --}}
            <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank"
                class="w-96 rounded bg-red-500 px-5 py-3 font-medium text-white shadow-md shadow-red-500/20 hover:bg-red-600 transition">
                📬 Mở Gmail
            </a>

            {{-- Nút quay lại trang chủ (GET) --}}
            <a href="{{ route('home') }}"
                class="inline-block w-96 rounded bg-zinc-600 px-5 py-3 font-medium text-white shadow-md hover:bg-zinc-700 transition">
                Quay lại trang chủ
            </a>
        </div>

    </div>
</div>

@include('clients.blocks.footer')

<script>
    // Hiển thị thông báo phản hồi (dùng cho xác nhận email)
function showTokenFeedback(message, type = 'error') {
    const feedbackEl = $('#token-feedback');

    feedbackEl
        .removeClass('hidden text-red-500 text-green-500')
        .addClass(type === 'success' ? 'text-green-500' : 'text-red-500')
        .text(message);

    // // Tự động ẩn sau 5 giây (nếu muốn)
    // setTimeout(() => {
    //     feedbackEl.addClass('hidden').text('');
    // }, 5000);
}

    $('#resend-activation-email').on('click', function() {
        $.ajax({
            url: '{{ route('send_mail_activate') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function() {
                showTokenFeedback('📩 Email xác nhận đã được gửi lại. Vui lòng kiểm tra hộp thư!',
                    'success');
            },
            error: function() {
                showTokenFeedback('⚠️ Không thể gửi lại email. Vui lòng thử lại sau.', 'error');
            }
        });
    });

    // // Hàm hiển thị thông báo đơn giản (toastr hoặc alert)
    // function showFeedback(message, type) {
    //     if (typeof toastr !== 'undefined') {
    //         toastr.options = {
    //             "closeButton": true,
    //             "progressBar": true
    //         };
    //         type === 'success' ? toastr.success(message) : toastr.error(message);
    //     } else {
    //         alert(message);
    //     }
    // }
</script>
