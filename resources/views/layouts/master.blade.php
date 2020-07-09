@include('partials.head')
@stack('css')
  <body> 
    <div id="app">
        <!-- navbar -->
        @include('partials.navbar')
        @yield('banner')
        <!-- content -->
        @yield('content')
    </div>
    <!-- footer -->
    @yield('js')
    @include('partials.footer')
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>