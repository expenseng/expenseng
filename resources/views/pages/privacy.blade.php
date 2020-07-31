@extends('layouts.master')

@push('css')
  <link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
  <link rel="stylesheet" href="{{asset('css/privacy.css') }}">
  <title>FG Expense - privacy policy</title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>

@endpush

@section('content')
    <div class="container">
        {{ Breadcrumbs::render('privacy') }}
        <h1>Privacy Policy</h1>

        <h3>Collection and disclosure of information</h3>
        <p> The site collects personal information (e.g., names, email addresses, telephone numbers) only from those individuals who share this information with us. You are not required to provide personal information to visit ExpenseNG.com. If you choose to provide us with this information through an email, form, or survey, we maintain the information only as long as necessary to respond to your question or to fulfill the stated purpose of the communication. It is our general policy not to make personal information available to anyone other than our employees, staff, and agents. We want to make it clear that we will not obtain personal information (e.g., names, email addresses, telephone numbers) about you when you visit our site unless you choose to provide such information to us.</p>
        <h3>Information collected and stored automatically</h3>
        <p>When you browse, read pages, or download information, the site gathers and stores certain technical information about your visit:</p>
        <ul>
            <li>The internet domain (for example, "xcompany.com" if you use a private internet access account, or "yourschool.edu" if you connect from a university's domain) and IP address (an IP address is a number that's automatically assigned to your computer whenever you're online) from which you access ExpenseNG.com
            </li>
            <li>The browser (e.g., Firefox, Safari, or Internet Explorer) and operating system (e.g., Windows, Mac, Unix) you used to access our site
            </li>
            <li>The date and time you visit the site</li>
            <li>The pages you visit</li>
            <li>The date and time you visit the site</li>
            <li>If you linked to USASpending.gov from another website, the address of that website</li>
        </ul>
        <p>We gather this information to help make the site more useful for all visitors. We never track or record information about individuals and their visits.</p>
        <h3> Cookies</h3>
        <p>When you visit the site, its server may generate a piece of text known as a cookie to place on your computer. The cookie allows the server to "remember" specific information about your visit, and makes it easier for you to use the site's dynamic features. Requests to send cookies from the site's pages are designed to collect information about your browser session only; they do not collect personal information about you.</p>

        <p>There are two types of cookies: single session (temporary) and multi-session (persistent). Session cookies last only as long as your browser is open. Once you close your browser, the cookie disappears. Persistent cookies are stored on your computer for longer periods.</p>

        <p>The site uses session cookies for technical purposes, such as improving site navigation. These cookies let us know whether you continue to visit our site. Session cookies are not permanently stored on your computer; the cookie and the information about your visit are automatically destroyed shortly after you close your browser and end the session.</p>

        <p>The site uses persistent cookies to help us recognize new and returning visitors. Persistent cookies remain on your computer until they expire. We do not use this technology to identify you or any other individual site visitor.</p>

        <p>If you do not wish to have session or persistent cookies placed on your computer, you can disable them within your browser. If you disable cookies, you will still have access to all the information and resources ExpenseNG.com provides.</p>

        <p>If you'd like to disable cookies, use these instructions provided by usa.gov; these instructions cover most popular browsers. Please note that by following the instructions to opt out of cookies, you will disable cookies from all sources, not just those from this site.        </p>

        <h3> Security</h3>
        <p>The site maintains a variety of physical, electronic, and procedural safeguards to protect personal information - for example, commercially reasonable tools and techniques to protect against unauthorized access to the site's systems. Personal Information is restricted to those who need such access in the course of their duties.</p>

        <h3> Linking</h3>
        <p>The site may contain links to websites created and maintained by other public and/or private organizations. The site provides these links as a service to our users. When users link to an outside website, they are leaving the site and are subject to the privacy and security policies of the owners/sponsors of the outside website(s).</p>

        <h3> Ch
anges to this policy</h3>
        <p>As practices change, this policy may change, as well. Changes to the policy shall not apply retroactively.</p>
    </div>

    @endsection
    @section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
    <script src="{{asset('/js/index.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @endsection
