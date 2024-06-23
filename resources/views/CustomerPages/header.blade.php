<header id="tg-header" class="tg-header tg-haslayout">
{{--    @if(auth()->check() == true)--}}
    <div class="tg-topbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-userlogin">
                        <figure><a  href="{{auth()->guard('customers')->check() ? '/sign-out' : '/sign-in'}}"><img src="/cus_plugin/images/users/vinhmoi.jpg" alt="image description"></a></figure>
                        <span><a  href="{{auth()->guard('customers')->check() ? '/sign-out' : '/sign-in'}}">Hi, {{auth()->guard('customers')->check() ? auth()->guard('customers')->user()->name : 'customer let to sign in'}}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    @endif--}}
    <div class="tg-middlecontainer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="tg-logo"><a ><img src="/cus_plugin/images/book.png" alt="company name here" style="height: 150px; width: 250px"></a></strong>
                    <div class="tg-wishlistandcart">
                        <div class="dropdown  tg-wishlistdropdown">
                            <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-wishlisst">
                                <div class="tg-description"><p>Cart</p></div>
                            </div>
                        </div>
                        <div class="dropdown tg-themedropdown tg-minicartdropdown">
                            <a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="tg-themebadge">{{session()->has('cart') == null ? 0 : count(session()->get('cart'))}}</span>
                                <i class="icon-cart"></i>
                                <span>{{session()->has('cart_total') != null ? number_format(session()->get('cart_total')) : 0}} VND</span>
                            </a>
                            @if (session()->has('cart'))
                                <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
                                    <div class="tg-minicartbody">
                                        @foreach (session()->get('cart') as $obj)
                                            <div class="tg-minicarproduct">
                                                <figure>
                                                    <img src="/images/{{$obj->image}}" alt="image description" width="60px">
                                                </figure>
                                                <div class="tg-minicarproductdata">
                                                    <h5>{{$obj->title}}</h5>
                                                    <h5>Quantity: {{number_format($obj->quantity)}}</h5>
                                                    <h6>{{number_format($obj->price)}} VND</h6>
                                                    <h6><a class="btn btn-primary" href="/cart/product/detail/{{$obj->id}} ">
                                                            Update quantity
                                                        </a></h6>
                                                    <h6><a href="/cart/product/delete/{{$obj->id}}" class="btn btn-danger">DELETE</a></h6>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="tg-minicartfoot">
                                        <a class="tg-btnemptycart" href="/clear/cart">
                                            <i class="fa fa-trash-o"></i>
                                            <span>Clear Your Cart</span>
                                        </a>
                                        <span class="tg-subtotal">Subtotal: <strong>{{session()->has('cart_total') != null ? number_format(session()->get('cart_total')) : 0}} VND</strong></span>
                                        <div class="tg-btns">
                                            <a class="tg-btn" href="/checkout">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tg-searchbox">
                        <form class="tg-formtheme tg-formsearch" action="/products/search" method="post">
                            @csrf
                            <fieldset>
                                <input type="text" name="search" class="typeahead form-control" placeholder="Search book by keyword">
                                <button type="submit"><i class="icon-magnifier"></i></button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-navigationarea">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <nav id="tg-nav" class="tg-nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                            <ul>
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li class="">
                                    <a href="/products">Products</a>
                                </li>
                                @if(auth()->guard('customers')->check())
                                    <li class="">
                                        <a href="/orders">Orders</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
