@extends('layouts.master')
@push('css')
	<title>Ministry Expenses</title>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	<link rel="stylesheet" href="{{ asset('css/ministry-report-table.css') }}">
	<link rel="stylesheet" href="{{ asset('css/filter.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ministry_report_comments.css') }}">
	<script src="https://kit.fontawesome.com/8f691340fb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
@endpush

@section('content')
	<!-- Breadcrumb start -->
	<header class="container">
		{{ Breadcrumbs::render('expense.ministry') }}

		{{-- <nav aria-label="breadcrumb">
			<ol class="breadcrumb list bg-white">
				<li class="breadcrumb-item not-active"><a href="{{ url('/') }}">HOME</a></li>
				<span>&#8226;</span>
				<li class="breadcrumb-item not-active"><a href="#">EXPENSE</a></li>
				<span>&#8226;</span>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/expense/ministry') }}">MINISTRY SPENDING</a></li>
			</ol>
		</nav> --}}
	</header>
	<section>
		<div class="container ">
			<div class="row">
				<div class="col-md-12 section-heading">
					<h1 class="section-heading-title">Ministry Spending</h1>
                    <p class="section-heading-paragraph">ExpenseNG tracks federal spending to ensure taxpayers can see how their money is being used in communities across Nigeria.</p>

                    <h5>Subscribe to daily  Report</h5>
                    <span>
                        @include('partials.modals.subscription')

                  </span>
				</div>
			</div>
		</div>
		<div class="section-button">
			<div class="container">
				<div class="row px-1">
					<div class="btn-group col-lg-10 col-md-12 d-flex justify-content-between responsive-button nav nav-tabs">
						<a class="btn-marg text-left active button" data-toggle="tab" role="tab" href="#table">Expense Summary</a>
						{{-- Commenting the below out as we don't have data for them yyet --}}
						{{-- <a class="btn-marg text-left button" data-toggle="tab" role="tab" href="">Project Summary</a>
						<a class="btn-marg text-left button" data-toggle="tab" role="tab" href="">Purchases Summary</a> --}}
						<a class="btn-marg text-left button" data-toggle="tab" role="tab" href="#description">No Description</a>
						<a class="btn-marg text-left button" data-toggle="tab" role="tab" href="#comments">Comments</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!---TABLE BEGINS--->
	<div class="tab-content">
		<div class="section-2 tab-pane show fade active" id="table" role="tabpanel">
			<section class="container bordered px-0">
				<div class="table-section reponsive-div">
					<div class="main-table">
						<div class="table-top p-3 d-flex justify-content-between align-items-center">
							<h3 class="align-self-center">Date: <span class="said-date">{{ date("dS, M Y") }}</span></h3>
							<button class="nav-button" data-toggle="modal" data-target="#filterModal">Filter<i class="fas fa-filter px-1" style="font-size: var(--fs-reg);"></i></button>
						</div>
						<!-- Filter Modal -->
						<div id="modal" class="row justify-content-center modals">
							<div class="col-md-8">
								<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
									<div class="modal-content">
										<!-- Header -->
										<div class="modal-header">
										<h5 class="modal-title" id="filterModalLabel">Filter</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										</div>
										<!-- Body -->
										<div class="modal-body">
											<section>
												<p id="view" class="font-weight-bold">View by</p>
												<div id="date-btn" class="row">
													<div class="col-4">
													<button id="day" class="btn btn-block btn-date day active">Day</button>
													</div>
													<div class="col-4">
													<button id="month" class="btn btn-block month btn-date">Month</button>
													</div>
													<div class="col-4">
													<button id="year" class="btn btn-block year btn-date">Year</button>
													</div>
												</div>
											</section>
											<br>
											<section class="row">
												<div class="col-12" >
												<i class="fa fa-calendar" aria-hidden="true"></i>
												<input placeholder="Select Date" name="select-date" id="select-date"  class="byDatePicker form-control">
												<input placeholder="Select Month" name="select-month" id="select-month" class="monthYearPicker form-control" />
												<input placeholder="Select Year" name="select-year" id="select-year" class="yearPicker form-control" />
												<small id="date-format-err"></small>
											</section>
											<br>
											<section id="sort-options">
												<p class="font-weight-bold">Sort by</p>
												<div>
													<button id="desc" class="btn btn-block btn-amount">Amount (Highest to Lowest)</button>
													<button id="asc" class="btn btn-block btn-amount">Amount (Lowest to Highest)</button>
												</div>
											</section>
										</div>
										<!-- Footer -->
										<div class="modal-footer">
										<button type="button" data-id="apply-filter" id="reset" class="btn btn-block active mx-5 reset btn-danger">Reset</button>
										<button type="button" data-id="apply-filter" id="apply-filter" class="btn btn-block active mx-5 apply-filter" data-dismiss="modal">Apply Filter</button>
										</div>
									</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End of Filter Modal -->
						<div id="main-table" data-id="apply-filter" class="table-data">
							@include('pages.expense.tables.ministries')
						</div>

					</div>
				</div>
			</section>
			<section class="container">
				<div class="row">
					<div class="col-md-12 pb-5">
						<div id="mini-table" class="table-data">
							@include('pages.expense.tables.ministries_annual_totals_all')
						</div>
						<!---PAGINATION--->

					</div>
				</div>
			</section>
		</div>
		<div class="section-2 tab-pane fade" id="description" role="tabpanel">
			<section class="container bordered">
				<div class="table-section reponsive-div">
					<div class="main-table">
						<div class="table-top p-3 d-flex justify-content-between align-items-center">
							<h3 class="align-self-center">Payments without description: <span class="said-date"></span></h3>
							<button type="button"  data-toggle="modal" data-target="#filterModal2">Filter <i class="fas fa-filter px-1"></i></button>
						</div>
						<!-- Filter Modal -->
						<div id="modal" class="row justify-content-center modals">
                        <div class="col-md-8">
                            <div class="modal fade" id="filterModal2" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!-- Header -->
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="filterModalLabel">Filter</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <!-- Body -->
                                    <div class="modal-body">
                                        <section>
                                            <p id="view" class="font-weight-bold">View by</p>
                                            <div id="date-btn" class="row">
                                                <div class="col-4">
                                                <button id="day" class="btn btn-block btn-date day active">Day</button>
                                                </div>
                                                <div class="col-4">
                                                <button id="month" class="btn btn-block month btn-date">Month</button>
                                                </div>
                                                <div class="col-4">
                                                <button id="year" class="btn btn-block year btn-date">Year</button>
                                                </div>
                                            </div>
                                        </section>
                                        <br>
                                        <section class="row">
                                            <div class="col-12" >
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <input placeholder="Select Date" name="select-date" id="select-date2"  class="byDatePicker form-control">
                                            <input placeholder="Select Month" name="select-month" id="select-month2" class="monthYearPicker form-control" autocomplete="false" />
                                            <input placeholder="Select Year" name="select-year" id="select-year2" class="yearPicker form-control" />
                                            <small id="date-format-err"></small>
                                        </section>
                                        <br>
                                        <section id="sort-options">
                                            <p class="font-weight-bold">Sort by</p>
                                            <div>
                                                <button id="desc" class="btn btn-block btn-amount">Amount (Highest to Lowest)</button>
                                                <button id="asc" class="btn btn-block btn-amount">Amount (Lowest to Highest)</button>
                                            </div>
                                        </section>
                                    </div>
                                    <!-- Footer -->
                                    <div class="modal-footer">
									<button type="button" data-id="apply-filter2" id="reset2" class="btn btn-block active mx-5 reset btn-danger">Reset</button>
                                    <button type="button" data-id="apply-filter2" id="apply-filter2" class="btn btn-block active mx-5 apply-filter" data-dismiss="modal">Apply Filter</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End of Filter Modal -->
						<div id="main-table2" data-id="apply-filter2" class="table-data">
							@include('pages.expense.tables.ministries_nodesc')
						</div>
						<!---PAGINATION--->
						{{-- @include('partials.pagination', ['data' => $collection['nondescriptive']]) --}}
					</div>
				</div>
			</section>
			<section class="container">
				<div class="row">
					<div class="col-md-8 offset-md-2 pb-5">
						<div class="table-data">
							@include('pages.expense.tables.ministries_annual_totals_nodesc')
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="section-2 tab-pane fade" id="comments" role="tabpanel">
			@include('partials.comments')
		</div>
	</div>
</div>
@endsection
	<!---TABLE ENDS--->
@section('js')
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="{{ asset('js/main.js') }}"></script>
	<script src="{{ asset('js/filter.js') }}"></script>
	<script src="{{ asset('js/ExpenditureScript.js') }}"></script>
	<script src="{{ asset('js/index.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endsection

