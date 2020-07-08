@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('css/aboutus-header_footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/contract_page.css') }}">
<title>FG Expense - Contracts Page</title>
@endpush


@section('content')
 <header class="container">
        <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-white">
        <li class="breadcrumb-item"><a href="#">HOME</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#">CONTRACTORS</a></li>
      </ol>
    </nav>
      </header>
      <div class="container">
        <h1>Contracted Companies and Organisations </h1>
        <div class="row">
            <div class="col-md-5">
                <p>ExpenseNG gives an insight to how much is being dispensed to contracted companies.</p>
            </div>
        </div>
        </div>
    <div class="container overflow-auto">
        <h6 class="active float-left pb-3 green-text-and-bottom font-weight-bold">COMPANIES AND TOTAL AMOUNTS AWARDED</h6>
        <input type="text" class="form-control float-right d-none d-lg-inline w-50 se" placeholder="&#xf002; Search for companies and Organisations" />
        <input type="text" class="form-control d-lg-none se" placeholder="&#xf002; Search for companies and Organisations" />
    </div>
    <br />
    <div class="container">
    <div class="row">
        <div class="col-md-3">
          <div class="card shadow">
            <div class="card-body">
              <div id="chart"></div>
                <div class="company">
                    <img src="./image 13.png" alt="">
                    <h5 class="heading">Julius Bergar</h5>
                </div>
                <h5>Total amount Awarded</h5>
                <h5 class="text-success">#123,334,334</h5>
                <h6>2019</h6>
            </div>
          </div>
        </div>
        
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