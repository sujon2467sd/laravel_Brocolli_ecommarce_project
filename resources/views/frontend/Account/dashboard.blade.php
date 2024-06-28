@extends('frontend.master')

@section('title', 'MyAccount')

@section('content')

<!-- BREADCRUMB AREA START -->
{{-- <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="img/bg/9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>

                               <h2>Well come</h2>

                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html">Home</a></li>

                               <li>My Account </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- BREADCRUMB AREA END -->

<!-- WISHLIST AREA START -->
<div class="liton__wishlist-area pb-70 pt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- PRODUCT TAB AREA START -->
                <div class="ltn__product-tab-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="ltn__tab-menu-list mb-50">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_tab_1_1">Dashboard<i class="fas fa-home"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_tab_1_2">Orders<i class="fas fa-file-alt"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_tab_1_3">Downloads <i class="fas fa-arrow-down"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_tab_1_4">address <i class="fas fa-map-marker-alt"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_tab_1_5">Account Details <i class="fas fa-user"></i></a>
                                        <a href="login.html">Logout <i class="fas fa-sign-out-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="liton_tab_1_1">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <p>

                                                        Hello

                                                        <div class="row justify-content-center">
                                                            <div class="col-6">
                                                                  <img src="{{ asset('admin/cate_images/'.$prf_infos->img) }}" alt="" width="200px" height="200px" class="carcel rounded-circle">

                                                                  @auth
                                                                  <h2 class="mt-4"> {{ auth()->user()->name }}!</h2>
                                                                  @else
                                                                      <h6></h6>
                                                                  @endauth

                                                                <p> Bio:  {{ $prf_infos->bio }}</p>
                                                                     <h5> Your Address:: {{ $prf_infos->address }}</h5>
                                                            </div>




                                                        </div>




                                                        </p>

                                            <p>From your account dashboard you can view your <span>recent orders</span>, manage your <span>shipping and billing addresses</span>, and <span>edit your password and account details</span>.</p>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="liton_tab_1_2">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody class="text-4">
                                                        @php
                                                        $x=1;
                                                        // dd($orders);
                                                    @endphp


                                                        @if($orders->isEmpty())
                                                            <h1>No orders yet</h1>
                                                        @else
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Invoice</th>
                                                                        <th>Total</th>
                                                                        <th>Payment By</th>
                                                                        <th>Date</th>
                                                                        <th>Status</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($orders as $order)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $order->invoice_number }}</td>
                                                                            <td>{{ $order->total }}</td>
                                                                            <td>{{ $order->payment_type }}</td>
                                                                            <td>{{ $order->created_at }}</td>

                                                                            <td>
                                                                                <button class="bg-success rounded">{{ $order->status }}</button>

                                                                            </td>
                                                                            <td>
                                                                                <a href="{{ route('order.view', $order->id) }}"><button class="bg-warning rounded">
                                                                                   view
                                                                                </button></a>

                                                                                <a href="{{ route('order.cancel', $order->id) }}"><button class="bg-danger rounded" onclick="return  confirm('Are you sure?')">
                                                                                   Cancel
                                                                                </button></a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        @endif





                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_3">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Date</th>
                                                            <th>Expire</th>
                                                            <th>Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Carsafe - Car Service PSD Template</td>
                                                            <td>Nov 22, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Carsafe - Car Service HTML Template</td>
                                                            <td>Nov 10, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Carsafe - Car Service WordPress Theme</td>
                                                            <td>Nov 12, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_4">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <p>The following addresses will be used on the checkout page by default.</p>
                                            <div class="row">
                                                <div class="col-md-6 col-12 learts-mb-30">
                                                    <h4>Billing Address <small><a href="#">edit</a></small></h4>
                                                    <address>
                                                        <p><strong>Alex Tuntuni</strong></p>
                                                        <p>1355 Market St, Suite 900 <br>
                                                            San Francisco, CA 94103</p>
                                                        <p>Mobile: (123) 456-7890</p>
                                                    </address>
                                                </div>
                                                <div class="col-md-6 col-12 learts-mb-30">
                                                    <h4>Shipping Address <small><a href="#">edit</a></small></h4>
                                                    <address>
                                                        <p><strong>Alex Tuntuni</strong></p>


                                                        <p><br>


                                                            San Francisco, CA 94103</p>
                                                        <p>Mobile: (123) 456-7890</p>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_5">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <p><b><h3>Change Your Profile Info</h3></b></p>

                                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                            <div class="ltn__form-box">
                                                <form action="{{ route('account.details') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="row mb-50">
                                                        <div class="col-md-6">
                                                            <label><b>Choice Your Profile Picture:</b></label>
                                                            <input type="file" name="img"  class="form-control" accept="image/*"
                                                            onchange="loadFile(event)"><br>
                                                           <img  src="{{ asset('admin/cate_images/'.$prf_infos->img) }}"   id="output" style="height: 100px" />
                                                        </div>

                                                        {{-- <div class="col-md-6">
                                                            <label>First name:</label>
                                                            <input type="text" name="name">
                                                        </div> --}}

                                                        <div class="col-md-6">
                                                            <label>Bio Data:</label>
                                                            <input type="text" name="description" value="{{ $prf_infos->bio }}"  placeholder="Bio.......">
                                                        </div>
                                                        {{-- <div class="col-md-6">
                                                            <label>Display Email:</label>
                                                            <input type="email" name="email" placeholder="example@example.com">
                                                        </div> --}}
                                                        <div class="col-md-6">
                                                            <label>Addreess</label>
                                                            <input type="text"  value="{{ $prf_infos->address }}" name="address" placeholder="dhaka,">
                                                        </div>
                                                    </div>
                                                    {{-- <fieldset>
                                                        <legend>Password change</legend>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>Current password (leave blank to leave unchanged):</label>
                                                                <div class="position-relative mb-3">
                                                                    <input type="password" name="current_password" id="currentPassword" class="form-control">
                                                                    <i class="fas fa-eye position-absolute password-icon" id="toggleCurrentPassword" onclick="togglePasswordVisibility('currentPassword', 'toggleCurrentPassword')"></i>
                                                                </div>
                                                                <label>New password (leave blank to leave unchanged):</label>
                                                                <div class="position-relative mb-3">
                                                                    <input type="password" name="new_password" id="newPassword" class="form-control">
                                                                    <i class="fas fa-eye position-absolute password-icon" id="toggleNewPassword" onclick="togglePasswordVisibility('newPassword', 'toggleNewPassword')"></i>
                                                                </div>
                                                                <label>Confirm new password:</label>
                                                                <div class="position-relative mb-3">
                                                                    <input type="password" name="new_password_confirmation" id="confirmNewPassword" class="form-control">
                                                                    <i class="fas fa-eye position-absolute password-icon" id="toggleConfirmNewPassword" onclick="togglePasswordVisibility('confirmNewPassword', 'toggleConfirmNewPassword')"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <script>
                                                            function togglePasswordVisibility(inputId, iconId) {
                                                                var inputField = document.getElementById(inputId);
                                                                var icon = document.getElementById(iconId);
                                                                if (inputField.type === "password") {
                                                                    inputField.type = "text";
                                                                    icon.classList.remove("fa-eye");
                                                                    icon.classList.add("fa-eye-slash");
                                                                } else {
                                                                    inputField.type = "password";
                                                                    icon.classList.remove("fa-eye-slash");
                                                                    icon.classList.add("fa-eye");
                                                                }
                                                            }
                                                        </script>

                                                        <style>
                                                            .position-relative {
                                                                position: relative;
                                                            }
                                                            .password-icon {
                                                                right: 10px;
                                                                top: 50%;
                                                                transform: translateY(-50%);
                                                                cursor: pointer;
                                                                z-index: 2;
                                                            }
                                                            .form-control {
                                                                padding-right: 2.5rem; /* Adjust to ensure the icon doesn't overlap text */
                                                            }
                                                        </style>



                                                    </fieldset> --}}
                                                    <div class="btn-wrapper">
                                                        <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT TAB AREA END -->
            </div>
        </div>
    </div>
