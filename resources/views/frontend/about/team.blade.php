@extends('frontend.master')

@section('title', 'Team')

@section('content')


 <!-- BREADCRUMB AREA START -->
 <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="img/bg/5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>
                        <h1 class="section-title white-color"> Team</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Team Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->


    <!-- TEAM AREA START (Team - 3) -->
    <div class="ltn__team-area pt-15 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title white-color---">Team Member</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($teams as $team)


                <div class="col-xl-3 col-lg-4 col-sm-6"   data-aos="flip-up">
                    <div class="ltn__team-item">
                        <div class="team-img">
                            <img src="{{ asset('admin/cate_images/'.$team->img) }}" alt="Image">
                        </div>
                        <div class="team-info">
                            <h6 class="ltn__secondary-color">//  {{  $team->disignation }}  //</h6>
                            <h4><a href="team-details.html">{{  $team->name }}</a></h4>
                            <p> {{  $team->description }}</a</p>
                            <div class="ltn__social-media">
                                <ul>
                                    <li><a href="{{  $team->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $team->linkdn }}"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="ltn__team-item">
                        <div class="team-img">
                            <img src="img/team/2.jpg" alt="Image">
                        </div>
                        <div class="team-info">
                            <h6 class="ltn__secondary-color">//  founder  //</h6>
                            <h4><a href="team-details.html">Rosalina D. William</a></h4>
                            <div class="ltn__social-media">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="ltn__team-item">
                        <div class="team-img">
                            <img src="img/team/3.jpg" alt="Image">
                        </div>
                        <div class="team-info">
                            <h6 class="ltn__secondary-color">//  founder  //</h6>
                            <h4><a href="team-details.html">Rosalina D. William</a></h4>
                            <div class="ltn__social-media">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="ltn__team-item">
                        <div class="team-img">
                            <img src="img/team/4.jpg" alt="Image">
                        </div>
                        <div class="team-info">
                            <h6 class="ltn__secondary-color">//  founder  //</h6>
                            <h4><a href="team-details.html">Rosalina D. William</a></h4>
                            <div class="ltn__social-media">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- TEAM AREA END -->

    @endsection
