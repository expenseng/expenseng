<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="{{Route::is('dashboard')? '#' :route('dashboard')}}" class="simple-text logo-normal">
        ExpenseNG
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class=" {{Route::is('dashboard')? 'nav-item active' : 'nav-item '}}  ">
            <a class="nav-link" href="{{Route::is('dashboard')? '#' :route('dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#"> <!--/*Route::is('profile')? '#' :route('profile')*/-->
              <i class="material-icons">account_circle</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="{{Route::is('company.view') || Route::is('company.create') || Route::is('company.edit') 
          ? 'nav-item active' : 'nav-item'}} ">
            <a class="nav-link" href="{{Route::is('company.view') || Route::is('company.create') || Route::is('company.edit') ? '#' : route('company.view')}}">
              <i class="material-icons">content_paste</i>
              <p>Company</p>
            </a>
          </li>
          <li class="{{Route::is('ministry.view') || Route::is('ministry.create') || Route::is('ministry.edit')
           ? 'nav-item active' : 'nav-item'}} ">
            <a class="nav-link" href="{{Route::is('ministry.view') || Route::is('ministry.create') || Route::is('ministry.edit')
             ? '#' : route('ministry.view')}}">
              <i class="material-icons">library_books</i>
              <p>Ministry</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">bubble_chart</i>
              <p>Expenses</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">create_new_folder</i>
              <p>Cabinet</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">persons</i>
              <p>People</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">note_add</i>
              <p>Upload Spreadsheet</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="#">
              <i class="material-icons">unarchive</i>
              <p>Comments</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

 <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="{{Route::has('/admin/dashbord')? 'nav-link active': 'nav-link'}}"  href="{{route('dashboard')}}"  data-target="#submenu-1" aria-controls="submenu-1">
                                    <i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                    
                        
                            </li>
                            <li class="nav-item">
                                <a class="{{Route::is('company.create') || Route::is('company.view')? 'nav-link active': 'nav-link'}}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Company</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('company.create')}}">Create Company <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('company.view')}}">View Companies</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="{{Route::is('ministry.create') || Route::is('ministry.view')? 'nav-link active': 'nav-link'}}" href="#" 
                                data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">
                                <i class="fa fa-fw fa-folder"></i>Ministry</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('ministry.create')}}">Create Ministry <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('ministry.view')}}">View Ministries</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="{{Route::is('expenses.new') || Route::is('expenses.view')? 'nav-link active': 'nav-link'}}" href="#" 
                                data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4">
                                <i class="fa fa-fw fa-book"></i>Expense</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('expenses.create')}}">Create Expense <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('expenses.view')}}">View Expenses <span class="badge badge-secondary">New</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="{{Route::is('expenses.new') || Route::is('expenses.view')? 'nav-link active': 'nav-link'}}" href="#"
                                data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5">
                                <i class="fa fa-fw fa-user"></i>Users</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('users.create')}}">Create User <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('users.view')}}">View Users <span class="badge badge-secondary">View</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!--
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Chart</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/chart-c3.html">C3 Charts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/chart-chartist.html">Chartist Charts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/chart-charts.html">Chart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/chart-morris.html">Morris</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/chart-sparkline.html">Sparkline</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/chart-gauge.html">Guage</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Forms</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/form-elements.html">Form Elements</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/form-validation.html">Parsely Validations</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/multiselect.html">Multiselect</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/datepicker.html">Date Picker</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/bootstrap-select.html">Bootstrap Select</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Tables</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/general-table.html">General Tables</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/data-tables.html">Data Tables</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-divider">
                                Features
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Pages </a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/blank-page.html">Blank Page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/blank-page-header.html">Blank Page Header</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/login.html">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/404-page.html">404 page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/sign-up.html">Sign up Page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/forgot-password.html">Forgot Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/pricing.html">Pricing Tables</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/timeline.html">Timeline</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/calendar.html">Calendar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/sortable-nestable-lists.html">Sortable/Nestable List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/widgets.html">Widgets</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/media-object.html">Media Objects</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/cropper-image.html">Cropper</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/color-picker.html">Color Picker</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Apps <span class="badge badge-secondary">New</span></a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/inbox.html">Inbox</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/email-details.html">Email Detail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/email-compose.html">Email Compose</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/message-chat.html">Message Chat</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-columns"></i>Icons</a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/icon-fontawesome.html">FontAwesome Icons</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/icon-material.html">Material Icons</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/icon-simple-lineicon.html">Simpleline Icon</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/icon-themify.html">Themify Icon</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/icon-flag.html">Flag Icons</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Weather Icon</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-fw fa-map-marker-alt"></i>Maps</a>
                                <div id="submenu-9" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Google Maps</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Vector Maps</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-f fa-folder"></i>Menu Level</a>
                                <div id="submenu-10" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Level 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11">Level 2</a>
                                            <div id="submenu-11" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Level 1</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Level 2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Level 3</a>
                                        </li>
                                    </ul>
                                </div>-->
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar --> 

