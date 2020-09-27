@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('css/expense-summary.css') }}">
<title>
    {{ $payment->company }} received &#8358;{{ number_format($payment->amount, 2) }} for {{ $payment->description }}. - ExpenseNG
</title>
@endpush


@section('content')
<div class="container">
    <div class="expense-container">

        {{-- -------------Images Section--------------- --}}

        {{-- <div class="section-images-wrapper d-flex">
            <div class="section-images-grid grid-img-1 col-md-7 col-sm-12">
                <img src="" alt="" class="img-fluid">
            </div>
            <div class="section-images-grid col-md-5 d-none d-sm-none d-md-block">
                <div class="section-grid-2 d-flex flex-column">
                    <img src="{{ asset('img/summary2.svg') }}" alt="" class="img-fluid mb-1">
                    <img src="{{ asset('img/summary2.svg') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div> --}}

        {{-- -------------Date, Project Name and Amount Section------------------ --}}

        <div class="section-date-project-amount">
            <div class="section-date mt-4">
                <p><strong>{{  date("dS, M Y", strtotime($payment->payment_date)) }}</strong></p>
            </div>
            <div class="section-project-amount d-flex justify-content-between flex-md-row">
                <div class="col-9 pl-0">
                    <div class="section-project mt-4 mb-md-4">
                        <p class="project">
                            Project
                        </p>
                        <p class="project-name text-bold">
                            {{ $payment->description }}
                        </p>
                    </div>
                </div>
               <div class="col-3 pl-5">
                <div class="section-amount mt-4 mb-4">
                    <p class="amount">
                        Amount Paid
                    </p>
                    <p class="total-amount text-bold">
                        &#8358;{{ number_format($payment->amount, 2) }}
                    </p>
                </div>
               </div>
            </div>
        </div>

        {{-- --------------Contractors Information and Twitter Handles Section--------------- --}}
        @php
            $companyTwitterHandle = substr($payment->company_twitter, 1);
            $ministryTwitterHandle = substr($payment->ministry_twitter, 1);
            $ministerTwitterHandle = substr($payment->minister_twitter, 1);

            if(count($payment->company()) > 0){
                $recipientType = 'Company';
            }else{
                $recipientType = 'Beneficiary';
            }

        @endphp
        <div class="section-twitter-contractors d-flex justify-content-between flex-md-row">
            <div class="section-contracted-company">
                <div class="section-company-info my-4">
                    <p class="contracted-company">
                        {{ $recipientType }}
                    </p>
                    <p class="contracted-company-name text-bold">
                        {{ $payment->company }}
                    </p>
                </div>
                <div class="section-company-handle mt-md-5 mb-md-4">
                    <p class="company-handle">
                        {{ $recipientType }}’s Twitter Handle
                    </p>
                    @if($payment->company_twitter)
                    <a href="{!! url("https://twitter.com/$companyTwitterHandle") !!}" class="company-twitter-handle link-bold">
                        {{ $payment->company_twitter }}
                    </a>
                    @else
                    <span><strong>N/A</strong></span>
                    @endif
                </div>
            </div>
            <div class="section-contracting-ministry">
                <div class="section-ministry-info my-4">
                    <p class="contracting-ministry">
                        Contracting Ministry
                    </p>
                    <p class="contracting-ministry-name text-bold">
                        Ministry of {{ $payment->ministry }}
                    </p>
                </div>
                <div class="section-ministry-handle  mt-md-5 mb-md-4">
                    <p class="ministry-handle">
                        Ministry’s Twitter Handle
                    </p>
                    <a href="{!! url("https://twitter.com/$ministryTwitterHandle") !!}" class="ministry-twitter-handle link-bold">
                        {{ $payment->ministry_twitter }}
                    </a>
                </div>
            </div>
            <div class="section-contracting-minister">
                <div class="section-minister-info my-4">
                    <p class="contracting-minister">
                        Contracting Minister
                    </p>
                    <p class="contracting-minister-name text-bold">
                        {{ $payment->minister }}
                    </p>
                </div>
                <div class="section-minister-handle  mt-md-5 mb-md-4">
                    <p class="minister-handle">
                        Minister’s Twitter Handle
                    </p>
                    @if($payment->minister_twitter)
                    <a href="{!! url("https://twitter.com/$ministerTwitterHandle") !!}" class="minister-twitter-handle link-bold">
                        {{ $payment->minister_twitter }}
                    </a>
                        @else
                    <strong>
                        N/A
                    </strong>
                    @endif
                </div>
            </div>
        </div>

        <div style="position:relative; background:white; overflow:hidden">
            <input type="text" style="position: absolute; z-index: -1" id="page-link" value={{Request::url()}}>
        </div>

        <div class="section-copy-button my-3">
            <button type="button" onclick="copyLink('page-link')" class="btn copy-button">
                <i class="fa fa-copy mr-2"></i>Copy Page Link
            </button>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/expense_summary.js') }}" type="text/javascript"></script>
@endsection
