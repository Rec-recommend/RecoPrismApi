<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name', 'Argon Dashboard') }}</title>
  <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
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
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="/"><h2 class="text-white">RecoPrism</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
              <li class="nav-item active"><a class="nav-link" href="/">Home</a></li> 
              <li class="nav-item"><a class="nav-link" href="{{ asset('guest') }}/feature.html">Feature</a></li> 
              <li class="nav-item"><a class="nav-link" href="#pricing">Price</a>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Pages</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ asset('guest') }}/blog.html">Blog</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ asset('guest') }}/blog-details.html">Blog Details</a></li>
                </ul>
							</li>
              <li class="nav-item"><a class="nav-link" href="{{ asset('guest') }}/contact.html">Contact</a></li>
            </ul>
            <ul class="navbar-right">
              <li class="nav-item">
                <button class="button button-header bg">Sign up</button>
              </li>
            </ul>
          </div> 
        </div>
      </nav>
    </div>
  </header>
    <!--================ Hero sm Banner start =================-->      
    <section class="hero-banner mb-20px">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="hero-banner__img">
              <img class="img-fluid" src="{{ asset('guest') }}/img/banner/hero-banner.png" alt="">
            </div>
          </div>
          <div class="col-lg-5">
              <div class="hero-banner__content">
                      <div class="text-center text">
                          <h1>register</h1>
                      </div>
                      <form role="form" method="POST" action="{{ route('GuestregisterCreate') }}">
                          @csrf
              
                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                              <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                  </div>
                                  <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                              </div>
                              @if ($errors->has('name'))
                                  <span class="invalid-feedback" style="display: block;" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                              <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                              </div>
                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" style="display: block;" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                  </div>
                                  <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                              </div>
                              @if ($errors->has('password'))
                                  <span class="invalid-feedback" style="display: block;" role="alert">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="form-group">
                              <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('subdomain') ? ' has-danger' : '' }}">
                              <div class="input-group input-group-alternative mb-3">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                  </div>
                                  <input class="form-control" placeholder="{{ __('subdomain') }}" type="text" name="subdomain" oninput="updateInput(this.value)" required>
                              </div>
                              @if ($errors->has('subdomain'))
                                  <span class="invalid-feedback" style="display: block;" role="alert">
                                      <strong>{{ $errors->first('subdomain') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <h3 id="subdomain" class="text-white" ></h3>
                          <div class="form-group">
                              <label for="exampleFormControlSelect1">Selected Plan</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="payment_plan_id">
                                @foreach ($plans as $plan)
                              <option value={{$plan->id}}
                                @if ($plan->id == $selected_plan)
                                selected="selected"
                                @endif
                                >{{$plan->name}} : {{$plan->price}}$</option>
                                @endforeach
                              </select>
                            </div>
                          <div class="row my-4">
                              <div class="col-12">
                                  <div class="custom-control custom-control-alternative custom-checkbox">
                                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                      <label class="custom-control-label" for="customCheckRegister">
                                          <span class="text-muted">{{ __('I agree with the') }} <a href="#!">{{ __('Privacy Policy') }}</a></span>
                                      </label>
                                  </div>
                              </div>
                          </div>
                          <div class="text-center">
                              <button type="submit" class="btn btn-primary">{{ __('Create account') }}</button>
                          </div>
                      </form>
                  </div>
            </div>
        </div>
      </div>
    </section>
    <!--================ Hero sm Banner end =================-->
    
  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Top Products</h4>
					<ul>
						<li><a href="{{ asset('guest') }}/#">Managed Website</a></li>
						<li><a href="{{ asset('guest') }}/#">Manage Reputation</a></li>
						<li><a href="{{ asset('guest') }}/#">Power Tools</a></li>
						<li><a href="{{ asset('guest') }}/#">Marketing Service</a></li>
					</ul>
				</div>
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="{{ asset('guest') }}/#">Jobs</a></li>
						<li><a href="{{ asset('guest') }}/#">Brand Assets</a></li>
						<li><a href="{{ asset('guest') }}/#">Investor Relations</a></li>
						<li><a href="{{ asset('guest') }}/#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Features</h4>
					<ul>
						<li><a href="{{ asset('guest') }}/#">Jobs</a></li>
						<li><a href="{{ asset('guest') }}/#">Brand Assets</a></li>
						<li><a href="{{ asset('guest') }}/#">Investor Relations</a></li>
						<li><a href="{{ asset('guest') }}/#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Resources</h4>
					<ul>
						<li><a href="{{ asset('guest') }}/#">Guides</a></li>
						<li><a href="{{ asset('guest') }}/#">Research</a></li>
						<li><a href="{{ asset('guest') }}/#">Experts</a></li>
						<li><a href="{{ asset('guest') }}/#">Agencies</a></li>
					</ul>
				</div>
				<div class="col-xl-4 col-md-8 mb-4 mb-xl-0 single-footer-widget">
					<h4>Newsletter</h4>
					<p>You can trust us. we only send promo offers,</p>
					<div class="form-wrap" id="mc_embed_signup">
						<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
						 method="get" class="form-inline">
							<input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
							 required="" type="email">
							<button class="click-btn btn btn-default">subscribe</button>
							<div style="position: absolute; left: -5000px;">
								<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
							</div>

							<div class="info"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="footer-bottom row align-items-center text-center text-lg-left">
				<p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="{{ asset('guest') }}/https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				<div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
					<a href="{{ asset('guest') }}/#"><i class="fab fa-facebook-f"></i></a>
					<a href="{{ asset('guest') }}/#"><i class="fab fa-twitter"></i></a>
					<a href="{{ asset('guest') }}/#"><i class="fab fa-dribbble"></i></a>
					<a href="{{ asset('guest') }}/#"><i class="fab fa-behance"></i></a>
				</div>
			</div>
		</div>
	</footer>
  <!-- ================ End footer Area ================= -->

  <script src="{{ asset('guest') }}/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="{{ asset('guest') }}/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('guest') }}/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="{{ asset('guest') }}/js/jquery.ajaxchimp.min.js"></script>
  <script src="{{ asset('guest') }}/js/mail-script.js"></script>
  <script src="{{ asset('guest') }}/js/main.js"></script>
  <script>
    function updateInput(subdomain){
    document.getElementById("subdomain").innerText = subdomain+".recoprism.com";
}
  </script>
</body>
</html>