<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
</head>

<body>
    <section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
        <header>
            <a href="#">
                <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/full-logo.svg" alt="">
            </a>

            <nav class="flex items-center mt-6 gap-x-6 sm:gap-x-8">
                <a href="#"
                    class="text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                    aria-label="Reddit"> Home </a>
                <a href="#"
                    class="text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                    aria-label="Reddit"> Blog </a>
                <a href="#"
                    class="text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                    aria-label="Reddit"> Tutorials </a>
                <a href="#"
                    class="text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                    aria-label="Reddit"> Support </a>
            </nav>
        </header>

        <main class="mt-8">
            <h2 class="text-gray-700 dark:text-gray-200">Hi Olivia,</h2>

            <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                We’re glad to have you onboard! You’re already on your way to
                creating beautiful visual products.
                Whether you’re here for your brand, for a cause, or just for fun —
                welcome! If there’s anything you need, we’ll be here every step of the way.
            </p>

            <p class="mt-2 text-gray-600 dark:text-gray-300">
                Thanks, <br>
                Meraki UI team
            </p>

            {{-- Hiển thị mã code --}}
            <div class="mt-6 p-4 bg-gray-100 dark:bg-gray-800 rounded text-center">
                <p>Mã OTP xác thực 2 bước của bạn</p>
                <h1> {{ $otp_code }} </h1>
                <p>Mã có hiệu lực đến: {{ $expiresAt }}</p>
                <p>Vui lòng không chia sẻ mã này với bất kì ai.</p>
            </div>
        </main>


        <footer class="mt-8">
            <p class="text-gray-500 dark:text-gray-400">
                This email was sent to <a href="#" class="text-blue-600 hover:underline dark:text-blue-400"
                    target="_blank">contact@merakiui.com</a>.
                If you'd rather not receive this kind of email, you can <a href="#"
                    class="text-blue-600 hover:underline dark:text-blue-400">unsubscribe</a> or <a href="#"
                    class="text-blue-600 hover:underline dark:text-blue-400">manage your email preferences</a>.
            </p>

            <p class="mt-3 text-gray-500 dark:text-gray-400">© 2023 Meraki UI. All Rights Reserved.</p>
        </footer>
    </section>
</body>

</html>
