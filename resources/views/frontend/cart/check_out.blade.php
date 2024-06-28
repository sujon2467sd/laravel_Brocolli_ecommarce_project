
@extends('frontend.master')

@section('title', 'CheckOut')

@section('content')
         <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="img/bg/9.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>
                            <h1 class="section-title white-color">Checkout</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- WISHLIST AREA START -->
    <div class="ltn__checkout-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__checkout-inner">
                        <div class="ltn__checkout-single-content ltn__returning-customer-wrap">
                            <h5>Returning customer? <a class="ltn__secondary-color" href="#ltn__returning-customer-login" data-bs-toggle="collapse">Click here to login</a></h5>
                            <div id="ltn__returning-customer-login" class="collapse ltn__checkout-single-content-info">
                                <div class="ltn_coupon-code-form ltn__form-box">
                                    <p>Please login your accont.</p>
                                    <form >

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text" name="ltn__name" placeholder="Enter your name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="email" name="ltn__email" placeholder="Enter email address">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase">Login</button>
                                        <label class="input-info-save mb-0"><input type="checkbox" name="agree"> Remember me</label>
                                        <p class="mt-30"><a href="register.html">Lost your password?</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="ltn__checkout-single-content ltn__coupon-code-wrap">
                            <h5>Have a coupon? <a class="ltn__secondary-color" href="#ltn__coupon-code" data-bs-toggle="collapse">Click here to enter your code</a></h5>
                            <div id="ltn__coupon-code" class="collapse ltn__checkout-single-content-info">
                                <div class="ltn__coupon-code-form">
                                    <p>If you have a coupon code, please apply it below.</p>
                                    <form action="#" >
                                        <input type="text" name="coupon-code" placeholder="Coupon code">
                                        <button class="btn theme-btn-2 btn-effect-2 text-uppercase">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="ltn__checkout-single-content mt-50">
                            <h4 class="title-2">Billing Details</h4>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="ltn__checkout-single-content-info">
                                <form action="{{ route('place.order') }}" method="post" >
                                    @csrf
                                    <h6>Personal Information</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="name" value="{{ auth()->user()->name }}" placeholder="First name">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" value="{{ auth()->user()->email }}" name="email" placeholder="email address">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="phone" value="" placeholder="phone number">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="address" placeholder="Address">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <h6>Delivered</h6>
                                            <div class="input-item">
                                                <!-- Select Country for Shipping Cost -->
                                                <select id="shipping-select" class="nice-select" name="delever_charge">
                                                    <option value="0">Select Country</option>
                                                    <option value="60">Inside Dhaka(60 ৳)</option>
                                                    <option value="120">Outside Dhaka(120৳)</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <h6>Town / City</h6>
                                            <div class="input-item">
                                                <input type="text"  name="city" placeholder="City">
                                            </div>
                                        </div>

                                    </div>
                                    <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> Create an account?</label></p>
                                    <h6>Order Notes (optional)</h6>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ltn__checkout-payment-method mt-50">
                        <h4 class="title-2">Payment Method</h4>
                        <div id="checkout_accordion_1">
                            <!-- Bkash card -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="bkash" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                 {{-- Bkash --}}
                                 <img src="{{ asset('frontend/img/gallery/BKash-Logo.png') }}" width="100px" alt="">
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="COD">
                                <label class="form-check-label" for="exampleRadios2">
                                 COD
                                </label>
                              </div>

                          {{-- @foreach ($cartContents as $cartContent )
                                    <div>
                                        <input type="text" value="{{ $cartContent->id }}" name="product_id" placeholder="product">
                                    </div>
                          @endforeach

                          <input type="hidden" value="{{ count(Cart::content()) }}" name="">

                          @foreach ($cartContents as $cartContent)
                          <input type="text" value="{{$cartContent->qty}} " name="">
                          @endforeach --}}


                           <div>
                            <input type="hidden" value="{{ Cart::subtotal()}}" name="sub_total" >
                           </div>

                           <div>
                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                           </div>
                           <div>
                            <input type="hidden"   id="total-costs" value="{{ $total }}" name="total">
                           </div>
                            <!-- Another option card (if any) -->

                        </div>


                        <div class="ltn__payment-note mt-30 mb-30">
                            <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                        </div>
                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place order</button></a>
                    </div>
                </div>

            </form>

                    <div class="col-lg-6">
                        <div class="shoping-cart-total mt-50">
                            <h4 class="title-2">Cart Totals</h4>
                            <table class="table">
                                <tbody>
                                    @foreach ($cartContents as $cartContent)
                                    <tr>
                                        {{-- <td>{{  $cartContent->id }}</td> --}}
                                        <td>{{ $cartContent->name }} <strong>× {{ $cartContent->qty }}</strong></td>
                                        <td>&#x9F3;{{ $cartContent->price *$cartContent->qty  }}</td>
                                    </tr>
                                    @endforeach


                                    <tr>
                                        <td>Shipping and Handling</td>
                                        <td id="shipping-cost">$0.00</td>
                                    </tr>

                                    <tr>
                                        <td>Vat</td>
                                        <td>{{ $tax }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td id="total-cost">${{ number_format($total,2) }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>






            </div>
        </div>
    </div>
  <!-- WISHLIST AREA START -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#shipping-select').change(function() {
            var shippingCost = parseFloat($(this).val());
            var subtotal = parseFloat("{{ $subtotal }}");
            var tax = parseFloat("{{ $tax }}");

            // Update shipping cost display
            $('#shipping-cost').text('$' + shippingCost.toFixed(2));

            // Calculate and update total cost
            var total = subtotal + tax + shippingCost;
            $('#total-cost').text('$' + total.toFixed(2));

            // Update the input field with the total cost
            $('#total-costs').val(total.toFixed(2));
        });
    });
</script>

@endsection
