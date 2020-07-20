@extends('layouts.master')

@push('css')
  <link rel="stylesheet" href="{{ asset('css/aboutus-header_footer.css') }}">
  <link rel="stylesheet" href="{{asset('css/ministry_list.css') }}">
  <title>FG Expense - Ministry List</title>
@endpush


@section('content')
{{ Breadcrumbs::render('ministries') }}
  <div class="wrapper">
    <div class="main-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <h1>Federal Ministries</h1>
            <p>ExpenseNG tracks federal spending to ensure taxpayers can see how their money
              is being used in communities across America.
              Learn more on how this money was spent with tools to help you navigate
              spending from top to bottom.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="money-spent">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 pt-2 paragraph">
            <p style="padding:0;">MINISTRIES AND AMOUNT SPENT</p>
            <hr>
          </div>
          <div id="search-area" class="offset-md-1 col-md-5 mt-3 mt-md-0">
            <input type="search" id="ministry_search" class="form-control form-control-lg mb-2" style="font-family:Arial, FontAwesome" placeholder="&#xf002; Search for a ministry">
            <div id="ministryList"></div>
            {{-- <button type="submit" id="submit" class="btn btn-block btn-success">Find</button> --}}
            @csrf
          </div>
        </div>
      </div>
    </div>


    <div class="last-section">
      <div class="container-fluid">
        <div id="cards-container" class="row d-flex sec-card" style="min-height: 300px">
          @if (count($ministries) >0)
          @foreach($ministries as $ministry)
          <div data-id="{{$ministry->shortname()}}" 
            class="col-lg-3 col-md-6 col-sm-12 ministry-cards d-flex" 
            style="cursor:pointer"
          >
            <div class="cont-1 d-flex flex-column justify-content-center">
              <chart label="myVueChart" 
                        v-bind:data="[{amount:32424, year:2039},{amount:12920923, year:2010}]" 
                        element="{{ $ministry->shortname() }}"></chart>
              <div class="img">
                <span class="circle"></span>
              </div>
              <div class="coat">
                <img src="{{ asset('images/image 7.png') }}" alt="">
                <div class="text-center ministry">
                  <h4>{{$ministry->name}}</h4>
                </div>
              </div>
              <div class="texts d-flex flex-column text-center">
                <p>Total amount Spent</p>
              <p class="num">₦{{number_format($ministry->total,2)}}</p>
                <p class="year">{{date('Y')}}</p>
              </div>
            </div>
            <a title="Click to view profile" href="{{ route('ministries.single', $ministry->shortname()) }}"></a>
          </div>

         
          @endforeach
          @endif
          
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
  <script src="{{ asset('js/ministry_list.js') }}" type="text/javascript"></script>
@endsection

