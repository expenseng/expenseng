<!-------------Header starts here-------------->
<nav class="navbar navbar-toggleable-md navbar-expand-md shadow p-3" role="navigation">
        <div class="container-fluid outer-margin">
            <a class="navbar-brand" href="/"><img src="{{asset('images/Logo.svg')}}"></a>
            <!--<a class="navbar-brand" href="/"><img src="logo.png"></a>-->
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                <span><i class="fa fa-bars" aria-hidden="true"></i></span>
            </button>
          <div class="collapse navbar-collapse" id="navcol-1">
              <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item" role="presentation" id="home">
                      <a class="nav-link" href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="nav-item" role="presentation" id="spending">
                      <div class="dropdown">
                        <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Expenditure
                        </a>

                        <div class="dropdown-menu dropdown-menu-spending" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item for-spending" href="{{ route('expense.reports') }}">Expenditure Report</a>
                          <a class="dropdown-item for-spending" href="{{ route('expense.ministry') }}">Ministry Spending</a>
                        </div>
                      </div>
                    </li>
                    <li class="nav-item" role="presentation" id="ministries">
                        <a class="nav-link" href="{{ route('ministries') }}">Ministries</a>
                    </li>
                    <li class="nav-item" role="presentation" id="contractors">
                        <a class="nav-link" href="{{ route('contractors') }}">Contractors</a>
                    </li>
                    <li class="nav-item" role="presentation" id="about">
                      <div class="dropdown">
                        <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          About us
                        </a>

                        <div class="dropdown-menu dropdown-menu-about" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item for-about" href="{{ route('about') }}">About us</a>
                          <a class="dropdown-item for-about" href="{{ route('contact') }}">Contact us</a>
                        </div>
                      </div>
                    </li>
                      <!--<a class="nav-link" href=""><i class="fa fa-search inp"></i></a>-->
                      <div class="dropdown">
                        <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-search inp"></i>
                        </a>

                        <div class="dropdown-menu drop-search" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item dropdown-item-search" href="#">
                            <input class="form-control dropdown-item-search-control" type="text" placeholder="&#xF002 Search for reports, profiles and projects" aria-label="Search">
                          </a>
                        </div>
                      </div>
              </ul>
          </div>
        </div>
      </nav>
  <!-------------Header ends here-------------->
