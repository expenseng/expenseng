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
    @include('partials.footer')
    @yield('js')
  </body>
</html>