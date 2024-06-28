
@extends('frontend.master')

@section('title', 'CartView')

@section('content')


 <!-- BREADCRUMB AREA START -->
 <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="img/bg/9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>
                        <h1 class="section-title white-color">Cart</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->


  <!-- SHOPING CART AREA START -->
  <div class="liton__shoping-cart-area mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping-cart-inner">
                    <div class="shoping-cart-table table-responsive">
                        <table class="table">

                            <tbody>
                                <tr class="bg-success text-white">
                                  
                                    <td class="fs-5 fw-bold">Image</td>
                                    <td class="fs-5 fw-bold ">Name</td>
                                    <td class="fs-5 fw-bold">Price</td>
                                    <td class="fs-5 fw-bold">Qty</td>
                                    <td class="fs-5 fw-bold">Status</td>
                                    <td class="fs-5 fw-bold">total</td>
                                </tr>
                                @foreach ($cartContents as $cartContent )
                                <tr>
                                    <td class="cart-product-remove">

                                        <div class="mini-cart-img">
                                                <a href="#"><img src="{{ asset('product_images/'. $cartContent->options->image)}}" alt="Image"></a>
                                            <a href="" onclick="event.preventDefault();  document.getElementById('removeCart{{  $cartContent->rowId }}').submit()"> <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span></a>

                                            {{-- cart remove submit from here --}}
                                            <form  action="{{ route('cart.remove', $cartContent->rowId)}}" method="POST" id="removeCart{{  $cartContent->rowId}}">
                                                @csrf
                                            </form>

                                            </div>

                                    </td>

                                    {{-- <td class="cart-product-image">
                                        <a href="product-details.html"><img src="{{ asset('product_images/'. $cartContent->options->image) }}" alt="#"></a>
                                    </td> --}}
                                    <td class="cart-product-info">
                                        <h6><a href="{{ route('product.details', $cartContent->id) }}">{{  $cartContent->name }}</a></h6>
                                    </td>
                                    <td class="cart-product-price">{{  $cartContent->price }}&#x9F3;</td>
                                    <td class="cart-product-quantity">
                                 <form action="{{ route('cart.update', $cartContent->rowId) }}" method="POST">
                                    @csrf
                                        <div class="cart-plus-minus">
                                            <input type="number" value="{{  $cartContent->qty }}" name="qtybutton" class="cart-plus-minus-box">
                                        </div>
                                    </td>

                                    <td>
                                        <button class="button-update">Update</button>
                                    </td>
                                </form>
                                    <td class="cart-product-subtotal">&#x9F3;{{ $cartContent->price * $cartContent->qty }}</td>
                                </tr>
                                @endforeach
                                <style>
                                  .button-update {
                                                    border-radius: 9%;
                                                    background-color: #4CAF50;
                                                    color: white;
                                                    border: none;
                                                    padding: 1px 13px;
                                                    cursor: pointer;
                                                }

                                            .button-update:hover {
                                                background-color: #dac50f; /* Optional: Add a hover effect */
                                                 }
                                </style>


                            </tbody>
                        </table>
                    </div>
                    <div class="shoping-cart-total mt-50">
                        <h4>Cart Totals</h4>
                        <table class="table">
                            <tbody>
                                <tr class="bg-warning">
                                    <td><b>Cart Subtotal</b></td>
                                    <td><b> &#x9F3;{{ $subtotal }}</b></td>
                                </tr>

                                <tr>
                                    {{-- <td>Shipping and Handing</td>
                                    <td>120</td> --}}
                                </tr>
                                <tr>
                                    <td>Vat</td>
                                    <td>{{ $tax }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Order Total</strong></td>
                                    <td><strong>{{ Cart::total()}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="btn-wrapper text-right text-end">
                            <a href="{{ route('check.out') }}" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SHOPING CART AREA END -->

@endsection

