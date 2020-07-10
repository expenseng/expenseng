@extends('layouts.master')
@section('css')
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/aboutus-header_footer.css')}}">
<title>FG Expense - Profile</title>
@endsection

@section('content')


<link rel="stylesheet" href="{{ asset('css/ministry_report_comments.css') }}">
<link rel="stylesheet" href="{{asset('/css/ministry_list_table.css')}}">
<!-- Section-->
<div class="container mt-4 pt-2">
    <div class="container mt-4">

        <div class="row">
            <p id="header" class="font-weight-bold">
                <span class="head-cont text-success"> HOME</span>
                <span class="head-cont dot"> &#8226</span>
                <span class="head-cont text-success"> PROFILES</span>
                <span class="head-cont dot"> &#8226</span>
                <span class="head-cont text-success"> MINISTRIES</span>
                <span class="head-cont dot"> &#8226</span>
                <span class="head-cont text-success"> MINISTRY PROFILE</span>
            </p>
        </div>
    </div>
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
            <div class="sub"><h4 id="minwrks" class="twitter-link"> <a href="{!! url("https://twitter.com/$ministryHandle") !!}">{{$ministry->twitter}}</a></h4>
                 <small>{{date('Y')}}</small></div>
        </div>
        <div class="col">
            <p>Total Amount Spent</p>
            <h4><span class="text-success">&#8358;{{number_format($trend["2020"], 2)}}</span></h4>
            <small>{{date('Y')}}</small>
        </div>
        <div class="col">
            <p>Total Number of Projects</p>
            <h4><span class="text-success">{{count($payments)}}</span></h4>
            <small>{{date('Y')}}</small>
        </div>
    </div>

</div>

<div class="list">
    <!--Tabs Header-->
    <ul class="nav container nav-tabs switch-list py-3 mb-3">
        <li class="ml-3"><a data-toggle="tab" class="active" href="#expense">Expense Summary</a></li>
        <li><a data-toggle="tab" href="#board">Cabinet</a></li>
        <li><a data-toggle="tab" href="#comments">Comments</a></li>
    </ul>

    <hr>
    <!--Tab Body-->
    <div class="tab-content">

        <!--1-->
        <div id="expense" class="tab-pane fade show active">

            <div>
                <div id="table-border" class="container pt-3 mt-4 pb-3">
                    <div class="container pb-3 pt-1 py-4">
                        <div class="row centerize">
                            <div class="col">
                                <h3 class="index">Date: {{date("jS F, Y")}}</h1>
                            </div>

                            <div class="col">
                                <button type="button" class="btn btn-success filter"> Select Date <img
                                        src="/img/vector__2_.png"></button>
                            </div>
                        </div>
                    </div>


                    <div class="container">
                        <div class="table-div">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Project</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (count($payments) > 0)
                                    @php
                                    $back = true;
                                    @endphp
                                    @foreach($payments as $payment)
                                
                                    @php
                                    $back = !$back;
                                    $shade = $back ? 'back': '';
                                    @endphp
                                        <tr class="{{$shade}}">
                                            <td> {{$payment->description}}</td>
                                            <td> {{$payment->beneficiary}}</td>
                                            <td> ₦{{number_format($payment->amount, 2)}}</td>
                                            <td> {{date('jS, M Y', strtotime($payment->payment_date))}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                
                                </tbody>

                            </table>
                        </div>

                        <div class="row centerize mt-3 pt-3">
                            <div class="col-md result text-muted"> 1-20 of 320 results</div>
             
                                <div class="pagination">
                                    <a href="#">&laquo;</a>
                                    <a class="active" href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#">...</a>
                                    <a href="#">6</a>
                                    <a href="#">&raquo;</a>
                                </div>
                          
                        </div>
                    </div>

                </div>




                <div class="mt-5 mb-5">
                    <div class="container mt-5">
                        <div class="min-tab">
                            <div class="row">
                                <table class="minitable table-bordered">
                                    <thead class="thead">
                                        <th class="first-th text-white"> YEAR</th>
                                       
                                        @foreach($trend as $key => $value)
                                            <th>{{$key}}</th>
                                        @endforeach
                                       
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="text-success"> TOTAL<br>AMOUNT </td>
                                            
                                            @foreach($trend as $key => $value)
                                             <td>₦{{ number_format($value, 2) }}</td>
                                            @endforeach
    
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            {{-- <div class=" row mt-4  container centerize">
                                <div class=" col-md min-pag-parent text-muted">1-20 of 320 results </div>
                                <div class=" pagination">
                                    <a href="#">&laquo;</a>
                                    <a class="active" href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#">...</a>
                                    <a href="#">6</a>
                                    <a href="#">&raquo;</a>
                                </div>
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>


    <!--2-->
    <div id="board" class="tab-pane fade">
        <div class="row mt-5 pl-3 d-flex justify-content-lg-around">
            @if ($cabinets)
                @foreach($cabinets as $cabinet)
                @php
                    $ministerHandle = substr($cabinet->twitter, 1)
                @endphp
            <div class="col-lg-3 card border-top-0 border-left-0 border-right-0">
                <div class="card-img" style="display:flex; justify-content: center">
                    <img src="{{$cabinet->avatar}}" class="img-fluid" alt="{{$cabinet->name}}">
                </div>
                <div class="card-body">
                    <div class="card-title">
                    <p class="text-center">{{$cabinet->name}}</p>
                    </div>
                    <div class="card-text">
                        
                        <p class="green text-center">{{$cabinet->role}}</p>
                    </div>
                    <div class="social-handle text-center">
                        <a href="#" class="link ml-2"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                        <a href="{!! url("https://twitter.com/$ministerHandle") !!}" class="link ml-2"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="link ml-2"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#" class="link ml-2"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            
                @endforeach
            @endif
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
<script type="text/javascript">
    $(document).ready(function() {
    $('.tab').click(function() {
        $('.toggle-list.active').removeClass("active");
        $(this).addClass("active");
    });
});
</script>
@endsection