@extends('layouts.master')
@section('css')
  <title>FG Expense - Contact</title>
  <link rel="stylesheet" href="{{asset('css/about us-header_footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/contactUs.css') }}">
@endsection

@section('content')

    <!-- Banner Starts -->

    <section class="container">
      <div class="row" id="banner">
        <div class="col-md-6">
          <h1>Connect with us today</h1>
          <p>You can contact us via mail, calls or any of our social media accounts. We’d be happy to respond!</p>
        </div>
      </div>
    </section>

    <!-- Banner Ends -->


    <!-- Form and side banner Starts -->

    <article class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 style="color: rgba(0, 148, 94, 0.67);">Contact Form</h2>
            <p>Fill the Form below and we will get back to you.</p>
            <input type="text" placeholder="Full Name" class="form-control">
            <input type="email" placeholder="Email Address" class="form-control">
            <textarea placeholder="Write Your Message here..." cols="20" rows="10" class="form-control"></textarea>
            <button class="btn btn-success">Send to us</button>
          </div>
          <div class="col-md-6">
            <aside class="banner">
                <h4 class="pt-3">Keep in touch with us</h4>
                <hr>
                <div class="row">
                    <div class="align col-sm-4">
                        <span class="fa-stack fa-sm">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="align col-sm-8">
                        <p>Plot 234, Bowo Avenue,</p>
                        <p>Victoria Island,</p>
                        <p>Lagos, Nigeria.</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="align col-sm-4">
                        <span class="fa-stack fa-sm">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-phone fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="align col-sm-8">
                        <p>+234 904 234 5678</p>
                        <p>+234 904 234 5678</p>
                        <p>+234 904 234 5678</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="align col-sm-4">
                        <span class="fa-stack fa-sm">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-envelope fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="align col-sm-8">
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
                    <div class="align col-sm-8">
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
                    <div class="align col-sm-8">
                        <p>ExpenseNG</p>
                    </div>
                </div>
            </aside>
          </div>
        </div>
    </article>

    <!-- Form and side banner Ends -->

    <!-- End banner begins -->

    <article class="greenify container">
        <div class="row">
            <aside class="col-md-7">
                <img class="twitter-back" src="{{ asset('/images/Vector.png') }}" alt="twitter background">
                <button class="button"><i class="fab fa-twitter"></i> @ExpenseNG</button>
            </aside>
            <aside class="col-md-5">
                <h2 class="pt-5 pb-4">Join the conversation</h2>
                <p>We want to know how we can serve you better. Drop by our community page to ask questions, propose new features, sign up for testing, and join the conversation about federal spending data.</p>
            </aside>
        </div>
    </article>

    <!-- End banner ends -->
@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/index.js') }}"></script>
@endsection