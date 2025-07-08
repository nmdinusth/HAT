<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="TechyDevs" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Trizen - Travel Booking HTML Template</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('clients/assets/images/logos/favicon.png') }}" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
      rel="stylesheet"
    />

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
</head>
<body>
    <!-- Topbar -->
    <div class="topbar d-flex justify-content-between align-items-center px-4 py-2" style="background:#fff; border-bottom:1px solid #eee; font-size:15px;">
        <div>
            <span class="me-3"><i class="la la-phone"></i> (84) 0913425419</span>
            <span><i class="la la-envelope"></i> HAT@gmail.com</span>
        </div>
        <div>
            <span class="me-3">English US</span>
            <span class="me-3">USD</span>
            <a href="#" class="btn btn-outline-primary btn-sm me-2">Sign Up</a>
            <a href="#" class="btn btn-primary btn-sm">Login</a>
        </div>
    </div>
    <!-- Main Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" style="padding:0;">
        <div class="container-fluid px-4">
            <a class="navbar-brand py-2" href="/">
                <img src="{{ asset('clients/assets/images/logos/favicon.png') }}" alt="logo" style="height:48px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cruise</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pages</a></li>
                    <li class="nav-item"><a class="nav-link" href="/airplane">Flight</a></li>
                    <li class="nav-item"><a class="nav-link" href="/hotel">Hotel</a></li>
                    <li class="nav-item"><a class="nav-link" href="/transport">Transport</a></li>
                </ul>
                <a href="#" class="btn btn-info ms-lg-3">Become Local Expert</a>
            </div>
        </div>
    </nav>
    <!-- <div style="background:#f8f9fa;padding:10px;text-align:center;">Header Hotel Debug Block</div> -->
</body>