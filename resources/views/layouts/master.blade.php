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
    </div>
    @include('partials.footer')
    <script src="{{ asset('js/app.js') }}" type="application/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174035666-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174035666-1');
</script>
    <script src="{{ asset('js/index.js') }}"></script>
    @yield('js')
  </body>
</html>
