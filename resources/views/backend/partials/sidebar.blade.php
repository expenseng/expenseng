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
          <li class="{{Route::has('company') ? 'nav-item active' : 'nav-item'}} ">
            <a class="nav-link" href="{{Route::has('company') ? '#' : route('company.view')}}">
              <i class="material-icons">content_paste</i>
              <p>Company</p>
            </a>
          </li>
          <li class="{{Route::has('ministry') ? 'nav-item active' : 'nav-item'}} ">
            <a class="nav-link" href="{{Route::has('ministry') ? '#' : route('ministry.view')}}">
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