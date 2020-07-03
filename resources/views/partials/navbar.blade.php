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
                  <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item mr-6 sart" role="presentation">
                  <a class="nav-link" href="./ministry_report/ministry_report_table.html">Spending</a>
              </li>
              <li class="nav-item mr-6 sart" role="presentation">
                  <a class="nav-link active" href="{{ route('ministry') }}">Ministries</a>
              </li>
              <li class="nav-item mr-6 sart" role="presentation">
                  <a class="nav-link" href="./contracts_awarded/contracts_awarded.html">Contractors</a>
              </li>
              <li class="nav-item mr-6 sart" role="presentation">
                  <a class="nav-link" href="aboutus.html">About us</a>
              </li>
              <li class="nav-item mr-3" role="presentation">
                  <a class="nav-link" href="blog.html">Blog</a>
              </li>
              <a class="nav-link" href=""><i class="fa fa-search inp"></i></a>
          </ul>
      </div>
    </div>
  </nav>
  <!-------------Header ends here-------------->