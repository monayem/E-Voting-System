<!DOCTYPE html>
<html>
<head>
	@include('UserHome.head')

</head>
<body>

	
	<div class="row" style="margin-top: 3%;">

		<div class="card col-md-6 col-md-offset-3">
			@if(Session::has('message'))
			<p id="successMessage" class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
			@endif
			<div class="w3-card w3-container" >
				<h2>Apply As Admin</h2>
				<p>For upcoming Councilor Election</p>
				<form action="{{ route('storeAdmin') }}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="input-group" style="margin-bottom: 3%;">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" id="firstName" name="firstName" value="{!! old('firstName')!!}" class="form-control" placeholder="First Name">
						@if ($errors->any())
						<span class="text-danger">
							{{ $errors->first('firstName') }}
						</span>
						@endif
					</div>

					<div class="input-group" style="margin-bottom: 3%;">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" id="lastName" name="lastName" value="{!! old('lastName') !!}" class="form-control" placeholder="Last Name">
						@if ($errors->any())
						<span class="text-danger">
							{{ $errors->first('lastName') }}
						</span>
						@endif
					</div>

					
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
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						<input type="text" id="nid" name="nid" value="{!! old('nid') !!}" class="form-control" placeholder="NID">
						@if ($errors->any())
						<span class="text-danger">
							{{ $errors->first('nid') }}
						</span>
						@endif
					</div>

					
					<div class="input-group" style="margin-bottom: 3%;">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<select class="form-control" id="gender" name="gender">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>    
					</div>

					<div class="input-group" style="margin-bottom: 3%;">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="date" id="dateOfBirth" name="dateOfBirth" value="{!! old('dateOfBirth') !!}" class="form-control" placeholder="Date of Birth">
						@if ($errors->any())
						<span class="text-danger">
							{{ $errors->first('dateOfBirth') }}
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
					

					<div class="input-group" style="margin-bottom: 3%;">
						<span class="input-group-addon"><i class="glyphicon glyphicon-level-up"></i></span>
						<input type="file" id="profileImage" name="profileImage" class="form-control" value="{ !! old('profileImage') !! }" placeholder="Profile Image">
						@if ($errors->any())
						<span class="text-danger">
							{{ $errors->first('profileImage') }}
						</span>
						@endif
					</div>
					

					<button class="btn btn-danger" type="submit" style="margin-bottom: 3%;">Apply As Admin</button >                
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