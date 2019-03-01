<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Monik</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> --}}
	<link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/site.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="/{{ Auth::user() ? 'sites' : '' }}">
			<img src="/img/monik-logo.png" style="height:20px; width:auto;">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor02">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					{{-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> --}}
					<a href="{{ url('/sites') }}" class="nav-link">Sites List to Monitor</a>
				</li>
 			</ul>
			<ul class="navbar-nav ml-auto">
            @if (Auth::guest())
                <li class="nav-item"><a href="{{ url('/login') }}" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="{{ url('/register') }}" class="nav-link">Register</a></li>
            @else
	            <li class="nav-item dropdown">
	            	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            		{{ Auth::user()->name }} <span class="caret"></span>
	            	</a>
	            	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
{{-- 	            		<a class="dropdown-item" href="#">Another action</a>
	            		<div class="dropdown-divider"></div>
 --}}
 	            		<a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
	            	</div>
	            </li>
            @endif
			</ul>
		</div>

	</div>
	</nav>

	<div class="container">
    	@yield('content')
    </div>

    <!-- JavaScripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script> --}}
    {{-- <scrip	t src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> --}}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
