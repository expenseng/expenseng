<!-------------Footer starts here-------------->


<footer>
    <div class="main-footer-wrapper">
        <div class="main-box1">
            <div class="brand-logo">
                <img src="{{asset('/images/f-expense-logo.png')}}"><br>
            </div>
            <div class="twitter">
                <img src="{{asset('/images/f-twitter-logo.png')}}">
                <a href="https://twitter.com/expenseng">@expenseng</a>
            </div>
        </div>
        <div class="main-box2">
            <div class="box1">
                <h4>Pages</h4>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('ministries') }}">Ministries</a>
                <a href="{{ route('contractors') }}">Contractors</a>
            </div>
            <div class="box2">
                <h4>Spending</h4>
                <a href="{{ route('expense.reports') }}">Expenditure Report</a>
                <a href="{{ route('expense.ministry') }}">Ministry Spending</a>
            </div>
            <div class="box3">
                <h4>About us</h4>
                <a href="{{ route('about') }}">About us</a>
                <a href="{{ route('contact') }}">Contact us</a>
            </div>
        </div>
    </div>
    <div class="last-footer">
        <ul>
            <li><a href="#">Accessibility |</a></li>
            <li><a href="#">&nbspPrivacy Policy |</a></li>
            <li><a href="#">&nbspFreedom of Information Act</a></li>
            <li class="push">
                <a href="#">&#169; 2020 EXPENSENG.com</a>
            </li>
        </ul>
    </div>
</footer>
