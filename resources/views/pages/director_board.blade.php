@extends('layouts.master')
@section('css')
  <title>FG Expense - Contact</title>
  <link rel="stylesheet" href="{{asset('css/about us-header_footer.css')}}">
  <link rel="stylesheet" href="{{ asset('css/director_board.css')}}">
@endsection

@section('content')
    
    <!--Main Section Start-->    
    
<div class="hero">
    <a href="#" class="hero-link">Home</a>
    <a href="#" class="hero-link">Contractors</a>
    <a href="#" class="hero-link">Company Profile</a>
</div>

<div class="berger d-flex mt-5">
    <h1 class="berger-name">Julius Berger</h1>
    <span class="pl-2"><img src="{{asset('images/bergerLogo.png')}}" alt="Berger logo"></span>
</div>

<!--Company Information-->
<div class="company-info d-flex justify-content-between mt-2">
    <div class="info d-flex flex-column justify-content-between align-items-start">
        <span class="firstSpan">Company Twitter Handle</span>
        <span class="secondSpan mt-3">@juliusBerger0</span>
        <span class="small mt-2">2020</span>
    </div>


    <div class="info d-flex flex-column justify-content-between align-items-start">
        <span class="firstSpan">Total amount awarded</span>
        <span class="colored mt-3">#38.8&nbsp;M</span>
        <span class="small mt-2">2020</span>
    </div>


    <div class="info d-flex flex-column justify-content-between align-items-start">
        <span class="firstSpan">Total number of contracts awarded</span>
        <span class="colored mt-3">27</span>
        <span class="small mt-2">2020</span>
    </div>

   
</div>


<!--Board of directors Intro-->
<div class="board-intro mt-5">
    <a href="./contracts_awarded/contracts_awarded.html" class="board-link">Contract Awards</a>
    <a href="director_board.html" class="board-link pl-5">Board of Directors</a>
    <a href="#" class="board-link pl-5">Comments</a>
</div>

<!--Board of Directors-->
<!--Row 1 Board-->
<div class="row mt-5">
    <!--Row 1 column 1-->
    <div class="col-lg-3 director-info d-flex flex-column justify-content-between align-items-center text-center">
        <img src="{{asset('images/row1-1.png')}}" alt="Mutiu Sunmonu" class="img-fluid">
        <h1 class="director-name mt-2">Mutiu Sunmonu</h1>
        <span class="director-title">Chairman of the board</span>
        <div class="socials d-flex justify-content-center align-items-center mt-2">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

     <!--Row 1 column 2-->
     <div class="col-lg-3 director-info d-flex flex-column justify-content-between align-items-center text-center">
        <img src="{{asset('images/row1-2.png')}}" alt="Engr. Dr.Lars Richter" class="img-fluid">
        <h1 class="director-name mt-2">Engr. Dr.Lars Richter</h1>
        <span class="director-title">Managing Director</span>
        <div class="socials d-flex justify-content-center align-items-center mt-2">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

     <!--Row 1 column 3-->
     <div class="col-lg-3 director-info d-flex flex-column justify-content-between align-items-center text-center">
        <img src="{{asset('images/row1-2.png')}}" alt="Martin Brack" class="img-fluid">
        <h1 class="director-name mt-2">Martin Brack</h1>
        <span class="director-title">Financial Director</span>
        <div class="socials d-flex justify-content-center align-items-center mt-2">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

  <!--Row 1 column 4-->
  <div class="col-lg-3 director-info d-flex flex-column justify-content-between align-items-center text-center">
    <img src="{{asset('images/row1-4.png')}}" alt="George Marks" class="img-fluid">
    <h1 class="director-name mt-2">George Marks</h1>
    <span class="director-title">Vice Chairman</span>
    <div class="socials d-flex justify-content-center align-items-center mt-2">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
    </div>

</div>



