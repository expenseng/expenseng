@include('partials.head')
@stack('css')
  <body> 
    <div id="app">
        <!-- navbar -->
        @include('partials.navbar')
        @yield('banner')
        <!-- content -->
        @yield('content')
        <!-- footer -->
    </div>
    @include('partials.footer')
    <script src="{{ asset('js/app.js') }}" type="application/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js"></script>
    @yield('js')
  </body>
</html>