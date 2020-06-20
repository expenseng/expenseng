@extends('layouts.master')
@section('content')
<div id="companySearchPage">
    Company Search
</div>
<section id="searchBackground">
    <div id="searchText">
        Search for Specific Company here, to see their profile
    </div>
    <div id="searchBar">
        <div class="inputdiv">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
        </div>
        <div class="buttondiv">
            <button type="submit">Search</button>
        </div>
    </div>
</section>
@endsection
