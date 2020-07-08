<!-------------Header starts here-------------->
<nav class="navbar navbar-toggleable-md navbar-expand-md shadow p-3" role="navigation">
    <div class="container-fluid outer-margin">
        <a class="navbar-brand" href="/"><img src="{{asset('images/Logo.svg')}}"></a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span><i class="fa fa-bars" aria-hidden="true"></i></span>
        </button>
      <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav ml-auto align">
              <li class="nav-item" role="presentation">
                  <a class="nav-link active" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ route('home') }}">Spending</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ route('ministries') }}">Ministries</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ route('contractors') }}">Contractors</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ route('about') }}">About us</a>
                </li>
                  <a class="nav-link" href=""><i class="fa fa-search inp"></i></a>
          </ul>
      </div>
    </div>
  </nav>
  <!-------------Header ends here-------------->
