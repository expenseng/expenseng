@extends('layouts.email')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/contactEmail.css')}}">
@endpush
        @section('content')
        <div>
           <img src="{{ asset('/img/conbanner.png') }}" class="w-100" style="position: absolute; height: 50%; background-color: #fff !important">
        </div>
            <div class="container inner-con" style="background-color: #fff">
                <div class="logo-sec d-flex justify-content-center mx-auto" style="background-color: #fff">
                    <img src= "{{ asset('/img/logo1.svg') }}" class="img-fluid logo-img" style="background-color: #fff">
                </div>
                <div class="heading-area justify-content-center" style="background-color: #" >
                    <div class="d-flex justify-content-center">
                    <img src= "{{ asset('/img/mailer.svg') }}" class="mail-img">
                    </div>
                    <div class="text-align-center head-text pb-5">
                    <h1>New Message</h1>
                    <h2>You have a new inquiry from ExpenseNG</h2>
                    </div>
                </div>
                <div class="message-area container" style="background-color: #fff">
                    <h3 class="" style="background-color: #fff">Full Name</h3>
                    <p style="background-color: #fff">John Doe</p>
                    <hr>
                    <div class="row em-ph" style="background-color: #fff">
                    <div class="col-sm-12 col-md-6" style="background-color: #fff">
                    <h3 style="background-color: #fff">Email</h3>
                    <p style="background-color: #fff">johndoe@gmail.com</p>
                    <hr>
                    </div>
                    <div class="col-sm-12 col-md-6" style="background-color: #fff">
                    <h3 style="background-color: #fff">Phone</h3>
                    <p style="background-color: #fff">+2347035276354</p>
                    <hr>
                    </div>
                    </div>

                    <h3 style="background-color: #fff">Subject</h3>
                    <p style="background-color: #fff">Hello</p>
                    <hr>

                    <h3 style="background-color: #fff">Message</h3>
                    <p class="main-mess" style="background-color: #fff">Ullamcorper velit, eleifend at neque dictumst massa arcu lectus mi. Porttitor id morbi fusce augue. In in erat pharetra, lorem vitae. Id eget adipiscing phasellus elementum eu.</p>
                    <div class="d-flex justify-content-center" style="background-color: #fff">
                    <button type="button" class="btn mx-auto" style="background-color: #fff">Go to admin site</button>
                    </div>
                </div>
            </div>
        <footer>
            <div style="background-color: #1F2430">
            <span class="copy" style="background-color: #1F2430">©</span><span style="background-color: #1F2430">  Copyright 2020 ExpenseNG.com All rights reserved</span>
            </div>
        </footer>

    </body>

        <!-------------------------------------Bootstrap Links------------------------------------->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
 @endsection
