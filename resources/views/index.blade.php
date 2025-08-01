<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>SiPINTAR</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.css') }}" /> --}}
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('asset/css/responsive.css') }}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('asset/css/colors.css') }}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-select.css') }}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('asset/css/perfect-scrollbar.css') }}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}" />
    <!-- calendar file css -->
    {{-- <link rel="stylesheet" href="{{ asset('asset/js/semantic.min.css') }}" /> --}}
    <!-- fancy box js -->
    <link rel="stylesheet" href="{{ asset('asset/css/jquery.fancybox.css') }}" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Font Awesome 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('layouts.sidebar')
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                @include('layouts.navbar')
                <!-- end topbar -->
                <!-- right content -->
                <!-- dashboard inner -->
                <section class="section">
                    @yield('content')
                </section>
                @yield('scripts')
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ asset('asset/js/animate.js') }}"></script>
    <!-- select country -->
    <script src="{{ asset('asset/js/bootstrap-select.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('asset/js/owl.carousel.js') }}"></script>
    <!-- chart js -->
    <script src="{{ asset('asset/js/Chart.min.js') }}"></script>
    <script src="{{ asset('asset/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/js/utils.js') }}"></script>
    <script src="{{ asset('asset/js/analyser.js') }}"></script>
    <!-- nice scrollbar -->
    {{-- <script src="{{ asset('asset/js/perfect-scrollbar.min.js') }}"></script> --}}
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.fancybox.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('asset/js/custom.js') }}"></script>
    <script src="{{ asset('asset/js/chart_custom_style1.js') }}"></script>
    <!-- calendar file css -->
    <script src="{{ asset('asset/js/semantic.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
