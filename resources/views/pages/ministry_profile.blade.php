@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('css/about us-header_footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/contracts_awarded.css') }}">
<link rel="stylesheet" href="{{ asset('css/director_board.css') }}">
<link rel="stylesheet" href="{{ asset('css/contracts_awarded_comments.css') }}">
<link rel="stylesheet" href="{{ asset('css/ministry_profile.css') }}">


<title>FG Expense - Contracts</title>
@endpush

@section('content')
<!-- Main body start -->
<section id="main">

  <!-- Start here -->
  <!-- Section 1 -->
  <div class="section-1 container">
    <div class="navigation-links">
      <ul>
        <li>
          <a href="">HOME</a>
        </li>
        <li>
          <span>&#8226;</span>
        </li>
        <li>
          <a href="">MINISTRIES</a>
        </li>
        <li>
          <span>&#8226;</span>
        </li>
        <li>
          <a href="">MINISTRY PROFILE</a>
        </li>
      </ul>
    </div>

    <div class="user-profile">
      <div class="coat">
        <img src="{{ asset('images/image 7.png') }}" alt="">
        <h1>Ministry of Works and Human Development</h1>
    </div> <br> <br>
{{--       <h3 class="name brand-name">Julius Berger <img src="{{ asset('images/image 13.png') }}" alt="Berger logo"></h3>
 --}}      <div class="profile-overview mt-3">
        <div class="row">
          <div class="col-sm-4">
            <p class="font-weight-bold">Company twitter handle</p>
            <p><a href="" class="twitter-handle">@ministryworks</a></p>
            <p class="year">2000</p>
          </div>
          <div class="col-sm-4">
            <p class="font-weight-bold">Total amount rewarded</p>
            <p class="amount-rewarded">#38.8M</p>
            <p class="year">2000</p>
          </div>
          <div class="col-sm-4">
            <p class="font-weight-bold">Total number contracts awarded</p>
            <p class="contract-number">27</p>
            <p class="year">2000</p>
          </div>
        </div>
      </div>
    </div>

    <div class="nav content-navigator nav-tabs">
      <a href="#" class="active" data-toggle="tab" role="tab">Contract awards</a>
      <a href="#board" class="" data-toggle="tab" role="tab">Cabinet</a>
      <a href="#" class="" data-toggle="tab" role="tab">Comments</a>
    </div>
   {{--  <hr> --}}
  </div>

<!--Cabinet-->
<div class="container tab-pane fade" id="board" role="tabpanel">
  <div class="container-fluid padding"  >
    <!-- cards -->
    <div class="row padding">
      <div class="col-md-3 column">
          <div class="card">
            <img src="{{ asset('images/Rectangle 340.png') }}" alt="" class="img-fluid">
              <div class="card-body">
                  <h1 class="card-title director-name mt-2">Engr. Jafaru Damulak</h1>
                  <span class="director-title">Minister of Works</span>
                  <div class="socials d-flex justify-content-center align-items-center mt-2">
                      <a href="#"><i class="fab fa-facebook"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-linkedin"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                  </div>
              </div>
          </div>
      </div> <br> <br>
      <div class="col-md-3 column">
          <div class="card">
            <img src="{{ asset('images/Rectangle 345.png') }}" alt="" class="img-fluid">
              <div class="card-body">
                  <h1 class="card-title director-name mt-2">Alhaji Zubairu I. Bayi</h1>
                  <span class="director-title">Minister of State Works</span>
                  <div class="socials d-flex justify-content-center align-items-center mt-2">
                      <a href="#"><i class="fab fa-facebook"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-linkedin"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-3 column">
          <div class="card">
            <img src="{{ asset('images/Rectangle 346.png') }}" alt="" class="img-fluid">
              <div class="card-body">
                  <h1 class="card-title director-name mt-2">Enfr, Goni M. Shakau</h1>
                  <span class="director-title">Director, Fed. Dept. of Works</span>
                  <div class="socials d-flex justify-content-center align-items-center mt-2">
                      <a href="#"><i class="fab fa-facebook"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-linkedin"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                  </div>
              </div>
          </div>
      </div>
      {{-- <div class="col-md-3">
          <div class="card">
            <img src="{{ asset('images/row1-4.png') }}" alt="George Marks" class="img-fluid">
              <div class="card-body">
                  <h1 class="card-title director-name mt-2">George Marks</h1>
                  <span class="director-title">Vice Chairman</span>
                  <div class="socials d-flex justify-content-center align-items-center mt-2">
                      <a href="#"><i class="fab fa-facebook"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-linkedin"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                  </div>
              </div>
          </div>
      </div> --}}
  </div>
  
</div>
</div>

  <!-- Start here -->
</section>

<!-- Main body end -->
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
{{-- <script src="assets/js/main.js" type="text/javascript"></script> --}}
@endsection