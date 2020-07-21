<!-------------Header starts here-------------->
<nav class="navbar navbar-toggleable-md navbar-expand-md shadow p-3" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{asset('images/Logo.svg')}}"></a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span><i class="fa fa-bars" aria-hidden="true"></i></span>
        </button>
      <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav ml-auto ">
              <li class="nav-item mr-6 sart" role="presentation">
                  <a class="nav-link section-nav-link" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item mr-6 sart" role="presentation">
                    <div class="dropdown">
                        <a class="nav-link section-nav-link dropdown-toggle" id="report-dropdown" data-toggle="dropdown" href="#">Expense</a>
                        <ul class="dropdown-menu" aria-labelledby="report-dropdown">
                            <li class="nav-item section-reference-dropdown">
                                <a href="{{ route('expense.reports') }}" class="dropdown-item">Expenditure Reports</a>
                            </li>
                            <li class="nav-item section-reference-dropdown">
                                <a href="{{ route('expense.ministry') }}" class="dropdown-item">Ministry Expense</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item mr-6 sart" role="presentation">
                    <a class="nav-link section-nav-link" href="{{ route('ministries') }}">Ministries</a>
                </li>
                <li class="nav-item mr-6 sart" role="presentation">
                    <a class="nav-link section-nav-link" href="{{ route('contractors') }}">Contractors</a>
                </li>
                <li class="nav-item dropdown" role="presentation">
                    <a class="nav-link section-nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Reference</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item section-reference-dropdown" href="{{ route('about') }}">About Us</a>
                      <a class="dropdown-item section-reference-dropdown" href="{{ route('contact') }}">Contact Us</a>
                      <a class="dropdown-item section-reference-dropdown" href="#">Government Twitter Handle</a>
                </li>
                <a class="nav-link section-nav-link" href=""><i class="fa fa-search inp"></i></a>
          </ul>
      </div>
    </div>
  </nav>
  <!-------------Header ends here-------------->
