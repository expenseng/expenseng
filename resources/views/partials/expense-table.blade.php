

	<!---TABLE BEGINS--->
	<section class="bordered container">
		<div class="table-section reponsive-div">
			<div class="main-table">
				<div class="table-top p-3 d-flex justify-content-between align-items-center">
					<h3 class="said-date-caption" class="align-self-center">Showing Expenses for <span class="said-date">{{  date("dS, M Y", strtotime($latestDate)) }}</span></h3>
					<button class="nav-button" data-toggle="modal" data-target="#filterModal">Select Date<i class="fas fa-filter px-1" style="font-size: var(--fs-reg);"></i></button>
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
                                            <button id="day2" class="btn btn-block btn-date day active">Day</button>
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
                                <button type="button" data-id="apply-filter-exp" id="reset" class="btn btn-block active mx-5 reset btn-danger">Reset</button>
                                <button type="button" data-id="apply-filter-exp" id="apply-filter" class="btn btn-block active mx-5 apply-filter" data-dismiss="modal">Apply Filter</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Filter Modal -->
				<div class="table-data" data-id="apply-filter-exp">    
					@include('pages.expense.tables.dailyExpenditure')
				</div>
			</div>
		</div>
	</section>
	