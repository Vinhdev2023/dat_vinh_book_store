<header id="tg-header" class="tg-header tg-haslayout">
    <div class="tg-topbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-userlogin">
                        <figure><a  href="javascript:void(0);"><img src="/cus_plugin/images/users/vinhmoi.jpg" alt="image description"></a></figure>
                        <span>Hi, Vinh Moi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-middlecontainer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="tg-logo"><a href="#"><img src="/cus_plugin/images/book.png" alt="company name here" style="height: 150px; width: 250px"></a></strong>
                    <div class="tg-wishlistandcart">
                        <div class="dropdown  tg-wishlistdropdown">
                            <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-wishlisst">
                                <div class="tg-description"><p>Cart</p></div>
                            </div>
                        </div>
                        <div class="dropdown tg-themedropdown tg-minicartdropdown">
                            <a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="tg-themebadge">3</span>
                                <i class="icon-cart"></i>
                                <span>$123.00</span>
                            </a>
                            <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
                                <div class="tg-minicartbody">
                                    <div class="tg-minicarproduct">
                                        <figure>
                                            <img src="/cus_plugin/images/products/img-01.jpg" alt="image description">
                                        </figure>
                                        <div class="tg-minicarproductdata">
                                            <h5><a href="javascript:void(0);">Our State Fair Is A Great Function</a></h5>
                                            <h6><a href="javascript:void(0);">$ 12.15</a></h6>
                                        </div>
                                    </div>
                                    <div class="tg-minicarproduct">
                                        <figure>
                                            <img src="/cus_plugin/images/products/img-02.jpg" alt="image description">

                                        </figure>
                                        <div class="tg-minicarproductdata">
                                            <h5><a href="javascript:void(0);">Bring Me To Light</a></h5>
                                            <h6><a href="javascript:void(0);">$ 12.15</a></h6>
                                        </div>
                                    </div>
                                    <div class="tg-minicarproduct">
                                        <figure>
                                            <img src="/cus_plugin/images/products/img-03.jpg" alt="image description">

                                        </figure>
                                        <div class="tg-minicarproductdata">
                                            <h5><a href="javascript:void(0);">Have Faith In Your Soul</a></h5>
                                            <h6><a href="javascript:void(0);">$ 12.15</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="tg-minicartfoot">
                                    <a class="tg-btnemptycart" href="javascript:void(0);">
                                        <i class="fa fa-trash-o"></i>
                                        <span>Clear Your Cart</span>
                                    </a>
                                    <span class="tg-subtotal">Subtotal: <strong>35.78</strong></span>
                                    <div class="tg-btns">
                                        <a class="tg-btn tg-active" href="javascript:void(0);">View Cart</a>
                                        <a class="tg-btn" href="javascript:void(0);">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tg-searchbox">
                        <form class="tg-formtheme tg-formsearch">
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
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">All Categories</a>
                                    <div class="mega-menu">
                                        <ul class="tg-themetabnav" role="tablist">
                                            @foreach($categories as $obj)
                                                <li role="presentation" class="active">
                                                    <a href="#artandphotography" aria-controls="artandphotography" role="tab" data-toggle="tab">{{$obj->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li >
                                    <a href="/">Home</a>
                                </li>
                                <li class="">
                                    <a href="/products">Products</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
