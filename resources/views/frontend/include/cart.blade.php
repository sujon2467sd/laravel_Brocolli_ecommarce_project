<div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <span class="ltn__utilize-menu-title">Cart</span>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="mini-cart-product-area ltn__scrollbar">

            @foreach (Cart::content() as $cartItem)
            <div class="mini-cart-item clearfix">
                <div class="mini-cart-img">
                    <a href="#"><img src="{{ asset('product_images/'.$cartItem->options->image)}}" alt="Image"></a>
                   <a href="" onclick="event.preventDefault();  document.getElementById('removeCart{{ $cartItem->rowId }}').submit()"> <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span></a>

                   {{-- cart remove submit from here --}}
                   <form  action="{{ route('cart.remove', $cartItem->rowId)}}" method="POST" id="removeCart{{ $cartItem->rowId }}">
                      @csrf
                  </form>

                </div>
                <div class="mini-cart-info">
                    <h6><a href="{{ route('product.details', $cartItem->id) }}">{{  $cartItem->name}}</a></h6>
                    <span class="mini-cart-quantity">{{  $cartItem->qty }}X</span>
                    <span class="mini-cart-quantity">{{  $cartItem->price }}</span>
                </div>
            </div>
            @endforeach
            {{-- <div class="mini-cart-item clearfix">
                <div class="mini-cart-img">
                    <a href="#"><img src="{{ asset('/')}}frontend/img/product/2.png" alt="Image"></a>
                    <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                </div>
                <div class="mini-cart-info">
                    <h6><a href="#">Vegetables Juices</a></h6>
                    <span class="mini-cart-quantity">1 x $85.00</span>
                </div>
            </div>
            <div class="mini-cart-item clearfix">
                <div class="mini-cart-img">
                    <a href="#"><img src="{{ asset('/')}}frontend/img/product/3.png" alt="Image"></a>
                    <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                </div>
                <div class="mini-cart-info">
                    <h6><a href="#">Orange Sliced Mix</a></h6>
                    <span class="mini-cart-quantity">1 x $92.00</span>
                </div>
            </div>
            <div class="mini-cart-item clearfix">
                <div class="mini-cart-img">
                    <a href="#"><img src="{{ asset('/')}}frontend/img/product/4.png" alt="Image"></a>
                    <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                </div>
                <div class="mini-cart-info">
                    <h6><a href="#">Orange Fresh Juice</a></h6>
                    <span class="mini-cart-quantity">1 x $68.00</span>
                </div>
            </div> --}}
        </div>
        <div class="mini-cart-footer">
            <div class="mini-cart-sub-total">
                <h5>Subtotal:{{ Cart::subtotal()}}</span></h5>
            </div>
            <div class="btn-wrapper">
                <a href="{{ route('cart.show') }}" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                <a href="{{ route('check.out') }}" class="theme-btn-2 btn btn-effect-2">Checkout</a>
            </div>
            <p>Free Shipping on All Orders Over $100!</p>
        </div>

    </div>
</div>
