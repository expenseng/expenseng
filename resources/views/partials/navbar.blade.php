<!-------------Header starts here-------------->
<nav class="navbar navbar-toggleable-md navbar-expand-md shadow p-3" role="navigation">
  <div class="container">
  <a class="navbar-brand" href="#"><img src="{{asset('images/logo.png')}}"></a>
  <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
          <span><i class="fa fa-bars" aria-hidden="true"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav ml-auto back">
              <li class="nav-item mr-6 sart" role="presentation">
                  <a class="nav-link" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item mr-6 sart" role="presentation">
                  <a class="nav-link" href="{{ route('spending') }}">Spending</a>
              </li>
              <li class="nav-item mr-6 sart" role="presentation">
                  <a class="nav-link active" href="{{ route('ministry') }}">Ministries</a>
              </li>
              <li class="nav-item mr-6 sart" role="presentation">
                  <a class="nav-link" href="{{ route('contract') }}">Contractors</a>
              </li>
              <li class="nav-item mr-6 sart" role="presentation">
                  <a class="nav-link" href="{{ route('about') }}">About us</a>
              </li>
              <li class="nav-item mr-3" role="presentation">
                  <a class="nav-link" href="{{ route('blog') }}">Blog</a>
              </li>
              <a class="nav-link" href=""><i class="fa fa-search inp"></i></a>
          </ul>
      </div>
    </div>
  </nav>
  <!-------------Header ends here-------------->