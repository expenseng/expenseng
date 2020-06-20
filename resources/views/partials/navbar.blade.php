<header>
    <div class="logo">
        <img src="{{ asset('img/Group 380.svg') }}" class="logo1" alt="logo" srcset="">
        <img src="{{ asset('img/Frame 384.svg') }}" class="logo2" alt="logo" srcset="">
    </div>  
    <a href="#"><i class="fa fa-2x fa-bars menu-toggle" id="menu" aria-hidden="true"></i></a>
    <ul class="nav " id="nav">
        <li><a href="{{ route('home') }}"class="active">Home</a></li>
        <li><a href="ExpenditureReport.html">Expenditure Report</a></li>
        
        <li><a href="#">Ministry Info</a>
            <ul>
                <li><a href="#"class="">Ministry Report</a></li>
                <li><a href="#"class="">Ministry Profile Search</a></li>
            </ul>
        </li>
        <li><a href="#">Company Info</a>
            <ul>
                <li><a href="companyprojects.html"class="">Company Report</a></li>
                <li><a href="companyprofile.html"class="">Comapny Profile Search</a></li>
            </ul>
        </li>
        <li><a href="#">Reference</a>
            <ul>
                <li><a href="quickContacts.html"class="">Government Twitter Handles </a></li>
                <li><a href="contact.html"class="">Contact Us</a></li>
                <li><a href="#"class="">About Us</a></li>
            </ul>
        </li>
    </ul> 
</header>