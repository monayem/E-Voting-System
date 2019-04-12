<!DOCTYPE html>
<html>
<head>
	@include('voterLayouts.head')
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		@include('adminLayouts.header')

		@include('adminLayouts.sidebar')
		

		<div class="content-wrapper">
			@yield('content')
		</div>

		
	</div>


	@include('adminLayouts.script')
</body>
</html>