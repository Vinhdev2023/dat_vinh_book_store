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
    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="cus_plugin/images/parallax/bgparallax-07.jpg">
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
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                            <div id="tg-content" class="tg-content">
                                <div class="tg-products">
                                    <div class="tg-productgrid">
                                        @foreach($books as $obj)
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                                <div class="tg-postbook">
                                                    <figure class="tg-featureimg">
                                                        <div class="tg-bookimg">
                                                            <div class="tg-frontcover"><img src="/images/{{$obj->image}}" alt="image description"></div>
                                                            <div class="tg-backcover"><img src="/images/{{$obj->image}}" alt="image description"></div>
                                                        </div>
                                                    </figure>
                                                    <div class="tg-postbookcontent">
                                                        <ul class="tg-bookscategories">
                                                            <li><a href="javascript:void(0);">{{$obj->category_name}}</a></li>
                                                        </ul>
                                                        <div class="tg-booktitle">
                                                            <h3><a href="javascript:void(0);">{{$obj->title}}</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">Publisher: <a href="">{{$obj->publisher_name}}</a></span>
                                                        <span class="tg-bookprice">
                                                        <ins>{{$obj->price}}VND</ins>
                                                    </span>
                                                        <a class="tg-btn tg-btnstyletwo" href="/product/detail/{{$obj->id}}">
                                                            <i class="fa fa-shopping-basket"></i>
                                                            <em>Add To Basket</em>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
                            <aside id="tg-sidebar" class="tg-sidebar">
                                <div class="tg-widget tg-widgetsearch">
                                    <form class="tg-formtheme tg-formsearch">
                                        <div class="form-group">
                                            <button type="submit"><i class="icon-magnifier"></i></button>
                                            <input type="search" name="search" class="form-group" placeholder="Search by title, author, key...">
                                        </div>
                                    </form>
                                </div>
                                <div class="tg-widget tg-catagories">
                                    <div class="tg-widgettitle">
                                        <h3>Categories</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            @foreach($categories as $obj)
                                                <li><a href="javascript:void(0);"><span>{{$obj->name}}</span><em>0</em></a></li>
                                            @endforeach
                                            <li><a href="javascript:void(0);"><span>View All</span></a></li>
                                        </ul>
                                    </div>
                                </div>
{{--                                <div class="tg-widget tg-widgettrending">--}}
{{--                                    <div class="tg-widgettitle">--}}
{{--                                        <h3>Trending Products</h3>--}}
{{--                                    </div>--}}
{{--                                    <div class="tg-widgetcontent">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <article class="tg-post">--}}
{{--                                                    <figure><a href="javascript:void(0);"><img src="cus_plugin/images/products/img-04.jpg" alt="image description"></a></figure>--}}
{{--                                                    <div class="tg-postcontent">--}}
{{--                                                        <div class="tg-posttitle">--}}
{{--                                                            <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>--}}
{{--                                                        </div>--}}
{{--                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>--}}
{{--                                                    </div>--}}
{{--                                                </article>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <article class="tg-post">--}}
{{--                                                    <figure><a href="javascript:void(0);"><img src="cus_plugin/images/products/img-05.jpg" alt="image description"></a></figure>--}}
{{--                                                    <div class="tg-postcontent">--}}
{{--                                                        <div class="tg-posttitle">--}}
{{--                                                            <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>--}}
{{--                                                        </div>--}}
{{--                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>--}}
{{--                                                    </div>--}}
{{--                                                </article>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <article class="tg-post">--}}
{{--                                                    <figure><a href="javascript:void(0);"><img src="cus_plugin/images/products/img-06.jpg" alt="image description"></a></figure>--}}
{{--                                                    <div class="tg-postcontent">--}}
{{--                                                        <div class="tg-posttitle">--}}
{{--                                                            <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>--}}
{{--                                                        </div>--}}
{{--                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>--}}
{{--                                                    </div>--}}
{{--                                                </article>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <article class="tg-post">--}}
{{--                                                    <figure><a href="javascript:void(0);"><img src="cus_plugin/images/products/img-07.jpg" alt="image description"></a></figure>--}}
{{--                                                    <div class="tg-postcontent">--}}
{{--                                                        <div class="tg-posttitle">--}}
{{--                                                            <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>--}}
{{--                                                        </div>--}}
{{--                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>--}}
{{--                                                    </div>--}}
{{--                                                </article>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="tg-widget tg-catagories">
                                    <div class="tg-widgettitle">
                                        <h3>Publisher</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            @foreach($publishers as $obj)
                                                <li><a href="javascript:void(0);"><span>{{$obj->name}}</span><em>0</em></a></li>
                                            @endforeach
                                            <li><a href="javascript:void(0);"><span>View All</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </aside>
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
