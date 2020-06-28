<header>
    <div class="logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/Group380.svg') }}" class="logo1" alt="logo" srcset="">
            <img src="{{ asset('img/Frame384.svg') }}" class="logo2" alt="logo" srcset="">
        </a>
    </div>  
    <a href="#"><i class="fa fa-2x fa-bars menu-toggle" id="menu" aria-hidden="true"></i></a>
    <ul class="nav " id="nav">
        <li><a href="{{ route('home') }}"class="{{Route::current()->getName() ==('home')? 'active' : ''}}">Home</a></li>
        <li><a href="{{ route('expenditure_report') }}" class="{{Route::current()->getName() == ('expenditure_report')? 'active' : ''}}">Expenditure Report</a></li>
        
        <li><a href="#">Ministry Info</a>
            <ul>
                <li><a href="{{ route('ministry_report') }}"class="">Ministry Report</a></li>
                <li><a href="{{ route('ministry_profile_search') }}"class="">Ministry Profile Search</a></li>
            </ul>
        </li>
        <li><a href="#">Company Info</a>
            <ul>
                <li><a href="{{ route('company_report') }}"class="">Company Report</a></li>
                <li><a href="{{ route('company_search') }}" class="">Comapny Profile Search</a></li>
            </ul>
        </li>
        <li><a href="#">Reference</a>
            <ul>
                <li><a href="{{ route('quick_contacts') }}"class="">Government Twitter Handles </a></li>
                <li><a href="{{ route('contact') }}"class="">Contact Us</a></li>
                <li><a href="{{ route('about_us') }}" class="">About Us</a></li>
            </ul>
        </li>
    </ul> 
</header>
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- custom script -->
<script src="{{ asset('js/app.js') }}"></script>