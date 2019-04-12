{{-- Start Result Area --}}
<section class="service-area section-gap" id="service">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 pb-30 header-text text-center">
				<h1 class="mb-10">Councillor Election 2018</h1>
				<h3>Vote Update </h3>
				<h4>Total Voter : {{ $totalVoter }}</h4>
				<h4>Submitted Vote : {{ $submittedVote }}</h4>

			</div>
		</div>						
		<div class="row">
			@foreach ($results as $result)

			<div class="col-lg-4">
				<div class="single-service">
					<div class="thumb">
						{{-- <img  src="{{ asset('eventImages/'.$event->eventBanner) }}" alt="">									 --}}
					</div>
					<h4>
						<img  src="{{ asset('partyImages/'.$result->partyLogo) }}" alt="" style="width: 80px; height: 50px;">	 
						
						  {{ $result->firstName }}{{ $result->lastName }} ,  {{ $result->partyName }}</h4>
						<p style="text-align: center ;background-color: #96D09C;line-height:  31px; color:black;font-size: 17px;">
							{{ $result->totalVote / $submittedVote *100 }} %

						</p>
					</div>
				</div>
				@endforeach

			</div>
		</div>	
	</section>
		<!-- End Result Area