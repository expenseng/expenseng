@extends('layouts.master')
@push('css')
  <title>FG Expense - Search</title>
  <link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
  <link rel="stylesheet" href="{{ asset('css/search.css') }}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>

@endpush

@section('content')
    <div class="container">
        {{ Breadcrumbs::render('search') }}
    </div>

    <div class="container">
            <h1 class="hh1">Search</h1>
            <h6 class="hh2">Use this tool to search through our site for
                information concerning government expenditures and contractors.</h6>

        <div class="div2">
            <search></search>
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












