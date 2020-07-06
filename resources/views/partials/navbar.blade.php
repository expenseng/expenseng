<!-------------Header starts here-------------->
<nav class="navbar navbar-toggleable-md navbar-expand-md shadow p-3" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{asset('images/Logo.svg')}}"></a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span><i class="fa fa-bars" aria-hidden="true"></i></span>
        </button>
      <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav ml-auto back">
              <li class="nav-item mr-6 sart" role="presentation">
                  <a class="nav-link" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item mr-6 dropdown sart" role="presentation">
                <div class="dropdown">
                <a class="nav-link dropdown-toggle" id="report-dropdown" href="#">Reports</a>
                <ul class="nav nav-item dropdown-menu" aria-labelledby="report-dropdown">
                    <li class="nav-item">
                        <a href="{{ route('reports.ministry') }}" class="nav-link">Ministry Reports</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('reports.expense') }}" class="nav-link">Expense Reports</a>
                    </li>
                </ul>
                </div>
            </li>
            <li class="nav-item mr-6 dropdown sart" role="presentation">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" id="profile-dropdown" href="#">Profiles</a>
                    <ul class="nav nav-item dropdown-menu" aria-labelledby="profile-dropdown">
                        <li class="nav-item">
                            <a href="{{ route('profile.companies') }}" class="nav-link">Companies</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profile.ministries') }}" class="nav-link">Federal Ministries</a>
                        </li>
                    </ul>
            </li>
            <li class="nav-item mr-6 sart" role="presentation">
                <a class="nav-link" href="{{ route('about') }}">About us</a>
            </li>
              <a class="nav-link" href=""><i class="fa fa-search inp"></i></a>
          </ul>
      </div>
    </div>
  </nav>
  <!-------------Header ends here-------------->
