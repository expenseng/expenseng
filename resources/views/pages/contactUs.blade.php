@extends('layouts.master')
@push('css')
  <title>FG Expense - Contact</title>
  <link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
  <link rel="stylesheet" href="{{ asset('css/contactUs.css') }}">
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
    <!-- Banner Starts -->
    <section class="container">
    {{ Breadcrumbs::render('contact') }}
    {{-- Flash message --}}
        <div id="alert">
        @include('backend.partials.flash')
        </div>
    {{-- Flash message end --}}
      <div class="row" id="banner">
        <div class="col-md-6">
          <h1>Connect with us today</h1>
          <p>You can contact us via mail, calls or any of our social media accounts. We’d be happy to respond!</p>
        </div>
      </div>
    </section>

    <!-- Banner Ends -->


    <!-- Form and side banner Starts -->

    <article class="container contact">
        <div class="row">
          <div class="col-md-6">
            <h2 align="left">Contact Form</h2>
            <p>Fill the Form below and we will get back to you.</p>
            <form action="{{URL(route('sendmail'))}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group col-md-12">
                    <input type="text"  name="name" class="form-control" id="name" placeholder="Full name" required>
                </div>
                <div class="form-group col-md-12 second">
                    <input type="email" name="email" class="form-control col-md-5" id="email" placeholder="Email Address" required>

                    <input type="tel" name="phone" class="form-control col-md-5" id="phone" placeholder="Phone number">
                </div>
                <div class="form-group col-md-12">
                    <input type="text"  name="subject" class="form-control" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group col-md-12">
                    <textarea type="text" class="form-control" id="message" name="message" placeholder="Your message" rows="5" required></textarea>
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-success" name="submitbut" id="submitbut">Send to us</button>
                </div>
            </form>
          </div>
          <div class="col-md-6">
            <aside class="banner contact-green">
                <h4 class="pt-3">Keep in touch with us</h4>
                <hr class="banner-hr">
     
                <div class="row">
                    <div class="align col-sm-4">
                        <span class="fa-stack fa-sm">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-envelope fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="align col-sm-8 text-left">
                        <p>info@ExpenseNG.com</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="align col-sm-4">
                        <span class="fa-stack fa-sm">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="align col-sm-8 text-left">
                        <p>@ExpenseNG</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="align col-sm-4">
                        <span class="fa-stack fa-sm">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="align col-sm-8 text-left">
                        <p>ExpenseNG</p>
                    </div>
                </div>
            </aside>
          </div>
        </div>
    </article>

    <!-- Form and side banner Ends -->

    <!-- End banner begins -->

    <article class="greenify">
        <div class="row">
            <aside class="col-md-7">
                <img class="twitter-back" src="{{ asset('/images/Vector.png') }}" alt="twitter background">
                <button class="button button-tw"> <a href="https://twitter.com/expenseng" target="_blank">@expenseNG</a></button>
            </aside>
            <aside class="col-md-5">
                <h2 class="pt-5 pb-4 mb-5">Join the conversation</h2>
                <p>We want to know how we can serve you better. Drop by our community page to ask questions, propose new features, sign up for testing, and join the conversation about federal spending data.</p>
            </aside>
        </div>
    </article>

    <!-- End banner ends -->
@endsection

@section('js')
  <script src="{{ asset('js/index.js') }}"></script>
@endsection
