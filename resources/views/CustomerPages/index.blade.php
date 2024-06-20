<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <title>Book Library</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/apple-touch-icon.png">
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
<body class="tg-home tg-homeone">

	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
        @include('CustomerPages.header')
		<!--************************************
				Header End
		*************************************-->
        <main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					Best Selling Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>The Most</span>Purchased Books</h2>
								<a class="tg-btn" href="javascript:void(0);">View All</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
                                @foreach($purchased_books as $obj)
                                    <div class="item">
                                        <div class="tg-postbook">
                                            <figure class="tg-featureimg">
                                                <div class="tg-bookimg">
                                                    <div class="tg-frontcover"><img src="/images/{{$obj->image}}" alt="image description"></div>
                                                    <div class="tg-backcover"><img src="/images/{{$obj->image}}" alt="image description"></div>
                                                </div>

                                            </figure>
                                            <div class="tg-postbookcontent">
                                                <ul class="tg-bookscategories">
                                                    <li><a href="/products/category/{{$obj->category_id}}">{{$obj->category_name}}</a></li>
                                                </ul>
                                                <div class="tg-booktitle">
                                                    <h3><a href="/product/detail/{{$obj->id}}">{{$obj->title}}</a></h3>
                                                </div>
                                                <span class="tg-bookwriter">Publisher: <a href="javascript:void(0);">{{$obj->publisher_name}}</a></span>
                                                <span class="tg-bookprice">
												    <ins>{{number_format($obj->price)}}VND</ins>
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
			</section>
			<!--************************************
					Best Selling End
			*************************************-->
			<!--************************************
					New Release Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-newrelease">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="tg-sectionhead">
									<h2><span>Taste The New Spice</span>New Release Books</h2>
								</div>
								<div class="tg-description">
									<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor fugiat nulla pariatur cepteur sint occaecat cupidatat.</p>
								</div>
    {{--								<div class="tg-btns">--}}
    {{--									<a class="tg-btn tg-active" href="javascript:void(0);">View All</a>--}}
    {{--									<a class="tg-btn" href="/products">Read More</a>--}}
    {{--								</div>--}}
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="row">
									<div class="tg-newreleasebooks">
                                        @foreach($new_release_books as $obj)
                                            <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                                                <div class="tg-postbook">
                                                    <figure class="tg-featureimg">
                                                        <div class="tg-bookimg">
                                                            <div class="tg-frontcover"><img src="/images/{{$obj->image}}" alt="image description"></div>
                                                            <div class="tg-backcover"><img src="/images/{{$obj->image}}" alt="image description"></div>
                                                        </div>

                                                    </figure>
                                                    <div class="tg-postbookcontent">
                                                        <ul class="tg-bookscategories">
                                                            <li><a href="/products/category/{{$obj->category_id}}">{{$obj->category_name}}</a></li>
                                                        </ul>
                                                        <div class="tg-booktitle">
                                                            <h3><a href="/product/detail/{{$obj->id}}">{{$obj->title}}</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">Publisher: <a href="">{{$obj->publisher_name}}</a></span>
                                                        <span class="tg-stars"><span></span></span>
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
			</section>
			<!--************************************
					New Release End
			*************************************-->
			<!--************************************
					Collection Count Start
			*************************************-->
			<section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="cus_plugin/images/parallax/bgparallax-04.jpg">
				<div class="tg-sectionspace tg-collectioncount tg-haslayout">
					<div class="container">
						<div class="row">
							<div id="tg-collectioncounters" class="tg-collectioncounters">
								<div class="tg-collectioncounter tg-drama">
									<div class="tg-collectioncountericon">
										<i class="icon-bubble"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Drama</h2>
										<h3 data-from="0" data-to="6179213" data-speed="8000" data-refresh-interval="50">6,179,213</h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-horror">
									<div class="tg-collectioncountericon">
										<i class="icon-heart-pulse"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Horror</h2>
										<h3 data-from="0" data-to="3121242" data-speed="8000" data-refresh-interval="50">3,121,242</h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-romance">
									<div class="tg-collectioncountericon">
										<i class="icon-heart"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Romance</h2>
										<h3 data-from="0" data-to="2101012" data-speed="8000" data-refresh-interval="50">2,101,012</h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-fashion">
									<div class="tg-collectioncountericon">
										<i class="icon-star"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Fashion</h2>
										<h3 data-from="0" data-to="1158245" data-speed="8000" data-refresh-interval="50">1,158,245</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Collection Count End
			*************************************-->
			<!--************************************
					Testimonials Start
			*************************************-->
			<section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="cus_plugin/images/parallax/bgparallax-05.jpg">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
								<div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
									<div class="item tg-testimonial">
										<figure><img src="/cus_plugin/images/author/image-book.jpg" alt="image description"></figure>
										<blockquote><q>You should read a lot of books to gain more knowledge.</q></blockquote>
{{--										<div class="tg-testimonialauthor">--}}
{{--											<h3>Holli Fenstermacher</h3>--}}
{{--											<span>Manager @ CIFP</span>--}}
{{--										</div>--}}
									</div>
									<div class="item tg-testimonial">
										<figure><img src="/cus_plugin/images/author/image-book-2.jpg" alt="image description"></figure>
										<blockquote><q>You should read a lot of books to gain more knowledge.</q></blockquote>
{{--										<div class="tg-testimonialauthor">--}}
{{--											<h3>Holli Fenstermacher</h3>--}}
{{--											<span>Manager @ CIFP</span>--}}
{{--										</div>--}}
									</div>
									<div class="item tg-testimonial">
										<figure><img src="cus_plugin/images/author/vinh.jpg" alt="image description"></figure>
										<blockquote><q>You should read a lot of books to gain more knowledge.</q></blockquote>
{{--										<div class="tg-testimonialauthor">--}}
{{--											<h3>Holli Fenstermacher</h3>--}}
{{--											<span>Manager @ CIFP</span>--}}
{{--										</div>--}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Testimonials End
			*************************************-->
			<!--************************************
					Call to Action Start
			*************************************-->
			<section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="cus_plugin/images/parallax/bgparallax-06.jpg">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
{{--								<div class="tg-calltoaction">--}}
{{--									<h2>Open Discount For All</h2>--}}
{{--									<h3>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore.</h3>--}}
{{--									<a class="tg-btn tg-active" href="javascript:void(0);">Read More</a>--}}
{{--								</div>--}}
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Call to Action End
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
