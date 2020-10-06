@extends('layouts.master')
@push('css')
<title>Open Government Expenses in Nigeria</title>
<link rel="stylesheet" href="{{ asset('css/index.css')}}">

<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/css/modal/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
@endpush
@section('banner')
<!-- banner -->
<!-- banner -->
<!-- <div class="mx-lg-4"> -->
<div class="container-lg-fluid container-xl px-0" style="max-width: 1600px">
  <div class="background ">
    <div class="banner">
      <div class="carets" id="caret">
        <img src="{{asset('images/angle-left.svg')}}" alt="" class="arrow-left">
        <img src="{{asset('images/angle-right.svg')}}" alt="" class="arrow-right">
      </div>
      <div class="target">
        <div class="summary text-center" style="width: 100%;">
          <h4 class="slightly-bold"> In 2019,<br> the government spent </h4>
          <h4 class="bolding"> &#8358;8.92 trillion.</h4>
          <div class="para">
            <p style="font-weight: 600;">ExpenseNG tracks federal spending to ensure taxpayers can see how their money is being used in communities <br> across Nigeria.
              Learn more on how this money was spent with tools to help you navigate spending from top to bottom.</p>
          </div>
        </div>
      </div>


      <button class="btn scroll-down">
        <a href="#expenses"></a>
      </button>
    </div>
  </div>
</div>
<!-- </div> -->
@endsection

@section('content')

<section id="main" class="">
  <!-- Ministry section -->
  <div class="mx-lg-4 px-lg-5 my-lg-4">
    <div class="container-lg-fluid container-xl px-0 px-lg-5 " style="max-width: 1600px">
      <div>
        <div class="m-auto" style="max-width: 1700px">
          <p class="mb-3 specific" style="color:#00945E; font-size:25px; font-weight:700; text-align:center">Search for a company or contract</p>
        </div>
        <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
            <form action="/search" method="POST">
            @csrf
              <input class="ml-5" type="text" name="text" placeholder="Name of company or contract" style="width: 60%; padding:5px;">
              <button type="submit" class="home-search-button">Start Search</button>
            </form>
          </div>
          <div class="col-sm-2"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Ministry section -->
  <div class="mx-lg-4 px-lg-5 my-lg-4">
    <div class="container-lg-fluid container-xl px-0 px-lg-5 " style="max-width: 1600px; margin-top: 4rem">
      <div>
        <div class="m-auto" style="max-width: 1700px">
          <p class="mb-3 specific" style="color:#353A45; font-size:25px; font-weight:bold; text-align:center">Spent in the last reported 30 days</p>
        </div>
        <div class="row">
          @foreach($expenses as $expense)
          <div class="col-lg-3 col-md-4 col-sm-6 my-2">
            <a href="/ministries/{{$expense->shortname}}">
              <div class="card" style="width: 100%; background-color: #FFFFFF; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.04), 0px 2px 6px rgba(0, 0, 0, 0.04), 0px 0px 1px rgba(0, 0, 0, 0.04)">
                <img class="card-img-top" src="{{asset('img/map.svg')}}" alt="map">
                <img class="" src="{{asset('img/coat.svg')}}" alt="Nigeria Coat of Arms" style="margin-top: -120px;">
                <div class="card-body" style="padding-top: 0px;">
                  <h4 style="text-align: center;font-weight: 500;color: #1F2430; font-size: 1.1rem">Ministry of {{$expense->shortname}}</h4>
                  <h6 class="mt-4 text-center" style="font-weight: normal; color:#1F2430; font-style:normal; font-size: 0.8rem">SPENT</h6>
                  <p class="card-text text-center" style="color: #33A97E; margin-bottom: 5px">₦{{number_format($expense->total_spent)}}</p>
                  <p class="card-text text-center" style="color: #1F2430; font-size:12px; font-weight:300">Spent:{{$period}}</p>
                </div>
              </div>
            </a>
          </div>

          @endforeach
        </div>
      </div>
    </div>
  </div>

  <!-- Contractors section -->
  <div class="mx-lg-4 px-lg-5 my-lg-4">
    <div class="container-lg-fluid container-xl px-0 px-lg-5 " style="max-width: 1600px; margin-top: 4rem">
      <div>
        <div class="m-auto" style="max-width: 1700px">
          <p class="mb-3 specific" style="color:#353A45; font-size:25px; font-weight:bold; text-align:center">Who got the most money?</p>
        </div>
        <div class="row">
          @foreach($companies as $company)
          <div class="col-lg-3 col-md-4 col-sm-6 my-2">
            <a href="/contractors/{{$company['slug']}}">
              <div class="card" style="width: 100%; background-color: #FFFFFF; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.04), 0px 2px 6px rgba(0, 0, 0, 0.04), 0px 0px 1px rgba(0, 0, 0, 0.04)">
                <div class="card-body" style="padding-top: 10px;">
                  <h4 style="text-align: center;font-weight: 700;color: #1F2430; font-size: 0.9rem;">{{$company['name']}}</h4>
                  <h6 class="mt-4 text-center" style="font-weight: normal; color:#1F2430; font-style:normal; font-size: 0.8rem">RECEIVED</h6>
                  <p class="card-text text-center" style="color: #33A97E; margin-bottom: 5px">₦{{number_format($company['amount'])}}</p>
                  <p class="card-text text-center" style="color: #1F2430; font-size:12px; font-weight:300">Spent:{{$period}}</p>
                </div>
              </div>
            </a>
          </div>

          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@section('js')
<script src="{{asset('js/index.js')}}"></script>

<script src="{{asset('js/chart.js')}}"></script>
<script src="{{asset('/js/subscription.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
</script>
<script>
  jQuery(document).ready(function() {


  });
</script>
@endsection