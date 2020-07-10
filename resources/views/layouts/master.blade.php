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
        @include('partials.footer')
    </div>
  </body>
  <script type="application/javascript" src="{{ asset('js/app.js') }}"></script>
  @yield('js')
</html>