@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('css/contracts_awarded.css') }}">
<link rel="stylesheet" href="{{ asset('css/director_board.css') }}">
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">

<title>FG Expense - Contracts</title>
@endpush

@section('content')
<!-- Main body start -->
<div class="container">
       
       {{ Breadcrumbs::render('contractors')}}
      
</div>
<section id="main">

  <!-- Start here -->
  <!-- Section 1 -->
  <div class="section-1 container">
    <div class="user-profile">
      <h3 class="name brand-name">
         {{'NO DATA FOUND FOR THIS CONTRACTOR'}}
      </h3>

    </div>

    <div class="nav content-navigator nav-tabs">
      <a href="#contract" class="active" data-toggle="tab" role="tab">Contract awards</a>
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

        </div>

        <!-- Pagination -->

      </div>
    </div>

  <!-- Section 3 -->
  <div class="section-3 container mt-4">
    <div class="summary">
      <div class="table-responsive">

      </div>
      <!-- Pagination -->
      
    </div>
  </div>
</div>

  <!--Board of Directors-->
  <div class="container tab-pane fade" id="board" role="tabpanel">
    <div class="container-fluid padding"  >
      <!-- cards -->

    <!-- card 2 -->

    <!-- card 3 -->


    <!-- card 4 -->

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
@endsection
