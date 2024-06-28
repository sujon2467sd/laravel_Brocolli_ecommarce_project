@extends('frontend.master')
@section('title', 'Service')

@section('content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="{{ asset('/') }}frontend/img/bg/9.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>
                            <h1 class="section-title white-color">What We Do</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Service</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pb-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 align-self-center">
                    @foreach ($services as $service )
                    <div class="about-us-img-wrap ltn__img-shape-left  about-img-left" data-aos="fade-right">
                        <img src="{{ asset('admin/cate_images/'.$service->img) }}" alt="Image" >
                    </div>
                    @endforeach

                </div>
                <div class="col-lg-7 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">//  RELIABLE SERVICES</h6>
                            <h1 class="section-title" data-aos="fade-up">{{$service->name}}<span>.</span></h1>
                            <p data-aos="fade-up">{{ $service->short_description }}</p>
                        </div>
                        <div class="about-us-info-wrap-inner about-us-info-devide">
                            <p >{!! $service->description !!}</p>
                            <div class="list-item-with-icon">
                                <ul>
                                    <li><a href="contact.html">24/7 Free home delivery</a></li>
                                    <li><a href="team.html">Expert Team</a></li>
                                    <li><a href="service-details.html">Pure Equipment</a></li>
                                    <li><a href="shop.html">Unlimited Product</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->

    <!-- SERVICE AREA START (Service 1) -->
    <div class="ltn__service-area section-bg-1 pt-115 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title white-color---">Our Services</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                @foreach ($single_service as $service)
                <div class="col-lg-4 col-sm-6" data-aos="zoom-out">
                    <div class="ltn__service-item-1">
                        <div class="service-item-img">
                            <a href="service-details.html"><img src="{{ asset('admin/cate_images/'.$service->img) }}" alt="#"></a>
                        </div>
                        <div class="service-item-brief">
                            <h3><a href="service-details.html">{{  $service->name }}</a></h3>
                            <p>{{ $service->short_description }}</p>
                        </div>
                        <div class="d-flex justify-content-center ">
                          <a href="{{ route('service.details',$service->id) }}">  <button class="btn btn-outline-danger mb-4 rounded-pill">More</button></a>
                        </div>

                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- SERVICE AREA END -->

    <!-- OUR JOURNEY AREA START -->
    <div class="ltn__our-journey-area bg-image bg-overlay-theme-90 pt-280 pb-350 mb-35 plr--9" data-bg="img/bg/8.jpg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__our-journey-wrap ">
                        <ul>
                            <li><span class="ltn__journey-icon">1900</span>
                                <ul>
                                    <li>
                                        <div class="ltn__journey-history-item-info clearfix">
                                            <div class="ltn__journey-history-img">
                                                <img src="img/service/history-1.jpg" alt="#">
                                            </div>
                                            <div class="ltn__journey-history-info">
                                                <h3>Started Journey</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur ad ipisic ing elit, sed do eiusmod tempor.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="active"><span class="ltn__journey-icon">1950</span>
                                <ul>
                                    <li>
                                        <div class="ltn__journey-history-item-info clearfix">
                                            <div class="ltn__journey-history-img">
                                                <img src="img/service/history-1.jpg" alt="#">
                                            </div>
                                            <div class="ltn__journey-history-info">
                                                <h3>Get Rewards</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur ad ipisic ing elit, sed do eiusmod tempor.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><span class="ltn__journey-icon">1994</span>
                                <ul>
                                    <li>
                                        <div class="ltn__journey-history-item-info clearfix">
                                            <div class="ltn__journey-history-img">
                                                <img src="img/service/history-1.jpg" alt="#">
                                            </div>
                                            <div class="ltn__journey-history-info">
                                                <h3>Top Winner</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur ad ipisic ing elit, sed do eiusmod tempor.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><span class="ltn__journey-icon">2010</span>
                                <ul>
                                    <li>
                                        <div class="ltn__journey-history-item-info clearfix">
                                            <div class="ltn__journey-history-img">
                                                <img src="img/service/history-1.jpg" alt="#">
                                            </div>
                                            <div class="ltn__journey-history-info">
                                                <h3>Get Rewards</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur ad ipisic ing elit, sed do eiusmod tempor.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><span class="ltn__journey-icon">2020</span>
                                <ul>
                                    <li>
                                        <div class="ltn__journey-history-item-info clearfix">
                                            <div class="ltn__journey-history-img">
                                                <img src="img/service/history-1.jpg" alt="#">
                                            </div>
                                            <div class="ltn__journey-history-info">
                                                <h3>Get Rewards</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur ad ipisic ing elit, sed do eiusmod tempor.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- OUR JOURNEY AREA END -->

    <!-- VIDEO AREA START -->
    <div class="ltn__video-popup-area ltn__video-popup-margin-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="ltn__video-bg-img ltn__video-popup-height-600 bg-overlay-black-50--- bg-image" data-bg="img/bg/16.jpg">
                        <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="https://www.youtube.com/embed/X7R-q9rsrtU?autoplay=1&amp;showinfo=0" data-rel="lightcase:myCollection">

                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- VIDEO AREA END -->
@endsection
