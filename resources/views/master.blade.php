<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css ">


    <!-- Title  -->
    <title>Diganta Bangla</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('front/assets/img/fav.png')}}" title="Favicon" sizes="16x16" />

    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="{{asset('front/assets/css/lib/bootstrap.min.css')}}">
    <!-- ionicons icons  -->
    <link rel="stylesheet" href="{{asset('front/assets/css/lib/ionicons.css')}}">
    <!-- line-awesome icons  -->
    <link rel="stylesheet" href="{{asset('front/assets/css/lib/line-awesome.css')}}">
    <!-- animate css  -->
    <link rel="stylesheet" href="{{asset('front/assets/css/lib/animate.css')}}" />
    <!-- fancybox popup  -->
    <link rel="stylesheet" href="{{asset('front/assets/css/lib/jquery.fancybox.css')}}" />
    <!-- lity popup  -->
    <link rel="stylesheet" href="{{asset('front/assets/css/lib/lity.css')}}" />
    <!-- swiper slider  -->
    <link rel="stylesheet" href="{{asset('front/assets/css/lib/swiper.min.css')}}" />

    <!-- ====== main style ====== -->
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}" />

    <style>
        .tags a{
          background: #006A4E!important;  
        }
        #navbarSupportedContent{
            background: #F42A41!important;

        }

        .nav-link{
            color: #FFFFFF!important;
        }
    </style>
</head>

