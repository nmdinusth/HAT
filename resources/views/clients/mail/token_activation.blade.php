<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực email</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-xl mx-auto mt-10 bg-white shadow-md rounded-lg p-8">
        <div class="flex justify-center">
            <img src="https://emprenderconactitud.com/img/nety.png" alt="Logo" class="h-24 mb-6">
        </div>

        <h1 class="text-2xl font-bold text-gray-800 mb-2">Xác nhận địa chỉ email của bạn</h1>

        <p class="text-gray-600 mb-4">Xin chào <strong>{{ $user->name ?? 'bạn' }}</strong>,</p>

        <p class="text-gray-600 mb-4">
            Cảm ơn bạn đã đăng ký tài khoản tại <strong>HAT</strong>. Vui lòng nhấn vào nút bên dưới để kích hoạt tài khoản của bạn.
        </p>
        <p class="text-gray-600 mb-4">
            SAU KHI NHẬN THÔNG BÁO KÍCH HOẠT THÀNH CÔNG, HÃY ĐĂNG NHẬP ĐỂ TIẾP TỤC SỬ DỤNG DỊCH VỤ!
        </p>

        <div class="text-center my-6">
            <a href="{{ $link }}" class="inline-block bg-teal-500 text-white px-6 py-2 rounded-md font-semibold hover:bg-teal-600 transition duration-200">
                Kích hoạt tài khoản
            </a>
        </div>

        <p class="text-sm text-gray-500 mb-4">
            Liên kết kích hoạt này sẽ hết hạn sau <strong>{{ $expiresAt }}</strong> kể từ khi email được gửi.
        </p>

        <p class="text-sm text-gray-500 mt-6">
            Nếu bạn không đăng ký tài khoản, hãy bỏ qua email này. Nếu cần hỗ trợ, xin vui lòng liên hệ với chúng tôi.
        </p>

        <p class="text-sm text-gray-500 mt-6">
            Trân trọng,<br>
            Đội ngũ HAT
        </p>
    </div>
</body>
</html>
