<!--
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
 <!DOCTYPE html>

 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
     <meta charset="utf-8" />
     <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
     <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <title>{{ config('app.name', 'Dashboard~GeoApp') }}</title>
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
     <!--     Fonts and icons     -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
     <!-- CSS Files -->
     <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
     <link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
     <!-- CSS Just for demo purpose, don't include it in your project -->
     <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stack('css')
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        .mapboxgl-marker {
            height: 20px;
            width: 20px;
            z-index: 5;
            border: 1px solid black;
            border-radius: 50%;
            background-color: #305bad;
        }
    </style>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
 </head>

 <body>
     <div class="wrapper">
         <div class="sidebar" data-image="{{asset('assets/img/sidebar-5.jpg')}}">
             <!--
         Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

         Tip 2: you can also add an image using data-image tag
     -->
             <div class="sidebar-wrapper">
                 <div class="logo">
                     <a href="http://www.creative-tim.com" class="simple-text">
                        {{ config('app.name', 'Laravel') }}
                     </a>
                 </div>
                 <ul class="nav">
                     <li class="nav-item active">
                         <a class="nav-link" href="{{ route('home') }}">
                             <i class="nc-icon nc-chart-pie-35"></i>
                             <p>Dashboard</p>
                         </a>
                     </li>
                     <li>
                         <a class="nav-link" href="{{ route('category.index') }}">
                             <i class="nc-icon nc-circle-09"></i>
                             <p>Kategori Wisata</p>
                         </a>
                     </li>
                     <li>
                         <a class="nav-link" href="{{ route('wisata.index') }}">
                             <i class="nc-icon nc-notes"></i>
                             <p>List Wisata</p>
                         </a>
                     </li>
                     <li>
                         <a class="nav-link" href="{{ route('post.index') }}">
                             <i class="nc-icon nc-paper-2"></i>
                             <p>List Berita</p>
                         </a>
                     </li>
                     <li>
                         <a class="nav-link" href="./maps.html">
                             <i class="nc-icon nc-pin-3"></i>
                             <p>Maps</p>
                         </a>
                     </li>
                 </ul>
             </div>
         </div>
         <div class="main-panel">
             <!-- Navbar -->
             <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                 <div class="container-fluid">
                     <a class="navbar-brand" href="#pablo"> Dashboard </a>
                     <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-bar burger-lines"></span>
                         <span class="navbar-toggler-bar burger-lines"></span>
                         <span class="navbar-toggler-bar burger-lines"></span>
                     </button>
                     <div class="collapse navbar-collapse justify-content-end" id="navigation">
                         <ul class="nav navbar-nav mr-auto">
                             <li class="nav-item">
                                <p class="d-flex justify-content-center">Hi, {{ Auth::user()->name }}</p>
                             </li>
                             <li class="nav-item">
                                 <div class="d-lg-none">
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                 </div>


                                 {{-- <a href="#" class="nav-link" data-toggle="dropdown">
                                     <span class="d-lg-none">Geo~Apps</span>
                                     <h1 class="d-lg-none">hahaha</h1>
                                 </a> --}}
                             </li>
                         </ul>
                         <div class="d-flex flex-row-reverse bd-highlight">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                   <p class="nav-link">Hi, {{ Auth::user()->name }}</p>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}
                                   </a>

                                   <form id="logout-form" action="{{ route('logout') }}"
                                       method="POST" class="d-none">
                                       @csrf
                                   </form>
                               </li>
                            </ul>
                         </div>
                     </div>
                 </div>
             </nav>
             <!-- End Navbar -->
             <div class="content">
                <main class="container-fluid">
                    @yield('content')
                </main>
             </div>
             <footer class="footer">
                 <div class="container-fluid">
                     <nav>
                         <ul class="footer-menu">
                             <li>
                                 <a href="#">
                                     Home
                                 </a>
                             </li>
                             <li>
                                 <a href="{{ route('category.index') }}">
                                     Kategori Wisata
                                 </a>
                             </li>
                             <li>
                                 <a href="{{ route('wisata.index') }}">
                                     List Wisata
                                 </a>
                             </li>
                             <li>
                                 <a href="#">
                                     Blog
                                 </a>
                             </li>
                         </ul>
                         <p class="copyright text-center">
                             ©
                             <script>
                                 document.write(new Date().getFullYear())
                             </script>
                             <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                         </p>
                     </nav>
                 </div>
             </footer>
         </div>
     </div>
 </body>
 <!--   Core JS Files   -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
 {{-- <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script> --}}
 <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
 <script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <!--  Google Maps Plugin    -->
 {{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
 <!--  Chartist Plugin  -->
 <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script> --}}
 <!--  Notifications Plugin    -->
 <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
 <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
 <script src="{{ asset('assets/js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
 <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
 <script src="{{ asset('assets/js/demo.js') }}"></script>
 <script src="{{ asset('js/app.js') }}"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    @stack('script')
 <script type="text/javascript">
     $(document).ready(function() {
         // Javascript method's body can be found in assets/js/demos.js
         demo.initDashboardPageCharts();
     });
 </script>

 </html>
