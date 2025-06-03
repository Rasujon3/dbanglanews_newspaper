@extends('master')
@section('front_content')
 <!--Contents-->
    <main>

        <!-- ====== start features posts ====== -->
        <section class="features-posts pt-50 pb-50 bg-gray1">
            <div class="container">
                <div class="">
                    <div class="row">
                    	@foreach(limitrecentPostsByCategory($id) as $row1)
                        <div class="col-lg-6 border-1 border-end brd-gray">
                            <div class="tc-post-overlay-default mb-30 mb-lg-0">
                                <div class="img th-600 img-cover">
                                    <img src="{{URL::to($row1->image)}}" alt="">
                                    <div class="tags">
                                        <a href="{{URL::to('/category-details/'.$row1->category_id)}}">{{$row1->category_name}}</a>
                                    </div>
                                </div>
                                <div class="content ps-30 pe-30 pb-30">
                                    <h2 class="title mb-20">
                                        <a href="{{URL::to('/news-details/'.$row1->slug)}}">{{$row1->title}}</a>
                                    </h2>
                                    <div class="text">
                                        {!! $row1->short_description !!} [...]
                                    </div>
                                    <div class="meta-bot lh-1 mt-40">
                                        <ul class="d-flex">
                                            <li class="date me-5">
                                                <a href="#"><i class="fa-regular fa-calendar-days"></i> {{$row1->date_two}}</a>
                                            </li>
                                            <li class="author me-5">
                                                <a href="#"><i class="fa-solid fa-user"></i> by {{ $row1->author }}</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end features posts ====== -->

        <!-- ====== start popular posts ====== -->
        <section class="tc-popular-posts-blog">
            <div class="container">
                <div class="content pt-50 pb-50 border-1 border-bottom brd-gray">
                    <p class="color-000 text-uppercase mb-30 ltspc-1"> popular posts </p>
                    <div class="tc-post-grid-default">
                        <div class="tc-popular-posts-blog-slider9 tc-slider-style1">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">

                                	@foreach(popularPostsByCategory($id) as $row2)

                                    <div class="swiper-slide">
                                        <div class="item">
                                            <div class="img img-cover th-180">
                                                <img src="{{URL::to($row2->image)}}" alt="">
                                            </div>
                                            <div class="content pt-20">
                                                <a href="{{URL::to('/category-details/'.$row2->category_id)}}"
                                                    class="news-cat color-999 fsz-13px text-uppercase mb-10">sport</a>
                                                <h4 class="title ltspc--1 mb-10">
                                                    <a href="{{URL::to('/news-details/'.$row2->slug)}}">
                                                        {{$row2->title}}
                                                    </a>
                                                </h4>
                                                <div class="text color-666">
                                                    {!! $row2->short_description !!} [...]
                                                </div>
                                                <div class="meta-bot lh-1 mt-20">
                                                    <ul class="d-flex">
                                                        <li class="date me-5">
                                                            <a href="#"><i class="fa-regular fa-calendar-days"></i> {{$row2->date_two}}</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   @endforeach
                                    
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <div class="content-widgets pt-50 pb-50">
                    <div class="row">
                        <div class="col-lg-9">
                        
                            
                            <div class="tc-post-list-style3">
                                <div class="items">
                                	@foreach(paginatePostsByCategory($id) as $key3=>$row3)
                                	@php
                                	 $val = $key3+1;
                                	@endphp
                                	@if($val % 2 == 1)
                                    <div class="item mt-30">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="img th-230 img-cover overflow-hidden">
                                                    <img src="{{URL::to($row3->image)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="content mt-20 mt-lg-0">
                                                    <a href="{{URL::to('/category-details/'.$row3->category_id)}}"
                                                        class="color-999 fsz-13px text-uppercase mb-10">{{$row3->category_name}}</a>
                                                    <h4 class="title fw-bold">
                                                        <a href="{{url('/news-details/'.$row3->slug)}}" class="hover-underline">
                                                           {{$row3->title}}
                                                        </a>
                                                    </h4>
                                                    <div class="text color-666 mt-20">
                                                        {!!$row3->short_description!!} [...]
                                                    </div>
                                                    <div class="meta-bot fsz-13px color-666">
                                                        <ul class="d-flex">
                                                            <li class="date me-5"><a href="#"><i class="fa-regular fa-calendar-days"></i> {{$row3->date_two}}</a></li>
                                                            <li class="author me-5">
                                                                <a href="#"><i class="fa-solid fa-user"></i> by <span class="color-000">{{$row3->author}}</span> </a>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="item mt-30 p-30 bg-gray1 border-bottom-0">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="img th-180 img-cover overflow-hidden">
                                                    <img src="{{URL::to($row3->image)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="content mt-20 mt-lg-0">
                                                    <a href="{{URL::to('/category-details/'.$row3->category_id)}}"
                                                        class="color-main fsz-13px text-uppercase mb-10">{{$row3->category_name}}</a>
                                                    <h4 class="title fw-bold">
                                                        <a href="{{URL::to('/news-details/'.$row3->slug)}}" class="hover-underline">
                                                            {{$row3->title}}
                                                        </a>
                                                    </h4>
                                                    <div class="meta-bot fsz-13px">
                                                        <ul class="d-flex">
                                                            <li class="date me-5"><a href="#"><i class="fa-regular fa-calendar-days"></i> {{$row3->date_two}}</a></li>
                                                            <li class="author me-5">
                                                                <a href="#"><i class="fa-solid fa-user"></i> by <span class="color-000">{{$row3->author}}</span> </a>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                 @endforeach
                                    
                                </div>
                            </div>
                            <div class="pagination style-1 color-main justify-content-center mt-60">
                               {{paginatePostsByCategory($id)->links()}}
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="tc-trending-news-style5">
                                <p class="color-000 text-uppercase mb-30">trending category</p>
                                <div class="tc-post-list-style6">
                                    <div class="main-post">
                                        <div class="img th-180 img-cover">
                                            <img src="{{URL::to(popularCategory()->category_image)}}" alt="">
                                        </div>
                                        <div class="info">
                                            
                                            <h5 class="title">
                                                <a href="{{URL::to('/category-details/'.popularCategory()->id)}}">{{popularCategory()->category_name}}</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="items">
                                        
                                        @foreach(popularcategoryPosts() as $key4=>$row4)
                                        <div class="item">
                                            <h2 class="num">
                                                {{$key4+2}}
                                            </h2>
                                            <div class="content">

                                                <h6 class="title fsz-16px fw-bold ltspc--1">
                                                    <a href="{{URL::to('/news-details/'.$row4->slug)}}" class="">{{$row4->title}}</a>
                                                </h6>
                                            </div>
                                        </div>
 										@endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end popular posts ====== -->

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
                <h6 class="color-000 text-uppercase mb-15 ltspc-1"> about us <i class="fa-solid fa-chevron-right"></i>
                </h6>
                <div class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem optio tempora quia iure quae.
                    Soluta corporis quidem aperiam amet nihil.
                </div>

                <div class="sidebar-categories mt-40">
                    <h6 class="color-000 text-uppercase mb-30 ltspc-1"> categories <i class="fa-solid fa-chevron-right"></i> </h6>
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
                    <h6 class="color-000 text-uppercase mb-20 ltspc-1"> Contact & follow 
                            <i class="fa-solid fa-chevron-right"></i> </h6>
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