@extends('layouts.master')

  @push('css')
    <title>FG Expense - Home</title>
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
  @endpush

  @section('banner')
        <!-- banner -->
        <div class=" background">

          <div class="container banner">
            {{-- <img src="{{asset('images/flag.jpg')}}" alt=""> --}}
            <div class="carets" id="caret">
              <img src="{{asset('images/angle-left.svg')}}" alt="" class="arrow-left">
              <img src="{{asset('images/angle-right.svg')}}" alt="" class="arrow-right">
            </div>
            <div class="target">
              <div class="summary">
                  <h4> In 2019, <br> the government spent $4.45 trillion.</h4>
                  <p>ExpenseNG tracks federal spending to ensure taxpayers can see how their money is being used in communities across Nigeria.
                  Learn more on how this money was spent with tools to help you navigate spending from top to bottom.</p>
              </div>
              <div class="carets my-4" id="caret-alt">
              <img src="{{asset('images/angle-left.svg')}}" alt="" class="arrow-left2">
              <img src="{{asset('images/angle-right.svg')}}" alt="" class="arrow-right2">
              </div>
              <div class="gallery">
                <div class="card1 card">
                    <div class="tag">
                        <p>New</p>
                    </div>
                  <div class="project">
                        <p>Contruction of Lagos-Ibadan Express road <br>
                        Ministry of Power, Works and Housing</p>
                      <div class="d-flex justify-content-between mt-4 align-items-center">
                          <p>Cost of Project: </p>
                          <p id="cost">&#8358;20bn</p>
                      </div>
                  </div>
                </div>
                <div class="card2 card">
                    <div class="tag">
                        <p>New</p>
                    </div>
                  <div class="project">
                    <p>Contruction of Lagos-Ibadan Express road <br>
                      Ministry of Power, Works and Housing</p>
                    <div class="d-flex justify-content-between mt-4">
                        <p>Cost of Project: </p>
                        <p id="cost">&#8358;20bn</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="btn scroll-down" >
              <a href="#expenses">s</a>
            </button>
          </div>
        </div>
  @endsection

  @section('content')
    <section id="main" class="">
       <!-- Expenses section -->
       <div id="expenses">
        <p class="label">Latest Government Expenses</p>
        <div class="p-3  p-lg-5">
             <div class="expenses container">
                 <govt-expense></govt-expense>
                 <a href="{{route('expense.reports')}}" class="mt-4 mb-5">View Expenditure Report</a>
             </div>
        </div>
       </div>

       <!-- Ministry section -->
       <div>

        <p class="label mb-5 specific">Ministry Expenditures</p>
        <div class="ministry container mt-4">
            <div class="ministry-top">
              <div class="ministry-heading">
                <select class="ministry-head">
                  <option value="agric">Ministry of Agriculture</option>
                  <option value="grei">Ministry of Agriculture</option>
                  <option>Ministry of Agriculture</option>
                  <option>Ministry of Agriculture</option>
                  <option>Ketchup</option>
                  <option>Barbecue</option>
                </select>
               </div>
               <a href="{{ route('ministries') }}" class="profile">View all profiles</a>
             </div>
            <div class="ministry-stat">
                  <div class="stat-a p-4">
                    <div class="graph-cont">
                      <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                      <img src="{{asset('/images/Vector2.png')}}" alt="graph">
                     </div>
                    <div>
                      <p class="exp-card1">Total amount spent</p>
                      <p class="exp-card2">&#8358;123,446,332</p>
                      <p class="exp-card3">2020</p>
                    </div>
                  </div>
                  <div class="stat-b">
                    <div class="d-flex p-2 justify-content-between">
                      <div class="graph-cont">
                        <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                        <img src="{{asset('/images/Vector2.png')}}" alt="graph">
                       </div>
                    <div class="ml-5 w-50">
                      <p class="exp-card1">Total amount spent on projects</p>
                      <p class="exp-card2">&#8358;123,446,332</p>
                      <p class="exp-card3">2020</p>
                    </div>
                    </div>
                    <div class="d-flex p-2 justify-content-between">
                      <div class="graph-cont">
                        <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                        <img src="{{asset('/images/Vector2.png')}}" alt="graph">
                       </div>
                    <div class="ml-5 w-50">
                      <p class="exp-card1">Total amount spent on salary payments</p>
                      <p class="exp-card2">&#8358;123,446,332</p>
                      <p class="exp-card3">2020</p>
                    </div>
                    </div>
                    <div class="d-flex p-2 justify-content-between">
                      <div class="graph-cont">
                        <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                        <img src="{{asset('/images/Vector2.png')}}" alt="graph">
                       </div>
                    <div class="ml-5 w-50">
                      <p class="exp-card1">Total amount spent on others</p>
                      <p class="exp-card2">&#8358;123,446,332</p>
                      <p class="exp-card3">2020</p>
                    </div>
                    </div>
                  </div>
            </div>
        </div>
       </div>

       <!-- Explore section -->
       <div class="explore">
         <div class="container">
          <p>A big-picture view of the daily spending <br> of the federal government</p>
          <p>Use our explorer to view how government spends our money daily</p>
          <button>Explore</button>
         </div>
       </div>

       <!-- Company section -->
       <p class="label mt-5 mb-5 ">Companies that received money</p>
       <div class="companies container">
            <div class="comp-card">
               <div class="awarded">
                 <div class="graph-cont">
                   <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                   <img src="{{asset('/images/vector2.png')}}" alt="graph">
                  </div>
                  <div class="ml-5">
                     <p class="exp-card1">Total amount Awarded</p>
                     <p class="exp-card2">&#8358;123,446,332</p>
                     <p class="exp-card3">2019</p>
                  </div>
              </div>
              <div>
                 <div class="d-flex align-items-center mb-3">
                   <img src="{{asset('/images/berger.jpg')}}" alt="">
                   <p class="mt-3">Julius Berger</p>
                 </div>
                 <div class="profile">
                   <p>Total number of contracts awarded</p>
                   <p>37</p>
                   <p>2019</p>
                 </div>
                 <div class="profile my-5">
                   <p>Name of CEO</p>
                   <p>Dr. Lars Ritchter</p>
                   <p>2020</p>
                 </div>
                 <div class="profile">
                   <p>Company twitter handle</p>
                   <p id="handle">@juliusBerger0</p>
                   <p>2019</p>
                 </div>
              </div>
            </div>
            <div class="comp-card">
             <div class="awarded">
               <div class="graph-cont">
                 <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                 <img src="{{asset('/images/Vector2.png')}}" alt="graph">
                </div>
               <div class="ml-5">
                  <p class="exp-card1">Total amount Awarded</p>
                  <p class="exp-card2">&#8358;123,446,332</p>
                  <p class="exp-card3">2019</p>
               </div>
           </div>
           <div>
              <div class="d-flex align-items-center mb-3">
                <img src="{{asset('/images/berger.jpg')}}" alt="">
                <p class="mt-3">Julius Berger</p>
              </div>
              <div class="profile">
                <p>Total number of contracts awarded</p>
                <p>37</p>
                <p>2019</p>
              </div>
              <div class="profile my-5">
                <p>Name of CEO</p>
                <p>Dr. Lars Ritchter</p>
                <p>2020</p>
              </div>
              <div class="profile">
                <p>Company twitter handle</p>
                <p id="handle">@juliusBerger0</p>
                <p>2019</p>
              </div>
           </div>
            </div>
            <div class="comp-card">
             <div class="awarded">
               <div class="graph-cont">
                 <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                 <img src="{{asset('/images/Vector2.png')}}" alt="graph">
                </div>
               <div class="ml-5">
                  <p class="exp-card1">Total amount Awarded</p>
                  <p class="exp-card2">&#8358;123,446,332</p>
                  <p class="exp-card3">2019</p>
               </div>
           </div>
           <div>
              <div class="d-flex align-items-center mb-3">
                <img src="{{asset('/images/berger.jpg')}}" alt="">
                <p class="mt-3">Julius Berger</p>
              </div>
              <div class="profile">
                <p>Total number of contracts awarded</p>
                <p>37</p>
                <p>2019</p>
              </div>
              <div class="profile my-5">
                <p>Name of CEO</p>
                <p>Dr. Lars Ritchter</p>
                <p>2020</p>
              </div>
              <div class="profile">
                <p>Company twitter handle</p>
                <p id="handle">@juliusBerger0</p>
                <p>2019</p>
              </div>
           </div>
            </div>
       </div>
      </div>
       <!-- conversation section -->
       <div class="convo-background">

       <div class="convo container">
                <div class="tweet">
                   <div class="twt-handle">
                     <img src="{{asset('/images/twitter.png')}}" alt="">
                    <a href="#">@expenseNG</a>
                   </div>
                </div>
               <div class="query ">
                  <p>Join the conversation</p>
                  <p>We want to know how we can serve you better.
                  Drop by our community page to ask questions,
                  propose new features, sign up for testing, and join the conversation about federal spending data.</p>
              </div>
       </div>
    </section>
  @endsection

@section('js')
<script src="{{asset('js/index.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
