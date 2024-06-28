@extends('frontend.master')

@section('content')

    <!-- Utilize Cart Menu Start -->

    <!-- Utilize Cart Menu End -->



    <!-- SLIDER AREA START (slider-3) -->
    <div class="ltn__slider-area ltn__slider-3---  section-bg-1--- mt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!-- CATEGORY-MENU-LIST START -->
                    <div class="ltn__category-menu-wrap">
                        <div class="ltn__category-menu-title">
                            <h2 class="section-bg-1 text-color-white---">categories</h2>
                        </div>
                        <div class="ltn__category-menu-toggle ltn__one-line-active" >
                            <ul>
                                <!-- Submenu Column - unlimited -->
                                @foreach ($categories as $category)
                                 <li class="ltn__category-menu-item ltn__category-menu-drop">
                                    <a href="{{ route('caetgory.product',$category->id) }}"><img src="{{ asset('admin/cate_images/'. $category->img) }}" alt="" width="40px">{{   $category->name }} </a>
                                    <ul class="ltn__category-submenu ltn__category-column-5">
                                        <li class="ltn__category-submenu-title ltn__category-menu-drop"><a href="#">Subcategory</a>
                                            <ul class="ltn__category-submenu-children">
                                                @foreach ( $category->subCategories as $subcategory)
                                                <li><img src="{{ asset('admin/images/'.$subcategory->img) }}" alt="" width="40px"><a href="{{ route('subcategory.product',$subcategory->id) }}">{{ $subcategory->name }} </a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                  </li>
                                  @endforeach
                                <!-- Submenu --
                                <!-- Single menu end -->
                            </ul>
                        </div>
                    </div>
                    <!-- END CATEGORY-MENU-LIST -->
                </div>
                <div class="col-lg-9">
                    <div class="ltn__slide-active-2 slick-slider" >
                        <!-- ltn__slide-item -->
                        @foreach ($banners as $banner )
                        <div class="ltn__slide-item ltn__slide-item-10 section-bg-1 bg-image" data-bg="{{ asset('admin/images/'.$banner->img) }}">
                            <div class="ltn__slide-item-inner">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-7 col-sm-7 align-self-center">
                                            <div class="slide-item-info">
                                                <div class="slide-item-info-inner ltn__slide-animation">
                                                    <h5 class="slide-sub-title ltn__secondary-color animated text-uppercase">{{  $banner->tittle }}</h5>
                                                    <h1 class="slide-title animated">{{  $banner->tittle_two }}</h1>
                                                    <div class="slide-brief animated d-none">
                                                        {{-- <p>{{  $banner->tittle_two }}</p> --}}
                                                    </div>
                                                    <div class="btn-wrapper animated">
                                                        <a href="{{  $banner->link }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">Shop now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 align-self-center">
                                            <div class="slide-item-img">
                                                {{-- <a href="shop.html"><img src="{{ asset('admin/images/'.$banner->img) }}" alt="Image"></a> --}}
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
        </div>
    </div>




    <!-- SLIDER AREA END -->

    <!-- FEATURE AREA START ( Feature - 3) -->

    <div class="ltn__feature-area mt-35 mt--65---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__feature-item-box-wrap ltn__feature-item-box-wrap-2 ltn__border section-bg-6">
                        <div class="ltn__feature-item ltn__feature-item-8" data-aos="zoom-in-left">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('/')}}frontend/img/icons/svg/8-trolley.svg" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Free shipping</h4>

                                    <p>On all orders over $49.00</p>


                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8" data-aos="zoom-in-up">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('/')}}frontend/img/icons/svg/9-money.svg" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>15 days returns</h4>
                                <p>Moneyback guarantee</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8" data-aos="zoom-in-left"  data-aos="zoom-in-down">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('/')}}frontend/img/icons/svg/10-credit-card.svg" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Secure checkout</h4>
                                <p>Protected by Paypal</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8"  data-aos="zoom-in-right">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('/')}}frontend/img/icons/svg/11-gift-card.svg" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Offer & gift here</h4>
                                <p>On all orders over</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURE AREA END -->

    <!-- PRODUCT TAB AREA START (product-item-3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-115 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="section-title-area ltn__section-title-2--- text-center"  data-aos="fade-right">
                        <h1 class="section-title">Our Products</h1>
                        <p>A highly efficient slip-ring scanner for today's diagnostic requirements.</p>
                    </div>
                    <div class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center" data-aos="zoom-in">
                        <div class="nav">
                            @foreach ($categories as $key => $category)
                            <a data-bs-toggle="tab" href="#category{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-content"  data-aos="zoom-in">
                    @foreach ($categories as $key => $category)
                        <div class="tab-pane fade {{ $key == 0 ? 'active show' : '' }}" id="category{{ $key }}">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                    @forelse ($category->products as $product)
                                    <div class="col-md-3">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="{{ route('product.details',$product->id) }}"><img src="{{ asset('product_images/'.$product->image_path) }}" alt="#" style="height: 250px"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge">-{{ number_format($product->discount_price) }}%</li>
                                                    </ul>
                                                </div>
                                                @if($product->current_stock > 0)


                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Add to Cart" onclick="event.preventDefault();  document.getElementById('addCart{{ $product->id }}').submit()">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @else
                                                <h4 class="product-hover-action text-danger">stock out</h4>
                                                @endif
                                                {{-- add cart submited from here start--}}

                                                <form action="{{ route('cart',$product->id)}}" method="POST" id="addCart{{ $product->id }}">
                                                    @csrf
                                                    <input type="hidden" value="1" min="1"  name="qtybutton" class="cart-plus-minus-box">

                                              </form>
                                        {{-- add cart submited from here end--}}

                                            </div>
                                            <div class="product-info">



                                                <div class="product-ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        <li class="review-total"> <a href="#"> (24)</a></li>
                                                    </ul>
                                                </div>

                                                <h2 class="product-title"><a href="{{ route('product.details',$product->id) }}">{{ \Illuminate\Support\Str::limit($product->name, 20) }}</a></h2>

                                                <div class="product-price">
                                                    <span>&#x9F3; {{ number_format($product->price) }}</span>
                                                    <del>{{ $product->mrp_price }}</del>
                                                </div>




                                            </div>
                                        </div>
                                    </div>
                                     @empty
                                     <div class="alert alert-danger">
                                        <h5>Product not here</h5>
                                     </div>


                                    @endforelse
                                </div>
                            </div>
                        </div>
                     @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT TAB AREA END -->


    <!-- CATEGORY AREA START -->
    <div class="ltn__category-area section-bg-1 pt-110 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center" data-aos="zoom-in-down">
                        <h1 class="section-title white-color---">Top Catagories</h1>
                        <p class="white-color---">A highly efficient slip-ring scanner for today's diagnostic requirements.</p>
                    </div>
                </div>
            </div>
            <div class="row ltn__category-slider-active slick-arrow-1">
            @foreach ($categories as $category)

                <div class="col-12"  data-aos="zoom-in-down" >
                    <div class="ltn__category-item ltn__category-item-3 text-center">
                        <div class="ltn__category-item-img">
                            <a href="{{ route('caetgory.product',$category->id) }}">
                                <img src="{{ asset('admin/cate_images/'. $category->img) }}" alt="Image" width="100px">
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h5><a href="{{ route('caetgory.product',$category->id) }}">{{  $category->name }}</a></h5>
                            <h6>(235 item)</h6>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- CATEGORY AREA END -->

    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pt-115 pb-70" data-aos="fade-up-right">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h1 class="section-title">Special Offers</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__product-slider-item-four-active slick-arrow-1">
                <!-- ltn__product-item -->
                @foreach ($products as $key=> $product)
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="{{ route('product.details',$product->id) }}"><img src="{{asset('product_images/'.$product->image_path) }}" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">{{ $product->discount_price }}</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal{{$key}}">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart"  onclick="event.preventDefault();  document.getElementById('addCart{{ $product->id }}').submit()">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    {{-- <form action="{{ route('cart',$product->id) }}" id="addCart{{ $product->id }}">
                                        @csrf
                                        <input type="hidden" value="1">
                                    </form> --}}

                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>




                        </div>
                        <div class="product-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="{{ route('product.details',$product->id) }}">{{ $product->name }}</a></h2>
                            <div class="product-price">
                                <span>{{ $product->price }}</span>
                                <del>{{ $product->mrp_price }}</del>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->

     <!-- MODAL AREA START (Quick View Modal) -->

     @foreach ($products as $key=> $product)

     <div class="ltn__modal-area ltn__quick-view-modal-area">
         <div class="modal fade" id="quick_view_modal{{ $key }}" tabindex="-1">
             <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             <!-- <i class="fas fa-times"></i> -->
                         </button>
                     </div>
                     <div class="modal-body">
                          <div class="ltn__quick-view-modal-inner">
                              <div class="modal-product-item">
                                 <div class="row">
                                     <div class="col-lg-6 col-12">
                                         <div class="modal-product-img">
                                             <img src="{{ asset('product_images/'.$product->image_path) }}" alt="#">
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-12">
                                         <div class="modal-product-info">
                                             <div class="product-ratting">
                                                 <ul>
                                                     <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                     <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                     <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                     <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                     <li><a href="#"><i class="far fa-star"></i></a></li>
                                                     <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                 </ul>
                                             </div>


                                             <h3>{{  $product->name }} </h3>


                                             <div class="product-price">
                                                 <span>{{  $product->price }} </span>
                                                 <del>{{  $product->mrp_price }}  </del>
                                             </div>
                                             <div class="modal-product-meta ltn__product-details-menu-1">
                                                 <ul>
                                                     <li>
                                                         <strong>Categories:</strong>
                                                         <span>
                                                             <a href="#"> {{  $product->category->name}} </a>


                                                         </span>
                                                     </li>
                                                 </ul>
                                             </div>
                                             <div class="ltn__product-details-menu-2">
                                                 <ul>
                                                     <li>

                                                     </li>

                                                     <li>
                                                         <a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" onclick="event.preventDefault();  document.getElementById('addCart{{ $product->id }}').submit()">
                                                             <i class="fas fa-shopping-cart"></i>
                                                             <span>ADD TO CART</span>
                                                         </a>
                                                     </li>

                                                 </ul>
                                             </div>
                                             <form action="{{ route('cart',$product->id)}}" method="POST" id="addCart{{ $product->id }}">
                                                 @csrf

                                                 <div class="cart-plus-minus">
                                                     <input type="number" value="1" name="qtybutton" class="cart-plus-minus-box">
                                                 </div>

                                           </form>
                                             <div class="ltn__product-details-menu-3">
                                                 <ul>
                                                     <li>
                                                         <a href="#" class="" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                             <i class="far fa-heart"></i>
                                                             <span>Add to Wishlist</span>
                                                         </a>
                                                     </li>
                                                     <li>
                                                         <a href="#" class="" title="Compare" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                             <i class="fas fa-exchange-alt"></i>
                                                             <span>Compare</span>
                                                         </a>
                                                     </li>
                                                 </ul>
                                             </div>
                                             <hr>
                                             <div class="ltn__social-media">
                                                 <ul>
                                                     <li>Share:</li>
                                                     <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                     <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                     <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                     <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                              </div>
                          </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- MODAL AREA END -->

 @endforeach

    <!-- CALL TO ACTION START (call-to-action-2) -->
    <div class="ltn__call-to-action-area call-to-action-2 pt-20 pb-20"data-bg="{{ asset('/') }}frontend/img/1.jpg--">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-inner call-to-action-inner-2 text-center">
                        <h2>Get A Free Service Or Make A Call</h2>
                        <div class="btn-wrapper">
                            <a class="btn btn-effect-4 btn-white" href="contact.html"><i class="fas fa-phone-volume"></i> MAKE A CALL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->



    <!-- BANNER AREA START -->
    <div class="ltn__banner-area mt-120">
        <div class="container">
            <div class="row ltn__custom-gutter--- justify-content-center" >
                <div class="col-lg-6 col-md-6" data-aos="zoom-in-right">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="shop.html"><img src="{{ asset('/')}}frontend/img/banner/13.png" alt="Banner Image"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6" data-aos="zoom-in-left">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ltn__banner-item">
                                <div class="ltn__banner-img">
                                    <a href="{{ route('offer.product') }}"><img src="{{ asset('/')}}frontend/img/banner/14.png" alt="Banner Image"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="ltn__banner-item">
                                <div class="ltn__banner-img">
                                    <a href="shop.html"><img src="{{ asset('/')}}frontend/img/banner/15.png" alt="Banner Image"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER AREA END -->




    <!-- SMALL PRODUCT LIST AREA START -->
    <div class="ltn__small-product-list-area pt-115 pb-90 d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center---">
                        <h6 class="section-subtitle ltn__secondary-color">//  Products</h6>
                        <h1 class="section-title">Body Parts</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- small-product-item -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="ltn__small-product-item">
                        <div class="small-product-item-img">
                            <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/1.png" alt="Image"></a>
                        </div>
                        <div class="small-product-item-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Red Hot Tomato</a></h2>
                            <div class="product-price">
                                <span>$129.00</span>
                                <del>$140.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- small-product-item -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="ltn__small-product-item">
                        <div class="small-product-item-img">
                            <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/2.png" alt="Image"></a>
                        </div>
                        <div class="small-product-item-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Vegetables Juices</a></h2>
                            <div class="product-price">
                                <span>$145.00</span>
                                <del>$155.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- small-product-item -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="ltn__small-product-item">
                        <div class="small-product-item-img">
                            <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/3.png" alt="Image"></a>
                        </div>
                        <div class="small-product-item-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Orange Fresh Juice</a></h2>
                            <div class="product-price">

                                <span>$135.00</span>
                                <del>$145.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- small-product-item -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="ltn__small-product-item">
                        <div class="small-product-item-img">
                            <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/4.png" alt="Image"></a>
                        </div>
                        <div class="small-product-item-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Poltry Farm Meat</a></h2>
                            <div class="product-price">
                                <span>$149.00</span>
                                <del>$162.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- small-product-item -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="ltn__small-product-item">
                        <div class="small-product-item-img">
                            <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/5.png" alt="Image"></a>
                        </div>
                        <div class="small-product-item-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Coil Spring Kit</a></h2>
                            <div class="product-price">

                                <span>$140.00</span>
                                <del>$150.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- small-product-item -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="ltn__small-product-item">
                        <div class="small-product-item-img">
                            <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/6.png" alt="Image"></a>
                        </div>
                        <div class="small-product-item-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Orange Sliced Mix</a></h2>
                            <div class="product-price">

                                <span>$110.00</span>
                                <del>$120.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- small-product-item -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="ltn__small-product-item">
                        <div class="small-product-item-img">
                            <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/7.png" alt="Image"></a>
                        </div>
                        <div class="small-product-item-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Vegetables Juices</a></h2>
                            <div class="product-price">

                                <span>$130.00</span>
                                <del>$150.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- small-product-item -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="ltn__small-product-item">
                        <div class="small-product-item-img">
                            <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/8.png" alt="Image"></a>
                        </div>
                        <div class="small-product-item-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Orange Fresh Juice</a></h2>
                            <div class="product-price">

                                <span>$180.00</span>
                                <del>$190.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- small-product-item -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="ltn__small-product-item">
                        <div class="small-product-item-img">
                            <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/9.png" alt="Image"></a>
                        </div>
                        <div class="small-product-item-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Orange Sliced Mix</a></h2>
                            <div class="product-price">

                                <span>$125.00</span>
                                <del>$145.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- SMALL PRODUCT LIST AREA END -->

    <!-- SMALL PRODUCT LIST AREA START -->
    <div class="ltn__small-product-list-area pt-80 pb-85">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title-area ltn__section-title-2--- text-center---">
                                <h1 class="section-title-2 border-bottom">Latest Products</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row ltn__small-product-slider-active slick-arrow-1  slick-arrow-1-inner---">
                        <!-- small-product-item -->
                        @foreach ($latests->chunk(4) as $chunk)
                        <div class="col-lg-4 col-md-6 col-12" data-aos="fade-right">
                            @foreach ($chunk as $latest)
                            <div class="ltn__small-product-item">
                                <div class="small-product-item-img">
                                    <a href="{{ route('product.details',$product->id) }}"><img src="{{ asset('product_images/'.$latest->image_path) }}" alt="Image"></a>
                                </div>
                                <div class="small-product-item-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>

                                    <h2 class="product-title"><a href="{{ route('product.details',$product->id) }}">{{  $latest->name }}</a></h2>
                                    <div class="product-price">
                                        <span>{{  $latest->price}}</span>
                                        <del>{{  $latest->mrp_price }}</del>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>
                     @endforeach


                </div>


                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title-area ltn__section-title-2--- text-center---">
                                <h1 class="section-title-2 border-bottom">Most View Products</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row ltn__small-product-slider-active slick-arrow-1">
                        <!-- small-product-item -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="ltn__small-product-item">
                                <div class="small-product-item-img">
                                    <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/1.png" alt="Image"></a>
                                </div>
                                <div class="small-product-item-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Red Hot Tomato</a></h2>
                                    <div class="product-price">
                                        <span>$129.00</span>
                                        <del>$140.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="ltn__small-product-item">
                                <div class="small-product-item-img">
                                    <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/2.png" alt="Image"></a>
                                </div>
                                <div class="small-product-item-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Vegetables Juices</a></h2>
                                    <div class="product-price">
                                        <span>$145.00</span>
                                        <del>$155.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="ltn__small-product-item">
                                <div class="small-product-item-img">
                                    <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/3.png" alt="Image"></a>
                                </div>
                                <div class="small-product-item-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Orange Fresh Juice</a></h2>
                                    <div class="product-price">

                                        <span>$135.00</span>
                                        <del>$145.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- small-product-item -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="ltn__small-product-item">
                                <div class="small-product-item-img">
                                    <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/1.png" alt="Image"></a>
                                </div>
                                <div class="small-product-item-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Red Hot Tomato</a></h2>
                                    <div class="product-price">
                                        <span>$129.00</span>
                                        <del>$140.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="ltn__small-product-item">
                                <div class="small-product-item-img">
                                    <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/2.png" alt="Image"></a>
                                </div>
                                <div class="small-product-item-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Vegetables Juices</a></h2>
                                    <div class="product-price">
                                        <span>$145.00</span>
                                        <del>$155.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="ltn__small-product-item">
                                <div class="small-product-item-img">
                                    <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/3.png" alt="Image"></a>
                                </div>
                                <div class="small-product-item-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Orange Fresh Juice</a></h2>
                                    <div class="product-price">

                                        <span>$135.00</span>
                                        <del>$145.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- small-product-item -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="ltn__small-product-item">
                                <div class="small-product-item-img">
                                    <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/1.png" alt="Image"></a>
                                </div>
                                <div class="small-product-item-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Red Hot Tomato</a></h2>
                                    <div class="product-price">
                                        <span>$129.00</span>
                                        <del>$140.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="ltn__small-product-item">
                                <div class="small-product-item-img">
                                    <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/2.png" alt="Image"></a>
                                </div>
                                <div class="small-product-item-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Vegetables Juices</a></h2>
                                    <div class="product-price">
                                        <span>$145.00</span>
                                        <del>$155.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="ltn__small-product-item">
                                <div class="small-product-item-img">
                                    <a href="product-details.html"><img src="{{ asset('/')}}frontend/img/product/3.png" alt="Image"></a>
                                </div>
                                <div class="small-product-item-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="product-details.html">Orange Fresh Juice</a></h2>
                                    <div class="product-price">

                                        <span>$135.00</span>
                                        <del>$145.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title-area ltn__section-title-2--- text-center---">
                                <h1 class="section-title-2 border-bottom">Bestseller Products</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row ltn__small-product-slider-active slick-arrow-1">
                        <!-- small-product-item -->

                       @foreach ($best_sells->chunk(4) as $chunk)

                      <div class="col-lg-4 col-md-6 col-12" data-aos="fade-left">
                         @foreach ($chunk as  $best_sell)
                            <div class="ltn__small-product-item">
                                <div class="small-product-item-img">
                                    <a href="{{ route('product.details',$product->id) }}"><img src="{{ asset('product_images/'.$best_sell->image_path) }}" alt="Image"></a>
                                </div>
                                <div class="small-product-item-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title"><a href="{{ route('product.details',$product->id) }}">{{  $best_sell->name }}</a></h2>
                                    <div class="product-price">
                                        <span>{{  $best_sell->price }}</span>
                                        <del>{{  $best_sell->mrp_price }}</del>
                                    </div>
                                </div>
                            </div>
                             @endforeach
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SMALL PRODUCT LIST AREA END -->

    <!-- BRAND LOGO AREA START -->
    <div class="ltn__brand-logo-area ltn__brand-logo-1 section-bg-1 pt-110 pb-110 plr--9 d-none">
        <div class="container-fluid">
            <div class="row ltn__brand-logo-active">
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('/')}}frontend/img/brand-logo/1.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('/')}}frontend/img/brand-logo/2.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('/')}}frontend/img/brand-logo/3.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('/')}}frontend/img/brand-logo/4.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('/')}}frontend/img/brand-logo/5.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('/')}}frontend/img/brand-logo/3.png" alt="Brand Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BRAND LOGO AREA END -->

    <!-- COUNTDOWN AREA START -->
    <div class="ltn__call-to-action-area ltn__call-to-action-4 ltn__call-to-action-4-2 bg-overlay-black-50 bg-image pt-110 pb-120 d-none"data-bg="{{ asset('/') }}frontend/img/bg/6.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-inner call-to-action-inner-4 text-color-white text-center">
                        <h2 class="ltn__secondary-color">Hurry Up!</h2>
                        <h1 class="h1">Hot Deal! Sale Up To 20% off</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br> Explicabo id, unde hic molestias omnis.</p>
                        <div class="ltn__countdown ltn__countdown-3 bg-white--" data-countdown="2023/12/28"></div>
                        <div class="btn-wrapper animated">
                            <a href="shop.html" class="theme-btn-1 btn btn-effect-1 text-uppercase">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ltn__call-to-4-img-1">
            <img src="{{ asset('/')}}frontend/img/product/7.png" alt="#">
        </div>
        <div class="ltn__call-to-4-img-2">
            <img src="{{ asset('/')}}frontend/img/bg/11.png" alt="#">
        </div>
    </div>
    <!-- COUNTDOWN AREA END -->

    <!-- BLOG AREA START (blog-3) -->
    <div class="ltn__blog-area pt-115 pb-70 d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center---">
                        <h6 class="section-subtitle ltn__secondary-color">// blog & insights</h6>
                        <h1 class="section-title">News Feeds<span>.</span></h1>
                    </div>
                </div>
            </div>
            <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                <!-- Blog Item -->
                <div class="col-lg-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="{{ asset('/')}}frontend/img/blog/1.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Services</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">Common Engine Oil Problems and Solutions</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2020</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Item -->
                <div class="col-lg-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="{{ asset('/')}}frontend/img/blog/2.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Services</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">How and when to replace brake rotors</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>July 23, 2020</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Item -->
                <div class="col-lg-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="{{ asset('/')}}frontend/img/blog/3.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Services</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">Electric Car Maintenance, Servicing & Repairs</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>August 22, 2020</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Item -->
                <div class="col-lg-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="{{ asset('/')}}frontend/img/blog/4.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Services</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">How to Prepare for your First Track Day!</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2020</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Item -->
                <div class="col-lg-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="{{ asset('/')}}frontend/img/blog/5.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Services</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">How to: Make Your Tires Last Longer</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2020</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- BLOG AREA END -->

    <!-- BRAND LOGO AREA START -->
    <div class="ltn__brand-logo-area ltn__brand-logo-1 section-bg-6 border-top pt-35 pb-35 plr--9">
        <div class="container-fluid">
            <div class="row ltn__brand-logo-active">





                @foreach ($brands as $brand)
                <div class="col-lg-12"  data-aos="flip-up">
                    <div class="ltn__brand-logo-itemx">
                        <img src="{{ asset('admin/cate_images/'.$brand->img) }}" alt="" width="100px" height="100px">
                    </div>
                </div>
                @endforeach

                {{-- <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('/')}}frontend/img/brand-logo/2.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('/')}}frontend/img/brand-logo/3.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('/')}}frontend/img/brand-logo/4.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('/')}}frontend/img/brand-logo/5.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="{{ asset('/')}}frontend/img/brand-logo/3.png" alt="Brand Logo">
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- BRAND LOGO AREA END -->
@endsection
