@extends('layouts.master')
@push('css')
	<title>Table</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Mukta:700|Roboto+Slab&display=swap" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/header_footer.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ministry-report-table.css') }}">
	<script src="https://kit.fontawesome.com/8f691340fb.js" crossorigin="anonymous"></script>
@endpush

@section('content')
	<!-- Breadcrumb start -->
	<header class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb bg-white">
				<li class="breadcrumb-item"><a href="#">HOME</a></li>
				<li class="breadcrumb-item"><a href="#">REPORTS</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#">MINISTRY REPORTS</a></li>
			</ol>
		</nav>
	</header>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1>Ministry Spending</h1>
					<p>ExpenseNG tracks federal spending to ensure taxpayers can see how their money is being used in communities acros Nigeria. Learn more on how this money was spent with tools to help you navigate spending from top to bottom.</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="btn-group">
				<button class="button active" id="first-btn">Expense Summary</button>
				<button class="button btn-marg">Project Summary</button>
				<button class="button btn-marg">Purchases Summary</button>
				<button class="button btn-marg">No Description</button>
				<button class="button btn-marg"><a href="ministry_report_comments.html">Comments</a></button>
			</div>
		</div>
	</section>
	<!---TABLE BEGINS--->
	<section class="container bordered">
		<div class="table-section reponsive-div">
			<div class="main-table">
				<div class="table-top">
					<h3>20th May, 2020</h3>
					<button>Filter <i class="fas fa-filter"></i></button></h5>
				</div>

				<div class="table-data">
					<div style="overflow-x: auto;">
						<table id="Table" cell-spacing="0" data-pagination="true" data-page-size="10" class="table table-striped table-responsive-sm">
							<thead>
								<tr>
									<th class="tbl-shadow">Ministry</th>
									<th>Project</th>
									<th>Company</th>
									<th>Amount</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($expenses as $expense)
                                <tr>
                                <td class="tbl-shadow"><a href="#" class="text-success">{{Str::ucfirst($expense->ministry)}}</a></td>
                                <td>{{$expense->description}}</td>
                                <td>{{$expense->company}}</td>
									<td>{{$expense->amount}}</td>
									<td>20th,May 2020</td>
								</tr>
                                @endforeach

								{{-- <tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Education</a></td>
									<td>Building of Class Blocks</td>
									<td>Samsung</td>
									<td>N65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Energy</a></td>
									<td>Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>N72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Labour</a></td>
									<td>Building of Class Blocks</td>
									<td>Samsung</td>
									<td>N65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Agriculture</a></td>
									<td>Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>N72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Education</a></td>
									<td>Building of Class Blocks</td>
									<td>Samsung</td>
									<td>N65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Aviation</a></td>
									<td>Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>N72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Education</a></td>
									<td>Building of Class Blocks</td>
									<td>Samsung</td>
									<td>N65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Transport</a></td>
									<td>Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>N72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Education</a></td>
									<td>Building of Class Blocks</td>
									<td>Samsung</td>
									<td>N65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Transport</a></td>
									<td>Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>N72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Education</a></td>
									<td>Building of Class Blocks</td>
									<td>Samsung</td>
									<td>N65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Energy</a></td>
									<td>Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>N72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Labour</a></td>
									<td>Building of Class Blocks</td>
									<td>Samsung</td>
									<td>N65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Agriculture</a></td>
									<td>Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>N72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Education</a></td>
									<td>Building of Class Blocks</td>
									<td>Samsung</td>
									<td>N65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Aviation</a></td>
									<td>Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>N72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Education</a></td>
									<td>Building of Class Blocks</td>
									<td>Samsung</td>
									<td>N65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Transport</a></td>
									<td>Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>N72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="tbl-shadow"><a href="#" class="text-success">Education</a></td>
									<td>Building of Class Blocks</td>
									<td>Samsung</td>
									<td>N65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr> --}}
							</tbody>
						</table>
					</div>
				</div>
				<!---PAGINATION--->
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
		</div>

		<!-- Filter Modal -->
	</section>
	<section class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="table-data">
					<div style="overflow-x: auto;">
						<table id="myTable" cell-spacing="0" data-pagination="true" data-page-size="10" class="table table-bordered table-responsive-sm">
							<thead>
								<tr>
									<th class="active text-center text-white">YEAR</th>
									<th class="text-center text-success text-success">2016</th>
									<th class="text-center text-success">2017</th>
									<th class="text-center text-success">2018</th>
									<th class="text-center text-success">2019</th>
									<th class="text-center text-success">2020</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="ministry">TOTAL AMOUNT</td>
									<td>N12,908,400</td>
									<td>N23,388,389</td>
									<td>N72,902,001</td>
									<td>N23,778,123</td>
									<td>22,343,444</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!---PAGINATION--->
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
		</div>
		</div>
	</section>
@endsection
	<!---TABLE ENDS--->
@section('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="{{ asset('js/main.js') }}"></script>
	<script src="{{ asset('js/ExpenditureScript.js') }}"></script>
@endsection
