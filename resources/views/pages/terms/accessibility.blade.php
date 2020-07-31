@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
<link rel="stylesheet" href="/css/modal/style.css">
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>

<title>FG Expense - Accessibility</title>
@endpush

@section('content')
<body>
<div class="container">
    {{ Breadcrumbs::render('accessibility') }}
</div>

<section class = "container py-5   accessibility-text">
    <div class="container py-3">
        <h1>Accessibility</h1>
    </div>

    <div class="container">
        <p class="py-2">
            We are committed to making <a href="https://expenseng.com">ExpenseNG.com</a> accessible to all members of the public and ensuring
            that it meets or exceeds the requirements of the Rehabilitation Act.
        </p>
        <p class = "py-2">
            To help users who are visually impaired users more easily distinguish content, we regularly test contrast and color schemes using a tool called Web Accessibility in Mind.
            To ensure the site is accessible, we evaluate the site regularly using screen readers to check the accuracy and quality of the content and navigation. We use a variety of
            other techniques to ensure that all users can easily access the site; some of these include providing methods for skipping repetitive navigation and alternate text.
        </p>
        <p class = "py-2">In addition, we've incorporated the following throughout the site:</p>

        <ul>
            <li>Text equivalents provided for non-text elements.</li>
            <li>Colored information made available without color.</li>
            <li>Documents can be read without a style sheet.</li>
            <li>Text-only versions of data appear to comply with Section 508 standards, with the exception of maps.</li>
            <li>Forms are formatted to work with assistive technology to access the information, field elements, and functionality required to complete and submit forms.</li>
        </ul>

        <p class = "py-3">
        Contact us if you have any difficulty accessing information on <a href="https://expenseng.com/contact">ExpenseNG</a>.
        </p>
    </div>
</section>
</body>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
<script src="{{asset('/js/index.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
