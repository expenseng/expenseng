@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('css/contract_page.css') }}">
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>

<title>Federal Government Contractors - ExpenseNG</title>
@endpush


@section('content')
	<section>
      <div class="container header-block">
      {{ Breadcrumbs::render('contractors') }}
      <div class="dropdown d-inline">
        <a class="dropdown-toggle text-secondary" href="#" id="entities-shown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Showing government and private entities
        </a>
        <div class="dropdown-menu" aria-labelledby="entities-shown">
          <a class="dropdown-item" href="#">Show private (individual) entities</a>
          <a class="dropdown-item" href="#">Show private (company) entities</a>
          <a class="dropdown-item" href="#">Show public (government) entities</a>
        </div>
      </div>
        <h1 class="ws-10 font-weight-bold">Companies and Organizations Contracted</h1>
        <br />
        <div class="row">
            <div class="col-md-5">
                <p class="para">ExpenseNG gives an insight to how much is being dispensed to contracted companies.</p>
            </div>
        </div>
      </div>
      <br><br><br>
      <div class="contract-awarded">
      <div class="container">
        <div class="row">
          <div class="col-md-6 pt-2 paragraph">
            <p style="padding:0;">CONTRACTORS AND TOTAL AMOUNT AWARDED</p>
            <hr>
          </div>
          <div id="search-area" class="offset-md-1 col-md-5 mt-3 mt-md-0">
          <div class="input1">

            <form action="/contractors/search" method="POST" role="search">
              {{ csrf_field() }}
              
              <img class="img-search" src="{{ asset('/img/search-icon.png') }}" alt="icon">
                <input name="q" onkeyup="doFilter()" type="search" id="searchInput" class="form-control form-control-lg mb-2 se" placeholder="Search for Contractors and Organisations" value="{{old('q')}}" style="font-family:'Lato';"/>

            </form>

          </div>
        </div>
      </div>
    </div>


    </section>

    <br />
    <div id="contractor" class="container">
    <div class="row" id="contractor-div">

        @foreach ($contractors as $contractor)
          <a href="{{ route('contractors.single', ['company' => $contractor->slug() ]) }}">
            <div class="col-md-4 col-lg-3 mb-3 card-col">
              <div class="card shadow">
                <div class="card-body">
                    <chart label=""
                            v-bind:data="[
                                @if(count($contractor->yearlyTotals)  == 1)
                                  {amount: {{round($contractor->total_amount / rand(1,12) )}}, year: {{$contractor->year->last()}} },
                                  {amount: {{round($contractor->total_amount / rand(1,12) )}}, year: {{$contractor->year->last()}} },  
                                  {amount:{{$contractor->total_amount}}, year:{{$contractor->year->first()}} },
                                  {amount: {{round($contractor->total_amount / rand(1,12) )}}, year: {{$contractor->year->first()}} },
                                  {amount: {{round($contractor->total_amount / rand(1,12) )}}, year: {{$contractor->year->first()}} }, 
                                @endif() 

                                @foreach($contractor->yearlyTotals as $yealyTotals)
                                    {amount: {{round($yealyTotals->total_amount)}}, year: {{$yealyTotals->year}} },
                                @endForeach
                              ]"
                            element="{{ 'id-'. \Str::slug($contractor->beneficiary, '-') . $loop->index }}">
                              
                    </chart>
                    <h3>
                      
                    </h3>
                    <div class="contractor mb-2">
                        <!-- <img src="{{ asset('images/image 13.png') }}" height="30" class="mr-3" alt=""> -->

                        <!-- <a href="{{ route('contractors.single', ['company' => str_replace(' ', '-', $contractor->beneficiary) ]) }}"> -->
                        <!-- <a href="{{ route('contractors.single', ['company' => \Str::slug($contractor->beneficiary, '-') ]) }}"> -->
                        
                          <a href="{{ route('contractors.single', ['company' => \Str::slug($contractor->beneficiary, '-') ]) }}">
                          <h5 class="card-title mb-0" class="contractor-beneficiary">
                            {{ $contractor->beneficiary }}
                          </h5>
                        </a>
                    </div>
                    <h5>Total amount received</h5>
                    <h5 class="text-success">&#8358;{{ number_format($contractor->total_amount, 2) }}</h5>
                    <h6 class="m-0 mb-0 text-sm-left text-black-50">{{ $contractor->year->implode(' , ') }}</h6>
                </div>
              </div>
            </div>
          </a>
        @endforeach
    </div>
    <div class="table-footer">
      <div class="pagination">
        @include('partials.pagination', ['data' => $contractors])
      </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/contract_page.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/index.js') }}"></script>
<script>
  $(".card-col").click(function() {
    window.location = $(this).find("a").attr("href");
    return false;
});
</script>
@endsection