<!--Row 2 Board-->
<div class="row mt-5">
    <!--Row 1 column 1-->
    <div class="col-lg-3 director-info d-flex flex-column justify-content-between align-items-center text-center">
        <img src="{{asset('images/row2-1.png')}}" alt="Ernest Chukwudi Ebi" class="img-fluid">
        <h1 class="director-name mt-2">Ernest Chukwudi Ebi</h1>
        <span class="director-title">Independent Director</span>
        <div class="socials d-flex justify-content-center align-items-center mt-2">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

     <!--Row 1 column 2-->
     <div class="col-lg-3 director-info d-flex flex-column justify-content-between align-items-center text-center">
        <img src="{{asset('images/row2-2.png')}}" alt="Belinda Ajoke Disu" class="img-fluid">
        <h1 class="director-name mt-2">Belinda Ajoke Disu</h1>
        <span class="director-title">Non-executive Director</span>
        <div class="socials d-flex justify-content-center align-items-center mt-2">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

     <!--Row 1 column 3-->
     <div class="col-lg-3 director-info d-flex flex-column justify-content-between align-items-center text-center">
        <img src="{{asset('images/row2-3.png')}}" alt="Dr. Ernest N. Azudialu" class="img-fluid">
        <h1 class="director-name mt-2">Dr. Ernest N. Azudialu</h1>
        <span class="director-title">Non-executive Director</span>
        <div class="socials d-flex justify-content-center align-items-center mt-2">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

  <!--Row 1 column 4-->
  <div class="col-lg-3 director-info d-flex flex-column justify-content-between align-items-center text-center">
    <img src="{{asset('images/row2-4.png')}}" alt="Tobias Meletschus" class="img-fluid">
    <h1 class="director-name mt-2">Tobias Meletschus</h1>
    <span class="director-title">Director Corporate Development</span>
    <div class="socials d-flex justify-content-center align-items-center mt-2">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
    </div>

</div>



<!--Row 3 Board-->
<div class="row mt-5">
    <!--Row 3 column 1-->
    <div class="col-lg-3 director-info d-flex flex-column justify-content-between align-items-center text-center">
        <img src="{{asset('images/row3-1.png')}}" alt="Alhaji Zubairu I. Bayi" class="img-fluid">
        <h1 class="director-name mt-2">Alhaji Zubairu I. Bayi</h1>
        <span class="director-title">Director Administration</span>
        <div class="socials d-flex justify-content-center align-items-center mt-2">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

     <!--Row 1 column 2-->
     <div class="col-lg-3 director-info d-flex flex-column justify-content-between align-items-center text-center">
        <img src="{{asset('images/row3-2.png')}}" alt="Karsten Hensel" class="img-fluid">
        <h1 class="director-name mt-2">Karsten Hensel</h1>
        <span class="director-title">Non-executive Director</span>
        <div class="socials d-flex justify-content-center align-items-center mt-2">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

     <!--Row 1 column 3-->
     <div class="col-lg-3 director-info d-flex flex-column justify-content-between align-items-center text-center">
        <img src="{{asset('images/row3-3.png')}}" alt="Gladys O.Talabi" class="img-fluid">
        <h1 class="director-name mt-2">Gladys O.Talabi</h1>
        <span class="director-title">Non-executive Director</span>
        <div class="socials d-flex justify-content-center align-items-center mt-2">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

  <!--Row 1 column 4-->
  <div class="col-lg-3 director-info d-flex flex-column justify-content-between align-items-center text-center">
    <img src="{{asset('images/row3-4.png')}}" alt="Engr. Gomi M.Sheikh" class="img-fluid">
    <h1 class="director-name mt-2">Engr. Gomi M.Sheikh</h1>
    <span class="director-title">Non-executive Director</span>
    <div class="socials d-flex justify-content-center align-items-center mt-2">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
    </div>

</div>
    

<div class="row mt-5">
    <!--Row 4 column 1-->
    <div class="col-sm-12 col-lg-3 director-info d-flex flex-column justify-content-between align-items-center text-center">
        <img src="{{asset('images/row4-1.png')}}" alt="Engr.Jafaru Damulak" class="img-fluid">
        <h1 class="director-name mt-2">Engr.Jafaru Damulak</h1>
        <span class="director-title">Non-executive Director</span>
        <div class="socials d-flex justify-content-center align-items-center mt-2">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    </div>


<!--Main section end-->
@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection