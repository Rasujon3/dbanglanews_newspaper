@extends('master')
@section('front_content')
 
 <!--Contents-->
    <main>
        <!-- ====== start breaking news ====== -->
        <section class="tc-breaking-news-style5 pt-50 pb-50">
            <div class="container">
                <div class="content">
                    <div class="breaking-title">
                        <strong> <i class="fa-solid fa-bolt"></i> Breaking News</strong>
                    </div>
                    <div class="breaking-body">
                        <div class="tc-breaking-news-slider5">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                	@foreach(allBreakingNews() as $v_row)
                                    <div class="swiper-slide">
                                        <div class="item ">
                                            <a href="{{url('/news-details/'.$v_row->slug)}}" class="hover-underline">{{$v_row->title}}</a>
                                        </div>
                                    </div>
                                   @endforeach

                                </div>
                            </div>
                        </div>
                        <!-- arrows -->
                        <div class="arrows">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end breaking news ====== -->

        <!-- ====== start trends news ====== -->
        <section class="tc-post-grid-style5 overflow-hidden">
            <div class="container">
                <div class="content pb-50 border-1 border-bottom brd-gray">
                    <div class="row gx-5">

                    	@foreach(limitBreakingNews() as $l_row)

                        <div class="col-lg-6 border-1 border-end brd-gray mb-5 mb-lg-0">
                            <div class="item">
                                <div class="content">
                                    <div class="tags mb-20">
                                        <a href="{{URL::to('/category-details/'.$l_row->category_id)}}">
                                            {{$l_row->category_name}}
                                        </a>
                                    </div>
                                    <h2 class="title mb-20"> 
                                        <a href="{{URL::to('/news-details/'.$l_row->slug)}}">
                                            {{$l_row->title}}
                                        </a> 
                                    </h2>
                                    <div class="text color-666 mb-20">
                                        {!!$l_row->short_description!!} [...]
                                    </div>
                                    <div class="meta-bot fsz-13px color-666 mb-40">
                                        <ul class="d-flex">
                                            <li class="date me-5">
                                                <a href="#"><i class="fa-regular fa-calendar-days"></i> {{$l_row->date_two}}</a>
                                            </li>
                                            <li class="author me-5">
                                                <a href="#"><i class="fa-solid fa-user"></i> by <span class="color-000">{{$l_row->author}}</span> </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="img img-cover d-block th-380">
                                    <img src="{{URL::to($l_row->image)}}" alt="">
                                </a>
                            </div>
                        </div>

                       @endforeach

                    </div>
                </div>
                <div class="content pb-50 pt-50">
                    <div class="row gx-5">
                       @foreach(limitPopularCategories() as $row1)
                        <div class="col-lg-4 border-1 border-end brd-gray mb-5 mb-lg-0">
                            <div class="item">
                                <div class="content">
                                    <div class="tags mb-20">
       
                                        <a href="{{URL::to('/category-details/'.$row1->category_id)}}">
                                            {{$row1->category_name}}
                                        </a>
                                    </div>
                                    <h3 class="title mb-20"> 
                                        <a href="{{URL::to('/news-details/'.$row1->slug)}}">
                                            {{$row1->title}}
                                        </a> 
                                    </h3>
                                    <div class="meta-bot fsz-13px color-666 mb-30">
                                        <ul class="d-flex">
                                            <li class="date me-5">
                                                <a href="#"><i class="fa-regular fa-calendar-days"></i> {{$row1->date_two}}</a>
                                            </li>
                  
                                        </ul>
                                    </div>
                                </div>
                                <a href="#" class="img img-cover d-block th-250">
                                    <img src="{{URL::to($row1->image)}}" alt="">
                                </a>
                            </div>
                        </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end trends news ====== -->


        <!-- ====== start banner11 ====== -->
        <section class="banner11">
            <div class="container">
                <div class="content pt-60 pb-60 border-top border-bottom border-1 brd-gray">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <a href="#" class="d-block img-cover">
                                <img src="{{asset('front/assets/img/banner1.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end banner11 ====== -->


        <!-- ====== start latest & trending news ====== -->
        <section class="overflow-hidden">
            <div class="container">
                <div class="content pt-60 pb-60 border-1 border-bottom brd-gray">
                    <div class="row gx-5">
                        <div class="col-lg-9 border-1 border-end brd-gray mb-5 mb-lg-0">
                            <div class="tc-latest-news-style5">
                                <a href="#" class="color-000 text-uppercase mb-30">latest news <i class="fa-solid fa-chevron-right"></i></i></a>
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="tc-post-overlay-style5 mb-5 mb-lg-0">
                                            <div class="tc-post-overlay-slider5">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper">
                                                    	@foreach(latestNews() as $row2)
                                                        <div class="swiper-slide">
                                                            <div class="item">
                                                                <div class="img th-525 img-cover">
                                                                    <img src="{{URL::to($row2->image)}}" alt="">
                                                                    <div class="tags">
                                                                        <a href="{{URL::to('/category-details/'.$row2->category_id)}}">{{$row2->category_name}}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="info">
                                                                    <h2 class="title mb-20">
                                                                        <a href="{{URL::to('/news-details/'.$row2->slug)}}">
                                                                            {{$row2->title}}
                                                                        </a>
                                                                    </h2>
                                                                    <div class="text text-light mb-40 fsz-16px">
                                                                        {!! $row2->short_description !!} [...]
                                                                    </div>
                                                                    <div class="meta-bot fsz-13px text-white">
                                                                        <ul class="d-flex">

                                                                            <li class="date me-4">
                                                                                <a href="#"><i class="fa-regular fa-calendar-days"></i> {{$row2->date_two}}</a>
                                                                            </li>
                                                                            <li class="author me-4">
                                                                                <a href="#"><i class="fa-solid fa-user"></i> by {{$row2->author}} </a>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <!-- arrows -->
                                                <div class="arrows">
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="tc-post-list-style5">
                                            <div class="items">
                                            	@foreach(limitLatestNews() as $row3)
                                                <div class="item pt-0">
                                                    <div class="row gx-0">
                                                        <div class="col-8 pe-10">
                                                            <div class="content">
                                                                <div class="tags mb-15">
                                                                    <a href="{{URL::to('/category-details/'.$row3->category_id)}}">{{$row3->category_name}}</a>
                                                                </div>
                                                                <h5 class="title">
                                                                    <a href="{{URL::to('/news-details/'.$row3->slug)}}" class="hover-underline">
                                                                        {{$row3->title}}
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="img th-80 img-cover">
                                                                <img src="{{URL::to($row3->image)}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        <!-- ====== end latest & trending news ====== -->


        <!-- ====== start popular & recently news & widgets ====== -->
        <section class="pt-60 pb-60 overflow-hidden">
            <div class="container">
                <div class="content">
                    <div class="row gx-5">
                        <div class="col-lg-3 border-1 border-end brd-gray mb-5 mb-lg-0">
                            <div class="tc-popular-posts-style5">
                                <p class="color-000 text-uppercase mb-30"> popular posts </p>
                                <div class="tc-post-grid-style5">

                                  @foreach(popularPosts() as $row5)

                                    <div class="item pb-30 border-1 border-bottom brd-gray">
                                        <div class="content">
                                            <div class="tags mb-15">
                                                <a href="{{URL::to('/category-details/'.$row5->category_id)}}">
                                                    {{$row5->category_name}}
                                                </a>
                                            </div>
                                            <h5 class="title mb-20"> 
                                                <a href="{{URL::to('/news-details/'.$row5->slug)}}">
                                                    {{$row5->title}} 
                                                </a> 
                                            </h5>
                                            <div class="meta-bot fsz-13px color-666 mb-20">
                                                <ul class="d-flex">
                                                    <li class="date me-5">
                                                        <a href="#"><i class="fa-regular fa-calendar-days"></i> {{$row5->date_two}}</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <a href="#" class="img img-cover d-block th-200">
                                            <img src="{{URL::to($row5->image)}}" alt="">
                                        </a>
                                    </div>
                                 @endforeach
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 border-1 border-end brd-gray mb-5 mb-lg-0">
                            <div class="tc-recently-posts-style5">
                                <p class="color-000 text-uppercase mb-30"> recently posts </p>
                                <div class="tc-post-grid-style5">
                                	@foreach(recentPosts() as $row6)
                                    <div class="item pb-30 border-1 border-bottom brd-gray">
                                        <div class="row gx-5">
                                            <div class="col-7">
                                                <div class="content">
                                                    <div class="tags mb-15">
                                                        <a href="{{URL::to('/category-details/'.$row6->category_id)}}">
                                                            {{$row6->category_name}}
                                                        </a>
                                                    </div>
                                                    <h5 class="title mb-20"> 
                                                        <a href="{{URL::to('/news-details/'.$row6->slug)}}">
                                                            {{$row6->title}}
                                                        </a> 
                                                    </h5>
                                                    <div class="meta-bot fsz-13px color-666">
                                                        <ul class="d-flex">
                                                            <li class="date me-5">
                                                                <a href="#"><i class="fa-regular fa-calendar-days"></i> {{$row6->date_two}}</a>
                                                            </li>
                                                           
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <a href="#" class="img img-cover d-block th-140">
                                                    <img src="{{URL::to($row6->image)}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                   @endforeach

                                </div>
                                <div class="tc-post-overlay-style5 mt-40 pb-30 border-1 border-bottom brd-gray">
                                    <div class="tc-post-overlay-slider5">
                                        <div class="item">
                                            <div class="img th-380 img-cover">
                                                <img src="{{URL::to(otherpopularCategory()->category_image)}}" alt="">

                                            </div>
                                            <div class="info">
                                                <h3 class="title mb-30">
                                                    <a href="page-single-post-creative.php">
                                                        {{otherpopularCategory()->category_name}}
                                                    </a>
                                                </h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tc-post-grid-style5">

                                	@foreach(otherpopularCategoryPosts() as $row7)
                                    <div class="item pb-30 pt-30 border-1 border-bottom brd-gray">
                                        <div class="row gx-5">
                                            <div class="col-7">
                                                <div class="content">
                                                   
                                                    <h5 class="title mb-20"> 
                                                        <a href="{{URL::to('/news-details/'.$row7->slug)}}">
                                                            {{$row7->title}}
                                                        </a> 
                                                    </h5>
                                                    <div class="meta-bot fsz-13px color-666">
                                                        <ul class="d-flex">
                                                        <li class="date me-4">
                                                            <a href="#"><i class="fa-regular fa-calendar-days"></i> {{$row7->date_two}}</a>
                                                        </li>

                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <a href="#" class="img img-cover d-block th-140">
                                                    <img src="{{URL::to($row7->image)}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                   @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 border-1 border-end brd-gray mb-5 mb-lg-0">
                            <div class="tc-popular-posts-style5">
                                <p class="color-000 text-uppercase mb-30"> Breaking News </p>
                                <div class="tc-post-grid-style5">
                                	@foreach(limitBreakingTwos() as $row8)

                                    <div class="item pb-30 border-1 border-bottom brd-gray">
                                        <div class="content">
                                            <div class="tags mb-15">
                                                <a href="{{URL::to('/category-details/'.$row8->category_id)}}">
                                                    {{$row8->category_name}}
                                                </a>
                                            </div>
                                            <h5 class="title mb-20"> 
                                                <a href="{{URL::to('/news-details/'.$row8->slug)}}">
                                                    {{$row8->title}}
                                                </a> 
                                            </h5>
                                            <div class="meta-bot fsz-13px color-666 mb-20">
                                                <ul class="d-flex">
                                                    <li class="date me-5">
                                                        <a href="#"><i class="fa-regular fa-calendar-days"></i> {{$row8->date_two}}</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <a href="#" class="img img-cover d-block th-200">
                                            <img src="{{URL::to($row8->image)}}" alt="">
                                        </a>
                                    </div>

                                   @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end popular & recently news & widgets ====== -->


        <!-- ====== start hot-videos-style5  ====== -->
       
        <!-- ====== end hot-videos-style5  ====== -->



        <div class="#" style="padding-top: 30px;"></div>


        <!-- ====== start business & politics & market ====== -->
        <section class="pb-70 overflow-hidden">
            <div class="container">
                <div class="row gx-5">
                    <div class="titles">
                        <div class="row gx-5">
                        	@foreach(nestedCategories() as $row9)
                            <div class="col-lg-4">
                                <a href="{{URL::to('/category-details/'.$row9->id)}}" class="color-000 text-uppercase mb-30 d-none d-lg-block"> {{$row9->category_name}} <i class="fa-solid fa-chevron-right"></i></a>

                                <div class="tc-post-grid-style5">
                                <div class="item pb-30 border-1 border-bottom brd-gray">
                                    
                                    <a href="{{URL::to('/category-details/'.$row9->id)}}" class="img img-cover d-block th-230">
                                        <img src="{{URL::to($row9->category_image)}}" alt="">
                                    </a>
                                </div>
                            </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
      				
      	          @foreach(nestedCategories() as $row10)
                    <div class="col-lg-4 border-1 border-end">
                        
                        <div class="content-card">
                            
                            <div class="tc-post-list-style5">
                                <div class="items">

                                 @foreach(nestedCategoryPosts($row10->id) as $row11)

                                    <div class="item">
                                        <div class="row gx-0">
                                            <div class="col-8 pe-10">
                                                <div class="content">
                                                    <div class="tags mb-15">
                                                        <a href="{{URL::to('/category-details/'.$row10->id)}}">{{$row10->category_name}}</a>
                                                    </div>
                                                    <h5 class="title">
                                                        <a href="{{URL::to('/news-details/'.$row11->slug)}}" class="hover-underline">
                                                            {{$row11->title}}
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="img th-80 img-cover">
                                                    <img src="{{URL::to($row11->image)}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                 @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
       			  @endforeach
                </div>
            </div>
        </section>
        <!-- ====== end business & politics & market ====== -->
        

        <!-- ====== start modals ====== -->

        <div class="offcanvas offcanvas-start sidebar-popup-style1" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <div class="logo">
                    <img src="{{asset('front/assets/img/logo_home4.png')}}" alt="" class="dark-none">
                    <img src="{{asset('front/assets/img/logo_home4_lt.png')}}" alt="" class="light-none">
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mt-4">
                <h6 class="color-000 text-uppercase mb-15 ltspc-1"> about us <i class="la la-angle-right ms-1"></i> </h6>
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
                            <a href="#">digantabangla@gmail.com</a>
                        </li>
                        <li class="mb-3">
                            <i class="las la-phone-volume me-2 color-main fs-5"></i>
                            <a href="#">+44 7312 269754</a>
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