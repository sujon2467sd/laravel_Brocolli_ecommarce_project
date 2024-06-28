@extends('frontend.master')
@section('title', 'search')

@section('content')


 <!-- BREADCRUMB AREA START -->
 {{-- <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image plr--9---" data-bg="{{ asset('/') }}frontend/img/bg/9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>
                        <h1 class="section-title white-color">Shop by Happay</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Shop Left Sidebar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- BREADCRUMB AREA END -->

    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-2 mb-120">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                               <div class="short-by text-center">
                                    <select class="nice-select">
                                        <option>Default sorting</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by new arrivals</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                               <div class="showing-product-number text-right text-end">
                                    <span>Showing 9 of 20 results</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    @if(isset($products) && count($products) > 0)
                                    <h2>Search Results:</h2>
                                          <h5>{{ $search }}</h5>

                                    <!-- ltn__product-item -->
                                    @foreach($products as  $key=> $product)
                                    <div class="col-xl-4 col-sm-6 col-6">
                                        <div class="ltn__product-item ltn__product-item-3 text-center"  data-aos="zoom-in">
                                            <div class="product-img">
                                                <a href="{{ route('product.details',$product->id) }}"><img src="{{ asset('product_images/'.$product->image_path) }}"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge">New</li>
                                                    </ul>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal{{ $key }}">
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
                                                <form action="{{ route('cart',$product->id) }}" id="addCart{{ $product->id}}"  method="POST">
                                                    @csrf
                                                    <input type="hidden" value="1" min="1"  name="qtybutton" class="cart-plus-minus-box">
                                                </form>
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
                                                <h2 class="product-title"><a href="{{ route('product.details',$product->id) }}">{{$product->name  }}</a></h2>
                                                <div class="product-price">
                                                    <span>{{ $product->price }}</span>
                                                    <del>{{$product->mrp_price }}</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    @else
                          <p>No products found.</p>
                    @endif





                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    <!-- ltn__product-item -->
                                    @foreach($products as $key=> $product)
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3">
                                            <div class="product-img">
                                                <a href="{{ route('product.details',$product->id) }}"><img src="{{ asset('product_images/'.$product->image_path) }}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge">New</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ route('product.details',$product->id) }}">{{ $product->name }}</a></h2>
                                                <div class="product-ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-price">
                                                    <span>{{ $product->discounted_price }}</span>
                                                    <del>{{$product->mrp_price }}</del>
                                                </div>
                                                <div class="product-brief">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae asperiores sit odit nesciunt,  aliquid, deleniti non et ut dolorem!</p>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal{{$key}}">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal{{$key}}" onclick="event.preventDefault();  document.getElementById('addCart{{ $product->id }}').submit()" >
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>


        <!--  Quick  MODAL AREA START (Quick View Modal) -->
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



        <!-- MODAL AREA START (Add To Cart Modal) -->

      @foreach ($products as $key=> $product)
      <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="add_to_cart_modal{{ $key }}" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="{{ asset('product_images/'.$product->image_path) }}" alt="#">
                                        </div>
                                         <div class="modal-product-info">
                                            <h5><a href="product-details.html">{{ $product->name }}</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i>  Successfully added to your Cart</p>
                                            <div class="btn-wrapper">
                                                <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                                                <a href="checkout.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                            </div>
                                         </div>
                                         <!-- additional-info -->
                                         <div class="additional-info d-none">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="{{ asset('/')}}frontend/img/icons/payment.png" alt="#">
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
      @endforeach
     <!-- MODAL AREA END -->





                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">

                            {{-- {{ $products->links() }} --}}

                            <ul>
                                <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                <li><a href="#"> 1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">10</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  mb-120">
                    <aside class="sidebar ltn__shop-sidebar">
                        <!-- Category Widget -->
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Product categories</h4>
                            <ul>
                                  @foreach ($categories as $category)
                                  <li><a href="{{route('caetgory.product',$category->id) }}">{{  $category->name }} <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                  @endforeach


                            </ul>
                        </div>
                        <!-- Price Filter Widget -->
                        <div class="widget ltn__price-filter-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Filter by price</h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <input type="submit"  value="Your range:"/>
                                    <input type="text" class="amount" name="price"  placeholder="Add Your Price" />
                                </div>
                                <div class="slider-range"></div>
                            </div>
                        </div>
                        <!-- Top Rated Product Widget -->
                        <div class="widget ltn__top-rated-product-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Top Rated Product</h4>
                            <ul>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.html"><img src="{{ asset('/') }}frontend/img/product/1.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.html">Mixel Solid Seat Cover</a></h6>
                                            <div class="product-price">
                                                <span>$49.00</span>
                                                <del>$65.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.html"><img src="{{ asset('/') }}frontend/img/product/2.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.html">Vegetables Juices</a></h6>
                                            <div class="product-price">
                                                <span>$49.00</span>
                                                <del>$65.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.html"><img src="{{ asset('/') }}frontend/img/product/3.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.html">Coil Spring Conversion</a></h6>
                                            <div class="product-price">
                                                <span>$49.00</span>
                                                <del>$65.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Search Widget -->
                        <div class="widget ltn__search-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Search Objects</h4>
                            <form action="#">
                                <input type="text" name="search" placeholder="Search your keyword...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Tagcloud Widget -->
                        <div class="widget ltn__tagcloud-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Popular Tags</h4>
                            <ul>
                                <li><a href="#">Popular</a></li>
                                <li><a href="#">desgin</a></li>
                                <li><a href="#">ux</a></li>
                                <li><a href="#">usability</a></li>
                                <li><a href="#">develop</a></li>
                                <li><a href="#">icon</a></li>
                                <li><a href="#">Car</a></li>
                                <li><a href="#">Service</a></li>
                                <li><a href="#">Repairs</a></li>
                                <li><a href="#">Auto Parts</a></li>
                                <li><a href="#">Oil</a></li>
                                <li><a href="#">Dealer</a></li>
                                <li><a href="#">Oil Change</a></li>
                                <li><a href="#">Body Color</a></li>
                            </ul>
                        </div>
                        <!-- Size Widget -->
                        <div class="widget ltn__tagcloud-widget ltn__size-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Product Size</h4>
                            <ul>
                                <li><a href="#">S</a></li>
                                <li><a href="#">M</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">XL</a></li>
                                <li><a href="#">XXL</a></li>
                            </ul>
                        </div>
                        <!-- Color Widget -->
                        <div class="widget ltn__color-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Product Color</h4>
                            <ul>
                                <li class="black"><a href="#"></a></li>
                                <li class="white"><a href="#"></a></li>
                                <li class="red"><a href="#"></a></li>
                                <li class="silver"><a href="#"></a></li>
                                <li class="gray"><a href="#"></a></li>
                                <li class="maroon"><a href="#"></a></li>
                                <li class="yellow"><a href="#"></a></li>
                                <li class="olive"><a href="#"></a></li>
                                <li class="lime"><a href="#"></a></li>
                                <li class="green"><a href="#"></a></li>
                                <li class="aqua"><a href="#"></a></li>
                                <li class="teal"><a href="#"></a></li>
                                <li class="blue"><a href="#"></a></li>
                                <li class="navy"><a href="#"></a></li>
                                <li class="fuchsia"><a href="#"></a></li>
                                <li class="purple"><a href="#"></a></li>
                                <li class="pink"><a href="#"></a></li>
                                <li class="nude"><a href="#"></a></li>
                                <li class="orange"><a href="#"></a></li>

                                <li><a href="#" class="orange"></a></li>
                                <li><a href="#" class="orange"></a></li>
                            </ul>
                        </div>
                        <!-- Banner Widget -->
                        <div class="widget ltn__banner-widget">
                            <a href="shop.html"><img src="{{ asset('/') }}frontend/img/banner/banner-1.jpg" alt="#"></a>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

@endsection
