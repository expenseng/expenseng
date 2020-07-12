@extends('layouts.master')
@push('css')
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{asset('/css/aboutus-header_footer.css')}}">
<title>FG Expense - Profile</title>
@endpush

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
        <li class="ml-3 tabs active"><a data-toggle="tab" class="active" href="#expense">Expense Summary</a></li>
        <li class="tabs"><a data-toggle="tab" href="#board">Cabinet</a></li>
        <li class="tabs"><a data-toggle="tab" href="#comments">Comments</a></li>
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
                                <h3 id="said-date" class="index">Date: {{date("jS F, Y")}}</h1>
                            </div>

                            <div class="col">
                               
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
                                    <section class="row">
                                        <div class="col-6" style="position:relative">
                                        <p id="filter-choice" class="font-weight-bold">Select Date</p>
                                        <input name="select-date" id="select-date" type="date" class="form-control">
                                        <input name="select-month" id="select-month" class="monthYearPicker form-control" />
                                        <input name="select-year" id="select-year" class="yearPicker form-control" />
                                    </section>
                                    <br>
                                    <section>
                                        <p class="font-weight-bold">View by</p>
                                        <div class="row">
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
                                    <section>
                                        <p class="font-weight-bold">Sort by</p>
                                        <div class="mx-3">
                                            <button id="desc" class="btn btn-block btn-amount">Amount (Highest to Lowest)</button>
                                            <button id="asc" class="btn btn-block btn-amount">Amount (Lowest to Highest)</button>
                                        </div>
                                    </section>
                                    </div>
                                    <!-- Footer -->
                                    <div class="modal-footer">
                                    <button type="button" data-id="{{$ministry->id}}" id="apply-filter" class="btn btn-block active mx-5" data-dismiss="modal">Apply Filter</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End of Filter Modal -->

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

                                <tbody id="expense-table">
                                    @if (count($payments) > 0)
                                        @php
                                        $back = true;
                                        @endphp
                                        @foreach($payments as $payment)
                                    
                                        @php
                                        $back = !$back;
                                        $shade = $back ? 'back': '';
                                        @endphp
                                            <tr  class="{{$shade}}">
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        
    ///////////////////////////////////////////////////////////////////////
    //                 Custom Date-Picker                               //
    /////////////////////////////////////////////////////////////////////
        $(function() {
                $('.monthYearPicker').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'MM yy'
                }).focus(function() {
                    let thisCalendar = $(this);
                    $('.ui-datepicker-calendar').detach();
                    $('.ui-datepicker-close').click(function() {
            let month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            let year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            thisCalendar.datepicker('setDate', new Date(year, month, 1));
                    });
                });
            });

            $(function() {
                $('.yearPicker').datepicker({
                    changeMonth: false,
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'yy'
                }).focus(function() {
                    let thisCalendar = $(this);
                    $('.ui-datepicker-calendar').detach();
                    $('[data-handler="prev"]').hide()
                    $('[data-handler="next"]').hide()
                    $('.ui-datepicker-month').hide()
                    $('.ui-datepicker-close').click(function() {
                    let year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    thisCalendar.datepicker('setDate', new Date(year, 1, 1));
                    });
                });
            });
           
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
        
     const insertCommas = amount =>{
            const parts = amount.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }

    const formatDate = date => {
        const createDate = new Date(date)
        const parts = createDate.toString().split(" ").filter((item, i) => i > 0 && i < 4) 
        return `${parts[1]} ${parts[0]}, ${parts[2]}`
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////

     $('.tabs').click(function() {
            $('.tabs.active').removeClass("active");
            $(this).addClass("active");
     });

        $('#modal').on('click', '.btn', function(e) {
            if(e.target.classList.contains('btn-amount')){
                $('.btn-amount.active').removeClass("active");
                $(this).addClass("active");
            }else if(e.target.classList.contains('btn-date')){
                $('.btn-date.active').removeClass("active");
                $(this).addClass("active");
                if($('.btn-date.active').attr('id') === 'month'){
                    $('#select-date').hide()
                    $('#select-month').show()   
                    $('#select-year').hide()
                    $('#filter-choice').text('Select Month')
                }else if($('.btn-date.active').attr('id') === 'day'){
                    $('#select-date').show()
                    $('#select-month').hide()
                    $('#select-year').hide()
                    $('#filter-choice').text('Select Date')
                }else if($('.btn-date.active').attr('id') === 'year'){
                    $('#select-date').hide()
                    $('#select-month').hide()
                    $('#select-year').show()
                    $('#filter-choice').text('Select Year')
                }
            }        
        });

        $('#apply-filter').on('click', function(){
            const id = $(this).attr("data-id");
            let date, sort;
           
            if($('.btn-date.active').attr('id') === 'day'){
                date = $('#select-date').val()
            }
            else if($('.btn-date.active').attr('id') === 'month'){
                date = $('#select-month').val()
            }
            else if($('.btn-date.active').attr('id') === 'year'){
                date = $('#select-year').val()
            }
            if($('.btn-amount.active').attr('id') === 'asc'){
                sort = 'asc'
            }else if($('.btn-amount.active').attr('id') === 'desc'){
                sort = 'desc'
            }
   
            const data = {id, date}
            if(sort !== undefined){
                data.sort = sort;
            }
            console.log(data)
            $.ajax({
                    url: "/ministry/filterExpenses",
                    method: "GET",
                    data: data,
                    success: function(data){
                        
                        data = JSON.parse(data)
                        console.log(data)
                        const {payments} = data
                        let back = true;
                        let html = "";
                        if(payments.length > 0){
                            for(payment of payments){
                            back = !back;
                            let shade = back ? 'back': '';
                            html +=  `<tr  class="{shade}">
                                        <td> ${payment.description}</td>
                                        <td> ${payment.beneficiary}</td>
                                        <td> ₦${insertCommas(payment.amount.toFixed(2))}</td>
                                        <td> ${formatDate(payment.payment_date)}</td>
                                    </tr>`                     
                            }
                        }else{
                            html += `<b style="color: red">No data available for this day</b>`
                        }
                        let reportDate = /\d{4}-\d{2}-\d{2}/.test(data.givenTime)? formatDate(data.givenTime) : data.givenTime
                        $('#said-date').html(`Date: <span style="color:#1e7e34">${reportDate}</span>`)
                        $('#expense-table').html(html)
                    }

                })
        })
    });
</script>
@endsection