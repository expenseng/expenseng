@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="{{asset('/css/expense-summary.css')}}">
@endpush
@section('content')
<div class="container">
    <div class="expense-container">

        {{-- -------------Images Section--------------- --}}

        <div class="section-images-wrapper d-flex">
            <div class="section-images-grid grid-img-1 col-md-7 col-sm-12">
                <img src="" alt="" class="img-fluid">
            </div>
            <div class="section-images-grid col-md-5 d-none d-sm-none d-md-block">
                <div class="section-grid-2 d-flex flex-column">
                    <img src="{{ asset('img/summary2.svg') }}" alt="" class="img-fluid mb-1">
                    <img src="{{ asset('img/summary2.svg') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>

        {{-- -------------Date, Project Name and Amount Section------------------ --}}

        <div class="section-date-project-amount">
            <div class="section-date mt-4">
                <p>20th, May 2020</p>
            </div>
            <div class="section-project-amount d-flex justify-content-between flex-md-row">
                <div class="section-project mt-4 mb-md-4">
                    <p class="project">
                        Project
                    </p>
                    <p class="project-name text-bold">
                        Rehabilitation Of Lagos Ibadan Expressway
                    </p>
                </div>
                <div class="section-amount mt-4 mb-4">
                    <p class="amount">
                        Total Amount Contracted
                    </p>
                    <p class="total-amount text-bold">
                        #132,735,978,986
                    </p>
                </div>
            </div>
        </div>

        {{-- --------------Contractors Information and Twitter Handles Section--------------- --}}

        <div class="section-twitter-contractors d-flex justify-content-between flex-md-row">
            <div class="section-contracted-company">
                <div class="section-company-info my-4">
                    <p class="contracted-company">
                        Contracted Company
                    </p>
                    <p class="contracted-company-name text-bold">
                        Julius Berger
                    </p>
                </div>
                <div class="section-company-handle my-md-4">
                    <p class="company-handle">
                        Company’s Twitter Handle
                    </p>
                    <a href="#" class="company-twitter-handle link-bold">
                        @juliusberger
                    </a>
                </div>
            </div>
            <div class="section-contracting-ministry">
                <div class="section-ministry-info my-4">
                    <p class="contracting-ministry">
                        Contracting Ministry
                    </p>
                    <p class="contracting-ministry-name text-bold">
                        Ministry of Transportation
                    </p>
                </div>
                <div class="section-ministry-handle my-md-4">
                    <p class="ministry-handle">
                        Ministry’s Twitter Handle
                    </p>
                    <a href="#" class="ministry-twitter-handle link-bold">
                        @fedmintransport
                    </a>
                </div>
            </div>
            <div class="section-contracting-minister">
                <div class="section-minister-info my-4">
                    <p class="contracting-minister">
                        Contracting Minister
                    </p>
                    <p class="contracting-minister-name text-bold">
                        Mohammed Musa Bello
                    </p>
                </div>
                <div class="section-minister-handle my-4">
                    <p class="minister-handle">
                        Minister’s Twitter Handle
                    </p>
                    <a href="#" class="minister-twitter-handle link-bold">
                        @mohammedbello
                    </a>
                </div>
            </div>
        </div>
        <div class="section-copy-button my-3">
            <button type="submit" class="btn copy-button">
                <i class="fa fa-copy mr-2"></i>Copy Page Link
            </button>
        </div>
    </div>
</div>
@endsection
