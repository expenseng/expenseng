@extends('layouts.master')

  @push('css')
    <title>FG Expense - Home</title>
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
  @endpush

  @section('banner')
        <!-- banner -->
    <div class="banner">
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
        <img src="{{asset('images/angle-left.svg')}}" alt="" class="arrow-left">
        <img src="{{asset('images/angle-left.svg')}}" alt="" class="arrow-right">
        </div>
        <div class="gallery">
          <div class="card1 card">
              <p class="tag">New</p>
            <div class="project">
                  <p>Contruction of Lagos-Ibadan Express road <br>
                  Ministry of Power, Works and Housing</p>
                <div class="d-flex justify-content-between mt-4 align-items-center">
                    <p>Cost of Project: </p>
                    <p id="cost">#20bn</p>
                </div>
            </div>
          </div>
          <div class="card2 card">
            <p class="tag">New</p>
            <div class="project">
              <p>Contruction of Lagos-Ibadan Express road <br>
                Ministry of Power, Works and Housing</p>
              <div class="d-flex justify-content-between mt-4">
                  <p>Cost of Project: </p>
                  <p id="cost">#20bn</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="btn scroll-down"></button>
    </div>
  @endsection

  @section('content')
    <section id="main">     
       <!-- Expenses section -->
       <p class="label">Latest Government Expenses</p>
       <div class="p-3 p-lg-5">
            <div class="expenses">
                <div class="exp-card">
                  <div class="graph-cont">
                  <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                  <img src="{{asset('/images/Vector2.png')}}" alt="graph">
                  </div>
                  <p class="exp-card1">Health</p>
                  <p class="exp-card2">#123,446,332</p>
                  <p class="exp-card3">2020</p>
                </div>
                <div class="exp-card">
                 <div class="graph-cont">
                   <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                   <img src="{{asset('/images/Vector2.png')}}" alt="graph">
                  </div>
                  <p class="exp-card1">Salary</p>
                  <p class="exp-card2">#123,446,332</p>
                  <p class="exp-card3">2020</p>
                </div>
                <div class="exp-card">
                 <div class="graph-cont">
                   <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                   <img src="{{asset('/images/Vector2.png')}}" alt="graph">
                  </div>
                  <p class="exp-card1">Agriculture</p>
                  <p class="exp-card2">#123,446,332</p>
                  <p class="exp-card3">2020</p>
                </div>
                <div class="exp-card">
                 <div class="graph-cont">
                   <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                   <img src="{{asset('/images/Vector2.png')}}" alt="graph">
                  </div>
                  <p class="exp-card1">Security</p>
                  <p class="exp-card2">#123,446,332</p>
                  <p class="exp-card3">2020</p>
                </div>
                <div class="exp-card">
                 <div class="graph-cont">
                   <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                   <img src="{{asset('/images/Vector2.png')}}" alt="graph">
                  </div>
                  <p class="exp-card1">Power</p>
                  <p class="exp-card2">#123,446,332</p>
                  <p class="exp-card3">2020</p>
                </div>
                <div class="exp-card">
                 <div class="graph-cont">
                   <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                   <img src="{{asset('/images/Vector2.png')}}" alt="graph">
                  </div>
                  <p class="exp-card1">Infrastructure</p>
                  <p class="exp-card2">#123,446,332</p>
                  <p class="exp-card3">2020</p>
                </div>
                <a href="{{route('expense.reports')}}" class="mt-4 mb-5">View Expenditure Report</a>
            </div>
       </div>

       <!-- Ministry section -->
       <p class="label">Ministry Expenditures</p>
       <div class="ministry">
           <div class="ministry-heading">
             <div class="ministry-head">
               <p>Ministry of Agriculture</p>
                <i class="fa fa-caret-down"></i>
             </div>
             <p class="profile">View all profiles</p>
           </div>
           <div class="ministry-stat">
                 <div class="stat-a p-4">
                   <div class="graph-cont">
                     <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                     <img src="{{asset('/images/Vector2.png')}}" alt="graph">
                    </div>
                   <div>
                     <p class="exp-card1">Total amount spent</p>
                     <p class="exp-card2">#123,446,332</p>
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
                     <p class="exp-card2">#123,446,332</p>
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
                     <p class="exp-card2">#123,446,332</p>
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
                     <p class="exp-card2">#123,446,332</p>
                     <p class="exp-card3">2020</p>
                   </div>
                   </div>
                 </div>
           </div>
       </div>

       <!-- Explore section -->
       <div class="explore">
           <p>A big-picture view of the daily spending <br> of the federal government</p>
           <p>Use our explorer to view how government spends our money daily</p>
           <button>Explore</button>
       </div>

       <!-- Company section -->
       <p class="label">Companies that received money</p>
       <div class="companies">
            <div class="comp-card">
               <div class="awarded">
                 <div class="graph-cont">
                   <img src="{{asset('/images/Vector3.svg')}}" alt="graph">
                   <img src="{{asset('/images/vector2.png')}}" alt="graph">
                  </div>
                  <div class="ml-5">
                     <p class="exp-card1">Total amount Awarded</p>
                     <p class="exp-card2">#123,446,332</p>
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
                  <p class="exp-card2">#123,446,332</p>
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
                  <p class="exp-card2">#123,446,332</p>
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

       <!-- conversation section -->
       <div class="convo">
                <div class="tweet">
                   <div class="twt-handle">
                     <img src="{{asset('/images/twitter.png')}}" alt="">
                    <a href="#">@expenseNG</a>
                   </div>
                </div>
               <div class="query">
                  <p>Join the conversation</p>
                  <p>We want to know how we can serve you better.
                  Drop by our community page to ask questions,
                  propose new features, sign up for testing, and join the conversation about federal spending data.</p>
              </div>
       </div>
    </section>
  @endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="{{asset('js/index.js')}}"></script>
@endsection