<body class="home-style5">

    <!-- ====== start loading page ====== -->
    <div class="loading-page style1">
        <div class="lad-cont">
            <h2 class="loading loading02">
                <span>D</span>
                <span>I</span>
                <span>G</span>
                <span>A</span>
                <span>N</span>
                <span>T</span>
                <span>A</span>
            </h2>
            <small class="loading loading01 color-blue1">
                <span>B</span>
                <span>A</span>
                <span>N</span>
                <span>G</span>
                <span>L</span>
                <span>A</span>
            </small>
        </div>
    </div>
    <!-- ====== end loading page ====== -->

    <!-- ====== start navbar-container ====== -->
    <div class="navbar-container">

        <div class="container">
            <!-- ====== start top navbar ====== -->
            <div class="top-navbar style-5">
                <div class="container p-0">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="">
                                <a href="{{URL::to('/')}}" class="logo-brand d-none d-lg-inline-block">
                                    <img src="{{asset('front/assets/img/logo_home5.png')}}" alt="" class="dark-none">
                                    <img src="{{asset('front/assets/img/logo_home5_lt.png')}}" alt="" class="light-none">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="date-weather mb-3 mb-lg-0">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <div class="item">
                                            <div class="icon me-3 pt-1">
                                                <i class="fa-solid fa-calendar-days"></i>
                                            </div>
                                            <div class="inf">
                                                <strong>{{date('l')}}</strong>
                                                <p>{{date('d F Y')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="item">
                                            <div class="icon me-3 pt-1">
                                                <i class="fa-solid fa-cloud-moon"></i>
                                            </div>
                                            <div class="inf">
                                                <strong>32oC, Cloudy</strong>
                                                <p>New York</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sub-darkLight">
                                <div class="row text-lg-end align-items-center">
                                    <div class="col-6">
                                        <div class="nav-side">
                                            <a href="#" class="icon-link">
                                                <i class="fa-solid fa-user"></i>
                                            </a>
                                            <a href="#0" class="icon-link search-btn-style2">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ====== end top navbar ====== -->

            <!-- ====== start navbar ====== -->
            <nav class="navbar navbar-expand-lg navbar-light style-5">
                <div class="container p-0">
                    <div class="mob-nav-toggles d-flex align-items-center justify-content-between">
                        <a href="#" class="logo-brand d-block d-lg-none w-50 my-4">
                            <img src="{{asset('front/assets/img/logo_home5.png')}}" alt="" class="dark-none">
                            <img src="{{asset('front/assets/img/logo_home5_lt.png')}}" alt="" class="light-none">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: #b6b9f9;">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        	<li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}">
                                    Home
                                </a>
                            </li>
                            @foreach(navCategories() as $category)
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/category-details/'.$category->id)}}">
                                    {{$category->category_name}}
                                </a>
                            </li>
                           @endforeach
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/about')}}">
                                    About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/contact')}}">
                                    contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- ====== end navbar ====== -->

            <!-- ====== start nav-search ====== -->
            <div class="nav-search-style2">
                <div class="row justify-content-center align-items-center gx-lg-5">
                    <div class="col-lg-4">
                        <div class="info">
                            <h5> you can search by category <br> or news title </h5>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form class="form">
                            <span class="color-777 fst-italic text-capitalize mb-2 fsz-13px">Enter Keyword</span>
                            <div class="form-group">
                                <span class="icon">
                                    <i class="la la-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Elon Musk ... ">
                                <button>search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ====== end nav-search ====== -->
        </div>
    </div>

    

    @yield('front_content')

    

    <!-- ====== start footer ====== -->
    <footer class="footer-style5 pt-80">
        <div class="container">
            <div class="content">
                <div class="row justify-content-between">
                    <div class="col-lg-4">
                        <div class="info">
                            <h6 class="foot-tilte mb-40">Diganta Bangla - News</h6>
                            <ul class="contact-info m-0">
                                <li>
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>197 Marsh Wall, London E14 9SG</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-phone"></i>
                                    <span>+44 7312 269754</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-envelope"></i>
                                    <span>digantabangla@gmail.com</span>
                                </li>
                            </ul>
                            <div class="social-links mt-50">
                                <a href="#">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa-brands fa-square-instagram"></i>
                                </a>
                                <a href="#">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 mt-5 mt-lg-0">
                        <div class="link-group">
                            <h6 class="foot-tilte mb-40">Topics</h6>
                            <ul>
                                <li>
                                    <a href="#" class="f-link">News</a>
                                </li>
                                <li>
                                    <a href="#" class="f-link">business</a>
                                </li>
                                <li>
                                    <a href="#" class="f-link">Tech</a>
                                </li>
                                <li>
                                    <a href="#" class="f-link">politics</a>
                                </li>
                                <li>
                                    <a href="#" class="f-link">economy</a>
                                </li>
                                <li>
                                    <a href="#" class="f-link">market</a>
                                </li>
                                <li>
                                    <a href="#" class="f-link">Videos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 mt-5 mt-lg-0">
                        <div class="link-group">
                            <h6 class="foot-tilte mb-40">Help</h6>
                            <ul>
                                <li>
                                    <a href="#" class="f-link">About</a>
                                </li>
                                <li>
                                    <a href="#" class="f-link">Contact</a>
                                </li>
                                <li>
                                    <a href="#" class="f-link">Advertise</a>
                                </li>
                                <li>
                                    <a href="#" class="f-link">Career</a>
                                </li>
                                <li>
                                    <a href="#" class="f-link">Policy</a>
                                </li>
                                <li>
                                    <a href="#" class="f-link">FAQ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-5 mt-lg-0">
                        <div class="newsletter">
                            <h6 class="foot-tilte mb-40">newsletter</h6>
                            <div class="cont">
                                <div class="text">
                                    Register now to get latest updates on promotions & coupons.
                                </div>
                                <form class="form mt-30">
                                    <div class="form-group">
                                        <span class="icon">
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                        <input type="text" placeholder="Enter your email">
                                        <button type="submit">
                                            <span> <i class="fa-solid fa-paper-plane"></i> </span>
                                        </button>
                                    </div>
                                    <p class="text fst-italic fsz-14px mt-15 fw-light color-ccc">By subscribing, you accepted our <a href="#" class="text-decoration-underline fst-normal text-white">Policy</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="foot mt-100 pb-60">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-end">
                            <a href="#" class="foot-logo">
                                <img src="{{asset('front/assets/img/logo_home5_lt.png')}}" alt="">
                            </a>
                            <div class="text ps-70 fsz-14px color-ccc">
                                © 2023 Copyrights by <span class="text-white">Digantabangla</span>. All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== start to top button ====== -->
        <a href="#" class="to_top">
            <i class="fa-thin fa-up-to-dotted-line"></i>
        </a>
        <!-- ====== end to top button ====== -->
    </footer>
    <!-- ====== request ====== -->
    <script src="{{asset('front/assets/js/lib/jquery-3.0.0.min.js')}}"></script>
    <script src="{{asset('front/assets/js/lib/jquery-migrate-3.0.0.min.js')}}"></script>
    <script src="{{asset('front/assets/js/lib/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/js/lib/wow.min.js')}}"></script>
    <script src="{{asset('front/assets/js/lib/jquery.fancybox.js')}}"></script>
    <script src="{{asset('front/assets/js/lib/lity.js')}}"></script>
    <script src="{{asset('front/assets/js/lib/swiper.min.js')}}"></script>
    <script src="{{asset('front/assets/js/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('front/assets/js/lib/jquery.counterup.js')}}"></script>
    <script src="{{asset('front/assets/js/lib/pace.js')}}"></script>
    <script src="{{asset('front/assets/js/lib/back-to-top.js')}}"></script>
    <script src="{{asset('front/assets/js/lib/mixitup.min.js')}}"></script>
    <script src="{{asset('front/assets/js/lib/parallaxie.js')}}"></script>
    <script src="{{asset('front/assets/js/main.js')}}"></script>


</body>

</html>