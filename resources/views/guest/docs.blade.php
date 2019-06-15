<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ config('app.name', 'Argon Dashboard') }}</title>
	<link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
	<link href="/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('guest') }}/vendors/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('guest') }}/vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('guest') }}/vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="{{ asset('guest') }}/vendors/linericon/style.css">
	<link rel="stylesheet" href="{{ asset('guest') }}/vendors/owl-carousel/owl.theme.default.min.css">
	<link rel="stylesheet" href="{{ asset('guest') }}/vendors/owl-carousel/owl.carousel.min.css">

	<link rel="stylesheet" href="{{ asset('guest') }}/css/style.css">
</head>

<body>
	<!--================Header Menu Area =================-->
	@include('layouts.navbars.navs.landing')
	<!--================Header Menu Area =================-->

	<!--================ Hero sm Banner start =================-->
	<section class="hero-banner hero-banner--sm mb-30px">
		<div class="container">
			<div class="hero-banner--sm__content">
				<h1>How To Use Our Prism</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Docs</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<!--================ Hero sm Banner end =================-->


	<!--================Blog Area =================-->
	<section class="blog_area single-post-area section-margin--medium">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
					<div class="single-post row">
						<h2>Getting Started</h2>
						<div class="col-lg-12">
							<div class="feature-img">
								<img class="img-fluid" style="opacity: 0.5;color:blueviolet;border-radius: 2%;"
									src="{{ asset('guest') }}/img/blog/cover.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-3  col-md-3">
							<div class="blog_info text-right">
								<ul class="blog_meta list">
									<li>
										<a href="#">Tenant Admin
											<i class="lnr lnr-user"></i>
										</a>
									</li>
									<li>
										<a href="#">Real Time Service
											<i class="lnr lnr-calendar-full"></i>
										</a>
									</li>
									<li>
										<a href="#">1.2K Clients
											<i class="lnr lnr-eye"></i>
										</a>
									</li>
									<li>
										<a href="#">+1M Recos
											<i class="lnr lnr-bubble"></i>
										</a>
									</li>
								</ul>

							</div>
						</div>
						<div class="col-lg-9 col-md-9 blog_details">
							<h2>What we Offers</h2>
							<p class="excert">
								We provide recommendations as a service for website owners to increase website sales as
								response of the increasing demand of data analytics in business sector.
							</p>
							<p>
								Recommender system is a technology that is deployed in the environment
								where items (products, movies, events, articles) are to be recommended
								to users (customers, visitors, app users, readers).
							</p>
						</div>
						<div class="col-lg-12">
							<div class="quotes">
								“No company can afford not to move forward.
								It may be at the top of the heap today but at the bottom of the heap tomorrow,
								if it doesn’t.”
								— James Cash Penney, founder, JC Penney
							</div>
							<div class="row" id="landing">
								<h2>Welcome To the Recoprism World </h2>
								<div class="feature-img">
									<img class="img-fluid" style="opacity: 0.5;color:blueviolet;border-radius: 2%;"
										src="{{ asset('guest') }}/img/blog/step1.png" alt="">
								</div>
								<div class="col-lg-12 mt-4">
									<p>
										<a href="http://recoprism.ml">RecoPrism</a> landing page
										contianing .
										<ul>
											<li>Features</li>
											<li>Price</li>
											<li>About Us</li>
											<li>Docs</li>
											<li>SignUp</li>
										</ul>
									</p>
									<p>
										After exploring our landing page
										you will need to signup to enjoy our service.
									</p>
								</div>
							</div>
							<div class="row" id="joinus">
								<h2>Join Us</h2>
								<div class="feature-img">
									<img class="img-fluid" style="opacity: 0.5;color:blueviolet;border-radius: 2%;"
										src="{{ asset('guest') }}/img/blog/step2.png" alt="">
								</div>
								<div class="col-lg-12 mt-4">
									<p>
										<a href="http://recoprism.ml/create">RecoPrism SignUp</a>
										<br>
										You will need to enter your personal data & subdomain for your site.
										<ul>
											<li><big>Email : </big> Uinque & Will need to login with. </li>
											<li><big>Password : </big> Strong Password with at least 8 char.</li>
											<li><big>SubDomain : </big> Uinque & this will be your application url.</li>
											<li><big>Choose Plan : </big> Plan according to your usage.</li>
										</ul>
									</p>
								</div>
							</div>
							<div class="row" id="payment">
								<h2>Payment</h2>
								<div class="feature-img">
									<img class="img-fluid" style="opacity: 0.5;color:blueviolet;border-radius: 2%;"
										src="{{ asset('guest') }}/img/blog/step3.png" alt="">
								</div>
								<div class="col-lg-12 mt-4">
									<p>
										After Payment you will receive <big>Mail with your application url</big>
									</p>
								</div>
							</div>
							<div class="row" id="login">
								<h2>Login</h2>
								<div class="feature-img">
									<img class="img-fluid" style="opacity: 0.5;color:blueviolet;border-radius: 2%;"
										src="{{ asset('guest') }}/img/blog/step4.png" alt="">
								</div>
								<div class="col-lg-12 mt-4">
									<p>
										After Login you will can Use Our Elegant <big> Dashboard </big>To Control Your
										Website
									</p>
								</div>
							</div>
							<div class="row" id="dashboard">
								<h2>Dashboard<h2>
										<div class="feature-img">
											<img class="img-fluid"
												style="opacity: 0.5;color:blueviolet;border-radius: 2%;"
												src="{{ asset('guest') }}/img/blog/step5.png" alt="">
										</div>
										<div class="col-lg-12 mt-4">
											<p>
											</p>
										</div>
							</div>
							<div class="row" id="attributes">
								<h2>Add Attributes<h2>
										<div class="feature-img">
											<img class="img-fluid"
												style="opacity: 0.5;color:blueviolet;border-radius: 2%;"
												src="{{ asset('guest') }}/img/blog/step6.png" alt="">
										</div>
										<div class="col-lg-12 mt-4">
											<p>
											</p>
										</div>
							</div>
							<div class="row" id="csvs">
								<h2>Import CSVs<h2>
										<div class="feature-img">
											<img class="img-fluid"
												style="opacity: 0.5;color:blueviolet;border-radius: 2%;"
												src="{{ asset('guest') }}/img/blog/step7.png" alt="">
										</div>
										<div class="col-lg-12 mt-4">
											<p>
											</p>
										</div>
							</div>
							<div class="row" id="plans">
									<h2>Plan Management<h2>
											<div class="feature-img">
												<img class="img-fluid"
													style="opacity: 0.5;color:blueviolet;border-radius: 2%;"
													src="{{ asset('guest') }}/img/blog/step8.png" alt="">
											</div>
											<div class="col-lg-12 mt-4">
												<p>
												</p>
											</div>
								</div>
								<div class="row" id="admins">
										<h2>Admins Management<h2>
												<div class="feature-img">
													<img class="img-fluid"
														style="opacity: 0.5;color:blueviolet;border-radius: 2%;"
														src="{{ asset('guest') }}/img/blog/step9.png" alt="">
												</div>
												<div class="col-lg-12 mt-4">
													<p>
													</p>
												</div>
									</div>
									<div class="row" id="settings">
											<h2>Settings Management<h2>
													<div class="feature-img">
														<img class="img-fluid"
															style="opacity: 0.5;color:blueviolet;border-radius: 2%;"
															src="{{ asset('guest') }}/img/blog/step10.png" alt="">
													</div>
													<div class="col-lg-12 mt-4">
														<p>
														</p>
													</div>
										</div>
										<div class="row" id="settings">
												<h2>Test User recommendations<h2>
														<div class="feature-img">
															<img class="img-fluid"
																style="opacity: 0.5;color:blueviolet;border-radius: 2%;"
																src="{{ asset('guest') }}/img/blog/step11.png" alt="">
														</div>
														<div class="col-lg-12 mt-4">
															<p>
															</p>
														</div>
											</div>
											<div class="row" id="settings">
													<h2>Now Enjoy Using Our Prism<h2>
															<div class="feature-img">
																<img class="img-fluid"
																	style="opacity: 0.5;color:blueviolet;border-radius: 2%;"
																	src="{{ asset('guest') }}/img/blog/step12.png" alt="">
															</div>
															<div class="col-lg-12 mt-4">
																<p>
																</p>
															</div>
												</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="blog_right_sidebar">
						<aside class="single_sidebar_widget search_widget">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search Posts">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">
										<i class="lnr lnr-magnifier"></i>
									</button>
								</span>
							</div>
							<!-- /input-group -->
							<div class="br"></div>
						</aside>
						<aside class="single_sidebar_widget author_widget">
							<img class="author_img rounded-circle" src="{{ asset('guest') }}/img/blog/author.png"
								alt="">
							<h4>Charlie Barber</h4>
							<p>Senior blog writer</p>
							<div class="social_icon">
								<a href="#">
									<i class="fab fa-facebook-f"></i>
								</a>
								<a href="#">
									<i class="fab fa-twitter"></i>
								</a>
								<a href="#">
									<i class="fab fa-github"></i>
								</a>
								<a href="#">
									<i class="fab fa-behance"></i>
								</a>
							</div>
							<p>Boot camps have its supporters andit sdetractors. Some people do not understand why you
								should
								have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits
								detractors.
							</p>
							<div class="br"></div>
						</aside>
						<aside class="single_sidebar_widget popular_post_widget">
							<h3 class="widget_title">Popular Posts</h3>
							<div class="media post_item">
								<img src="{{ asset('guest') }}/img/blog/popular-post/post1.jpg" alt="post">
								<div class="media-body">
									<a href="blog-details.html">
										<h3>Space The Final Frontier</h3>
									</a>
									<p>02 Hours ago</p>
								</div>
							</div>
							<div class="media post_item">
								<img src="{{ asset('guest') }}/img/blog/popular-post/post2.jpg" alt="post">
								<div class="media-body">
									<a href="blog-details.html">
										<h3>The Amazing Hubble</h3>
									</a>
									<p>02 Hours ago</p>
								</div>
							</div>
							<div class="media post_item">
								<img src="{{ asset('guest') }}/img/blog/popular-post/post3.jpg" alt="post">
								<div class="media-body">
									<a href="blog-details.html">
										<h3>Astronomy Or Astrology</h3>
									</a>
									<p>03 Hours ago</p>
								</div>
							</div>
							<div class="media post_item">
								<img src="{{ asset('guest') }}/img/blog/popular-post/post4.jpg" alt="post">
								<div class="media-body">
									<a href="blog-details.html">
										<h3>Asteroids telescope</h3>
									</a>
									<p>01 Hours ago</p>
								</div>
							</div>
							<div class="br"></div>
						</aside>
						<aside class="single_sidebar_widget ads_widget">
							<a href="#">
								<img class="img-fluid" src="{{ asset('guest') }}/img/blog/add.jpg" alt="">
							</a>
							<div class="br"></div>
						</aside>
						<aside class="single_sidebar_widget post_category_widget">
							<h4 class="widget_title">Post Catgories</h4>
							<ul class="list cat-list">
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Technology</p>
										<p>37</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Lifestyle</p>
										<p>24</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Fashion</p>
										<p>59</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Art</p>
										<p>29</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Food</p>
										<p>15</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Architecture</p>
										<p>09</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Adventure</p>
										<p>44</p>
									</a>
								</li>
							</ul>
							<div class="br"></div>
						</aside>
						<aside class="single-sidebar-widget newsletter_widget">
							<h4 class="widget_title">Newsletter</h4>
							<p>
								Here, I focus on a range of items and features that we use in life without giving them a
								second thought.
							</p>
							<div class="form-group d-flex flex-row">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fa fa-envelope" aria-hidden="true"></i>
										</div>
									</div>
									<input type="text" class="form-control" id="inlineFormInputGroup"
										placeholder="Enter email address" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter email'">
								</div>
								<a href="#" class="bbtns">Subcribe</a>
							</div>
							<p class="text-bottom">You can unsubscribe at any time</p>
							<div class="br"></div>
						</aside>
						<aside class="single-sidebar-widget tag_cloud_widget">
							<h4 class="widget_title">Tag Clouds</h4>
							<ul class="list">
								<li>
									<a href="#">Technology</a>
								</li>
								<li>
									<a href="#">Fashion</a>
								</li>
								<li>
									<a href="#">Architecture</a>
								</li>
								<li>
									<a href="#">Fashion</a>
								</li>
								<li>
									<a href="#">Food</a>
								</li>
								<li>
									<a href="#">Technology</a>
								</li>
								<li>
									<a href="#">Lifestyle</a>
								</li>
								<li>
									<a href="#">Art</a>
								</li>
								<li>
									<a href="#">Adventure</a>
								</li>
								<li>
									<a href="#">Food</a>
								</li>
								<li>
									<a href="#">Lifestyle</a>
								</li>
								<li>
									<a href="#">Adventure</a>
								</li>
							</ul>
						</aside>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================Blog Area =================-->
	<!-- ================ start footer Area ================= -->
	<footer class="footer-area section-gap">
			<div class="container">
				<div class="row">
	
					
					
	
				</div>
				<div class="footer-bottom row align-items-center text-center text-lg-left">
					<p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">RecoPrim</a>
	<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					<div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
						<a href="https://github.com/Rec-recommend"> <i class=" ti-github "></i> </a> GitHub Link
					</div>
				</div>
			</div>
		</footer>
	<!-- ================ End footer Area ================= -->

	<script src="vendors/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="js/main.js"></script>
</body>

</html>