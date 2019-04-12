@extends('adminLayouts.profile')
@section('content')
<div class="row">
	
	@foreach ($candidates as $candidate)

	<div class="col-md-4"  style="margin-top: 2%;">
		<div class="card">
			<img src="{{ asset('candidateImages/' . $candidate->profileImage ) }}" alt="John" style="width:100%;height: 250px;">
			<h4>{{ $candidate->firstName }} {{ $candidate->lastName }}</h4>
			<p class="title">{{ $candidate->partyName }}</p>
			<img src="{{ asset('partyImages/' . $candidate->partyLogo ) }}" alt="John" style="width:50%;height: 100px; margin-left: 25%;padding-bottom: 3%;">
			{{-- <div style="margin: 24px 0;">
				<a href="#"><i class="fa fa-dribbble"></i></a> 
				<a href="#"><i class="fa fa-twitter"></i></a>  
				<a href="#"><i class="fa fa-linkedin"></i></a>  
				<a href="#"><i class="fa fa-facebook"></i></a> 
			</div> --}}
			{{-- <form action="{{ route('giveVote') }}" method="post">
				{{csrf_field()}}

				<input type="hidden" name="id" value="{{ $candidate->id }}">
				<input class="btn btn-primary" type="submit" name="giveVote" value="Give Vote">
			</form> --}}


			<form action="{{ route('giveVote') }}" method="get" enctype="multipart/form-data">
				{{csrf_field()}}


				<input type="hidden" name="id" value="{{ $candidate->id }}">

				<button class="btn btn-primary" type="submit" style="margin-bottom: 3%;">Give Vote</button >                
			</form>

			{{-- <a href="{{ route('giveVote',['id'=>$candidate->id]) }}" class="btn btn-primary">Give Vote</a> --}}
		</div>
	</div>

	@endforeach

</div>

@endsection