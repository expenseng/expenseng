@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('css/aboutus-header_footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/contract_page.css') }}">
<title>FG Expense - Contracts Page</title>
@endpush


@section('content')
  <header class="container section-wrapper">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-white">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">HOME</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a>CONTRACTORS</a></li>
      </ol>
    </nav>
  </header>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-8 section-heading">
          <h1 class="section-heading-title section-heading-paragraph">Contracted Companies and Organisations </h1>
          <p>ExpenseNG gives an insight to how much is being dispensed to contracted companies.</p>
        </div>
      </div>
    </div>
  </section>
  <div class="container overflow-auto">
      <h6 class="active float-left pb-3 green-text-and-bottom font-weight-bold">COMPANIES AND TOTAL AMOUNTS AWARDED</h6>
      <input type="text" class="form-control float-right d-none d-lg-inline w-50 se" placeholder="&#xf002; Search for companies and Organisations" />
      <input type="text" class="form-control d-lg-none se" placeholder="&#xf002; Search for companies and Organisations" />
  </div>
    <br />
    <div class="container">
    <div class="row">
      @foreach ($companies as $company)
        <div class="col-md-4 mb-3">
          <div class="card shadow">
            <div class="card-body">
                <chart label="myVueChart" 
                        v-bind:data="[{amount:32424, year:2039},{amount:12920923, year:2010}]" 
                        element="{{ $company->shortname() }}"></chart>
                <div class="company mb-2">
                    <img src="{{ asset('images/image 13.png') }}" height="30" class="mr-3" alt="">
                    <a href="{{ route('contractors.single', ['company' => $company->shortname()]) }}">
                      <h5 class="heading mb-0">
                        {{ $company->name }}
                      </h5>
                    </a>
                </div>
                <h5>Total amount Awarded</h5>
                <h5 class="text-success">#123,334,334</h5>
                <h6 class="m-0 mb-0 text-sm-left text-black-50">2019</h6>
            </div>
          </div>
        </div>
      @endforeach        
    </div>
    <div class="table-footer">
      <div class="pagination">
        {{ $companies->links() }}
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