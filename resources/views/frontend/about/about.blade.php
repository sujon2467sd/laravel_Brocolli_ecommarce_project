@extends('frontend.master')

@section('title', 'AboutUs')

@section('content')


 <!-- BREADCRUMB AREA START -->
 {{-- <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="img/bg/5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>
                        <h1 class="section-title white-color">About Us</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- BREADCRUMB AREA END -->
<div class="ltn__feature-area section-bg-2 pt-115 pb-90">
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="section-title-area ltn__section-title-2 text-center">
   @foreach ($abouts as $about)
   <h1 class="section-title" data-aos="zoom-in">{{ $about->name }}<span>.</span></h1>
    </div>
     <p data-aos="zoom-in">  {{ $about->description }}

     </p>
    @endforeach


       </div>
        </div>
        </div>
</div>



    <!-- FEATURE AREA START ( Feature - 6) -->
    <div class="ltn__feature-area section-bg-1 pt-115 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h6 class="section-subtitle ltn__secondary-color">//  features  //</h6>
                        <h1 class="section-title">Why Choose Us<span>.</span></h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                @foreach ($chooses as $choose)


                <div class="col-lg-4 col-sm-6 col-12" data-aos="zoom-in">
                    <div class="ltn__feature-item ltn__feature-item-7">
                        <div class="ltn__feature-icon-title">
                            <div class="ltn__feature-icon">
                                <span><img src="{{ asset('admin/cate_images/'.$choose->img) }}" alt="#" width="70px"></span>
                            </div>
                            <h3><a href="service-details.html">{{$choose->short_tittle  }}</a></h3>
                        </div>
                        <div class="ltn__feature-info">
                            <p>{{ $choose->description }}</p>
                        </div>
                    </div>
                </div>

                @endforeach
                {{-- <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-7">
                        <div class="ltn__feature-icon-title">
                            <div class="ltn__feature-icon">
                                <span><img src="img/icons/icon-img/22.png" alt="#"></span>
                            </div>
                            <h3><a href="service-details.html">Curated Products</a></h3>
                        </div>
                        <div class="ltn__feature-info">
                            <p>Lorem ipsum dolor sit ame it, consectetur adipisicing elit, sed do eiusmod te mp or incididunt ut labore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-7">
                        <div class="ltn__feature-icon-title">
                            <div class="ltn__feature-icon">
                                <span><img src="img/icons/icon-img/23.png" alt="#"></span>
                            </div>
                            <h3><a href="service-details.html">Pesticide Free Goods</a></h3>
                        </div>
                        <div class="ltn__feature-info">
                            <p>Lorem ipsum dolor sit ame it, consectetur adipisicing elit, sed do eiusmod te mp or incididunt ut labore.</p>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>
    <!-- FEATURE AREA END -->

  

    @endsection
