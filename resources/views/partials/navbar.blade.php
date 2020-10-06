<!-- Header -->
<header class="site-header m-auto p-0" id="header" style="max-width: 1650px">
    <div class="mx-lg-4 px-lg-5">
    <nav class="navbar navbar-expand-lg transparent-bg bg-transparent darkcolor static-nav px-0">
        <div class="container-fluid px-0 bg-white">
            <a class="navbar-brand section-navbar-logo " href="{{route('home')}}" style="padding: 0px;">
                <img src="{{asset('images/Logo.svg')}}" alt="logo" class="logo-default">
                <img src="{{asset('images/Logo.svg')}}" class="logo-scrolled">
            </a>
            <div class="collapse navbar-collapse section-nav-items">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link section-nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('expense.ministry') }}" class="nav-link section-nav-link">Spending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link section-nav-link" href="{{ route('ministries') }}">Ministries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link section-nav-link" href="{{ route('contractors') }}">Contractors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link section-nav-link" href="{{ route('blogetc.index') }}">Blog</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link section-nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Reference</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item section-reference-dropdown" href="{{ route('about') }}">About Us</a>
                            <a class="dropdown-item section-reference-dropdown" href="{{ route('contact') }}">Contact Us</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link section-nav-link" href="{{ route('search') }}"><i class="fa fa-search inp"></i></a>
                    </li>

                </ul>
            </div>
            <!--side menu open button-->
            <a href="javascript:void(0)" class="d-inline-block d-lg-none sidemenu_btn mr-0" id="sidemenu_toggle">
                <span class="bg-dark"></span> <span class="bg-dark"></span> <span class="bg-dark"></span>
            </a>
        </div>
    </nav>
    </div>

     <!-- side menu -->
    <div class="side-menu opacity-0 gradient-bg">
        <div class="overlay"></div>
        <div class="inner-wrapper">
            <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
            <nav class="side-nav w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link section-nav-link" href="{{ route('home') }}" target="_blank">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('expense.ministry') }}" class="nav-link">Ministry Expense</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link section-nav-link" href="{{ route('ministries') }}">Ministries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link section-nav-link" href="{{ route('contractors') }}">Contractors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link section-nav-link" href="{{ route('blogetc.index') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages2">
                            Reference <i class="fas fa-chevron-down" target="_blank"></i>
                        </a>
                        <div id="sideNavPages2" class="collapse sideNavPages">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ route('about') }}" class="nav-link">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link section-nav-link" href=""><i class="fa fa-search inp"></i></a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
    <div id="close_side_menu" class="tooltip"></div>
</header>
