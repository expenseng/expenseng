
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('img/Frame 390.png')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="{{url('/')}}" class="simple-text logo-normal">
        ExpenseNG
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
            
          <li class=' {{Route::is('dashboard')? 'nav-item active' : 'nav-item '}}  ''>
            <a class='nav-link' href='{{Route::is('dashboard')? '#' :route('dashboard')}}'>
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

          <li class="{{Route::is('payments.view') || Route::is('payments.create') || Route::is('payments.edit')
          ? 'nav-item active' : 'nav-item'}} ">
            <a class="nav-link" href="{{route('payments.view')}}">
              <i class="material-icons">money</i>
              <p>Payments</p>
            </a>
          </li>

          <li class="{{Route::is('cabinet.view') || Route::is('cabinet.create') || Route::is('cabinet.edit')
           ? 'nav-item active' : 'nav-item'}}  ">
            <a class="nav-link" href="{{route('cabinet.view')}}">
              <i class="material-icons">create_new_folder</i>
              <p>Cabinet</p>
            </a>
          </li>

          <li class="{{Route::is('sector.view') || Route::is('sector.create') || Route::is('sector.edit')
           ? 'nav-item active' : 'nav-item'}} ">
            <a class="nav-link" href="{{Route::is('sector.view') || Route::is('sector.create') || Route::is('sector.edit')
             ? '#' : route('sector.view')}}">
              <i class="material-icons">work</i>
              <p>Sector</p>
            </a>
          </li>

          <li class="{{Route::is('team.view') || Route::is('team.create') || Route::is('team.edit')
           ? 'nav-item active' : 'nav-item'}}  ">
            <a class="nav-link" href="{{route('team.view')}}">
              <i class="material-icons">people</i>
              <p>Teams</p>
            </a>
          </li>

          <li class="{{Route::is('subscribe.view') || Route::is('subscribe.create') || Route::is('subscribe.edit')
           ? 'nav-item active' : 'nav-item'}} ">
            <a class="nav-link" href="{{Route::is('subscribe.view')? '#' :route('subscribe.view')}}">
              <i class="material-icons">star_outline</i>
              <p>Subcriptions</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">supervisor_account</i>
              <p>People</p>
            </a>
          </li>

          <li class="{{Route::is('importExcel')
          ? 'nav-item active' : 'nav-item'}} ">
            <a class="nav-link" href="{{Route::is('importExcel')? '#' :route('importExcel')}}">

            <i class="material-icons">note_add</i>
              <p>Upload Spreadsheet</p>
            </a>
          </li>

           <li class='{{Route::is('blogetc.admin.index')
          ? 'nav-item active' : 'nav-item'}} '>
            <a class="nav-link" href="{{ route('blogetc.admin.index') }}">
              <i class="material-icons">Blog</i>
              <p>Blog</p>
            </a>
          </li>


          <li class="{{Route::is('comments')
          ? 'nav-item active' : 'nav-item'}} ">
            <a class="nav-link" href="{{route('comments')}}">
              <i class="material-icons">comment</i>
              <p>Comments</p>
            </a>
          </li>


          <li class="{{Route::is('sheets')? 'active nav-item' : 'nav-item' }}">
          <a class="nav-link" href="{{route('sheets')}}">
          <i class="material-icons">attachment</i>
              <p>Sheets</p>
          </a>
          </li>

            <li class="{{Route::is('website_stats')? 'active nav-item' : 'nav-item' }}">
          <a class="nav-link" href="{{route('website_stats')}}">
          <i class="material-icons">assessment</i>
              <p>Website Statistics</p>
          </a>
          </li>

        </ul>
      </div>
    </div>
