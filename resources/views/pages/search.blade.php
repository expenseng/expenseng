@extends('layouts.master')
@push('css')
<title>FG Expense - Search</title>
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('css/search.css') }}">

@endpush

@section('content')
<div class="container">
    {{ Breadcrumbs::render('search') }}
</div>

<div class="container">
    <h1 class="hh1">Search</h1>
    <h6 class="hh2">Use this tool to search through our site for
        information concerning government expenditures and contractors.</h6>

    <!-- <div class="div2">
            <search></search>
        </div> -->

    <div class="div2">
        <!-- Contracts -->
        <div class="mx-lg-4 px-lg-5 my-lg-4">
            <div class="container-lg-fluid container-xl px-0 px-lg-5 " style="max-width: 1600px; margin-top: 2rem">
                <div>
                    <div class="m-auto" style="max-width: 1700px">
                        <p class="mb-3 specific" style="color:#353A45; font-size:25px; font-weight:bold; text-align:center">Contracts</p>
                    </div>
                    <div class="row">
                        @foreach($contracts as $contract)
                        <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                            <a href="/expenses/{{$contract->slug}}">
                                <div class="card" style="width: 100%; background-color: #FFFFFF; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.04), 0px 2px 6px rgba(0, 0, 0, 0.04), 0px 0px 1px rgba(0, 0, 0, 0.04)">
                                    <div class="card-body" style="padding-top: 10px;">
                                        <h4 style="text-align: center;font-weight: 700;color: #1F2430; font-size: 0.9rem;">{{substr($contract->description, 0, 30)}}...</h4>
                                        <!-- <h6 class="mt-4 text-center" style="font-weight: normal; color:#1F2430; font-style:normal; font-size: 0.8rem">RECEIVED</h6> -->
                                        <p class="mt-4 card-text text-center" style="color: #33A97E; margin-bottom: 5px">₦{{number_format($contract->amount)}}</p>
                                        <p class="card-text text-center" style="color: #1F2430; font-size:12px; font-weight:300">Date:{{$contract->payment_date}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Recipients -->
        <div class="mx-lg-4 px-lg-5 my-lg-4">
            <div class="container-lg-fluid container-xl px-0 px-lg-5 " style="max-width: 1600px; margin-top: 2rem">
                <div>
                    <div class="m-auto" style="max-width: 1700px">
                        <p class="mb-3 specific" style="color:#353A45; font-size:25px; font-weight:bold; text-align:center">Recipients</p>
                    </div>
                    <div class="row">
                        @foreach($contractors as $contractor)
                        <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                            <a href="/companies/{{$contractor->shortname}}">
                                <div class="card" style="width: 100%; background-color: #FFFFFF; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.04), 0px 2px 6px rgba(0, 0, 0, 0.04), 0px 0px 1px rgba(0, 0, 0, 0.04)">
                                    <div class="card-body" style="padding-top: 10px;">
                                        <h4 style="text-align: center;font-weight: 700;color: #1F2430; font-size: 0.9rem;">{{substr($contractor->name, 0, 30)}}...</h4>
                                        <!-- <h6 class="mt-4 text-center" style="font-weight: normal; color:#1F2430; font-style:normal; font-size: 0.8rem">RECEIVED</h6> -->
                                        <!-- <p class="mt-4 card-text text-center" style="color: #33A97E; margin-bottom: 5px">₦{{number_format($contract->amount)}}</p> -->
                                        <!-- <p class="card-text text-center" style="color: #1F2430; font-size:12px; font-weight:300">Date:{{$contract->payment_date}}</p> -->
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="div3">
            <p class="hh3">Popular tags:</p>
            <p class="hh4">infromation and technology</p>
            <p class="hh4">Julius Berger</p>
            <p class="hh4">Elumelu</p>
            <p class="hh4">Lagos ibadan express way</p>
        </div>
    </div>

</div>

@endsection

@section('js')

<script src="{{ asset('js/index.js') }}"></script>


@endsection