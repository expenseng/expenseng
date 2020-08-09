@extends('layouts.master')

@push('css')
  <link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
  <link rel="stylesheet" href="{{asset('css/ministry_list.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('css/contract_page.css') }}"> --}}
 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>
  <title>FG Expense - Ministry List</title>
@endpush


@section('content')
    <div class="main-header">
      <div class="container">
{{ Breadcrumbs::render('ministries') }}
        <div class="row">
          <div class="col-md-12">
            <h1>Federal Ministries</h1>
            <p>ExpenseNG tracks federal spending to ensure taxpayers can see how their money
              is being used in communities across Nigeria.
              Learn more on how this money was spent with tools to help you navigate
              spending from top to bottom.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="money-spent">
      <div class="container">
        <div class="row">
          <div class="col-md-6 pt-2 paragraph">
            <p style="padding:0;">MINISTRIES AND AMOUNT SPENT</p>
            <hr>
          </div>
          <div id="search-area" class="offset-md-1 col-md-5 mt-3 mt-md-0">
            <input type="search" id="ministry_search" class="form-control form-control-lg mb-2" style="font-family:Arial, FontAwesome" placeholder="&#xf002; Search for a ministry">
            <div id="ministryList"></div>

            @csrf
          </div>
        </div>
      </div>
    </div>


    <div class="last-section">
      <div class="container">
        <div id="cards-container" class="row d-flex sec-card" style="min-height: 300px">

          @include('pages.ministry.cards')

        </div>
      </div>
    </div>
  </div>


@endsection

@section('js')
<script src="{{ asset('js/index.js') }}"></script>
<script src="{{ asset('js/ministry_list.js') }}" type="text/javascript"></script>
<script>
  $(".ministry-cards").click(function() {
    window.location = $(this).find("a").attr("href");
    return false;
});
</script>
@endsection

