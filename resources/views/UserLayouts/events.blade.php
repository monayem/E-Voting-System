{{-- Start service Area --}}
<section class="service-area section-gap" id="service">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 pb-30 header-text text-center">
				<h1 class="mb-10">Upcomming Events</h1>

			</div>
		</div>						
		<div class="row">
			@foreach ($events as $event)
			{{-- expr --}}

			<div class="col-lg-4">
				<div class="single-service">
					<div class="thumb">
						<img  src="{{ asset('eventImages/'.$event->eventBanner) }}" alt="">									
					</div>
					<h4><a href="{{ route('eventDetails',['id'=>$event->id]) }}">{{ $event->eventName }}</a></h4>
					<p>
						<a href="{{ route('eventDetails',['id'=>$event->id]) }}">
							{{ str_limit( $event->eventDescription,$limit=150) }}
						</a>

					</p>
				</div>
			</div>
			@endforeach
					{{-- <div class="col-lg-4">
						<div class="single-service">
							<div class="thumb">
								<img src="img/s2.jpg" alt="">									
							</div>
							<h4>Construction & Engineering</h4>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
							</p>
						</div>
					</div> --}}
					{{-- <div class="col-lg-4">
						<div class="single-service">
							<div class="thumb">
								<img src="img/s3.jpg" alt="">									
							</div>
							<h4>Industrial Engineering</h4>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
							</p>
						</div>
					</div> --}}												
				</div>
			</div>	
		</section>
		<!-- End service Area