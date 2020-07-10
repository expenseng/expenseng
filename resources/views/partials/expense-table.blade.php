@push('css')
    <link rel="stylesheet" href="{{ asset('css/ministry-report-table') }}">
@endpush

	<!---TABLE BEGINS--->
	<section class="bordered">
		<div class="table-section reponsive-div">
			<div class="main-table">
				<div class="table-top p-3 d-flex justify-content-between align-items-center">
					<h3 class="align-self-center">Date: 28th, May 2020</h3>
					<button class="nav-button">Select Date<i class="fas fa-filter px-1" style="font-size: var(--fs-reg);"></i></button>
				</div>
				<div class="table-data">
					<div class=" d-flex flex-row" style="overflow-x: auto;">
						<table id="Table" cell-spacing="0" data-pagination="true" data-page-size="10" class="table table-striped table-responsive-sm table1">
							<thead class="thead1">
								<tr>
									<th class="section-shadow row-ministry">Ministry</th>
								</tr>
							</thead>
							<tbody class="tbody1">
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Labour</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Energy</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Labour</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Energy</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
								<tr>
									<td class="section-shadow"><a href="#" class="text-success">Aviation</a></td>
								</tr>
							</tbody>
						</table>
						<table id="Table" cell-spacing="0" data-pagination="true" data-page-size="10" class="table table-striped table-responsive-sm table2">
							<thead>
								<tr>
									<th class="row-project">Project</th>
									<th class="row-company">Company</th>
									<th class="row-amount">Amount</th>
									<th class="row-date">Date</th>
								</tr>
							</thead>
							<tbody>
								{{-- @foreach ($expenses as $expense)
								<tr>
								<td class="section-shadow"><a href="#" class="text-success">{{Str::ucfirst($expense->ministry)}}</a></td>
								<td>{{$expense->description}}</td>
								<td>{{$expense->company}}</td>
									<td>{{$expense->amount}}</td>
									<td>20th,May 2020</td>
								</tr>
								@endforeach --}}
								
								<tr>
									<td class="table-overflow" >Building of Class Blocks</td>
									<td>Samsung</td>
									<td>&#8358;65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>&#8358;72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Building of Class Blocks</td>
									<td>Samsung</td>
									<td>&#8358;65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>&#8358;72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Building of Class Blocks</td>
									<td>Samsung</td>
									<td>&#8358;65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>&#8358;72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Building of Class Blocks</td>
									<td>Samsung</td>
									<td>&#8358;65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>&#8358;72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Building of Class Blocks</td>
									<td>Samsung</td>
									<td>&#8358;65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>&#8358;72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Building of Class Blocks</td>
									<td>Samsung</td>
									<td>&#8358;65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>&#8358;72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Building of Class Blocks</td>
									<td>Samsung</td>
									<td>&#8358;65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>&#8358;72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Building of Class Blocks</td>
									<td>Samsung</td>
									<td>&#8358;65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>&#8358;72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Building of Class Blocks</td>
									<td>Samsung</td>
									<td>&#8358;65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Rehabilitation of Lagos Ibadan Express-way</td>
									<td>Julius Berger</td>
									<td>&#8358;72,902,001,229</td>
									<td>20th,May 2020</td>
								</tr>
								<tr>
									<td class="table-overflow" >Building of Class Blocks</td>
									<td>Samsung</td>
									<td>&#8358;65,001,901,123</td>
									<td>20th,May 2020</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!---PAGINATION--->
				<div class="table-footer d-flex align-items-center pagination1">
				<span>1-20 of 320 results</span>
				<div class="pagination">
					<a id="prev" href="#">&#8249;</a>
					<a class="active" href="#">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#">..</a>
					<a href="#">6</a>
					<a id="next" href="#">&#8250;</a>
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
									<td class="ministry" class="table-overflow">TOTAL AMOUNT</td>
									<td class="table-overflow">&#8358;12,908,400</td>
									<td class="table-overflow">&#8358;23,388,389</td>
									<td class="table-overflow">&#8358;72,902,001</td>
									<td class="table-overflow">&#8358;23,778,123</td>
									<td class="table-overflow">&#8358;22,343,444</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!---PAGINATION--->
				<div class="table-footer d-flex align-items-center pagination2">
					<span>1-20 of 320 results</span>
					<div class="pagination">
						<a id="prev" href="#">&#8249;</a>
						<a class="active" href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#">..</a>
						<a href="#">6</a>
						<a id="next" href="#">&#8250;</a>
					</div>
				</div>
			</div>
		</div>
	</section>
