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

  @include('layouts.navbars.navs.landing')

    <!--================ Hero sm Banner start =================-->
    <section class="hero-banner mb-20px" style="padding-top:180px">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="hero-banner__img">
              <img class="img-fluid" src="{{ asset('guest') }}/img/banner/hero-banner.png" alt="">
            </div>
          </div>
        </div>
        <div class="col-lg-5 float-right">
          <div class="hero-banner__content">
            <div class="text-center text">
              <h1>register</h1>
            </div>
            <form role="form" method="POST" action="{{ route('ClientStore') }}">
              @csrf

              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
                  <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form_name" placeholder="{{ __('Name') }}" type="text" name="name" value="" required autofocus>
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
                  <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form_email" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
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
                  <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form_password" placeholder="{{ __('Password') }}" type="password" name="password" required>
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
                  <input class="form-control form_password" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                </div>
              </div>
              <div class="form-group{{ $errors->has('subdomain') ? ' has-danger' : '' }}">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
                  <input class="form-control form_subdomain" placeholder="{{ __('subdomain') }}" type="text" name="subdomain" oninput="updateInput(this.value)" required>
                </div>
                @if ($errors->has('subdomain'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                  <strong>{{ $errors->first('subdomain') }}</strong>
                </span>
                @endif
              </div>
              <h3 id="subdomain" class="text-white"></h3>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Selected Plan</label>
                <select class="form-control" id="exampleFormControlSelect1" name="plan_id">
                  @foreach ($plans as $plan)
                  <option value={{$plan->id}} @if ($plan->id == $selected_plan)
                    selected="selected"
                    @endif
                    >{{$plan->name}} : {{$plan->cost}}$</option>
                  @endforeach
                </select>
              </div>
              <div class="row my-4">
                <div class="col-12">
                  <div class="custom-control custom-control-alternative custom-checkbox">
                    <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                    <label class="custom-control-label" for="customCheckRegister">
                      <span class="text-muted">{{ __('I agree with the') }} <a href="#" data-toggle="modal" data-target="#exampleModalLong">{{ __('Privacy Policy') }}</a></span>
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
        <div style="clear:both" ></div>
      </div>
    </div>
  </section>
  <!--================ Hero sm Banner end =================-->

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
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">TERMS & AGREEMENT</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <h2 class="h4">1. AGREEMENT</h2> 
         <p>This FSA shall control the delivery of Services (as defined below) to Customer by RecoPrism.</p> 
         <h2 class="h4">2. SERVICES </h2>
          <p>RecoPrism shall provide to Customer the API to upload data (users, items and interactions) into the RecoPrism Network and access recommendations. RecoPrism also provides software clients and applications simplifying access to RecoPrism services; these clients are provided without any guarantee.</p> 
          <h2 class="h4">3. LIMITATIONS OF FREE SERVICE</h2> 
          <p>The number of monthly recommendation requests is limited to 100000 (the “Free Tier”). Additional requests will result in an error message (HTTP 429). There are no SLA guarantees for the freemium service, i.e. RecoPrism does not gurantee the Services’ availability, uptime or response time, nor customer support response time. Contact RecoPrism to order standard or high availability services or if you need to process more recommendation requests. </p> 
          <h2 class="h4">4. ACCOUNTS</h2> 
          <p>Customer must have an Account and a Token to use the Services, and is responsible for the information it provides to create the Account, the security of the Token and its passwords for the Account, and for any use of its Account and the Token. If Customer becomes aware of any unauthorized use of its password, its Account or the Token, Customer will notify RecoPrism as promptly as possible. RecoPrism has no obligation to provide Customer multiple Tokens or Accounts.</p> 
          <h2 class="h4">5. TERM & TERMINATION</h2> 
          <p>This FSA shall commence on the Effective Date and shall continue until RecoPrism or Customer decides to terminate it. RecoPrism may immediately terminate the FSA upon written notice. Customer shall send RecoPrism the termination request in order to delete the account and data within 30 days period. If Customer attempts to breach FSA by performing activities abusing RecoPrism free services, all suspicious accounts will be deleted immediately.</p> 
          <h2 class="h4">6. TERMINATION FOR INACTIVITY</h2> 
          <p>RecoPrism reserves the right to terminate the Services for inactivity, if, for a period exceeding 180 days RecoPrism has not served any Recommendation requests for the Customer.</p>
           <h2 class="h4">7. USE OF SERVICES</h2> 
           <p>The Services are to be used solely for Customer’s internal business purposes and are not for resale to any third party or use on a service bureau basis. In order to provide the Services, Customer may be required to connect to RecoPrism’s systems or network („RecoPrism Network“). Customer shall only use the RecoPrism Network for lawful business purposes. Customer shall not use or allow use of the RecoPrism Network in a manner that interferes with the use of the RecoPrism Network by RecoPrism or by any other authorized, third party user. Unless explicitly agreed otherwise, Customer shall have sole responsibility for the expenses associated with deployment of any hardware or software necessary to access the RecoPrism Network.</p> 
           <h2 class="h4">8. FEES & PAYMENT TERMS</h2> 
           <p>RecoPrism Services are provided to Customer without charge up to the Fee Tier. Free service is provided without any warranties and can be discontinued or terminated anytime. </p> 
           <h2 class="h4">9. SERVICE CHANGES</h2> 
           <p>RecoPrism may make upgrades or changes to the Services without prior notice to Customer.</p> 
           <h2 class="h4">10. USE OF CUSTOMER DATA</h2>
            <p>RecoPrism will not access or use Customer Data, except as necessary to provide the Services to Customer. The Parties have agreed that personal data processing is not part of the Services; should Customer want RecoPrism to process any personal data, a separate agreement needs to be negotiated.</p> 
            <h2 class="h4">11. CONFIDENTIALITY</h2> 
            <p>Each party (<strong>"receiving party"</strong>) agrees to keep and maintain the confidentiality of the other party’s (<strong>"disclosing party"</strong>) confidential information and to disclose it only to its personnel who:</p> 
            <ul class="alphabet"> 
              <li>Have a need to know (and then only to the extent that each such person has a need to know);</li>
               <li>Are aware that the confidential information should be kept confidential;</li> 
               <li>Are aware of the receiving party's undertaking in relation to such information in terms of this agreement; and</li> 
               <li>Have been directed by the receiving party to keep the confidential information and have undertaken to keep and maintain the confidentiality of the confidential information or have signed appropriate confidentiality and non-disclosure agreements.</li> </ul> 
               <p>The receiving party undertakes that if it becomes aware that there has been, as a result of or in the course of the performance of this agreement, unauthorised disclosure or use of the disclosing party’s confidential information, it shall promptly bring the matter to the attention of the disclosing party in writing.</p>
                <p>The receiving party shall, on termination of this agreement or on written request therefore by the disclosing party, immediately deliver to the disclosing party all correspondence, documents, specifications and property belonging to the disclosing party which may be in the receiving party’s possession or under its control.</p> 
                <p>The obligations of the parties in relation to the maintenance and non-disclosure of confidential information in terms of this agreement do not extend to information that:</p> 
                <p>Is disclosed to the receiving party in terms of or pursuant to the implementation of this agreement but at the time of such disclosure, such information is known to be in the lawful possession or control of the receiving party and not subject to an obligation of confidentiality;</p> 
                <p>Is or becomes public knowledge otherwise than pursuant to a breach of this agreement by the receiving party;</p> 
                <p>Becomes available to the receiving party from a source other than the disclosing party or personnel of the disclosing party;</p> 
                <p>Is required by the provisions of any law, statute or regulation, or during any court proceedings, or by the rules or regulations of any recognised stock exchange to be disclosed and the receiving party required to make the disclosure has taken all reasonable steps to oppose or prevent the disclosure of or to limit, as far as reasonably possible, the extent of such disclosure and has consulted with the disclosing party prior to making such disclosure; or</p> 
                <p>Is, at the time of disclosure, in the public domain.</p> 
                <p>The provisions of this clause shall survive the termination or expiration of this agreement.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ================ End footer Area ================= -->

  <script src="{{ asset('guest') }}/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="{{ asset('guest') }}/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('guest') }}/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="{{ asset('guest') }}/js/jquery.ajaxchimp.min.js"></script>
  <script src="{{ asset('guest') }}/js/mail-script.js"></script>
  <script src="{{ asset('guest') }}/js/main.js"></script>
  <script>
    function updateInput(subdomain) {
      document.getElementById("subdomain").innerText = subdomain + ".recoprism.ml";
    }
  </script>
</body>

</html>