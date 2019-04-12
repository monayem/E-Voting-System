<header id="header" id="home">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
							</ul>
						</div>
						<div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
							<a href="tel:+880 012 3654 896">+880 012 3654 896</a>
							<a href="mailto:support@colorlib.com">support@colorlib.com</a>				
						</div>
					</div>			  					
				</div>
			</div>
			<div class="container main-menu">
				<div class="row align-items-center justify-content-between d-flex">
					<div id="logo">
						<a href="#"><img src="{{ asset('logo/logo.png') }}" alt="" title="" /></a>
					</div>
					<nav id="nav-menu-container">
						<ul class="nav-menu">
							<li class="menu-active"><a href="{{ route('home') }}">Home</a></li>
							{{-- <li><a href="about.html">About</a></li> --}}
							<li><a href="{{ route('event') }}">Events</a></li>
							{{-- <li><a href="services.html">Notices</a></li> --}}
							<li><a href="{{ route('result') }}">Results</a></li>
							<li class="menu-has-children"><a href="#">Apply As</a>
								<ul>
									<li><a href="{{ route('candidateRegistration') }}">Candidate</a></li>
									<li><a href="{{ route('voterRegistration') }}">Voter</a></li>
								</ul>
							</li>
							
							@if(!Session::get('id'))
							<li class="menu-has-children"><a href="#">Login As</a>
								<ul>
									<li><a href="{{ route('login',['type'=>'candidate']) }}">Candidate</a></li>
									<li><a href="{{ route('login',['type'=>'voter']) }}">Voter</a></li>
								</ul>
							</li>
							@else 
								<li class="menu-has-children"><a href="#">Dashboard</a>
								<ul>
									<li><a href="{{ route('dashboard',['type'=>Session::get('role') ]) }}">{{ Session::get('role') }} Panel</a></li>
								</ul>
							</li>
							@endif

							{{-- <li><a href="contact.html">Contact</a></li> --}}
						</ul>
					</nav><!-- #nav-menu-container -->		    		
				</div>
			</div>
		</header><!-- #header -->