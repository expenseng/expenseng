@extends('layouts.master')

@push('css')
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <!-- <link rel="stylesheet" href="{{asset('/css/expense_report.css')}}"> -->
  <link rel="stylesheet" href="{{asset('/css/header_footer.css')}}">
  <link rel="stylesheet" href="{{asset('css/index.blade.css')}}">

  <title>FG Expense - Expense Report</title>
@endpush

@section('content')
<!-- Main body start -->
<br>
<br>
<br>

<div class="container">
  <div class="first">
    <a href="#" class="first1">HOME<span class="circle-1"></span></a>
    <a href="#" class="first1">SPENDING<span class="circle-1"></span></a>
    <a href="#" class="first1">EXPENSE REPORT</a> 
  </div>
  <div class="col-md-12 second">
    <span class="exp1"><h3>Expense Report</h3></span>
    <div class="second1">
      <span class="exp2"><h5>Expense report gives an insight to how much is being spent by the<br> federal government on a daily basis and how much is spent in major<br> sectors in Nigeria.</h5></span>
    </div>
  </div>
  <br>
  <br>
  <br>
  <div class="col-md-12 col-sm-12">
    <div class="wrap" style="overflow-x:auto;">
      <div class="col-12 off-1 bottom-border">
        <a href="" class="active">Daily Expenditure</a>
        <a href="">Power</a>
        <a href="">Education</a>
        <a href="">Security</a>
        <a href="" class="padding">Agriculture</a>
        <a href="">Infastructure</a>
        <a href="">Comments</a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="col-md-12 ">
      <a href="#" class="drop">Chart<i class="fas fa-sort-down fa-2x"></i></a>
    </div>
  </div>
  <div class="container col-md-12">
    <div class="label">
      <a><h6>Graph(Daily):12th May 2019</h6></a>
      <div><button class="btn-sm  filter"><h5>Select Date</h5> <i class="fas fa-filter fa-2x"></i></button></div>
    </div>
  <div id = "chart">

  </div>
  </div>
</div>
 
@endsection
<!-- Footer End -->

@section('js')
<script type="text/javascript" src="/js/expenditure_report.js"></script>
<script type="text/javascript" src="/js/index_blade.js"></script>
@endsection