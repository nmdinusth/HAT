<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from techydevs.com/demos/themes/html/trizen-demo/html/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jun 2025 08:54:35 GMT -->

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="TechyDevs" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Trizen - Travel Booking HTML Template</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('clients/assets/images/logos/favicon.png') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
        rel="stylesheet" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ asset('ui/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('ui/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('ui/css/line-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('ui/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('ui/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('ui/css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('ui/css/daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('ui/css/animated-headline.css') }}" />
    <link rel="stylesheet" href="{{ asset('ui/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('ui/css/style.css') }}" />

    <style>
        /* SUCCESS */
        .toast-success {
            background-color: #28a745 !important;
            color: white !important;
        }

        /* ERROR */
        .toast-error {
            background-color: #dc3545 !important;
            color: white !important;
        }

        /* WARNING */
        .toast-warning {
            background-color: #ffc107 !important;
            color: #000 !important;
        }

        /* INFO */
        .toast-info {
            background-color: #17a2b8 !important;
            color: white !important;
        }

        /* Toastr: font and border radius */
        .toast {
            font-family: 'Segoe UI', sans-serif;
            font-size: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        /* Toastr close button custom */
        .toast-close-button {
            color: white !important;
        }
    </style>

</head>

<body>
    <!-- start cssload-loader -->
    <div class="preloader" id="preloader">
        <div class="loader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
    <!-- end cssload-loader -->

    <!-- ================================
            START HEADER AREA
================================= -->
    <header class="header-area">
        <div class="header-top-bar padding-right-100px padding-left-100px">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="header-top-content">
                            <div class="header-left">
                                <ul class="list-items">
                                    <li>
                                        <a href="#"><i class="la la-phone me-1"></i>(123) 123-456</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="la la-envelope me-1"></i>trizen@example.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header-top-content">
                            <div class="header-right d-flex align-items-center justify-content-end">
                                <div class="header-right-action">
                                    <div class="select-contain select--contain w-auto">
                                        <select class="select-contain-select">
                                            <option
                                                data-content='<span class="flag-icon flag-icon-id me-1"></span> Bahasa Indonesia'>
                                                Bahasa Indonesia
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-de me-1"></span> Deutsch'>
                                                Deutsch
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-us me-1"></span> English(US)'
                                                selected>
                                                English US
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-gb-eng me-1"></span> English(UK)'>
                                                English UK
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-ro me-1"></span> Romanian'>
                                                Romanian
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-es me-1"></span> Español'>
                                                Español
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-fr me-1"></span> Francais'>
                                                Francais
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-it me-1"></span> Italiano'>
                                                Italiano
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-pl me-1"></span> Polski'>
                                                Polski
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-pt me-1"></span> Portuguese'>
                                                Portuguese
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-tr me-1"></span> Turkish'>
                                                Turkish
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-ru me-1"></span> Russian'>
                                                Russian
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-jp me-1"></span> Japanese'>
                                                Japanese
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-cn me-1"></span> Mandarin'>
                                                Mandarin
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-tw me-1"></span> Mandarin Chinese'>
                                                Mandarin Chinese
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-kr me-1"></span> Korean'>
                                                Korean
                                            </option>
                                            <option
                                                data-content='<span class="flag-icon flag-icon-in me-1"></span> Hindi'>
                                                Hindi
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="header-right-action">
                                    <div class="select-contain select--contain w-auto">
                                        <select class="select-contain-select">
                                            <option value="1">AED</option>
                                            <option value="2">AUD</option>
                                            <option value="3">BRL</option>
                                            <option value="4">CAD</option>
                                            <option value="5">CHF</option>
                                            <option value="6">CNY</option>
                                            <option value="7">EUR</option>
                                            <option value="8">GBP</option>
                                            <option value="9">HKD</option>
                                            <option value="10">IDR</option>
                                            <option value="11">INR</option>
                                            <option value="12">JPY</option>
                                            <option value="13">KRW</option>
                                            <option value="14">MYR</option>
                                            <option value="15">NZD</option>
                                            <option value="16">PHP</option>
                                            <option value="17">PLN</option>
                                            <option value="18">RUB</option>
                                            <option value="19">SAR</option>
                                            <option value="20">SGD</option>
                                            <option value="21">THB</option>
                                            <option value="22">TRY</option>
                                            <option value="23">TWD</option>
                                            <option value="24" selected>USD</option>
                                            <option value="25">VND</option>
                                            <option value="26">MXN</option>
                                            <option value="27">ARS</option>
                                            <option value="28">INR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="header-right-action">
                                    @if (Auth::check())
                                        <form action="{{ route('logout') }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <button type="submit"
                                                class="theme-btn theme-btn-small theme-btn-transparent me-1">Logout</button>
                                        </form>
                                    @else
                                        <a href="#" class="theme-btn theme-btn-small theme-btn-transparent me-1"
                                            data-bs-toggle="modal" data-bs-target="#signupPopupForm">Sign Up</a>
                                        <a href="#" class="theme-btn theme-btn-small" data-bs-toggle="modal"
                                            data-bs-target="#loginPopupForm">Login</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu-wrapper padding-right-100px padding-left-100px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-wrapper justify-content-between">
                            <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('clients/assets/images/logos/logo.png') }}"
                                        alt="logo" /></a>
                                <div class="menu-toggler">
                                    <i class="la la-bars"></i>
                                    <i class="la la-times"></i>
                                </div>
                                <!-- end menu-toggler -->
                            </div>
                            <!-- end logo -->
                            <div class="main-menu-content pe-0 ms-0">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="/">Home</a>
                                        </li>
                                        {{-- <li>
                                            <a href="#">Cruise <i class="la la-angle-down"></i></a>
                                        </li> --}}
                                        <li>
                                            <a href="#">Cruise</a>
                                        </li>
                                        <li>
                                            <a href="#">Pages </a>
                                        </li>
                                        
                                        <li>
                                            <a href="/airplane">Flight</a>
                                        </li>
                                        <li>
                                            <a href="/hotel">Hotel</a>
                                        </li>
                                        <li>
                                            <a href="/transport">Transport</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- end main-menu-content -->
                            <div class="nav-btn">
                                <a href="become-local-expert.html" class="theme-btn">Become Local Expert</a>
                            </div>
                            <!-- end nav-btn -->
                        </div>
                        <!-- end menu-wrapper -->
                    </div>
                    <!-- end col-lg-12 -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end header-menu-wrapper -->
    </header>
    <!-- ================================
         END HEADER AREA
================================= -->
