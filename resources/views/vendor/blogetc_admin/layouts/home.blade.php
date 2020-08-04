@include('backend.partials.header')
@stack('css')
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