@include('clients.blocks.header_home')

{{-- <div class="login-template">
    <div class="main">
        <!-- Sign in  Form -->
        <section class="sign-in show">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('clients/assets/images/login/signin-image.jpg') }}"
                                alt="sing up image"></figure>
                        <a href="javascript:void(0)" class="signup-image-link" id="sign-up">Tạo tài khoản</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Đăng nhập</h2>
                        <form action="{{ route('user-login') }}" method="POST" class="login-form" id="login-form" style="margin-top: 15px">
                            <div class="form-group">
                                <label for="username_login"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username_login" id="username_login" placeholder="Tên đăng nhập" required/>
                            </div>
                            <div class="invalid-feedback" style="margin-top:-15px" id="validate_username"></div>
                            @csrf
                            <div class="form-group">
                                <label for="password_login"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password_login" id="password_login" placeholder="Mật khẩu" required/>
                            </div>
                            <div class="invalid-feedback" style="margin-top:-15px" id="validate_password"></div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit"
                                    value="Đăng nhập" />
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Hoặc đăng nhập bằng</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="{{ route('login-google') }}"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Đăng ký</h2>
                        <div class="loader"></div>
                        <form action="{{ route('register') }}" method="POST" class="register-form" id="register-form" style="margin-top: 15px">
                            <div class="form-group">
                                <label for="username_register"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username_register" id="username_register" placeholder="Tên tài khoản" required/>
                            </div>
                            <div class="invalid-feedback" style="margin-top:-15px" id="validate_username_regis"></div>
                            @csrf
                            <div class="form-group">
                                <label for="email_register"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email_register" id="email_register" placeholder="Email" required/>
                            </div>
                            <div class="invalid-feedback" style="margin-top:-15px" id="validate_email_regis"></div>
                            <div class="form-group">
                                <label for="password_register"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password_register" id="password_register" placeholder="Mật khẩu" required/>
                            </div>
                            <div class="invalid-feedback" style="margin-top:-15px" id="validate_password_regis"></div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Nhập lại mật khẩu" required/>
                            </div>
                            <div class="invalid-feedback" style="margin-top:-15px" id="validate_repass"></div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit"
                                    value="Đăng ký" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('clients/assets/images/login/signup-image.jpg') }}"
                                alt="sing up image"></figure>
                        <a href="javascript:void(0)" class="signup-image-link" id="sign-in">Tôi đã có tài khoản rồi</a>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div> --}}


