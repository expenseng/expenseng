@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ asset('css/about us-header_footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/contracts_awarded.css') }}">
<title>FG Expense - Contracts</title>
@endsection

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
          <a href="">PROFILES</a>
        </li>
        <li>
          <span>&#8226;</span>
        </li>
        <li>
          <a href="">COMPANIES</a>
        </li>
        <li>
          <span>&#8226;</span>
        </li>
        <li>
          <a href="">COMPANY PROFILE</a>
        </li>
      </ul>
    </div>

    <div class="user-profile">
      <h3 class="name">Julius Berger
        <img src="{{ asset('images/image 13.png') }}" alt="">
      </h3>
      <div class="profile-overview mt-3">
        <div class="row">
          <div class="col-sm-4">
            <p class="font-weight-bold">Company twitter handle</p>
            <p><a href="" class="twitter-handle">@JuliusBerger</a></p>
            <p>2000</p>
          </div>
          <div class="col-sm-4">
            <p class="font-weight-bold">Total amount rewarded</p>
            <p class="amount-rewarded">#38.8M</p>
            <p>2000</p>
          </div>
          <div class="col-sm-4">
            <p class="font-weight-bold">Total number of contracts awarded</p>
            <p class="contract-number">27</p>
            <p>2000</p>
          </div>
        </div>
      </div>
    </div>

    <div class="content-navigator">
      <a href="" class="position-relative active">Contract awards</a>
      <a href="../director_board.html" class="position-relative">Board of Directors</a>
      <a href="" class="position-relative">Comments</a>
    </div>
    <hr>
  </div>

  <!-- Section 2 -->
  <div class="section-2 container">
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h5>Date: 28th May, 2020</h5>
          <button class="btn date-btn">
            Select Date
            <i class="fa fa-filter" aria-hidden="true"></i>
          </button>
        </div>
        <div class="table-responsive">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col">Project</th>
                <th scope="col">Ministry</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="table-pagination .card-text">
          <p>1 - 10 of 100 results</p>
          <nav class="d-flex justify-content-center">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- Section 3 -->
  <div class="section-3 container mt-4">
    <div class="summary">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">YEAR</th>
              <td scope="col">2016</td>
              <td scope="col">2017</td>
              <td scope="col">2018</td>
              <td scope="col">2019</td>
              <td scope="col">2020</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">TOTAL AMOUNT</th>
              <td>N72,000,000</td>
              <td>N65,000,000</td>
              <td>N96,000,000</td>
              <td>N96,000,000</td>
              <td>N96,000,000</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- Pagination -->
      <div class="table-pagination .card-text mt-4">
        <p>1 - 10 of 100 results</p>
        <nav class="d-flex justify-content-center">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

</section>
<!-- Main body end -->
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection