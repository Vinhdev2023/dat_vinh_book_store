<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book Library</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('IconWeb')
    <link rel="stylesheet" href="/cus_plugin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/cus_plugin/css/normalize.css">
    <link rel="stylesheet" href="/cus_plugin/css/font-awesome.min.css">
    <link rel="stylesheet" href="/cus_plugin/css/icomoon.css">
    <link rel="stylesheet" href="/cus_plugin/css/jquery-ui.css">
    <link rel="stylesheet" href="/cus_plugin/css/owl.carousel.css">
    <link rel="stylesheet" href="/cus_plugin/css/transitions.css">
    <link rel="stylesheet" href="/cus_plugin/css/main.css">
    <link rel="stylesheet" href="/cus_plugin/css/color.css">
    <link rel="stylesheet" href="/cus_plugin/css/responsive.css">
    <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>

<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
    <!--************************************
            Header Start
    *************************************-->
    @include('CustomerPages.header')
    <!--************************************
            Header End
    *************************************-->
    <!--************************************
            Inner Banner Start
    *************************************-->
    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="/cus_plugin/images/parallax/bgparallax-07.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-innerbannercontent">
                        <h1>All Products In Order</h1>
                        <ol class="tg-breadcrumb">
                            <li><a >home</a></li>
                            <li class="tg-active">All Products In Order</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--************************************
            Inner Banner End
    *************************************-->
    <!--************************************
            Main Start
    *************************************-->
    <main id="tg-main" class="tg-main tg-haslayout">
        <!--************************************
                News Grid Start
        *************************************-->
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            <h2><span>Name:</span>{{$order->cus_name}}</h2>
                        </div>
                        <div class="tg-sectionhead">
                            <h2><span>Phone:</span>{{$order->cus_phone}}</h2>
                        </div>
                        <div class="tg-sectionhead">
                            <h2><span>Address:</span>{{$order->ship_to_address}}</h2>
                        </div>
                        <div class="tg-sectionhead">
                            <h2><span>Total:</span>{{number_format($order->total)}}</h2>
                        </div>
                    </div>
                    <div id="tg-twocolumns" class="tg-twocolumns">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
                            <div id="tg-content" class="tg-content">
                                <div class="tg-products">
                                    <div class="tg-productgrid">
                                        @foreach($order_detail as $obj)
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                                <div class="tg-postbook">
                                                    <figure class="tg-featureimg">
                                                        <div class="tg-bookimg">
                                                            <div class="tg-frontcover"><img src="/images/{{$obj->book_image}}" alt="image description"></div>
                                                            <div class="tg-backcover"><img src="/images/{{$obj->book_image}}" alt="image description"></div>
                                                        </div>
                                                    </figure>
                                                    <div class="tg-postbookcontent">
                                                        <ul class="tg-bookscategories">
{{--                                                            <li><a href="javascript:void(0);">{{$obj->category_name}}</a></li>--}}
                                                        </ul>
                                                        <div class="tg-booktitle">
                                                            <h3><a href="javascript:void(0);">{{$obj->book_title}}</a></h3>
                                                        </div>
{{--                                                        <span class="tg-bookwriter">Publisher: <a href="">{{$obj->publisher_name}}</a></span>--}}
                                                        <span class="tg-bookprice">
                                                        <ins>{{$obj->book_price}}VND</ins>
                                                    </span>
                                                        <a class="tg-btn tg-btnstyletwo" href="/product/detail/{{$obj->book_id}}">
                                                            <i class="fa fa-shopping-basket"></i>
                                                            <em>Book detail</em>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
                News Grid End
        *************************************-->
    </main>
    <!--************************************
            Main End
    *************************************-->
    <!--************************************
            Footer Start
    *************************************-->
    @include('CustomerPages.footer')
    <!--************************************
            Footer End
    *************************************-->
</div>
<!--************************************
        Wrapper End
*************************************-->
<script src="/cus_plugin/js/vendor/jquery-library.js"></script>
<script src="/cus_plugin/js/vendor/bootstrap.min.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
<script src="/cus_plugin/js/owl.carousel.min.js"></script>
<script src="/cus_plugin/js/jquery.vide.min.js"></script>
<script src="/cus_plugin/js/countdown.js"></script>
<script src="/cus_plugin/js/jquery-ui.js"></script>
<script src="/cus_plugin/js/parallax.js"></script>
<script src="/cus_plugin/js/countTo.js"></script>
<script src="/cus_plugin/js/appear.js"></script>
<script src="/cus_plugin/js/gmap3.js"></script>
<script src="/cus_plugin/js/main.js"></script>
</body>

</html>
