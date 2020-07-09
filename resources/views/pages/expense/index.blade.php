@extends('layouts.master')

@push('css')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <link rel="stylesheet" href="{{asset('/css/expense_report.css')}}">
  <link rel="stylesheet" href="{{asset('/css/header_footer.css')}}">
  <title>FG Expense - Expense Report</title>
@endpush

@section('content')
<!-- Main body start -->
  <div class="mother">
    <div class="col-12 ">
      <div class="col-6 off-1 down-10">
        <a href="" class="color-code-1">HOME</a>
        <a href="" class="padding color-code-1">SPENDING</a>
        <a href="" class="color-code-1">EXPENSE REPORT</a>
      </div>
    </div>
    <div class="col-3 off-1 down-5">
      <span class="px40">Expense Report</span>
    </div>
    <div class="col-12 down-3">
      <div class="col-6 off-1">
        <div><span class="px24">ExpenseNG tracks federal spending to ensure taxpayers can see how their
            money is being used in communities across Nigeria.</span></div>
      </div>
      <div class="col-12 down-4">
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
      <div class="col-12">
        <div class="col-4 off-1 down-4">
          <div class="col-12 bottom-dropdown">
            <a href="" class=" active px20 color-code-1">Table<i class="fas fa-sort-down padding-left px30"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 down-5">
      <div class="col-10 off-1 bottom-50">
        <table>
          <thead>
            <tr>
              <th class="px25">Date: 28th, May 2020</th>
              <th></th>
              <th></th>
              <th></th>
              <th>
                <div><button class="btn-sm bg-color-code-1 color-white">Select Date <i class="fas fa-filter"></i></button></div>
              </th>
            </tr>
          </thead>
          <thead>
            <tr class="px25">
              <th>Ministry</th>
              <th>Beneficial</th>
              <th>Purpose</th>
              <th>Amount</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            {{-- @if(count($expenditures ?? '')> 0)
              @foreach( $expenditures ?? '' as $expenditure)
            <tr>
              <td class="px20 color-code-1">{{$expenditure->ministry}}</td>
              <td class="px18">{{$expenditure->company}}</td>
              <td>{{$expenditure->description}}</td>
              <td>N{{$expenditure->amount}}</td>
              <td>{{$expenditure->payment_date}}</td>
            </tr>
              @endforeach
            @endif --}}
            
          </tbody>
        </table>
        <div class="col-12 btn-sm-border bottom-50 ">
          <div class="col-3 down-10"> 1-20 of 320 results</div>
          <div class=" col-4 off-101 down-10 pagination">
            <a href=""><i class="fas fa-chevron-left"></i></a>
            <a href="" class="active">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">4</a>
            <a href="">5</a>
            <a href="">...</a>
            <a href="">6</a>
            <a href=""><i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-12 bottom-50">
        <div class="col-6 off-102">
          <table>
            <thead>
              <tr class="border">
                <th>YEAR</th>
                <th>2016</th>
                <th>2017</th>
                <th>2018</th>
                <th>2019</th>
                <th>2020</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>TOTAL AMOUNT</td>
                <td>N16,456,332,000</td>
                <td>N32,890,765,400</td>
                <td>N5,000,000,000</td>
                <td>N43,267,987,000</td>
                <td>N15,354,663,000</td>
              </tr>
            </tbody>
          </table>
          <div class="col-12  bottom-50 ">
            <div class="col-3  down-10"> 1-20 of 320 results</div>
            <div class=" col-6 off-3 down-10 pagination">
              <a href=""><i class="fas fa-chevron-left"></i></a>
              <a href="" class="active">1</a>
              <a href="">2</a>
              <a href="">3</a>
              <a href="">4</a>
              <a href="">...</a>
              <a href="">6</a>
              <a href=""><i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="chart_body">
      <div>
        <div class="graph_date_body">
          <h6>Graph (day):12th May, 2019</h6>
          <a>Select Date <i class="fa fa-filter"></i></a>
        </div>
        <div class="graph_container">
          <canvas id="graph_canvas1"></canvas>
        </div>
      </div>
      <div>
        <div class="graph_date_body">
          <h6>Graph (Month): May, 2019</h6>
          <a>Select Month <i class="fa fa-filter"></i></a>
        </div>
        <div class="graph_container">
          <canvas id="graph_canvas2"></canvas>
        </div>
      </div>
      <div>
        <div class="graph_date_body">
          <h6>Graph (Year): 2019</h6>
          <a>Select Year <i class="fa fa-filter"></i></a>
        </div>
        <div class="graph_container">
          <canvas id="graph_canvas3"></canvas>
        </div>
      </div>

    </div>
  </div>
@endsection
<!-- Footer End -->

@section('js')
<script type="text/javascript" src="/js/expenditure_report.js"></script>
@endsection