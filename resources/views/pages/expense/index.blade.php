@extends('layouts.master')

@push('css')
  {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="{{asset('css/index.blade.css')}}">
  <link rel="stylesheet" href="{{ asset('css/ministry-report-table.css') }}">
  <link rel="stylesheet" href="{{ asset('css/filter.css') }}">
  <link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ministry_report_comments.css') }}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>


    @toastr_css

  <title>FG Expense - Expense Report</title>
@endpush

@section('content')

<section>
  <div class="container ">
{{ Breadcrumbs::render('expense.reports') }}
    <div class="row">
      <div class="col-md-12 col-lg-12 section-heading">
        <h1 class="section-heading-title">Daily Report</h1>
        <p class="section-heading-paragraph">Daily report gives an insight to how much is being spent by the federal government on a daily basis.</p>
        <h5>Subscribe to get daily expense report</h5>
        <span>
            @include('partials.modals.subscription')

      </span>

    </div>
    </div>
  </div>
  <div class="section-button">
    <div class="container">
      <div class="row px-1">
        {{-- <div class="btn-group col-lg-12 col-md-12 d-flex responsive-button nav nav-tabs" >
          <a class="ml-3 text-left active button" data-toggle="tab" role="tab" href="#navchart">Daily Expenditure</a>
          <!-- Ministry Sector Tabs -->
          <!-- <a class="btn-marg text-left button" data-toggle="tab" role="tab" href="">Power</a>
          <a class="btn-marg text-left button" data-toggle="tab" role="tab" href="">Education</a>
          <a class="btn-marg text-left button" data-toggle="tab" role="tab"href="">Security</a>
          <a class="btn-marg text-left button" data-toggle="tab" role="tab" href="">Agriculture</a>
          <a class="btn-marg text-left button" data-toggle="tab" role="tab" href="">Infastructure</a> -->
          <a class="btn-marg ml-5 text-left button" data-toggle="tab" role="tab" href="#comments">Comments</a>
        </div> --}}
      </div>
    </div>
  </div>
</section>
<div class="tab-content">
    <div class="tab-content">
      {{-- <div class="container tab-pane show fade active" id="navchart" role="tabpanel">
        <div class="dropdown nav m-4">
          <button class="btn btn-outline-light dropdown-toggle text-success nav-chart" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Chart
          </button>
          <div class="dropdown-menu nav-tabs-dropdown" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" data-toggle="tab" role="tab" href="#navchart">Chart</a>
            <a class="dropdown-item" data-toggle="tab" role="tab" href="#table">Table</a>
          </div>
        </div>

       @include('pages.expense.chart') 
      </div> --}}
      <div id="table" role="tabpanel">
        <div class="dropdown nav container">
          {{-- <button class="btn btn-outline-light dropdown-toggle text-success nav-chart" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Table
          </button>
          <div class="dropdown-menu nav-tabs-dropdown" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item not" data-toggle="tab" role="tab" href="#navchart">Chart</a>
            <a class="dropdown-item" data-toggle="tab" role="tab" href="#table">Table</a>
          </div> --}}
          <div id="search-tools" class="container d-flex justify-content-end mt-1 px-4">
            <div id="search-area" class="col-md-5 col-lg-4 mt-3 mt-md-0 px-0">
                <input type="search" data-id="apply-filter-exp" id="expense_search" class="form-control form-control-lg mb-2" style="font-family:Arial, FontAwesome; height:38px; border: 1px solid var(--clr-dark);" placeholder="&#xf002; Search for a project">
                    @csrf
            </div>
          </div>
          @include('partials.expense-table')
        </div>
      </div>
    </div>
</div>


@endsection
<!-- Footer End -->

@section('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="/js/filter.js"></script>
{{-- <script type="text/javascript" src="/js/report_chart.js"></script> --}}
{{-- <script src="{{ asset('js/index.js') }}"></script> --}}
@toastr_js
@toastr_render

@endsection
