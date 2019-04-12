@extends('adminLayouts.master')
@section('content')

@if(Session::has('message'))
	<p id="successMessage" class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
@endif


@endsection