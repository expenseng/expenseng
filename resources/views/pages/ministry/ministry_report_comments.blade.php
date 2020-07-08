@extends('layouts.master')
@push('css')
	<title>Comments</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Mukta:700|Roboto+Slab&display=swap" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/header_footer.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ministry-report-table.css') }}">
	<script src="https://kit.fontawesome.com/8f691340fb.js" crossorigin="anonymous"></script>
@endpush
@section('content')
	<!-- Breadcrumb start -->
	<header class="container section-wrapper">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb bg-white">
				<li class="breadcrumb-item not-active"><a href="#">HOME</a></li>
				<span>&#8226;</span>
				<li class="breadcrumb-item not-active"><a href="#">SPENDING</a></li>
				<span>&#8226;</span>
				<li class="breadcrumb-item active" aria-current="page"><a href="#">MINISTRY SPENDING</a></li>
			</ol>
		</nav>
	</header>
	<section>
		<div class="container ">
			<div class="row">
				<div class="col-md-8 section-heading">
					<h1 class="section-heading-title">Ministry Spending</h1>
					<p class="section-heading-paragraph">ExpenseNG tracks federal spending to ensure taxpayers can see how their money is being used in communities across Nigeria.</p>
				</div>
			</div>
		</div>
		<div class="section-button">
			<div class="container">
				<div class="btn-group col-lg-10 col-md-12 d-flex justify-content-between responsive-button">
					<button class="button active text-left" id="first-btn">Expense Summary</button>
					<button class="button btn-marg text-left">Project Summary</button>
					<button class="button btn-marg text-left">Purchases Summary</button>
					<button class="button btn-marg text-left">No Description</button>
					<button class="button btn-marg text-left"><a href="#">Comments</a></button>
				</div>
				<div class="dropdown">
					<button class="btn btn-success dropdown-toggle responsive-dropdown btn-lg dropdown-button" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Dropdown
					</button>
					<div class="dropdown-menu dropdown-menu-lg-right">
					  <button class="dropdown-item active" type="button">Expense Summary</button>
					  <button class="dropdown-item" type="button">Project Summary</button>
					  <button class="dropdown-item" type="button">Purchases Summary</button>
					  <button class="dropdown-item" type="button">No Description</button>
					  <button class="dropdown-item" type="button"><a href="#">Comments</a></button>
					</div>
				  </div>
			</div>
		</div>
    </section>
    @include('partials.comments')
  <!-- Main body end -->
@endsection


@section('js')
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection