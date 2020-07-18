@include('backend.partials.header')
@stack('css')
  <body> 
    
        @include('backend.partials.profilebar')
        <!-- navbar -->
        @include('backend.partials.navbar')
        
        
        @yield('banner')
        <!-- content -->
        @yield('content')
      
    @yield('js')
  </body>
</html>