</div>
<!-- WISHLIST AREA START -->

<!-- FEATURE AREA START ( Feature - 3) -->
<div class="ltn__feature-area before-bg-bottom-2 mb--30--- plr--5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__feature-item-box-wrap ltn__border-between-column white-bg">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-8">
                                <div class="ltn__feature-icon">
                                    <img src="{{ asset('/') }}frontend/img/icons/icon-img/11.png" alt="#">
                                </div>
                                <div class="ltn__feature-info">
                                    <h4>Curated Products</h4>
                                    <p>Provide Curated Products for
                                        all product over $100</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-8">
                                <div class="ltn__feature-icon">
                                    <img src="{{ asset('/') }}frontend/img/icons/icon-img/12.png" alt="#">
                                </div>
                                <div class="ltn__feature-info">
                                    <h4>Handmade</h4>
                                    <p>We ensure the product quality
                                        that is our main goal</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-8">
                                <div class="ltn__feature-icon">
                                    <img src="{{ asset('/') }}frontend/img/icons/icon-img/13.png" alt="#">
                                </div>
                                <div class="ltn__feature-info">
                                    <h4>Natural Food</h4>
                                    <p>Return product within 3 days
                                        for any product you buy</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-8">
                                <div class="ltn__feature-icon">
                                    <img src="{{ asset('/') }}frontend/img/icons/icon-img/14.png" alt="#">
                                </div>
                                <div class="ltn__feature-info">
                                    <h4>Free home delivery</h4>
                                    <p>We ensure the product quality
                                        that you can trust easily</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FEATURE AREA END -->


<script>
    var loadFile = function (event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>


@endsection
