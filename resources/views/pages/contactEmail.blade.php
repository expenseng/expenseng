@extends('layouts.email')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap');

            *, body {
                padding: 0;
                margin: 0;
                font-weight: normal;
                background-color: #F9F9F9;
                }

            /* .inner-con{
                position: relative;
                top: 3vh;
                width: 70vw;
                margin-bottom: 5vw;
                padding-bottom: 20px;
                overflow: hidden;
                margin-left: auto;
            } */

            .low-bd {
                    height: 20vh !important
                }

            .logo-sec {
                background-color: #FFF;
                height: 100px;
                margin-top: 30px;
                padding-top: 0px;
            }

            .logo-img{
                position: relative;
                top: -18px;
            }

            .mail-img {
                margin-top: 21px;
            }

            .heading-area {
                position: relative;
                height: 258px;
                background-color: #F9F9F9;
                width: 110%;
                margin-left: -15px;

            }

            .head-text{
                text-align: center;
                font-family: Lato;
                font-style: normal;
                font-weight: bold;
                font-size: 2.3vw;
                line-height: 124.8%;
                color: #353A45;
                margin-top: 22px;
                margin-bottom: 49px;
            }

            .head-text h1{
                font-weight: bold;

            }

            .head-text h2 {
                font-size: 2rem;

            }

            .head-text, .head-text h2, .head-text h1, .mail-img {
                position: relative;
                right: 2.5%
            }

            .message-area {
                background-color: #FFFFFF;
                padding-top: 50px;
                padding-left: 40px;
                padding-right: 40px;
            }

            .message-area h3 {
                font-family: Lato;
                font-style: normal;
                font-weight: bold;
                font-size: 21px;
                line-height: 152%;
                color: #353A45;
            }

            .message-area p {
                font-family: Lato;
                font-style: normal;
                font-weight: normal;
                font-size: 20px;
                line-height: 152%;
                color: #353A45;
            }

            .em-ph p{
                color: #00945E;
            }

            .main-mess {

                margin-bottom: 132px;
            }

            button {
                padding: 20px 40px;
                width:  18.92vw;
                height: 11.8vh;
                background-color: #00945E !important;
                border: 1px solid #FFFFFF;
                box-sizing: border-box;
                box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.04), 0px 0px 2px rgba(0, 0, 0, 0.06), 0px 4px 8px rgba(0, 0, 0, 0.04);
                border-radius: 8px;
                margin-bottom: 20px;
            }

            .btn {
                font-family: Lato !important;
                font-style: normal !important;
                font-weight: bold !important;
                font-size: 24px;
                line-height: 152%;
                color: #FFFFFF !important;
            }

            .btn:active, .btn:hover, .btn:focus{
                color: #b2beb5  !important;
                box-shadow: none !important;
            }


            footer{
                background-color: #1F2430;
                height: 50px;
                text-align: center;
                padding: 15px;
                margin-top: 50px
            }

            footer span {
                font-family: Lato;
                font-style: normal;
                font-weight: normal;
                font-size: 12px;
                line-height: 14px;
                color: #FFFFFF;
            }

            .copy {
                position: relative;
                font-size: 20px;
                top: 2px;
            }



            @media screen and (max-width: 1054px) {
                .btn {
                font-family: Lato;
                font-style: normal;
                font-weight: bold;
                font-size: 1.2rem;
                line-height: 152%;
                color: #FFFFFF;
            }

            .head-text, .head-text h2, .head-text h1, .mail-img {
                position: relative;
                right: 1%
            }

            }

            @media screen and (max-width: 877px) {
                .btn {
                font-family: Lato;
                font-style: normal;
                font-weight: bold;
                font-size: 1.1rem;
                line-height: 152%;
                color: #FFFFFF;
            }


            button {
                width: 30vw;
                }

            .head-text, .head-text h2, .head-text h1, .mail-img {
                position: relative;
                right: 1%;
                font-size: 1.8rem
            }

            }

            @media screen and (max-width: 767px) {
                .low-bd {
                    height: 150vh !important
                }

            .head-text h1 {
                font-size: 1.6rem;

            }

            .head-text h2 {
                font-size: 1.4rem;

            }

            .message-area h3, .message-area p{
                font-size: 1rem
                }
            .message-area p{

                }

            button {
                width: 50vw;
                }
            }



            @media screen and (max-width: 464px) {
                .low-bd {
                    height: 120px !important
                }



                .heading-area{
                height: 33vh;
                padding-bottom: 50px;
                padding-left: 0px;
                padding-right: 0px;
                margin-bottom: 60px;

                }

                    .head-text h1{
                    font-size: 1.6rem;
                    font-weight: 800
                }
                .head-text h2{
                    font-size: 1.3rem
                }

            .head-text, .head-text h2, .head-text h1, .mail-img {
                position: relative;
                right: 1%;
                font-size: 1.8rem
            }



            }



            @media screen and (max-width: 450px) {
            .heading-area {
                position: relative;
                height: 258px;
                background-color: #F9F9F9;
                width: 115%;
                margin-left: -15px;
                text-align: center;
                margin-bottom: 10px;

            }

            .head-text h1{
                    font-size: 1.5rem
                }

            .head-text h2{
                    font-size: 1.1rem
                }
            }
            @media screen and (max-width: 370px) {
                .heading-area{
                height: 35vh;
                padding: 2px;
                padding-right: 0px;
                width: 117%;
                margin-left: -15px;
                text-align: center;
                }

                .head-text h1{
                    font-size: 1.4rem;
                    font-weight: 800;
                }
                .head-text h2{
                    position: relative;
                    font-size: 1.1rem;
                    padding: 2x;
                    margin-left: -18px;
                    left: -13px;
                    text-indent:
                }

            .head-text, .head-text h2, .head-text h1, .mail-img {
                position: relative;
                left: -2px;

            }



            button {
                width: 100vw;
                }
            .btn {
                font-size: 1rem
                }

            }

            @media screen and (max-width: 320px){

                footer {
                    height: 70px
                }

                .head-text h2{
                    position: relative;
                    font-size: .9rem;
                    margin-left: -18px;

                }

            .head-text, .head-text h2, .head-text h1, .mail-img {
                position: relative;

            }

            }
        /* </style> */
        @section('content')
        <body style=" padding: 0;
                margin: 0;
                font-weight: normal;
                background-color: #F9F9F9; font-size: calc(14px + (26 - 14) * ((100vw - 300px) / (1600 - 300)));">
        <div>
           <img src="{{ asset('/img/conbanner.png') }}" class="w-100" style="position: absolute; height: 50%; background-color: #fff !important">
        </div>
            <div class="container inner-con" style="background-color: #fff; position: relative; top: 3vh; width: 70vw; margin-bottom: 5vw; padding-bottom: 20px; overflow: hidden; margin-left: auto;">
                <div class="logo-sec d-flex justify-content-center mx-auto" style="background-color: #fff; background-color: #FFF; height: 100px; margin-top: 30px; padding-top: 0px;">
                    <img src= "{{ asset('/img/logo1.svg') }}" class="img-fluid logo-img" style="background-color: #fff; position: relative; top: -18px;">
                </div>
                <div class="heading-area justify-content-center" style="background-color: #; position: relative; height: 258px; background-color: #F9F9F9; width: 110%; margin-left: -15px;" >
                    <div class="d-flex justify-content-center">
                    <img src= "{{ asset('/img/mailer.svg') }}" class="mail-img" style="margin-top: 21px; position: relative; right: 2.5%;">
                    </div>
                    <div class="text-align-center head-text pb-5" style="position: relative; right: 2.5%; text-align: center; font-family: Lato; font-style: normal; font-weight: bold; font-size: 2.3vw; line-height: 124.8%; color: #353A45; margin-top: 22px; margin-bottom: 49px;">
                    <h1 style=" font-weight: bold; position: relative; right: 2.5%;">New Message</h1>
                    <h2 style="font-size: 2rem; position: relative; right: 2.5%;">You have a new inquiry from ExpenseNG</h2>
                    </div>
                </div>
                <div class="message-area container" style="background-color: #fff; background-color: #FFFFFF;
                padding-top: 50px;
                padding-left: 40px;
                padding-right: 40px;">
                    <h3 class="" style="background-color: #fff;   font-family: Lato;
                font-style: normal;
                font-weight: bold;
                font-size: 21px;
                line-height: 152%;
                color: #353A45;">Full Name</h3>

                    <p style="background-color: #fff; font-family: Lato;
                font-style: normal;
                font-weight: normal;
                font-size: 20px;
                line-height: 152%;
                color: #353A45;">John Doe</p>

                    <hr>

                    <div class="row em-ph" style="background-color: #fff">

                    <div class="col-sm-12 col-md-6" style="background-color: #fff">

                    <h3 style="background-color: #fff; font-family: Lato;
                font-style: normal;
                font-weight: bold;
                font-size: 21px;
                line-height: 152%;
                color: #353A45;">Email</h3>
                    <p style="background-color: #fff; font-family: Lato;
                font-style: normal;
                font-weight: normal;
                font-size: 20px;
                line-height: 152%;
                color: #353A45; color: #00945E;">johndoe@gmail.com</p>
                    <hr>
                    </div>
                    <div class="col-sm-12 col-md-6" style="background-color: #fff">
                    <h3 style="background-color: #fff;   font-family: Lato;
                font-style: normal;
                font-weight: bold;
                font-size: 21px;
                line-height: 152%;
                color: #353A45;">Phone</h3>

                    <p style="background-color: #fff; font-family: Lato;
                font-style: normal;
                font-weight: normal;
                font-size: 20px;
                line-height: 152%;
                color: #353A45; color: #00945E;">+2347035276354</p>
                    <hr>
                    </div>
                    </div>

                    <h3 style="background-color: #fff; font-family: Lato;
                font-style: normal;
                font-weight: bold;
                font-size: 21px;
                line-height: 152%;
                color: #353A45;">Subject</h3>

                    <p style="background-color: #fff; font-family: Lato;
                font-style: normal;
                font-weight: normal;
                font-size: 20px;
                line-height: 152%;
                color: #353A45;">Hello</p>
                    <hr>

                    <h3 style="background-color: #fff;   font-family: Lato;
                font-style: normal;
                font-weight: bold;
                font-size: 21px;
                line-height: 152%;
                color: #353A45;">Message</h3>

                    <p class="main-mess" style="background-color: #fff; font-family: Lato;
                font-style: normal;
                font-weight: normal;
                font-size: 20px;
                line-height: 152%;
                color: #353A45; margin-bottom: 132px;">Ullamcorper velit, eleifend at neque dictumst massa arcu lectus mi. Porttitor id morbi fusce augue. In in erat pharetra, lorem vitae. Id eget adipiscing phasellus elementum eu.</p>
                    <div class="d-flex justify-content-center" style="background-color: #fff">
                    <button type="button" class="btn mx-auto" style="background-color: #fff; padding: 20px 40px;
                width:  18.92vw;
                height: 11.8vh;
                background-color: #00945E !important;
                border: 1px solid #FFFFFF;
                box-sizing: border-box;
                box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.04), 0px 0px 2px rgba(0, 0, 0, 0.06), 0px 4px 8px rgba(0, 0, 0, 0.04);
                border-radius: 8px;
                margin-bottom: 20px;
                font-family: Lato !important;
                font-style: normal !important;
                font-weight: bold !important;
                font-size: 24px;
                line-height: 152%;
                color: #FFFFFF !important;" onMouseOver="this.style.color='#b2beb5'"
   onMouseOut="this.style.color='#FFF'">Go to admin site</button>
                    </div>
                </div>
            </div>
        <footer style="background-color: #1F2430;
                height: 50px;
                text-align: center;
                padding: 15px;
                margin-top: 50px;">
            <div style="background-color: #1F2430">
            <span class="copy" style="background-color: #1F2430; font-family: Lato;
                font-style: normal;
                font-weight: normal;
                font-size: 12px;
                line-height: 14px;
                color: #FFFFFF;
                font-size: 20px;
                top: 2px;
                position: relative;">©</span>
                <span style="background-color: #1F2430; font-family: Lato;
                font-style: normal;
                font-weight: normal;
                font-size: 12px;
                line-height: 14px;
                color: #FFFFFF;
                ">  Copyright 2020 ExpenseNG.com All rights reserved</span>
            </div>
        </footer>

    </body>

        <!-------------------------------------Bootstrap Links------------------------------------->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>
        function myFunction(x) {
            if (x.matches) { // If media query matches
                document.body.style.backgroundColor = "yellow";
            } else {
                document.body.style.backgroundColor = "pink";
            }
            }


            var x = window.matchMedia("(max-width: 700px)")
            myFunction(x) // Call listener function at run time
            x.addListener(myFunction) // Attach listener function on state change
    </script>
 @endsection
