@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('css/contracts_awarded.css') }}">
<link rel="stylesheet" href="{{ asset('css/director_board.css') }}">
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">

<title>FG Expense - Contracts</title>
<style type="text/css">
  .content-navigator {
   
    max-width: 250px;
  
}
</style>
@endpush

@section('content')
<!-- Main body start -->
<div class="container">
       {{ Breadcrumbs::render('contractor', $company) }}
       
      
</div>
<section id="main">

  <!-- Start here -->
  <!-- Section 1 -->
  <div class="section-1 container">

    <div class="user-profile">
      <h3 class="name brand-name">
        {{ $company->name }}
        <!-- <img src="{{ asset('images/image 13.png') }}" alt="Berger logo"> -->
      </h3>
      <div class="profile-overview mt-3">
        <div class="row">
          <div class="col-sm-4">
            <p class="font-weight-bold">twitter handle</p>
            <p>{{ 'not available' }}<p>
          </div>
          <div class="col-sm-4">
            <p class="font-weight-bold">Total money received</p>
            <p class="amount-rewarded">
              &#8358;{{ number_format($total_amount, 2) }}
            </p>
           
          </div>
          <div class="col-sm-4">
            <p class="font-weight-bold">Total Number of Payouts</p>
            <p class="contract-number">
              {{ $contracts->total() }}
            </p>
           
          </div>
        </div>
      </div>
    </div>

    <div class="nav content-navigator nav-tabs">
      <a href="#contract" class="active" data-toggle="tab" role="tab">Contract awards</a>
      <a href="#comments" data-toggle="tab" role="tab">Comments</a>
    </div>
  </div>

  <!-- Section 2 Projects -->
  <div class="tab-content">
  <div class="section-2 container table tab-pane fade show active" id="contract" role="tabpanel">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-borderless">
            <thead>
              <tr>
                <td>SN</td>
                <th scope="col">Project</th>
                <th scope="col">Ministry</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
            @foreach($contracts as $contract)
              <tr>
                <td>{{($contracts->currentPage() - 1) * $contracts->perPage() + $loop->iteration }}</td>
                <td>{{$contract->description}}</td>
                <td>{{$contract->organization()}}</td>
                <td>&#8358;{{ number_format($contract->amount, 2) }}</td>
                <td>{{$contract->payment_date}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        
        <!-- Pagination -->
        <div class="">
            @include('partials.pagination_contracts')
        </div>

      </div>
    </div></div>

<!---Comments section-->
  <div class="container tab-pane fade" id="comments" role="tabpanel">
    @include('partials.comments')
  </div>
<!-- Start here -->
</div>
</section>

<!-- Main body end -->
@endsection

@section('js')

@endsection
