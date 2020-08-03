
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Confirmation</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <style>
        body{
            margin: 0px;
            background-color: #237D77;
        }
        .div2{
            margin: 30px 27px 30px 27px;
            background-color: #FFFFFF;
        }
        .div3{
            padding: 46px 0px 0px 40px;
        }
        .div4{
            padding-top: 69px;
            text-align: center;
        }
        .text{
            font-family: 'Lato', sans-serif;
            font-style: normal;
        }
        .hh1{
            font-weight: bold;
            font-size: 36px;
            line-height: 124.8%;
            text-align: center;

            color: #353A45;
        }
        .hh2{
            padding-top: 34px;
            font-weight: normal;
            font-size: 24px;
            line-height: 124.8%;
            color: #353A45;
            width: 80%;
            text-align: center;
            padding-left: 10%;
        }
        .hh3{
            font-weight: bolder;
        }
        .hh4{
            padding-top: 75px;
            font-weight: normal;
            font-size: 18px;
            line-height: 124.8%;
            color: #353A45;
            text-align: center;
        }
        .link1{
            color: #237d77c9;
        }
        .div5{
            margin-top: 115px;
            background-image: url("img/twitter\ background.png");
            width: 100%;
            height: 100%;
            background-repeat: repeat-x;
            align-items: center;
            justify-content: center;
            padding-top: 20px;
        }
        .div5{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            padding-bottom: 60px;
        }
        .div6{
            background: #FFFFFF;
            box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.04), 0px 0px 7px rgba(0, 0, 0, 0.06), 0px 4px 8px rgba(0, 0, 0, 0.04);
            border-radius: 5px;

            font-weight: normal;
            font-size: 20px;
            line-height: 24px;
            text-align: center;
            color: #55ACEE;
            padding: 16px 40px;
            border: none;
            outline: none;
        }
        .hh5{
            font-weight: 600;
            font-size: 36px;
            line-height: 124.8%;
            color: #FFFFFF;
            width: 50%;
        }
        .div7{
            width: 40%;
            padding-left: 10%;
        }

        .link2{
            text-decoration: none;
            color: inherit;
        }
        .link1:hover{
            color: #237d7780;
        }
        .link1:active{
            color: #237d77c9;
        }
        .div6:hover{
            background: #e7e7e7;
        }
        .div6:active{
            background: #FFFFFF;
        }
        .hh5:hover{
            color: #e7e7e7;
        }
        .hh5:active{
            color: #FFFFFF;
        }

        @media only screen and (max-width: 754px) {
            .div5{
                display: block;
                align-items: center;
                justify-content: center;
                text-align: center;
            }
            .div6{
            padding: 10px 20px;
            }
            .hh5{                
            font-size: 16px; width: 100%;
            }
            .div7{
                width: 100%;
                padding-left: 0px;
            }
        }

        @media only screen and (max-width: 400px) {
            .div3{
                padding-left: 15px;
            }
            .hh4{
                padding-left: 10px;
                padding-right: 10px;
            }
        }

        @media only screen and (max-width: 330px) {
            .div3{
                padding-left: 5px;
            }
            .hh1{
                font-size: 30px;
            }
        }
    </style>
</head>

<body>
    <div class="div1">
        <div class="div2">
            <div class="div3"><img src="/img/Logo.svg" alt=""></div>
            <div class="div4"><img src="/img/Emoji.png" alt=""></div>
            <h1 class="hh1 text">Dear {{$name ?? "Subcriber"}},</h1>
            <p class="hh2 text">{{$details}} <span class='hh3 text'>{{$subscription}}</span>{{$last ?? ''}}.
            @if (isset($delete) && $delete == true)
            You will no longer be receiving emails from us 
            regarding updates on the report.
            
            @else
            You will hereby be receiving emails from us 
            anytime there’s an update on the report.</p>
            @endif
            <p class="hh4 text">
                @if (!(isset($delete)) && $delete === true)
                If you didn’t request for this subscription or you want to opt-out, 
                you can <a href="#" class="link1">Unsubscribe here</a>
                @endif
            </p>
            <div class="div5">
                <div class="div7">
                    <a href="https://twitter.com/expenseng"><button class="div6"><img src="/img/twitter.png" alt="">&nbsp; @expenseng</button></a>
                </div> 
                <h2 class="hh5 text"><a href="twitter.com/expenseng" class="link2">Join the conversation on Twitter</a></h2>
            </div>
        </div>
    </div>
</body>
</html>
