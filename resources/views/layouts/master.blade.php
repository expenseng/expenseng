@include('partials.head')
    <body> 
        <div class="containerr">
            <!-- navbar -->
            @include('partials.navbar')
        
            <!-- banner -->
            @yield('banner')

            <!-- content -->
            @yield('content')
        </div>
        <!-- footer -->
        @include('partials.footer')

    </body>
</html>