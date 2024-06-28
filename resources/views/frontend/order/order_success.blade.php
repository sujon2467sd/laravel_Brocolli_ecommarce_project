@extends('frontend.master')
@section('title', 'PlaceOrder')
@section('content')



<div class="container mt-4 mb-4 p-4">
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <div class="card text-center">
                <div class="card-header">
                <h4 class="text-danger">Congratulation Mr/Ms.
                      @auth
                    <h6> {{ auth()->user()->name }}!</h6>
                      @else
                     <h6></h6>
                  @endauth</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title text-success">Your Order Done Successfully </h1>
                  <img src="{{ asset('frontend/img/gallery/success.jpg') }}" width="150px" alt="">
                  <p class="card-text">You will get the product just time insallah </p>
                  <a href="#" class="btn btn-warning">Shop More</a>
                </div>
                <div class="card-footer text-muted">
                 today
                </div>
              </div>
        </div>
    </div>
</div>


@endsection
