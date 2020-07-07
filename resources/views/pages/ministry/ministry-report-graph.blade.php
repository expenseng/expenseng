@extends('layouts.master')
@section('css')
  <title>FG Expense - Contact</title>
  <link rel="stylesheet" href="{{asset('css/about us-header_footer.css')}}">
  <link rel="stylesheet" href="{{ asset('css/report-graph.css')}}">
@endsection

@section('content')

    <div class="container">
      <div class="row top pt-5">
        <ul>
          <li>HOME </li><li>. SPENDING </li><li>. EXPENSE REPORT</li>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="row top">
        <div class="col-mmd-4">
          <h1>Expense Report</h1>
        </div>

      </div>
    </div>
    <div class="container">
      <div class="row top">
        <div class="col-md-6">
          <p>Expense report give an insight to how much is been spent by the federal Government on a daily basis and how much is spent on major sectors in Nigeria </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="top-nav">
            <li><a href="#" class="active">Daily Expenditure</a></li>
            <li><a href="#">Power</a></li>
            <li><a href="#">Education</a></li>
            <li><a href="#">Security</a></li>
            <li><a href="#">Agriculture</a></li>
            <li><a href="#">Comments</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row padding">
        <div class="col-md-2">
          <form class="" action="index.html" method="post">
            <select class="" name="">
              <option value="">Chart</option>
            </select>
          </form>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          Graph (Daily):12 May, 2019
        </div>
        <div class="col-md-3">

        </div>
        <div class="col-md-2">
          <select class="sec-select" name="" value>
            <option value=""> Select Date </option>
          </select>

        </div>
      </div>
    </div>

    <!-- The Chart -->
    <div class="container">
      <div class="row padding">
          <div class="col-md-8 mx-auto">
              <div class="ministry-stat">
                  <div class="graph-cont">
                      <img src="{{asset('/images/indicator.png')}}" alt="graph">
                      <img class="graph-border" src="{{asset('/images/graph-bg.png')}}" alt="graph">
                      <center>Expenditure</center>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!-- The Chart -->
   
@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="{{asset('js/index.js')}}"></script>
@endsection