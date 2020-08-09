@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('css/ministry_report_comments.css') }}">
<link rel="stylesheet" href="{{asset('/css/ministry_list_table.css')}}">
<link rel="stylesheet" href="/css/modal/style.css">
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>


<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
<title>FG Expense - Profile</title>
@endpush

@section('content')
<!-- Section-->
<div class="container">
    {{ Breadcrumbs::render('ministry', $ministry) }}
</div>
<div class="container d-flex centerize py-4">
    <div class="ministry-logo d-flex ">
        <img src="{{asset('/img/image_7.png')}}" class="ministry-logo-image" alt="ministry logo">
    </div>
    <div class="ministry">
        <h1 class="font-weight-bold">{{$ministry->name}}</h1>
    </div>
</div>

<div class="container intro mb-4 mt-4">
    <div class="row stats">
        <div class="col">
            <p>Ministry Twitter Handle</p>

            @php
                $ministryHandle = substr($ministry->twitter, 1)
            @endphp
            <div class="sub"><h4 id="minwrks" class="twitter-link"> <a target = "_blank" href="{!! url("https://twitter.com/$ministryHandle") !!}">{{$ministry->twitter}}</a></h4>
                 <small>{{date('Y')}}</small></div>
        </div>
        <div class="col">
            <p>Total Amount Spent</p>
            <h4><span class="text-success">&#8358;{{number_format($trend[date('Y')], 2)}}</span></h4>
            <small>{{date('Y')}}</small>
        </div>
        <div class="col">
            <p>Total Number of Payouts</p>
            <h4><span class="text-success">{{$count}}</span></h4>
            <small>{{date('Y')}}</small>
        </div>
    </div>

</div>

