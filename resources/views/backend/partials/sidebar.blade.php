
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('img/Frame 390.png')}}">
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
          @can('manage-user')
          <li class="{{Route::is('users.view') || Route::is('users.create') || Route::is('users.edit')
          ? 'nav-item active' : 'nav-item'}} ">
            <a class="nav-link" href="{{Route::is('users.view') || Route::is('users.create') || Route::is('users.edit') ? '#' : route('users.view')}}">
              <i class="material-icons">persons</i>
              <p>Users</p>
            </a>
          </li>
          @endcan
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
          <li class="{{Route::is('expenses.view') || Route::is('expenses.create') || Route::is('expenses.edit')
          ? 'nav-item active' : 'nav-item'}} ">
            <a class="nav-link" href="{{Route::is('expenses.view') || Route::is('expenses.create') || Route::is('expenses.edit') ? '#' : route('expenses.view')}}">
              <i class="material-icons">bubble_chart</i>
              <p>Expenses</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="{{Route::is('subscribe')}}">
              <i class="material-icons">supervisor_account</i>
              <p>Subcriptions</p>
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
              <i class="material-icons">supervisor_account</i>
              <p>People</p>
            </a>
          </li>
          <!-- <li class="nav-item "> -->
          <li class="{{Route::is('importExcel')
          ? 'nav-item active' : 'nav-item'}} ">
            <!-- <a class="nav-link" href="#">
             -->
            <a class="nav-link" href="{{Route::is('importExcel')? '#' :route('importExcel')}}">

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
