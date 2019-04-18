<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Internship DOT</title>
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap-grid.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="{{asset('frontend/images/chevron-arrow-up (1).png')}}" alt="" width="20" height="20" style="margin-bottom: 3px;"></button></a>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light ">
			<a href="{{url('/')}}" class="navbar-brand mr-auto">
				<img src="{{asset('frontend/images/logo.png')}}" alt="logo" width="165" height="86">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="menu collapse navbar-collapse" id="navbarSupportedContent">
				<a href="{{url('/#activities')}}" class="nav-link menu--item">Activities</a>
				<a href="{{url('/#benefits')}}" class="nav-link menu--item">Benefits</a>
				<a href="{{url('/#about')}}" class="nav-link menu--item">About</a>
				<a href="{{url('/#position')}}" class="nav-link menu--item">Position</a>
				<a href="{{url('/#testi')}}" class="nav-link menu--item">Testimoni</a>
				<a href="{{url('/#information')}}" class="nav-link menu--item btn-contact__us">Contact Us</a>
			</div>
		</nav>
	</div>
	@yield('content')
	
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script rel="stylesheet" type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script rel="stylesheet" type="text/javascript" src="{{asset('frontend/js/slick.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
	<script>
			// When the user scrolls down 20px from the top of the document, show the button
			window.onscroll = function() {scrollFunction()};
			
			function scrollFunction() {
			  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				document.getElementById("myBtn").style.display = "block";
			  } else {
				document.getElementById("myBtn").style.display = "none";
			  }
			}
			
			// When the user clicks on the button, scroll to the top of the document
			function topFunction() {
			  document.body.scrollTop = 0;
			  document.documentElement.scrollTop = 0;
			}
			</script>
			@stack("scripts")
</body>
</html>