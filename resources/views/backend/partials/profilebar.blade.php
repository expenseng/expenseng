
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

          <li class=" {{Route::is('home')? 'nav-item active' : 'nav-item '}}  ">
            <a class="nav-link" href="{{Route::is('home')? '#' :route('home')}}">
              <i class="material-icons">home</i>
              <p>Homepage</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
