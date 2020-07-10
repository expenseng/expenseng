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
 <header class="container"><!-- Breadcrumb start -->
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
                <p>ExpenseNG gives an insight to how much is being dispensed to contracted companies.</p>
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
                <h5>Total amount Awarded</h5>
                <h5 class="text-success">&#8358;123,334,334</h5>
                <h6 class="m-0 mb-0 text-sm-left text-black-50">2019</h6>
            </div>
          </div>
        </div>
      @endforeach        
    </div>
    <div class="table-footer">
      <span> 1-20 of 320 results </span>
      <div class="pagination">
        <a href="#">&#8249;</a>
        <a class="active" href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">..</a>
        <a href="#">6</a>
        <a href="#">&#8250;</a>
      </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('js/contract_page.js') }}" type="text/javascript"></script>
@endsection