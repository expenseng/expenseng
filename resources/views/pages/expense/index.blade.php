@extends('layouts.master')

@push('css')
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <!-- <link rel="stylesheet" href="{{asset('/css/expense_report.css')}}"> -->
  <link rel="stylesheet" href="{{asset('/css/header_footer.css')}}">
  <link rel="stylesheet" href="{{asset('css/index.blade.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/header_footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/ministry-report-table.css') }}">
	<link rel="stylesheet" href="{{ asset('css/aboutus-header_footer.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ministry_report_comments.css') }}">

    @toastr_css

  <title>FG Expense - Expense Report</title>
@endpush

@section('content')
<header class="container section-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item not-active"><a href="{{ route('home') }}">HOME</a></li>
      <span>&#8226;</span>
      <li class="breadcrumb-item not-active"><a href="#">SPENDING</a></li>
      <span>&#8226;</span>
      <li class="breadcrumb-item active" aria-current="page"><a href="#">EXPENSE REPORT</a></li>
    </ol>
  </nav>
</header>
<section>
  <div class="container ">
    <div class="row">
      <div class="col-md-8 col-lg-12 section-heading">
        <h1 class="section-heading-title">Expense Report</h1>
        <p class="section-heading-paragraph">Expense report gives an insight to how much is being spent by the federal government on a daily basis and how much is spent in major sectors in Nigeria.</p>
        <h5>Subscribe to daily Expense Report</h5>
        <span>
            <form method="POST" action="{{ route('subscribe.report')}}">
              @csrf
              <input type="text" class="form-control" name="name" placeholder="Enter Your Name  " style="width: 50%;"><br>
              <input type="email" class="form-control" name="email" placeholder="Enter Your Email" style="width: 50%;">

              <br>
              <select name="subscription_type" id="" class="form-control" style="width: 50%;">
                  <option value="">Select The Report type</option>
                  <option value="ministry">Ministry</option>
                  <option value="contract">Contract</option>
                  <option value="daily&expense">Daily Expense</option>
                  <option value="payment">Payments Without description</option>
              </select>
              <button type="submit" class="btn-sm filter">Subscribe</button>
          </form>
      </span>

    </div>
    </div>
  </div>
  <div class="section-button">
    <div class="container">
      <div class="row px-1">
        <div class="btn-group col-lg-12 col-md-12 d-flex justify-content-between responsive-button nav nav-tabs" style="overflow-x: scroll;">
          <a class="btn-marg text-left active button" data-toggle="tab" role="tab" href="#navchart">Daily Expenditure</a>
          <a class="btn-marg text-left button" data-toggle="tab" role="tab" href="">Power</a>
          <a class="btn-marg text-left button" data-toggle="tab" role="tab" href="">Education</a>
          <a class="btn-marg text-left button" data-toggle="tab" role="tab"href="">Security</a>
          <a class="btn-marg text-left button" data-toggle="tab" role="tab" href="">Agriculture</a>
          <a class="btn-marg text-left button" data-toggle="tab" role="tab" href="">Infastructure</a>
          <a class="btn-marg text-left button" data-toggle="tab" role="tab" href="#comments">Comments</a>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="tab-content">
    <div class="tab-content">
      <div class="container tab-pane show fade active" id="navchart" role="tabpanel">
        <div class="dropdown nav m-4">
          <button class="btn btn-outline-light dropdown-toggle text-success nav-chart" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Chart
          </button>
          <div class="dropdown-menu nav-tabs-dropdown" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" data-toggle="tab" role="tab" href="#navchart">Chart</a>
            <a class="dropdown-item" data-toggle="tab" role="tab" href="#table">Table</a>
          </div>
        </div>

        <div class="container col-sm-12 col-md-7">
          <div class="table-top d-flex justify-content-between align-items-center">
            <h4>Graph(Daily):12th May 2019</h4>
            <button class="nav-button">Select Date<i class="fas fa-filter px-1" style="font-size: var(--fs-reg);"></i></button>
          </div>
          <div class="main-chart">
            <div id ="chart">

            </div>
          </div>
        </div>
      </div>
      <div class="container tab-pane fade" id="table" role="tabpanel">
        <div class="dropdown nav m-5">
          <button class="btn btn-outline-light dropdown-toggle text-success nav-chart" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Table
          </button>
          <div class="dropdown-menu nav-tabs-dropdown" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item not" data-toggle="tab" role="tab" href="#navchart">Chart</a>
            <a class="dropdown-item" data-toggle="tab" role="tab" href="#table">Table</a>
          </div>
        @include('partials.expense-table')
      </div>
    </div>
    <div class="container tab-pane fade" id="comments" role="tabpanel">
      @include('partials.comments')
    </div>
  </div>
</div>


@endsection
<!-- Footer End -->

@section('js')
<script type="text/javascript" src="/js/expenditure_report.js"></script>
<script type="text/javascript" src="/js/index_blade.js"></script>
@jquery
@toastr_js
@toastr_render

@endsection
