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
                        <h1>All Products</h1>
                        <ol class="tg-breadcrumb">
                            <li><a >home</a></li>
                            <li class="tg-active">Products</li>
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
                    <div id="tg-twocolumns" class="tg-twocolumns">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
                            <div id="tg-content" class="tg-content">
                                <div class="tg-products">
                                    <div class="tg-productgrid">
                                        <a href="/orders/filter/PENDING" class="btn btn-success mb-3">PENDING</a>
                                        <a href="/orders/filter/CANCELED" class="btn btn-success mb-3">CANCELED</a>
                                        <a href="/orders/filter/CONFIRMED" class="btn btn-success mb-3">CONFIRMED</a>
                                        <a href="/orders/filter/SHIPPING" class="btn btn-success mb-3">SHIPPING</a>
                                        <a href="/orders/filter/COMPLETED" class="btn btn-success mb-3">COMPLETED</a>
                                        <a href="/orders/" class="btn btn-success mb-3">View All</a>
                                        <table class="table table-hover mt-3">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Order At</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $obj)
                                                <tr>
                                                    <td>{{$obj->cus_name}}</td>
                                                    <td>{{$obj->cus_phone}}</td>
                                                    <td>{{$obj->ship_to_address}}</td>
                                                    <td>{{$obj->total}}</td>
                                                    <td>{{$obj->status}}</td>
                                                    <td>{{$obj->created_at_format}}</td>
                                                    <td>
                                                        <a class="tg-btn tg-btnstyletwo" href="/order/detail/{{$obj->id}} ">
                                                            Detail
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
