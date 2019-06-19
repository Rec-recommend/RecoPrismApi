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
								It may be at the top of the heap tdata-spy="affix"oday but at the bottom of the heap tomorrow,
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
										<div class="row" id="userrecommendation">
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
											<div class="row" id="enjoy">
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
						<aside class="single_sidebar_widget post_category_widget">
							<h4 class="widget_title">Getting Started</h4>
							<ul class="list cat-list">
								<li>
									<a href="#landing" class="d-flex justify-content-between">
										<p>Welcome</p>
										<p>1</p>
									</a>
								</li>
								<li>
									<a href="#joinus" class="d-flex justify-content-between">
										<p>Join us</p>
										<p>2</p>
									</a>
								</li>
								<li>
									<a href="#payment" class="d-flex justify-content-between">
										<p>Payment</p>
										<p>3</p>
									</a>
								</li>
								<li>
									<a href="#login" class="d-flex justify-content-between">
										<p>Login</p>
										<p>4</p>
									</a>
								</li>
								<li>
									<a href="#dashboard" class="d-flex justify-content-between">
										<p>Dashboard</p>
										<p>5</p>
									</a>
								</li>
								<li>
									<a href="#attributes" class="d-flex justify-content-between">
										<p>Add Your Items Attributes</p>
										<p>6</p>
									</a>
								</li>
								<li>
									<a href="#csvs" class="d-flex justify-content-between">
										<p>Import CSV files </p>
										<p>7</p>
									</a>
								</li>
								<li>
									<a href="#plans" class="d-flex justify-content-between">
										<p>Manage Your Subscribtion</p>
										<p>8</p>
									</a>
								</li>
								<li>
									<a href="#admins" class="d-flex justify-content-between">
										<p>Manage Your Admins</p>
										<p>9</p>
									</a>
								</li>
								<li>
									<a href="#settings" class="d-flex justify-content-between">
										<p>Settings (Get API KEY)</p>
										<p>10</p>
									</a>
								</li>
								<li>
									<a href="#userrecommendation" class="d-flex justify-content-between">
										<p>Test Our Prism</p>
										<p>11</p>
									</a>
								</li>
							</ul>
							<div class="br"></div>
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