<div class="list">
    <!--Tabs Header-->
    <ul class="nav container nav-tabs switch-list py-3 mb-3">
        <li class="ml-3 tabs active"><a data-toggle="tab" class="active" href="#expense">Expenses</a></li>
        <li class="tabs"><a data-toggle="tab" href="#board">Cabinet</a></li>
        <li class="tabs"><a data-toggle="tab" href="#comments">Comments</a></li>
    </ul>

    <hr>
    <!--Tab Body-->
    <div class="tab-content">

        <!--1-->
        <div id="expense" class="tab-pane fade show active">
            <div id="search-tools" class="container d-flex justify-content-end mt-4 pr-0">
                <div id="search-area" class="col-md-5 col-lg-4 mt-3 mt-md-0 px-0">
                    <input type="search" data-id="{{$ministry->id}}" id="expense_search" class="form-control form-control-lg mb-2" style="font-family:Arial, FontAwesome; height:38px;" placeholder="&#xf002; Search for a project">
                        @csrf
                </div>
            </div>
            <div class="main-table">
                <div id="table-border" class="container pt-3 mt-3 pb-3">
                    <div class="container pb-3 pt-1 py-4">
                        <div class="row centerize">
                            <div class="col-9">
                            <!-- Test -->
                                <h4 class="said-date-caption" class="align-self-center">Showing expenses for <span class="said-date">{{  date("dS, M Y", strtotime($latestDate)) }}</span></h4>
                            </div>

                            <div class="col-3">

                                <button type="button"  data-toggle="modal" data-target="#filterModal" class="btn btn-success filter"> Select Date <img
                                        src="/img/vector__2_.png"></button>
                            </div>
                        </div>
                    </div>

                     <!-- Filter Modal -->
                    <div id="modal" class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <!-- Header -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="filterModalLabel">Filter</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- Body -->
                                        <div class="modal-body">
                                            <section>
                                                <p id="view" class="font-weight-bold">View by</p>
                                                <div id="date-btn" class="row">
                                                    <div class="col-4">
                                                    <button id="day" class="btn btn-block btn-date active">Day</button>
                                                    </div>
                                                    <div class="col-4">
                                                    <button id="month" class="btn btn-block btn-date">Month</button>
                                                    </div>
                                                    <div class="col-4">
                                                    <button id="year" class="btn btn-block btn-date">Year</button>
                                                    </div>
                                                </div>
                                            </section>
                                            <br>
                                            <section class="row">
                                                <div class="col-12" >
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <input placeholder="Select Date" name="select-date" id="select-date"  class="byDatePicker form-control">
                                                    <input placeholder="Select Month" name="select-month" id="select-month" class="monthYearPicker form-control" />
                                                    <input placeholder="Select Year" name="select-year" id="select-year" class="yearPicker form-control" />
                                                    <small id="date-format-err"></small>
                                                </div>
                                            </section>
                                            <br>
                                            <section id="sort-options">
                                                <p class="font-weight-bold">Sort by</p>
                                                <div>
                                                    <button id="desc" class="btn btn-block btn-amount">Amount (Highest to Lowest)</button>
                                                    <button id="asc" class="btn btn-block btn-amount">Amount (Lowest to Highest)</button>
                                                </div>
                                            </section>
                                        </div>
                                        <!-- Footer -->
                                        <div class="modal-footer">
                                            <button type="button" data-id="{{$ministry->id}}" id="reset" class="btn btn-block active mx-5 reset btn-danger">Reset</button>
                                            <button type="button" data-id="{{$ministry->id}}" id="apply-filter" class="btn btn-block active mx-5" data-dismiss="modal">Apply Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End of Filter Modal -->

                    <div id="tbl" class="container">
                        @include('pages.ministry.pagination')
                    </div>

                </div>

                
            </div>
        </div>
    

    <!--2-->
    <div id="board" class="tab-pane fade">
        <div class="row my-5 pl-3 d-flex justify-content-lg-around">
            @if ($cabinets)
                @foreach($cabinets as $cabinet)
                @php
                    $ministerTwitterHandle = substr($cabinet->twitter_handle, 1);
                    $ministerFacebookHandle = substr($cabinet->facebook_handle, 1);
                    $ministerLinkedInHandle = substr($cabinet->linkedIn_handle, 1);
                    $ministerInstagramHandle = substr($cabinet->Instagram_handle, 1);
                @endphp

            <div class="col-lg-3 card border-top-0 border-left-0 border-right-0">
                <div class="card-img" style="display:flex; justify-content: center; padding:1.25rem 1.25rem 0;">
                    <img src="{{$cabinet->avatar}}" class="img-fluid" alt="{{$cabinet->name}}">
                </div>
                <div class="card-body">
                    <div class="card-title">
                    <p id="minister-name" class="text-center font-weight-bold">{{$cabinet->name}}</p>
                    <p class="text-success text-center">{{$cabinet->role}}</p>
                    </div>

                    <div class="social-handle text-center">
                        @if($ministerFacebookHandle)
                        <a href="#" class="link"><i class="fab fa-facebook" aria-hidden="true" target="_blank"></i></a>
                        @endif
                        @if($ministerTwitterHandle)
                        <a href="{!! url("https://twitter.com/$ministerTwitterHandle") !!}" class="link ml-2" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                        @endif
                        @if($ministerLinkedInHandle)
                        <a href="#" class="link ml-2"><i class="fab fa-linkedin" aria-hidden="true" target="_blank"></i></a>
                        @endif
                        @if($ministerInstagramHandle)
                        <a href="#" class="link ml-2"><i class="fab fa-instagram" aria-hidden="true" target="_blank"></i></a>
                        @endif
                    </div>
                </div>
            </div>

                @endforeach
            @endif
        </div>
        {{-- cabinet member --}}

        <h3 style='color: #353A45; text-align:center;margin-top: 15px'>Suggest Cabinet Members</h3>

        <center>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="background: 353A45;margin-bottom: 20px;">
        Suggest a Cabinet Member
        </button>
        </center>

        <!-- Modal -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" class="text-light">Suggestion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  action=" {!! url('/feedback') !!}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
            <label for="firstName">Firstname</label>
            <input type="text" name="firstName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Firstname">
            </div>
            <div class="form-group">
            <label for="lastName">Lastname</label>
            <input type="text" name="lastName" class="form-control" id="exampleInputPassword1" placeholder="Lastname">
            </div>

            <div class="form-group">
            <label for="ministry">Ministry</label>
            <select id="inputState" readonly class="form-control" name="ministry_id">
                <option class="mb-1"  value="{{$ministry->id}}">{{$ministry->shortname}}</option>
            </select>
            </div>
        <center>
            <button type="submit" class="btn btn-success ">Submit</button>
        </center>

        </form>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!--3-->
        <div id="comments" class="tab-pane fade">
            @include('partials.comments')
        </div>
    </div>
</div>


@endsection


@section('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('js/index.js') }}"></script>
<script src="{{ asset('js/ministry_profile.js') }}" type="text/javascript"></script>
@endsection
