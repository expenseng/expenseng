@extends('layouts.master')
@section('css')
  <title>FG Expense - Contact</title>
  <link rel="stylesheet" href="{{asset('css/about us-header_footer.css')}}">
  <link rel="stylesheet" href="{{ asset('css/expense-style.css')}}">
@endsection

@section('content')

   <!-- Jumbotron-->
   <div class="jumbotron">
        <div class="container">
            <div class="mt-5 pt-5">
                <ul class="jumbo-list d-flex">
                    <li class="pr-5">HOME</li>
                    <li class="pr-5">SPENDING</li>
                    <li>EXPENSE REPORT</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-8 mt-5">
                    <h2 class="title mb-3">Expense Report</h2>
                    <p class="lead">Expense report gives an insight to how much is being spent by the Federal Government
                        on daily basis and how much is spent in major sectors in Nigeria.</p>
                </div>
            </div>
        </div>
    </div>
   <!-- Jumbotron-->

   <section id="Report-section">
       <div class="container">
            <div class="tabs">
                <div class="tab-sidebar d-none d-md-flex">
                    <span class="tabs-button pb-2" data-for-tab="1">Daily Expense</span>
                    <span class="tabs-button" data-for-tab="2">Power</span>
                    <span class="tabs-button" data-for-tab="3">Education</span>
                    <span class="tabs-button" data-for-tab="4">Security</span>
                    <span class="tabs-button" data-for-tab="5">Agriculture</span>
                    <span class="tabs-button" data-for-tab="6">Infrastructure</span>
                    <span class="tabs-button" data-for-tab="7">Comments</span>
                </div>

                <div class="dropdown d-block d-md-none my-0">
                    <button class="btn sector-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Select a sectors
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <span class="dropdown-item" data-for-tab="1">Daily Expense</span>
                        <span class="dropdown-item" data-for-tab="2">Power</span>
                        <span class="dropdown-item" data-for-tab="3">Education</span>
                        <span class="dropdown-item" data-for-tab="4">Security</span>
                        <span class="dropdown-item" data-for-tab="5">Agriculture</span>
                        <span class="dropdown-item" data-for-tab="6">Infrastructure</span>
                        <span class="dropdown-item" data-for-tab="7">Comments</span>
                    </div>
                </div>
            
                <div class="tabs-content" data-tab="1">
                    <div class="row my-3">
                        <div class="col-md-10 mx-auto d-flex">
                            <div class="date mr-auto">Graph (Daily) : <span id="myDate"></span> 12 Jan, 2019</div>
                            <div>
                                <button style="background: #005938; color: #ffffff;" class="btn btn-sm calendar-btn">Select Date <i class="fas fa-filter"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 my-0 ml-auto">
                            <input class="calendar d-none" type="date" name="" id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="ministry-stat">
                                <div class="graph-cont">
                                    <img src="{{asset('/images/indicator.png')}}" alt="graph">
                                    <img class="graph-border" src="{{asset('/images/graph-bg.png')}}" alt="graph">
                                </div>
                                <p class="text-center pt-3">Expenditure</p>
                                <p class="rotate-text">Amount Spent (Billion)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabs-content" data-tab="2">
                    <div class="row my-3">
                        <div class="col-md-10 mx-auto d-flex">
                            <div class="date mr-auto">Graph (Daily) : <span id="myDate"></span> 12 Jan, 2019</div>
                            <div>
                                <button style="background: #005938; color: #ffffff;" class="btn btn-sm calendar-btn">Select Date <i class="fas fa-filter"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 my-0 ml-auto">
                            <input class="calendar d-none" type="date" name="" id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="ministry-stat">
                                <div class="graph-cont">
                                    <img src="{{asset('/images/indicator.png')}}" alt="graph">
                                    <img class="graph-border" src=".{{asset('/images/graph-bg.png')}}" alt="graph">
                                </div>
                                <p class="text-center pt-3">Expenditure</p>
                                <p class="rotate-text">Amount Spent (Billion)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabs-content" data-tab="3">
                    <div class="row my-3">
                        <div class="col-md-10 mx-auto d-flex">
                            <div class="date mr-auto">Graph (Daily) : <span id="myDate"></span> 12 Jan, 2019</div>
                            <div>
                                <button style="background: #005938; color: #ffffff;" class="btn btn-sm calendar-btn">Select Date <i class="fas fa-filter"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 my-0 ml-auto">
                            <input class="calendar d-none" type="date" name="" id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="ministry-stat">
                                <div class="graph-cont">
                                    <img src="{{asset('/images/indicator.png')}}" alt="graph">
                                    <img class="graph-border" src="{{asset('/images/graph-bg.png')}}" alt="graph">
                                </div>
                                <p class="text-center pt-3">Expenditure</p>
                                <p class="rotate-text">Amount Spent (Billion)</p>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="tabs-content" data-tab="4">
                    <div class="row my-3">
                        <div class="col-md-10 mx-auto d-flex">
                            <div class="date mr-auto">Graph (Daily) : <span id="myDate"></span> 12 Jan, 2019</div>
                            <div>
                                <button style="background: #005938; color: #ffffff;" class="btn btn-sm calendar-btn">Select Date <i class="fas fa-filter"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 my-0 ml-auto">
                            <input class="calendar d-none" type="date" name="" id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="ministry-stat">
                                <div class="graph-cont">
                                    <img src="{{asset('/images/indicator.png')}}" alt="graph">
                                    <img class="graph-border" src="{{asset('/images/graph-bg.png')}}" alt="graph">
                                </div>
                                <p class="text-center pt-3">Expenditure</p>
                                <p class="rotate-text">Amount Spent (Billion)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabs-content" data-tab="5">
                    <div class="row my-3">
                        <div class="col-md-10 mx-auto d-flex">
                            <div class="date mr-auto">Graph (Daily) : <span id="myDate"></span> 12 Jan, 2019</div>
                            <div>
                                <button style="background: #005938; color: #ffffff;" class="btn btn-sm calendar-btn">Select Date <i class="fas fa-filter"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 my-0 ml-auto">
                            <input class="calendar d-none" type="date" name="" id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="ministry-stat">
                                <div class="graph-cont">
                                    <img src="{{asset('/images/indicator.png')}}" alt="graph">
                                    <img class="graph-border" src="{{asset('/images/graph-bg.png')}}" alt="graph">
                                </div>
                                <p class="text-center pt-3">Expenditure</p>
                                <p class="rotate-text">Amount Spent (Billion)</p>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="tabs-content" data-tab="6">
                    <div class="row my-3">
                        <div class="col-md-10 mx-auto d-flex">
                            <div class="date mr-auto">Graph (Daily) : <span id="myDate"></span> 12 Jan, 2019</div>
                            <div>
                                <button style="background: #005938; color: #ffffff;" class="btn btn-sm calendar-btn">Select Date <i class="fas fa-filter"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 my-0 ml-auto">
                            <input class="calendar d-none" type="date" name="" id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="ministry-stat">
                                <div class="graph-cont">
                                    <img src="{{asset('/images/indicator.png')}}" alt="graph">
                                    <img class="graph-border" src="{{asset('/images/graph-bg.png')}}" alt="graph">
                                </div>
                                <p class="text-center pt-3">Expenditure</p>
                                <p class="rotate-text">Amount Spent (Billion)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabs-content" data-tab="7">
                    <div class="row my-3">
                        <div class="col-md-10 mx-auto d-flex">
                            <div class="date mr-auto">Graph (Daily) : <span id="myDate"></span> 12 Jan, 2019</div>
                            <div>
                                <button style="background: #005938; color: #ffffff;" class="btn btn-sm calendar-btn">Select Date <i class="fas fa-filter"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 my-0 ml-auto">
                            <input class="calendar d-none" type="date" name="" id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="ministry-stat">
                                <div class="graph-cont">
                                    <img src="{{asset('/images/indicator.png')}}" alt="graph">
                                    <img class="graph-border" src="{{asset('/images/graph-bg.png')}}" alt="graph">
                                </div>
                                <p class="text-center pt-3">Expenditure</p>
                                <p class="rotate-text">Amount Spent (Billion)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
   <!-- <section class="my-5">
       <div class="container">
           <div class="col-md-8 mx-auto chart-2 mb-5 my-5">
                <img src="./images/graph.PNG" alt="">
           </div>
       </div>
   </section> -->
@endsection
@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="{{asset('js/expense-graph.js')}}"></script>
@endsection