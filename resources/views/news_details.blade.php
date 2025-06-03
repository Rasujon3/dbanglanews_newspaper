@extends('master')
@section('front_content')

 <!--Contents-->
    <main>

        <!-- ====== start tc-main-post-style1 ====== -->
        <section class="tc-main-post-style1 pb-60">
            <div class="container">
                <div class="tc-main-post-title pt-40 pb-40">
                    <div class="row">
                        <div class="col-lg-8">
                            <p class="text-uppercase mb-15">{{newsDetails($slug)->category_name}}</p>
                            <h2 class="title">{{newsDetails($slug)->title}}</h2>
                           
                        </div>
                    </div>
                </div>
                <div class="meta-nav pt-30 pb-30 border-top border-1 brd-gray">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="author-side color-666 fsz-13px">
                                <div class="author me-40 d-flex d-lg-inline-flex align-items-center">
                                    <span class="icon-30 rounded-circle overflow-hidden me-10">
                                        <img src="{{asset('front/assets/img/colums.png')}}" alt="">
                                    </span>
                                    <span>By</span>
                                    <a href="#" class="text-decoration-underline text-primary ms-1">{{newsDetails($slug)->author}}</a>
                                </div>
                                <span class="me-40">
                                    <a href="#"><i class="fa-regular fa-calendar-days"></i> {{newsDetails($slug)->date_two}}</a>
                                </span>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tc-main-post-img img-cover mb-50">
                    <img src="{{URL::to(newsDetails($slug)->image)}}" alt="">
                </div>
                <div class="tc-main-post-content color-000">
                    <div class="row">
                        <div class="col-lg-12">
                           <p>{{newsDetails($slug)->short_description}}</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- ====== end tc-main-post-style ====== -->




        <!-- ====== start another posts ====== -->
        <section class="another-news">
            <div class="container">
                <div class="content pt-50 pb-50 border-1 border-top border-dark">
                    <div class="row">
                    	<h3 align="center" class="pb-5">Related News</h3>
                    	<hr>

                    	@foreach(limitRelatedNews(newsDetails($slug)->category_id,$slug) as $row1)
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            
                            <div class="row">
                                <div class="col-12 border-1 border-end brd-gray">
                                    <div class="tc-post-grid-default">
                                        <div class="item">
                                            <div class="img img-cover th-250">
                                                <img src="{{URL::to($row1->image)}}" alt="">
                                            </div>
                                            <div class="content pt-20">
                                                <a href="#" class="news-cat color-999 fsz-13px text-uppercase mb-10">{{$row1->category_name}}</a>
                                                <h4 class="title ltspc--1 mb-10">
                                                    <a href="{{URL::to('/news-details/'.$row1->slug)}}">
                                                        {{$row1->title}}
                                                    </a>
                                                </h4>
                                               
                                                <div class="meta-bot lh-1 mt-20">
                                                    <ul class="d-flex">
                                                        <li class="date me-5">
                                                            <a href="#"><i class="fa-regular fa-calendar-days"></i> {{$row1->date_two}}</a>
                                                        </li>
                                                      
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== start another posts ====== -->


        <!-- ====== start comments ====== -->
        <!-- <section class="tc-single-post-comments">
            <div class="container">
                <div class="comments-content pt-50 pb-50 border-1 border-top border-dark">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="content">
                                <div class="comments-filter">
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <p class="text-uppercase">3 comments</p>
                                        </div>
                                        <div class="col-8 text-end">
                                            <div class="from-group">
                                                <label for="">Sort by : </label>
                                                <select name="" id="" class="form-select">
                                                    <option value="">Most liked</option>
                                                    <option value="">Most views</option>
                                                    <option value="">Most rated</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comments-cards">
                                    <div class="comment-replay-cont border-bottom border-1 brd-gray pb-40 pt-40">
                                        <div class="d-flex comment-cont">
                                            <div class="icon-60 rounded-circle img-cover overflow-hidden me-3 flex-shrink-0">
                                                <img src="{{asset('front/assets/img/colums/1.png')}}" alt="">
                                            </div>
                                            <div class="inf w-100">
                                                <div class="title d-flex justify-content-between">
                                                    <h6 class="fw-bold fsz-14px">David Bowie</h6>
                                                    <span class="time fsz-12px text-uppercase color-999">
                                                        3 hours ago
                                                    </span>
                                                </div>
                                                <div class="text color-666 fsz-12px mt-10">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Atume nusaate staman utra phone limo sumeria                                            
                                                </div>
                                                <a href="#" class="butn border border-1 mt-20 py-2 px-3">
                                                    <span class="fsz-11px"> replay </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex comment-replay ps-5 mt-30 ms-4">
                                            <div class="icon-40 rounded-circle img-cover overflow-hidden me-3 flex-shrink-0">
                                                <img src="{{asset('front/assets/img/colums/2.png')}}" alt="">
                                            </div>
                                            <div class="inf w-100">
                                                <div class="title d-flex justify-content-between">
                                                    <h6 class="fw-bold fsz-14px">Logan Cee</h6>
                                                    <span class="time fsz-12px text-uppercase color-999">
                                                        2 dayes ago
                                                    </span>
                                                </div>
                                                <div class="text color-666 fsz-12px mt-10">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Atume nusaate staman utra phone limo sumeria                                            
                                                </div>
                                                <a href="#" class="butn border border-1 mt-20 py-2 px-3">
                                                    <span class="fsz-11px"> replay </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-replay-cont pb-40 pt-40 border-bottom border-1 brd-gray">
                                        <div class="d-flex comment-cont">
                                            <div class="icon-60 rounded-circle img-cover overflow-hidden me-3 flex-shrink-0">
                                                <img src="{{asset('front/assets/img/colums/3.png')}}" alt="">
                                            </div>
                                            <div class="inf w-100">
                                                <div class="title d-flex justify-content-between">
                                                    <h6 class="fw-bold fsz-14px">Luis Diaz</h6>
                                                    <span class="time fsz-12px text-uppercase color-999">
                                                        December 25, 2022
                                                    </span>
                                                </div>
                                                <div class="text color-000 fsz-12px mt-10">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt                                             
                                                </div>
                                                <a href="#" class="butn border border-1 mt-20 py-2 px-3">
                                                    <span class="fsz-11px"> replay </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form class="comment-form d-block pt-30">
                                    <p class="text-uppercase mb-30">Leave A Comment</p>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-30">
                                                <textarea class="form-control rounded-0 fsz-12px p-3" name="comment" rows="6" placeholder="Write your comment here"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-4 mb-lg-0">
                                                <input type="text" class="form-control fsz-12px rounded-0 p-3" name="name" placeholder="Your Name *">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control fsz-12px rounded-0 p-3" name="email" placeholder="Your Email *">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-check mt-20">
                                                <input class="form-check-input" name="checkbox" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label fsz-12px" for="flexCheckDefault">
                                                    Save my name & email in this browser for next time I comment
                                                </label>
                                              </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn bg-main text-white rounded-0 mt-40">
                                                <span class="fsz-11px">Submit Comment </span>
                                            </button>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- ====== end comments ====== -->


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
                <h6 class="color-000 text-uppercase mb-15 ltspc-1"> about us <i class="fa-solid fa-chevron-right"></i> </h6>
                <div class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem optio tempora quia iure quae. Soluta corporis quidem aperiam amet nihil.
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
                    <h6 class="color-000 text-uppercase mb-20 ltspc-1"> Contact & follow <i class="fa-solid fa-chevron-right"></i> </h6>
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