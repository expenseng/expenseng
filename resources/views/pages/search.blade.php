@extends('layouts.master')
@push('css')
<title>FG Expense - Search</title>
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
<link rel="stylesheet" href="{{ asset('css/pagination.css') }}">

<style>
    .home-search-button {
        background: #00945e;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.15), 0px 10px 20px rgba(0, 0, 0, 0.04), 0px 2px 6px rgba(0, 0, 0, 0.04), 0px 0px 1px rgba(0, 0, 0, 0.04);
        border-radius: 5px;
        color: #ffffff;
        padding: 5px 15px;
    }
</style>

@endpush

@section('content')
<div class="container">
    {{ Breadcrumbs::render('search') }}
</div>

<div class="container">
    <h1 class="hh1">Search</h1>
    <h6 class="hh2">Use this tool to search through our site for
        information concerning government expenditures and contractors.</h6>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <!-- <form action="/search" method="POST">
            @csrf -->
            <input class="ml-5" type="text" name="text" placeholder="Name of company or contract" id="search_text" style="width: 60%; padding:5px;">
            <button type="button" class="home-search-button" onclick="startSearch()">Start Search</button>
            <!-- </form> -->
        </div>
        <div class="col-sm-2"></div>
    </div>

    <!-- <div class="div2">
            <search></search>
        </div> -->

    <div class="div2">
        <!-- Contracts -->
        @if($contracts)
        <div class="mx-lg-4 px-lg-5 my-lg-4">
            <div class="container-lg-fluid container-xl px-0 px-lg-5 " style="max-width: 1600px; margin-top: 2rem">
                <div>
                    <div class="m-auto" style="max-width: 1700px">
                        <p class="mb-3 specific" style="color:#353A45; font-size:25px; font-weight:bold; text-align:center">Contracts</p>
                    </div>
                    <div class="row" id="contract-container">
                        <!-- @foreach($contracts as $contract)
                        <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                            <a href="/expenses/{{$contract->slug}}">
                                <div class="card" style="width: 100%; background-color: #FFFFFF; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.04), 0px 2px 6px rgba(0, 0, 0, 0.04), 0px 0px 1px rgba(0, 0, 0, 0.04)">
                                    <div class="card-body" style="padding-top: 10px;">
                                        <h4 style="text-align: center;font-weight: 700;color: #1F2430; font-size: 0.9rem;">{{substr($contract->description, 0, 30)}}...</h4>
                                        <p class="mt-4 card-text text-center" style="color: #33A97E; margin-bottom: 5px">₦{{number_format($contract->amount)}}</p>
                                        <p class="card-text text-center" style="color: #1F2430; font-size:12px; font-weight:300">Date:{{$contract->payment_date}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach -->
                    </div>
                    <div id="contract"></div>
                </div>
            </div>
        </div>
        @endif

        <!-- Recipients -->
        @if($contractors)
        <div class="mx-lg-4 px-lg-5 my-lg-4">
            <div class="container-lg-fluid container-xl px-0 px-lg-5 " style="max-width: 1600px; margin-top: 2rem">
                <div>
                    <div class="m-auto" style="max-width: 1700px">
                        <p class="mb-3 specific" style="color:#353A45; font-size:25px; font-weight:bold; text-align:center">Recipients</p>
                    </div>
                    <div class="row" id="contractor-container">
                        <!-- @foreach($contractors as $contractor)
                        <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                            <a href="/companies/{{$contractor->shortname}}">
                                <div class="card" style="width: 100%; background-color: #FFFFFF; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.04), 0px 2px 6px rgba(0, 0, 0, 0.04), 0px 0px 1px rgba(0, 0, 0, 0.04)">
                                    <div class="card-body" style="padding-top: 10px;">
                                        <h4 style="text-align: center;font-weight: 700;color: #1F2430; font-size: 0.9rem;">{{substr($contractor->name, 0, 30)}}...</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach -->
                    </div>
                    <div id="contractor"></div>
                </div>
            </div>
        </div>
        @endif
    </div>

    @if($history)
    <div class="">
        <div class="div3">
            <p class="hh3">Popular tags:</p>
            @foreach($history as $item)
            <p class="hh4">{{$item->text}}</p>
            @endforeach
        </div>
    </div>
    @endif

</div>

@endsection

@section('js')

<script src="{{ asset('js/index.js') }}"></script>
<script src="{{ asset('js/pagination.js') }}"></script>
<script>
    var contracts = {!!json_encode($contracts) !!};
    // console.log(contracts)

    function contractTemplate(data) {
        var html = '';
        $.each(data, function(index, item) {
            // console.log(item, item.amount, item.payment_date)
            html += '<div class="col-lg-3 col-md-4 col-sm-6 my-2">'
            html += '<a href="/expenses/' + item.slug + '"><div class="card" style="width: 100%; background-color: #FFFFFF; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.04), 0px 2px 6px rgba(0, 0, 0, 0.04), 0px 0px 1px rgba(0, 0, 0, 0.04)">'
            html += '<div class="card-body" style="padding-top: 10px;"><h4 style="text-align: center;font-weight: 700;color: #1F2430; font-size: 0.9rem;">'
            html += item.description.substring(0, 30) + '...</h4><p class="mt-4 card-text text-center" style="color: #33A97E; margin-bottom: 5px">₦'
            html += item.amount.toLocaleString() + '</p><p class="card-text text-center" style="color: #1F2430; font-size:12px; font-weight:300">Date:'
            html += item.payment_date + '</p></div></div></a></div>';
        });
        return html;
    }

    $('#contract').pagination({
        dataSource: contracts,
        pageSize: 8,
        autoHidePrevious: true,
        autoHideNext: true,
        callback: function(data, pagination) {
            // template method of yourself
            var html = contractTemplate(data);
            $('#contract-container').html(html);
        }
    })

    var contractors = {!!json_encode($contractors) !!};

    function contractorTemplate(data) {
        var html = '';
        $.each(data, function(index, item) {
            html += '<div class="col-lg-3 col-md-4 col-sm-6 my-2">'
            html += '<a href="/companies/' + item.shortname + '"><div class="card" style="width: 100%; background-color: #FFFFFF; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.04), 0px 2px 6px rgba(0, 0, 0, 0.04), 0px 0px 1px rgba(0, 0, 0, 0.04)">'
            html += '<div class="card-body" style="padding-top: 10px;"><h4 style="text-align: center;font-weight: 700;color: #1F2430; font-size: 0.9rem;">'
            html += item.name.substring(0, 30) + '...</h4></div></div></a></div>';
        });
        return html;
    }

    $('#contractor').pagination({
        dataSource: contractors,
        pageSize: 8,
        autoHidePrevious: true,
        autoHideNext: true,
        callback: function(data, pagination) {
            // template method of yourself
            var html = contractorTemplate(data);
            $('#contractor-container').html(html);
        }
    })
</script>


@endsection