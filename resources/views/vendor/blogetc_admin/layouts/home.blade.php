@include('backend.partials.header')
@stack('css')
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <title>BlogEtcPost Blog Admin - {{ config('app.name') }}</title>

	    <script
	            src="https://code.jquery.com/jquery-3.3.1.min.js"
	            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	            crossorigin="anonymous"></script>

	    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

	    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
	          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito" crossorigin="anonymous">

	    <!-- Styles -->
	    @if(file_exists(public_path('blogetc_admin_css.css')))
	        <link href="{{ asset('blogetc_admin_css.css') }}" rel="stylesheet">
	    @else
	        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	        {{--Edited your css/app.css file? Uncomment these lines to use plain bootstrap:--}}
	        {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
	        {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--}}
   	 	@endif
	</head>

  <body> 
        @include('backend.partials.sidebar')
        <!-- navbar -->
        @include('backend.partials.navbar')
        
        @yield('banner')
        <!-- content -->
        @yield('content')
      
    @yield('js')
  </body>
</html>