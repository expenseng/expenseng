@include('partials.head')
@yield('css')
</head>
  <body>  
    <!-- navbar -->
    @include('partials.navbar')
      @yield('banner')
      <div class="container">
        <!-- content -->
        @yield('content')
      </div>
    <!-- footer -->
    @include('partials.footer')
    @yield('js')
  </body>
</html>