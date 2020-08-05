@include('backend.partials.header')
@stack('css')
    <style type="text/css">
    	.list-group-item.active {
		    background-color: #ff9800 !important;
		    border-color: #3490dc;
		}
		.alert-success {
			color: #1d643b !important;
			background-color: #d7f3e3 !important;
			border-color: #c7eed8 !important;
		}
    </style>

    <!-- Styles -->
    @if(file_exists(public_path('blogetc_admin_css.css')))
        <link href="{{ asset('blogetc_admin_css.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{--Edited your css/app.css file? Uncomment these lines to use plain bootstrap:--}}
        {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
        {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--}}
	 	@endif

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