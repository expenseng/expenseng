@extends('layouts.master')
@push('css')
  <title>FG Expense - Search</title>
  <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endpush

@section('content')
{{ Breadcrumbs::render('search') }}

    <div class="div1">
        <h1 class="hh1">Search</h1>
        <h6 class="hh2">Use this tool to search through our site for 
            information concerning government expenditures and contractors.</h6>
    </div>

    <div class="div2">
        <form action="" method="get">
            <div class="input1">
                <img class="img1" src="{{ asset('/img/search-icon.png') }}" alt="icon">
                <input type="text" name="stext"  class="input3" id="" placeholder="Search for reports, profiles and projects">
            </div>
                <input type="button" value="search" class="input2">
        </form>
    </div>

    <div class="container">
        <div class="div3">
            <p class="hh3">Popular tags:</p>
            <p class="hh4">infromation and technology</p>
            <p class="hh4">Julius Berger</p>
            <p class="hh4">Elumelu</p>
            <p class="hh4">Lagos ibadan express way</p>
        </div>
    </div>

    <div class="div4">
        <p class="hh5">Search results:</p>
        <div class="div5">
            <div class="diva">
                <p class="hh6">Ministry of Information and Technology</p>
                <p class="hh7">Report</p>
            </div>
            <div class="diva">
                <p class="hh6">Ministry of Information and Technology</p>
                <p class="hh7">Profile</p>
            </div>
            <div class="diva">
                <p class="hh6">Julius Berger</p>
                <p class="hh7">Profile</p>
            </div>
            <div class="diva">
                <p class="hh6">Rehabilitation of Lagos - Ibadan Express way</p>
                <p class="hh7">Profile</p>
            </div>
            <div class="diva">
                <p class="hh6">Ministry of Works</p>
                <p class="hh7">Profile</p>
            </div>
        </div>
    </div>

    <div class="div6">
        <p class="hh8">1-20 of 320 results</p>
        <div class="div7">
            <div class="divb">
                <div class="divc"><img class="img2" src="{{ asset('/img/dir-left.png') }}" alt="icon"></div>
                <div class="divc hh9">1</div>
                <div class="divc">2</div>
                <div class="divc">3</div>
                <div class="divc">4</div>
                <div class="divc">...</div>
                <div class="divc">6<img class="img3" src="{{ asset('/img/dir-right.png') }}" alt="icon"></div>
            </div>
        </div>
    </div>

    <div class="div8">
        <p class="hh10">Related Searches:</p>
        <div class="dive">
        <div class="divd">
            <p class="hh11">Ministry of Works</p>
            <p class="hh12">Profile</p>
        </div></div>

    </div>

@endsection














