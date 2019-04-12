<!DOCTYPE html>
<html>
<head>
	@include('UserHome.head')

</head>
<body style="background-color: #4A194D;">

	
	<div class="row" style="margin-top: 10%;">
		

		<div class="col-md-4 col-md-offset-4" style="background-color: white; padding: 2%">
			@if(Session::has('message'))
			<p id="successMessage" class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
			@endif
			<div class="w3-container" >
				<h2 style="margin-bottom: 8%;">Login As {{ $type }}</h2>
				<form action="{{ route('loginPost',['type'=>$type]) }}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					
					
					<div class="input-group" style="margin-bottom: 3%;">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						<input type="email" id="email" name="email" value="{!! old('email') !!}" class="form-control" placeholder="Email">
						@if ($errors->any())
						<span class="text-danger">
							{{ $errors->first('email') }}
						</span>
						@endif
					</div>


					<div class="input-group" style="margin-bottom: 3%;">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" id="password" name="password" class="form-control" placeholder="Password">
						@if ($errors->any())
						<span class="text-danger">
							{{ $errors->first('password') }}
						</span>
						@endif
					</div>
					

					<button class="btn btn-success" type="submit" style="margin-bottom: 3%;">Login As {{ $type }}</button >    
					@if($type=='voter')
					<a class="btn btn-primary" style="margin-bottom: 3%;" href="{{ route('voterRegistration') }}">Registration</a>
					@elseif($type=='candidate')
					<a class="btn btn-primary" style="margin-bottom: 3%;" href="{{ route('candidateRegistration') }}">Registration</a>

					@endif
					<a class="btn btn-danger" style="margin-bottom: 3%;" href="{{ route('home') }}">Back To Home</a>    
				</form>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript">
		//alert('test');
		$('#successMessage').delay(3000).fadeOut('slow');
	</script>
	
</body>
</html>