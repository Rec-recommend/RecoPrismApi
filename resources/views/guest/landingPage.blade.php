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
@include('layouts.navbars.navs.landing')


  <main class="side-main">
    <!--================ Hero sm Banner start =================-->      
    <section class="hero-banner mb-30px">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="hero-banner__img">
              <img class="img-fluid" src="{{ asset('guest') }}/img/banner/hero-banner.png" alt="">
            </div>
          </div>
          <div class="col-lg-5 pt-5">
            <div class="hero-banner__content">
              <h1>You Ask, We Recommend</h1>
             <div style="width:300px;font-size:20px;">  <p>Advanced Software Made Simple Through Our Recommendation Service. </p> </div>
              <a class="button bg" href="#getstarted">Get Started</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Hero sm Banner end =================-->

    <!--================ Feature section start =================-->      
    <section class="section-margin">
      <div class="container">
        <div class="section-intro pb-85px text-center">
          <h2 class="section-intro__title">Easy Steps To Get The Service </h2>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                <span class="card-feature__icon">
                  <i class= ti-credit-card "></i>
                </span>
                <h3 class="card-feature__title">Register And Choose Your Payment Plan</h3>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                <span class="card-feature__icon">
                  <i class=" ti-server "></i>
                </span>
                <h3 class="card-feature__title"> Upload Your DataBase</h3>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                <span class="card-feature__icon">
                  <i class="ti-key"></i>
                </span>
                <h3 class="card-feature__title"> Get Your API Key</h3>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Feature section end =================-->      
    
    <!--================ about section start =================-->      
    <section class="section-padding--small bg-magnolia">
      <div class="container">
        <div class="row no-gutters align-items-center">
          <div class="col-md-5 mb-5 mb-md-0">
            <div class="about__content">
              <h2 >Elegant Dashboard To Control Your Website Recommendations</h2>
              <p style='font-size:20px;'>Now You Can Use RecoPrim Service Easily With Our Dashboard To Control Your Website Recommendations Flow </p>
            </div>
          </div>
          <div class="col-md-7">
            <div class="about__img">
              <img class="img-fluid" src="{{ asset('guest') }}/img/home/about.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ about section end =================-->      
    
    <!--================ Offer section start =================-->      
    <section class="section-margin" id="feature">
      <div class="container">
        <div class="section-intro pb-85px text-center">
          <h2 class="section-intro__title">Features We Offer</h2>
          <p style='font-size:20px;' class="section-intro__subtitle"> We provide recommendations as a service for website owners to increase website sales as response of the increasing demand of data analytics in business sector</p>
        </div>

        <div class="row">
          <div class="col-lg-6">

            <div class="row offer-single-wrapper">
              <div class="col-lg-6 offer-single">
                <div class="card offer-single__content text-center">
                  <span class="offer-single__icon">
                    <i class="ti-pencil-alt"></i>
                  </span>
                  <h4>Easy To Manage</h4>
                  <p> Mange Your Website Recommendation With Your Own Dashboard.</p>
                </div>
              </div>
              
              <div class="col-lg-6 offer-single">
                <div class="card offer-single__content text-center">
                  <span class="offer-single__icon">
                    <i class="ti-ruler-pencil"></i>
                  </span>
                  <h4>Analytics Tool</h4>
                  <p>See How Many Times Your Users Used Our Service.</p>
                </div>
              </div>
            </div>

            <div class="row offer-single-wrapper">
              <div class="col-lg-6 offer-single">
                <div class="card offer-single__content text-center">
                  <span class="offer-single__icon">
                    <i class="ti-cut"></i>
                  </span>
                  <h4>Easy Integration</h4>
                  <p>Quick and Easy Integration into Your Website.</p>
                </div>
              </div>
              
              <div class="col-lg-6 offer-single">
                <div class="card offer-single__content text-center">
                  <span class="offer-single__icon">
                    <i class="ti-light-bulb"></i>
                  </span>
                  <h4>Scalable System</h4>
                  <p> Recommend Anything You Want For Your Users Through Our Service.</p>
                </div>
              </div>
            </div>

          </div>
          <div class="col-lg-6">
            <div class="offer-single__img">
              <img class="img-fluid" src="{{ asset('guest') }}/img/home/offer.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Offer section end =================-->      

    <!--================ Solution section start =================-->    
    <section class="section-padding--small bg-magnolia" id="getstarted">
      <div class="container">
        <div class="row align-items-center pt-xl-3 pb-xl-5">
          <div class="col-lg-6">
            <div class="solution__img text-center text-lg-left mb-4 mb-lg-0">
              <img class="img-fluid" src="{{ asset('guest') }}/img/home/solution.png" alt="">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="solution__content " style="font-size:20px;">
              <h2>Simple Solution For Your Website Recommendations </h2>
              <p ><i class=" ti-user"></i>    Provide Personalized Recommendation for User based on Items and Users Criteria.</p>
              <p><i class="  ti-stats-up "></i> Increase your Revenue.</p>
              <p><i class="ti-key"></i> Quick and Easy Integration into Your Website.</p>

              <a class="button button-light" href="{{route('ClientCreate')}}">Join Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Solution section end =================-->      

    <!--================ Pricing section start =================-->      
    <section class="section-margin">
      <div class="container">
        <div class="section-intro pb-85px text-center">
          <h2 class="section-intro__title">Choose Your Plan</h2>
          <p class="section-intro__subtitle"> Our Plans Fits all Sites Subscriptions Ranges From $100 to $1000.   </p>
          <p style="color:red;"> Start with 30-Days Free Trial.</p>
        </div>

        <div class="row" id="pricing">
            @foreach ($plans as $plan)
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card text-center card-pricing">
              <div class="card-pricing__header">
                <h4>{{$plan->name}}</h4>
                <h1 class="card-pricing__price"><span>$</span>{{$plan->cost}}</h1>
              </div>
              <ul class="card-pricing__list">
                <li><i class="ti-check text-success"></i>{!! nl2br(e($plan->description))!!}</li>
              </ul>
              <form method="get" action={{route('ClientCreate')}}>
              <div class="card-pricing__footer">
                <input value={{$plan->id}} name="plan" hidden>
                <button class="button button-light">Buy Now</button>
              </div>
              </form>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!--================ Pricing section end =================-->      

    <!--================ Testimonial section start =================-->      
    <section class="section-padding bg-magnolia" id="us">
      <div class="container">
        <div class="section-intro pb-5 text-center" style="font-size:25px;">
          <h2 class="section-intro__title">Who Are We</h2>
          <p class="section-intro__subtitle"> We are A Group ITIans Love To Exceed Our Limits And Follow The Universal Trends Of Tecnology. </p>
        </div>
          <div class="testimonial__item text-center">
          </div>
          </div>
          <div class="testimonial__item text-center" style="font-size:25px;color:white;">
            <div class="testimonial__content" >
              <h2>RecoPrism Team</h2>
              <a class="btn btn-primary" href="https://github.com/AbanoubMagdyAdly" >  Abanoub Magdy </a>
              <a class="btn btn-primary" href="https://github.com/AbdelrhamanAmin">  Abdelrahman Amin </a>
              <a class="btn btn-primary" href="https://github.com/a-tarek">  Ahmed Tarek </a>
              <a class="btn btn-primary" href="https://github.com/Hussein-ElAttar">  Hussein Elattar </a>
              <a class="btn btn-primary" href="https://github.com/Mohamed-Elnemr">  Mohamed Elnemr </a>
              <a class="btn btn-primary" href="https://github.com/Miramar95">  Miramar Etman </a>

            </div>
          </div>
        </div>
    </section>
    <!--================ Testimonial section end =================-->      
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

  <script src="{{ asset('guest') }}/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="{{ asset('guest') }}/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('guest') }}/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="{{ asset('guest') }}/js/jquery.ajaxchimp.min.js"></script>
  <script src="{{ asset('guest') }}/js/mail-script.js"></script>
  <script src="{{ asset('guest') }}/js/main.js"></script>
</body>
</html>