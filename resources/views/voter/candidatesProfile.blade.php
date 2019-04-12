@extends('adminLayouts.profile')
@section('content')


<div class="row">
@if($voter=='')
	@foreach ($candidates as $candidate)
		
	<div class="col-md-4"  style="margin-top: 4%;">
		<div class="card">
			<img src="{{ asset('candidateImages/' . $candidate->profileImage ) }}" alt="John" style="width:100%;height: 300px;">
			<h1>{{ $candidate->firstName }} {{ $candidate->lastName }}</h1>
			<p class="title">{{ $candidate->partyName }}</p>
			<p>{{ $candidate->email }}</p>
			
		</div>
	</div>

	@endforeach

	@elseif($voter=='voter')
	<div class="col-md-4"  style="margin-top: 4%;">
		<div class="card">
			<img src="{{ asset('voterImages/' . $voterInfo->profileImage ) }}" alt="John" style="width:100%;height: 300px; padding: 4%;">
			<h1>{{ $voterInfo->firstName }} {{ $voterInfo->lastName }}</h1>
			{{-- <p class="title">{{ $voterInfo->partyName }}</p> --}}
			<p>Email : {{ $voterInfo->email }}</p>
			<p>NID : {{ $voterInfo->nid }}</p>
			<p>Status : {{ $voterInfo->status }}</p>
			
		</div>
	</div>

	@endif

</div>


@endsection
