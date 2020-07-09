@include('backend.partials.header')
@stack('css')
  <body> 
    <div class="">
        <!-- navbar -->
        @include('backend.partials.navbar')
        @include('backend.partials.sidebar')
        @yield('banner')
        <!-- content -->
        @yield('content')
      </div>
    <!-- footer -->
    @include('backend.partials.footer')
    @yield('js')
  </body>
</html>