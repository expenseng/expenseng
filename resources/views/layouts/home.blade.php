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
    @yield('js')
  </body>
</html>