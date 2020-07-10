@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('css/aboutus-header_footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/contract_page.css') }}">
<title>FG Expense - Contracts Page</title>
@endpush


@section('content')
<br />
<br />
<br />
 <header class="container header"><!-- Breadcrumb start -->
	<header class="section-wrapper">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb bg-white">
				<li class="breadcrumb-item not-active"><a href="{{ url('/') }}">HOME &nbsp;</a></li>
				<span>&#8226;</span>
				<li class="breadcrumb-item not-active"><a href="#">&nbsp; CONTRACTORS</a></li>
			</ol>
		</nav>
	</header>
	<section>
      <div class="container">
        <h1 class="ws-10 font-weight-bold">Contracted Companies and Organisations</h1>
        <br />
        <div class="row">
            <div class="col-md-5">
                <p class="para">ExpenseNG gives an insight to how much is being dispensed to contracted companies.</p>
            </div>
        </div>
        </div>
        <br>
        <br>
        <br><div class="contract-awarded">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 pt-2 paragraph">
            <p style="padding:0;">COMPANIES AND TOTAL AMOUNT AWARDED</p>
            <hr>
          </div>
          <div id="search-area" class="offset-md-1 col-md-5 mt-3 mt-md-0">
            <input onkeyup="doFilter()" type="search" id="searchInput" class="form-control form-control-lg mb-2 se" placeholder="&#xf002; Search for companies and Organisations" />
          </div>
        </div>
      </div>
    </div>
  </header>
  
    <br />
    <div id="company" class="container">
    <div class="row" id="company-div">

      @foreach ($companies as $company)
        <div class="col-md-3 mb-3 card-col">
          <div class="card shadow">
            <div class="card-body">
                <chart label="myVueChart" 
                        v-bind:data="[{amount:32424, year:2039},{amount:12920923, year:2010}]" 
                        element="{{ $company->shortname() }}"></chart>
                <div class="company mb-2">
                    <img src="{{ asset('images/image 13.png') }}" height="30" class="mr-3" alt="">
                    <a href="{{ route('contractors.single', ['company' => $company->shortname()]) }}">
                      <h5 class="card-title mb-0" class="company-name">
                        {{ $company->name }}
                      </h5>
                    </a>
                </div>
<<<<<<< HEAD
                <h5>Total amount Awarded</h5>
                <h5 class="text-success">&#8358;123,334,334</h5>
=======
                <h5 class="amount">Total amount Awarded</h5>
                <h5 class="text-success">#123,334,334</h5>
>>>>>>> 158d8c524790ec6c60ee6dc558376dcc1bab6653
                <h6 class="m-0 mb-0 text-sm-left text-black-50">2019</h6>
            </div>
          </div>
        </div>
      @endforeach        
    </div>
    <div class="table-footer">
      <div class="pagination">
        @include('partials.pagination', ['data' => $companies])
      </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/contract_page.js') }}" type="text/javascript"></script>
@endsection