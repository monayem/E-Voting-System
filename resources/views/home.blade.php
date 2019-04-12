	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		@include('UserLayouts.head')
	</head>
	<body>	
		@include('UserLayouts.topNav')

		{{-- @include('UserLayouts.bannerArea') --}}

		{{-- @include('UserLayouts.categoryArea')	 --}}

		{{-- @include('UserLayouts.serviceArea') --}}
		
		@yield('content')

		{{-- @include('UserLayouts.faqArea')

		@include('UserLayouts.projectArea')

		@include('UserLayouts.feedbackArea')

		@include('UserLayouts.blogArea') --}}
		
		@include('UserLayouts.footerArea')

		
		@include('UserLayouts.script')

		

		


		

		

			
	</body>
	</html>



