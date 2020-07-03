@include('partials.head')
@yield('css')
</head>
  <body> 
    <div class="container">
        <!-- navbar -->
        @include('partials.navbar')

        <!-- content -->
        @yield('content')
    </div>
    <!-- footer -->
    @include('partials.footer')
    @yield('js')
  </body>
</html>