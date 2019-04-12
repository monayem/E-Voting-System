@extends('home')

@section('content') 

<!-- Start home-about Area -->
			<section class="home-about-area section-gap aboutus-about" id="about">
				<div class="container">
					<div class="row justify-content-center align-items-center">
						<div class="col-lg-8 col-md-12 home-about-left">
							{{-- <h6>Brand new app to blow your mind</h6> --}}
							<h1>
								{{ $events->eventName }}
							</h1>
							<p class="sub">We are here to listen from you deliver exellence</p>
							<p class="pb-20">
								{{ $events->eventDescription }}
							</p>
							{{-- <a class="primary-btn" href="#">Get Started Now</a> --}}
						</div>

						<div class="col-lg-4 col-md-12 home-about-right relative">
							<img src="{{ asset('eventImages/'. $events->eventBanner) }}" width="400px;">
						</div>
					</div>
				</div>	
			</section>
			<!-- End home-about Area -->
				
			

@endsection