@extends('layouts.master')
@push('css')
<title>FG Expense - Home</title>
<link rel="stylesheet" href="{{ asset('css/index.css')}}">

<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/css/modal/style.css">
<!-- Flickity CSS -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<!-- Flickity JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

@endpush
@section('banner')
<!-- banner -->
<!-- banner -->
<div class="background m-auto" style="max-width: 1700px">
  <div class="banner">
    <div class="carets" id="caret">
      <img src="{{asset('images/angle-left.svg')}}" alt="" class="arrow-left">
      <img src="{{asset('images/angle-right.svg')}}" alt="" class="arrow-right">
    </div>
    <div class="target">
      <div class="summary col-md-7 col-sm-9">
          <h4 class="slightly-bold"> In 2019,<br> the government spent </h4>
          <h4 class="bolding"> &#8358;8.92 trillion.</h4>
          <div class="para">
            <p>ExpenseNG tracks federal spending to ensure taxpayers can see how their money is being used in communities across Nigeria.
              Learn more on how this money was spent with tools to help you navigate spending from top to bottom.</p>
          </div>
      </div>
      <div class="gallery p-3 slick"  data-flickity='{ "freeScroll": true }'>
      @foreach ($expenses as $expense)
        <div class="card1 carousel-cell card">
             <p class="tag">New</p>
          <div class="project">
            <p class="slightly-bold">{{ $expense->description }}</p>
              <div class="d-flex justify-content-between mt-2 align-items-center">
                  <p class="slightly-bold">AMOUNT: </p>
                  <p id="cost">₦{{ number_format($expense->amount, 2) }}</p>
              </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>


    <button class="btn scroll-down" >
      <a href="#expenses"></a>
    </button>
  </div>
</div>
@endsection
@section('content')
<section id="main" class="">
<!-- Ministry section -->
   <div>
       <div class="m-auto" style="max-width: 1700px">
           <p class="label mb-3 specific">Ministry Expenditures</p>
       </div>
    <div class="ministry container mt-4">
        <div class="ministry-top">
           <a href="{{ route('ministries') }}" class="profile" target="_blank">View all profiles</a>
        </div>
        <ministry-budgets></ministry-budgets>
    </div>
   </div>
   <!-- Explore section -->
   <div class="explore  m-auto" style="max-width: 1700px">
     <div class="container">
      <p>A big-picture view of the daily spending <br> of the federal government</p>
      <p>Use our explorer to view how government spends our money daily</p>
      <a href="{{route('expense.reports')}}" target="_blank"><button>Explore</button></a>
     </div>
   </div>


   <!-- Company section -->
    <div class="m-auto" style="max-width: 1700px">
        <p class="label mt-3 mb-3 " id="compu">Companies that received money</p>
    </div>
   <div class="companies container d-flex justify-content-between">
     @foreach ($companies as $company)
    <div class="comp-card comp-card-1">
        <div class="awarded">
          <div class="graph-cont">
              {{-- <div id="chart{{$company -> id + 3}}"></div>$loop->index --}}
              <div id="chart{{$loop->index + 4}}"></div>
          </div>
          <div class="ml-1 mr-2">
             <p class="exp-card1">Total amount Received</p>
             <p class="exp-card2">₦{{ number_format($company->amount, 2) }}</p>
             <p class="exp-card3 text-muted">{{$company->year}}</p>
          </div>
        </div>
      <div class="ml-3 ">
        <div class="d-flex align-items-center mb-3">
          <img src="{{asset('/images/berger.jpg')}}" alt="">
          <p class="mt-3"><a href="/contractors/{{$company->shortname}}">{{$company->name}}</a></p>
        </div>
        <div class="profile">
          <p>Total number of payouts</p>
          <p>{{count($company->payments)}}</p>
          <p class="text-muted">{{$company->year}}</p>
        </div>
        <div class="profile my-4">
          <p>Name of CEO</p>
          <p>{{$company->ceo}}</p>

        </div>
        <div class="profile">
          <p>Company twitter handle</p>
          @if($company->twitter)
          <a target="_blank" href = "https://twitter.com/{{$company->twitter}}" id="handle">{{$company->twitter}}</a>
          @else
          <p>N/A</p>
          @endif
        </div>
      </div>
    </div>
      @endforeach
      <div class="vll m-md-auto mx-sm-auto mt-sm-4">
        <a href="{{ route('contractors') }}" class="profile">View all Contracts</a>
       </div>
  </div>

</div>
   <!-- conversation section -->
   <div class="convo-background  m-auto" style="max-width: 1700px">
      <div class="convo container d-flex  justify-content-between mb-3">
            <div class="tweet col-md-5 col-lg-5 d-flex align-items-center justify-content-start">
               <div class="twt-handle">
                <a href="https://twitter.com/expenseng" target="_blank">@expenseNG</a>
               </div>
            </div>
           <div class="query col-md-7 col-xl-5 col-sm-12">
                <p>Join the conversation</p>
                <p>We want to know how we can serve you better.
                Drop by our community page to ask questions,
                propose new features, sign up for testing, and join the conversation about federal spending data.</p>
                <p>Want to receive update in your inbox?</p>
                @include('partials.modals.home-subscribe')
          </div>
      </div>
  </div>
    <div class="fixed-bottom py-4 px-1">
        <a  class="rounded-circle" id="open" data-toggle="modal" data-target="#exampleModaltweets">
            <i class="fa fa-twitter bg-white text-success rounded-circle p-3" ></i>
        </ a>
    </div>
</section>






@endsection
@section('js')
<script src="{{asset('js/index.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script src="{{asset('js/chart.js')}}"></script>
<script src="{{asset('/js/subscription.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
</script>
<script>
    jQuery(document).ready(function(){


    }
    );
</script>
@endsection
