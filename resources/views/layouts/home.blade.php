@include('partials.head')
@yield('css')
  <body> 
    <div class="">
        <!-- navbar -->
        @include('backend.partials.header')
        @include('backend.partials.sidebar')
        <!-- content -->
        @yield('content')
      </div>
    <!-- footer -->
    @include('backend.partials.footer')
    @yield('js')
  </body>
</html>