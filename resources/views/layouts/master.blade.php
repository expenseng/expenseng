@include('partials.head')
@stack('css')
  <body>
    <div id="app">
        <!-- navbar -->
        <div>
          @include('partials.navbar')
          @yield('banner')

          <!-- content -->
          @yield('content')
          <!-- footer -->
        </div>
      @include('partials.footer')
    </div>
  </body> 
    <script src="{{ asset('js/app.js') }}" type="application/javascript"></script>
    @yield('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</html>
