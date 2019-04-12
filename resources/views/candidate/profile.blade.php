@extends('adminLayouts.master')
@section('content')


<div class="card-header">
	<h3 class="card-title">Profile of {{ Session::get('firstName') }} {{ Session::get('lastName') }}</h3>
</div>

<div class="col-md-4"  style="margin-top: 1%;">
	<div class="card" style="padding: 4%;">
		<img src="{{ asset('candidateImages/' . $candidate->profileImage ) }}" alt="John" style="width:100%;height: 300px; padding: 4%;">
		<h1>{{ $candidate->firstName }} {{ $candidate->lastName }}</h1>
		{{-- <p class="title">{{ $voterInfo->partyName }}</p> --}}
		<p>Email : {{ $candidate->email }}</p>
		<p>NID : {{ $candidate->nid }}</p>
		<p>Status : {{ $candidate->status }}</p>

	</div>
</div>

@endsection