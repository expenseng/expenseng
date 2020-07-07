@extends('layouts.master')
@push('css')
  <link rel="stylesheet" href="{{ asset('css/header_footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/contracts_awarded_comments.css') }}">
  <title>FG Expense - Contracts</title>
@endpush

@section('content')
  <!-- Main body start -->
  <section id="main">
    <div class="container">
      <div class="nav">
        <ul class='navbar w-75 pl-0'>
          <li class='nav-item'>
            <a class='link pl-0' href="">HOME</a>
          </li>
          <li class='nav-item'>
            <a class='link' href="">PROFILES</a>
          </li>
          <li class='nav-item'>
            <a class='link' href="">COMPANIES</a>
          </li>
          <li class='nav-item'>
            <a class='link' href="">COMPANY PROFILE</a>
          </li>
        </ul>
      </div>

      <div class="company">
        <h1 class="company-name my-5">Julius Berger
          <img src="{{ asset('images/companylogo.png') }}" alt="company-logo">
        </h1>
        <div class="d-flex justify-content-between mt-3 contract-details">
          <div class="d-flex-sm">
            <p class="header-text">Company's twitter handle</p>
            <p><a href="" class="company-twitter-handle">@JuliusBerger</a></p>
            <p class='year'>2020</p>
          </div>
          <div class="d-flex-sm">
            <p class="header-text">Total amount rewarded</p>
            <p class="total-amount">#38.8M</p>
            <p class='year'>2020</p>
          </div>
          <div class="d-flex-sm">
            <p class="header-text">Total number of contracts awarded</p>
            <p class="number-of-contracts">27</p>
            <p class='year'>2020</p>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-between w-50 section-navbar">
        <a href="" class=""> Contract awards</a>
        <a href="" class="">Board of Directors</a>
        <a href=" #comments" class="active-section">Comments</a>
      </div>
    </div>
    <hr class='mb-5'>

    <!---Comments section-->
    <section id='comments'>
      <div class="container">
        <div class="container my-4">
          <div class="card p-2">
            <div class="container">
              <div class="row">
                <div class="col-sm-1 mt-1">
                  <img src="{{ asset('images/profile-image.svg') }}" alt="">
                </div>
                <div class="col-sm-11">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                      <p class="text-green username">James Emmanuel</p>
                      <p class="ml-3 text-mute m-0"><span class='time'>2mins ago</span></p>
                    </div>
                    <i class="fa fa-ellipsis-h ellipsis"></i>
                  </div>
                  <div>
                    <p class='comments'>This is so nice to read, I can see the improvement in this sector this is
                      really
                      encouraging . Kudos !!!</p>
                  </div>
                  <div class="d-flex text-center align-items-center my-2">
                    <span class="d-flex align-items-center mr-5"><i class="far fa-thumbs-up  mr-2"></i>
                      <p class="m-0">23</p>
                    </span>
                    <span class="d-flex align-items-center mr-5"><i class="far fa-thumbs-down mr-2"></i>
                      <p class="m-0">0</p>
                    </span>
                    <span class="d-flex align-items-center mr-5"><i class="far fa-comment mr-2"></i>
                      <p class="m-0">Reply</p>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="container my-4">
          <div class="card p-2">
            <div class="container">
              <div class="row">
                <div class="col-sm-1 mt-1">
                  <img src="{{ asset('images/profile-image.svg') }}" alt="">
                </div>
                <div class="col-sm-11">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                      <p class="text-green username">James Emmanuel</p>
                      <p class="ml-3 text-mute m-0"><span class='time'>2mins ago</span></p>
                    </div>
                    <i class="fa fa-ellipsis-h ellipsis"></i>
                  </div>
                  <div>
                    <p class='comments'>This is so nice to read, I can see the improvement in this sector this is
                      really
                      encouraging . Kudos !!!</p>
                  </div>
                  <div class="d-flex text-center align-items-center my-2">
                    <span class="d-flex align-items-center mr-5"><i class="far fa-thumbs-up mr-2"></i>
                      <p class="m-0">23</p>
                    </span>
                    <span class="d-flex align-items-center mr-5"><i class="far fa-thumbs-down mr-2"></i>
                      <p class="m-0">0</p>
                    </span>
                    <span class="d-flex align-items-center mr-5"><i class="far fa-comment mr-2"></i>
                      <p class="m-0">Reply</p>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container my-4">
          <div class="card p-2">
            <div class="container">
              <div class="row">
                <div class="col-sm-1 mt-1">
                  <img src="{{ asset('images/profile-image.svg') }}" alt="">
                </div>
                <div class="col-sm-11">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                      <p class="text-green username">James Emmanuel</p>
                      <p class="ml-3 text-mute m-0"><span class='time'>2mins ago</span></p>
                    </div>
                    <i class="fa fa-ellipsis-h ellipsis"></i>
                  </div>
                  <div>
                    <p class='comments'>This is so nice to read, I can see the improvement in this sector this is
                      really
                      encouraging . Kudos !!!</p>
                  </div>
                  <div class="d-flex text-center align-items-center my-2">
                    <span class="d-flex align-items-center mr-5"><i class="far fa-thumbs-up mr-2"></i>
                      <p class="m-0">23</p>
                    </span>
                    <span class="d-flex align-items-center mr-5"><i class="far fa-thumbs-down mr-2"></i>
                      <p class="m-0">0</p>
                    </span>
                    <span class="d-flex align-items-center mr-5"><i class="far fa-comment mr-2"></i>
                      <p class="m-0">Reply</p>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!---Reply to a comment-->
            <div class="reply mt-3">
              <div class='mx-auto w-75'>
                <div class="col-sm-1 mt-1">
                  <img src="{{ assets('img/profile-image.svg') }}" alt="">
                </div>
                <div class="col-sm-11">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                      <p class="text-green username">James Emmanuel</p>
                      <p class="ml-3 text-mute m-0"><span class='time'>2mins ago</span></p>
                    </div>
                  </div>
                  <div>
                    <p class='comments'>This is so nice to read, I can see the improvement in this sector this is
                      really
                      encouraging . Kudos !!!</p>
                  </div>
                  <div class="d-flex text-center align-items-center my-2">
                    <span class="d-flex align-items-center mr-5"><i class="far fa-thumbs-up mr-2"></i>
                      <p class="m-0">23</p>
                    </span>
                    <span class="d-flex align-items-center mr-5"><i class="far fa-thumbs-down mr-2"></i>
                      <p class="m-0">0</p>
                    </span>
                    <span class="d-flex align-items-center mr-5"><i class="far fa-comment mr-2"></i>
                      <p class="m-0">Reply</p>
                    </span>
                  </div>
                </div>
              </div>

            </div>


          </div>
          <div class="input-group input-group-lg my-5 ">
            <input type="text" class="form-control px-4" placeholder="Write a Comment " id='comment' name='comment'>
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
@endsection