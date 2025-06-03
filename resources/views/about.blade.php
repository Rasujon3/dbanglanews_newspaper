@extends('master')
@section('front_content')
 <!--Contents-->
    <main>

        <!-- ====== start about header ====== -->
        <section class="tc-about-header">
            <div class="container">
                <div class="content content1">
                    <div class="title" style="">
                        <h2> About Us </h2>
                    </div>
                    <div class="links">
                        <a href="{{URL::to('/')}}"> home </a>
                        <span class="icon"> <i class="fa-solid fa-chevron-right"></i></span>
                        <a href="#"> pages </a>
                        <span class="icon"> <i class="fa-solid fa-chevron-right"></i></span>
                        <a href="#"> about us </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end about header ====== -->


        <!-- ====== start about-about ====== -->
        <section class="tc-about-about">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="img img-cover">
                            <img src="{{asset('front/assets/img/about_page/about.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="info mt-4 mt-lg-0">
                            <p class="fsz-13px color-999 text-uppercase mb-10"> since from 2000 </p>
                            <h2 class="fsz-30px mb-40"> Our styleguide for our users <br> is very easy to catch </h2>
                            <div class="text fsz-14px color-666 mb-60">
                                The about us page is often a reflection of the purpose & personality of the business and its owners or top employees. Finally, the page can also incorporate contact or locational information.
                            </div>
                            <a href="#" class="butn bg-main text-white hover-shadow">
                                <span> Get In Touch </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end about-about ====== -->


        <!-- ====== start about-vision ====== -->
        <section class="tc-about-vision">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5">
                        <div class="info mt-4 mt-lg-0">
                            <p class="fsz-13px color-999 text-uppercase mb-10"> mission & vision </p>
                            <h2 class="fsz-30px mb-40"> Diganta Bangla generated 2x more <br> online sales in 2022. </h2>
                            <div class="text fsz-14px color-666 mb-20">
                                Say goodbye to old fashioned theme options! Hub employs a live customizer so you can adjust global theme options and see design changes in real-time thank to the next generation customizer.
                            </div>
                            <div class="text fsz-14px color-666 mb-40">
                                Average. Urban design draws together the many strands of place making, environmental. Years of experience.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="numbers-circles">
                            <div class="circle-item">
                                <div class="cont">
                                    <p> mission & vision </p>
                                    <strong class="number"> <span class="counter"> 77 </span>%</strong>
                                </div>
                            </div>
                            <div class="circle-item">
                                <div class="cont">
                                    <p> Crafted by </p>
                                    <strong class="number"> <span class="counter"> 49 </span>%</strong>
                                </div>
                            </div>
                            <div class="circle-item">
                                <div class="cont">
                                    <p> crafted by </p>
                                    <strong class="number"> <span class="counter"> 10 </span>k</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end about-vision ====== -->


        


    


        <!-- ====== start modals ====== -->

        <div class="offcanvas offcanvas-start sidebar-popup-style1" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <div class="logo">
                    <img src="{{asset('front/assets/img/logo_home1.png')}}" alt="" class="dark-none">
                    <img src="{{asset('front/assets/img/logo_home1_lt.png')}}" alt="" class="light-none">
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mt-4">
                <h6 class="color-000 text-uppercase mb-10 ltspc-1"> about us <i class="la la-angle-right ms-1"></i> </h6>
                <div class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem optio tempora quia iure quae. Soluta corporis quidem aperiam amet nihil.
                </div>

                <div class="sidebar-categories mt-40">
                    <h6 class="color-000 text-uppercase mb-30 ltspc-1"> categories <i class="la la-angle-right ms-1"></i> </h6>
                    <a href="#" class="cat-card">
                        <div class="img img-cover">
                            <img src="{{asset('front/assets/img/bussines/1.png')}}" alt="">
                        </div>
                        <div class="info">
                            <h5>bussines</h5>
                            <span class="num">12</span>
                        </div>
                    </a>
                    <a href="#" class="cat-card">
                        <div class="img img-cover">
                            <img src="{{asset('front/assets/img/trend/3.png')}}" alt="">
                        </div>
                        <div class="info">
                            <h5>technology</h5>
                            <span class="num">14</span>
                        </div>
                    </a>
                    <a href="#" class="cat-card">
                        <div class="img img-cover">
                            <img src="{{asset('front/assets/img/must_read/3.png')}}" alt="">
                        </div>
                        <div class="info">
                            <h5>culture</h5>
                            <span class="num">20</span>
                        </div>
                    </a>
                    <a href="#" class="cat-card">
                        <div class="img img-cover">
                            <img src="{{asset('front/assets/img/videos/1.png')}}" alt="">
                        </div>
                        <div class="info">
                            <h5>videos</h5>
                            <span class="num">14</span>
                        </div>
                    </a>
                </div>
                <div class="sidebar-contact-info mt-50">
                    <h6 class="color-000 text-uppercase mb-20 ltspc-1"> Contact & follow <i class="la la-angle-right ms-1"></i> </h6>
                    <ul class="m-0">
                        <li class="mb-3">
                            <i class="las la-map-marker me-2 color-main fs-5"></i>
                            <a href="#">streat name 12, hollywood City, USA</a>
                        </li>
                        <li class="mb-3">
                            <i class="las la-envelope me-2 color-main fs-5"></i>
                            <a href="#">Diganta Bangla@gmail.com</a>
                        </li>
                        <li class="mb-3">
                            <i class="las la-phone-volume me-2 color-main fs-5"></i>
                            <a href="#">+12 123 456 789</a>
                        </li>
                    </ul>
                    <div class="social-links">
                        <a href="#">
                            <i class="la la-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="la la-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="la la-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="la la-youtube"></i>
                        </a>
                        <a href="#">
                            <i class="la la-spotify"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== end modals ====== -->

    </main>
    <!--End-Contents-->
@endsection