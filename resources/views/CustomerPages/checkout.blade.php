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
    <script src="/cus_plugin/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
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
                        <h1>Checkout</h1>
                        <ol class="tg-breadcrumb">
                            <li><a >home</a></li>
                            <li class="tg-active">Checkout</li>
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
                Contact Us Start
        *************************************-->
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="tg-contactus">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-sectionhead">
                                <h2><span>Order !</span>Provide information</h2>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <form class="tg-formtheme tg-formcontactus" action="@if(isset($order)){{'/order/update/'.$order->id}}@else{{'/checkout/post'}}@endif" method="post">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" name="full_name" class="form-control" @if(@isset($customer))value="{{$customer->full_name}}" @endif placeholder="Full Name*">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone_number" class="form-control" @if(@isset($customer))value="{{$customer->phone}}" @endif placeholder="Phone Mumber*">
                                    </div>
                                    <div class="form-group tg-hastextarea">
                                        <textarea name="address" placeholder="Address*">@if(@isset($customer)){{$customer->address}}@endif</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="tg-btn tg-active">Submit</button>
                                    </div>
                                </fieldset>
                            </form>
                            <div class="tg-contactdetail">

                                <ul class="tg-contactinfo">
                                    <li>
                                        <i class="icon-apartment"></i>
                                        <address>Suit # 07, Rose world Building, Street # 02, AT246T Manchester</address>
                                    </li>
                                    <li>
                                        <i class="icon-phone-handset"></i>
                                        <span>
                                            <em>0800 12345 - 678 - 89</em>
                                            <em>+4 1234 - 4567 - 67</em>
                                        </span>
                                    </li>
                                    <li>
                                        <i class="icon-clock"></i>
                                        <span>Serving 7 Days A Week From 9am - 5pm</span>
                                    </li>
                                    <li>
                                        <i class="icon-envelope"></i>
                                        <span>
                                            <em><a href="mailto:support@domain.com">support@domain.com</a></em>
                                            <em><a href="mailto:info@domain.com">info@domain.com</a></em>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <table class="table table-hover mt-3">
                                <thead>
                                <tr>
                                    <th>Book cover</th>
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>sum</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(session()->get('cart') as $obj)
                                    <tr>
                                        <td><img src="/images/{{$obj->image}}" width="100px"></td>
                                        <td>{{$obj->title}}</td>
                                        <td>{{$obj->quantity}}</td>
                                        <td>{{number_format($obj->price)}}</td>
                                        <td>{{number_format($obj->price*$obj->quantity)}}</td>
                                        <td>
                                            <a class="btn btn-primary" href="/cart/product/detail/{{$obj->id}} ">
                                                Update quantity
                                            </a><br><br>
                                            <a class="btn btn-danger" href="/cart/product/delete/{{$obj->id}} ">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6">
                                        <b>Total</b>: {{number_format(session()->get('cart_total'))}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
                Contact Us End
        *************************************-->
    </main>
    <!--************************************
            Main End
    *************************************-->
    <!--************************************
            Footer Start
    *************************************-->
    <!--************************************
            Footer End
    *************************************-->
    @include('CustomerPages.footer')
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
