@extends('layouts.master')
@push('css')
  <link rel="stylesheet" href="{{ asset('css/contracts_awarded.css') }}">
  <link rel="stylesheet" href="{{ asset('css/director_board.css') }}">
  <link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
  <title>Money Received by {{ $company->name }} from Nigerian Government - ExpenseNG</title>
@endpush

@section('content')
<!-- Main body start -->
<div class="container header-block">
    {{ Breadcrumbs::render('contractor', $company) }}
    <vote-company-type company-id="{{ $company->id }}"></vote-company-type>
</div>
<section id="main" class="">


  <!-- Start here -->
  <!-- Section 1 -->
  <div class="section-1 container">
    <div class="user-profile">
      <company-type-badge company-id="{{ $company->id }}"></company-type-badge>
      <h3 class="name brand-name">
        {{ $company->name }}
      </h3>
      <div class="profile-overview mt-3">
        <div class="row">
          <div class="col-sm-4">
            <p class="font-weight-bold">Company twitter handle</p>
            <p><a href="{{ $company->twitterUrl() }}" class="twitter-handle">{{ $company->twitter }}</a></p>
          </div>
          <div class="col-sm-4">
            <p class="font-weight-bold">Total amount received</p>
            <p class="amount-rewarded">
               &#8358;{{ number_format($company->payments->sum('amount'), 2) }}
            </p>
          </div>
          <div class="col-sm-4">
            <p class="font-weight-bold">Total Number of Payouts</p>
            <p class="contract-number">
              {{ $company->payments->count() }}
            </p> 
          </div>
        </div>
      </div>
    </div>

    <div class="nav content-navigator nav-tabs">
      <a href="#contract" class="active" data-toggle="tab" role="tab">
        @if($company->isGovtEntity())
          Money Transfer
        @else
          Contract awards
        @endif
      </a>
      <a href="#board" data-toggle="tab" role="tab">Board of Directors</a>
      <a href="#comments" data-toggle="tab" role="tab">Comments</a>
    </div>
  </div>

  <!-- Section 2 -->
  <div class="tab-content">
    <div class="section-2 container table tab-pane fade show active" id="contract" role="tabpanel">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="table-contractors" class="table table-striped">
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
              @foreach($payments = $company->payments()->paginate(10, ['*'], 'page', $page) as $payment)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>
                    <a class="text-success" href="{{ route('expenses.single', $payment->slug) }}">
                      <u>{{ $payment->description }}</u>
                    </a>
                  </td>
                  <td>
                    <a class="text-success" href="{{ route('ministries.single', $payment->ministry()->shortname ) }}">
                      <u>{{ $payment->ministry()->name }}</u>
                    </a> 
                  </td>
                  <td>&#8358;{{ number_format($payment->amount, 2) }}</td>
                  <td title="{{ date('F j, Y', strtotime($payment->payment_date)) }}"> 
                    {{date('jS, M Y', strtotime($payment->payment_date))}}
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>

          <!-- Pagination -->
          <div>
            @include('partials.pagination_contracts')
          </div>
        
        </div>
      </div>
    <!-- Section 3 -->
    <div class="section-3 container mt-4">
      <div class="summary">
        <div class="table-responsive">
          {{-- <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">YEAR</th>
                @foreach($yearlyTotals as $yearlyTotal)
                    <td class="td-year">&#8358;{{ $yearlyTotal->year }}</td>
                @endforeach
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">TOTAL AMOUNT</th>
                @foreach($yearlyTotals as $yearlyTotal)
                    <td class="amount">&#8358;{{ number_format($yearlyTotal->total_amount, 2) }}</td>
                @endforeach
                
              </tr>
            </tbody>
          </table> --}}
        </div>
        <!-- Pagination -->
        <div class="table-pagination .card-text mt-4">
          
        </div>
      </div>
    </div>
  </div>

  <!--Board of Directors-->
  <div class="container tab-pane fade" id="board" role="tabpanel">
    <div class="container-fluid padding">
      <!-- cards -->
      <div class="row padding">
        @foreach($company->approvedPeople() as $people)
          <div class="col-md-3">
              <div class="card">
                <img src="{{ asset($people->avatar) }}" alt="{{ $people->name }}" class="img-fluid">
                  <div class="card-body">
                      <h1 class="card-title director-name mt-2">{{ $people->name }}</h1>
                      <p class="director-title">{{ $people->position }}</p>
                      <div class="socials d-flex justify-content-center align-items-center mt-2">
                          <a href="{{ $people->facebook }}"><i class="fab fa-facebook"></i></a>
                          <a href="{{ $people->twitter }}"><i class="fab fa-twitter"></i></a>
                          <a href="{{ $people->linkedin }}"><i class="fab fa-linkedin"></i></a>
                          <a href="{{ $people->website }}"><i class="fab fa-globe"></i></a>
                      </div>
                  </div>
              </div>
          </div>
        @endforeach  
      </div>
      <suggest-members company="{{ $company->id }}"></suggest-members>
  </div>
</div>

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
<script src="{{ asset('js/index.js') }}"></script>
<script src="{{ asset('js/contract_page.js') }}" type="text/javascript"></script>

@endsection