<div class="login-template">
    <div class="">
        {{-- Sign in form --}}
        <div class="flex flex-wrap min-h-screen w-full content-center justify-center bg-gray-200 py-10">

            <div class="flex shadow-md">

                <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white"
                    style="width: 24rem; height: 32rem;">
                    <div class="w-72">

                        <h1 class="text-xl font-semibold">Đăng nhập</h1>
                        <small class="text-gray-400">Xin chào, vui lòng điền thông tin đăng nhập</small>
                        @if (session('error'))
                            <div class="text-red-600">
                                {{ session('error') }}
                            </div>
                        @endif
                        {{-- <form class="mt-4" method="POST" action="{{route('login')}}"> --}}
                        <form class="mt-4" method="POST" action="{{ route('handle_login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-1.5 block text-xs font-semibold">Tên người dùng</label>
                                <input type="username" placeholder="vd: matchaneek03" name="username"
                                    class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
                            </div>

                            <div class="mb-4">
                                <label class="mb-1.5 block text-xs font-semibold">Mật khẩu</label>
                                <input type="password" placeholder="**********" name="password"
                                    class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
                            </div>

                            <div class="mb-3 flex flex-wrap content-center">
                                <input id="remember" type="checkbox" name="remember"
                                    class="mr-1 checked:bg-purple-700" />
                                <label for="remember" class="mr-auto text-xs font-semibold">Ghi nhớ tài khoản</label>
                                <a href="#" class="text-xs font-semibold text-purple-700">Quên mật khẩu?</a>
                            </div>

                            <div class="mb-3">
                                <button
                                    class="mb-2 block w-full text-center text-white bg-purple-700 hover:bg-purple-900 px-2 py-1.5 rounded-md">Đăng
                                    nhâp</button>
                                <button
                                    class="flex flex-wrap justify-center w-full border border-gray-300 hover:border-gray-500 px-1.5 py-1.5 rounded-md">
                                    <img class="w-6 mr-2"
                                        src="https://lh3.googleusercontent.com/COxitqgJr1sJnIDe8-jiKhxDx1FrYbtRHKJ9z_hELisAlapwE9LUPh6fcXIfb5vwpbMl4xl9H9TRFPc5NOO8Sb3VSgIBrfRYvW6cUA">
                                    Đăng nhâp với Google
                                </button>
                            </div>
                        </form>

                        <div class="text-center">
                            <span class="text-xs text-gray-400 font-semibold">Bạn chưa có tài khoản?</span>
                            <a href="{{ route('register') }}" class="text-xs font-semibold text-purple-700">Đăng ký</a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap content-center justify-center rounded-r-md"
                    style="width: 24rem; height: 32rem;">
                    <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md"
                        src="{{ asset('clients/assets/images/login/signin-image.jpg') }}">
                </div>
            </div>
        </div>
        {{-- Sign up form --}}
        <div class="flex flex-wrap min-h-screen w-full content-center justify-center bg-gray-200 py-10">
            <!-- Login component -->
            <div class="flex shadow-md">
                <!-- Login form -->
                <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white"
                    style="width: 24rem; height: 32rem;">
                    <div class="w-72">
                        <!-- Heading -->
                        <h1 class="text-xl font-semibold">Đăng ký</h1>
                        <small class="text-gray-400">Chào mừng bạn đến với lãnh địa của chúng ta</small>
                        {{-- Thông báo lỗi từ server --}}
                        @if (session('error'))
                            <div class="text-red-600 text-sm">
                                {{ session('error') }}
                            </div>
                        @endif
                        {{-- Thông báo lỗi từ ui --}}
                        <div class="text-red-600 text-sm" id="errorUI"></div>
                        <!-- Form -->
                        <form class="mt-3" method="POST" action="/register" id="registerForm">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 block text-xs font-semibold">Tên của bạn</label>
                                <input type="text" placeholder="Nguyễn Văn A" name="name" id="name"
                                    class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
                            </div>

                            <div class="flex mb-3 gap-2">
                                <div class="w-1/2">
                                    <label class="mb-2 block text-xs font-semibold">Email</label>
                                    <input type="email" placeholder="Email" name="email" id="email"
                                        class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
                                </div>

                                <div class="w-1/2">
                                    <label class="mb-2 block text-xs font-semibold">Tên người dùng</label>
                                    <input type="text" placeholder="vd: matchaneek03" name="username" id="username"
                                        class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 block text-xs font-semibold">Mật khẩu</label>
                                <input type="password" placeholder="**********" name="password" id="password"
                                    class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
                            </div>

                            <div class="">
                                <label class="mb-2 block text-xs font-semibold">Xác nhận mật khẩu</label>
                                <input type="password" placeholder="**********" name="confirm_password"
                                    id="confirm_password"
                                    class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
                            </div>
                            {{-- Hiển thị lỗi không khớp mật khẩu --}}
                            <span id="messageConfirmPassword" class="text-xs"></span>

                            <div class="my-3">
                                <button
                                    class="mb-1.5 block w-full text-center text-white bg-purple-700 hover:bg-purple-900 px-2 py-1.5 rounded-md">Đăng
                                    ký</button>
                                <button
                                    class="flex flex-wrap justify-center w-full border border-gray-300 hover:border-gray-500 px-2 py-1.5 rounded-md">
                                    <img class="w-6 mr-2"
                                        src="https://lh3.googleusercontent.com/COxitqgJr1sJnIDe8-jiKhxDx1FrYbtRHKJ9z_hELisAlapwE9LUPh6fcXIfb5vwpbMl4xl9H9TRFPc5NOO8Sb3VSgIBrfRYvW6cUA">
                                    Đăng ký với Google
                                </button>
                            </div>
                        </form>

                        <!-- Footer -->
                        <div class="text-center">
                            <span class="text-xs text-gray-400 font-semibold">Bạn đã có tài khoản?</span>
                            <a href="{{ route('login') }}" class="text-xs font-semibold text-purple-700">Đăng nhập</a>
                        </div>
                    </div>
                </div>

                <!-- Login banner -->
                <div class="flex flex-wrap content-center justify-center rounded-r-md"
                    style="width: 24rem; height: 32rem;">
                    <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md"
                        src="https://i.imgur.com/9l1A4OS.jpeg">
                </div>
            </div>
        </div>
    </div>
</div>


@include('clients.blocks.footer')
