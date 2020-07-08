@extends('layouts.master')

@section('banner')
    <div class="banner-section">
        <div class="home-banner">Company Report</div>
        <div class="banner remove-margin-top">
            <h1>Beneficiary Companies Report<br</h1>
            <p class="text-center">Explore the amount allocated to every Company for different projects in both graphical and tabular format. Increase your knowledge about how much each beneficiary company gets allocated for projects</p>
        </div>
    </div>
@endsection
	
@section('content')
	    <section id="chart" class="project-container">
        <!-- Chart Header Row -->
        <div id="chart-header-row" class="row justify-content-center align-items-center">
            <div class="col-md-10 text-center font-weight-normal">
                <!-- <h3 class="Expenditure-heading">
                    Daily Expenditure in Real Time
                </h3> -->
            </div>
        </div>


        <!-- Data Presentation - Chart/Table Row -->
        <div id="data-presentation" class="row" style="background: #8ed05812">

<!--         	<div class="col-md-3 pull-right offset-md-9">
                <div class="row align-items-center">
                    <div id="filter-button-row" class="col-md-4">
                        <button type="button" class="btn btn-md" 
                                data-toggle="modal" data-target="#filterModal">
                            Filter<i class="fas fa-filter"></i>
                        </button>
                    </div>
                </div>
            </div> -->

            <div class="col-md-6 offset-md-2">
                <canvas id="expenditure-chart" height="175" style="background: white">
                	
                </canvas>
                <!-- X-Axis Legend -->
                <div id="x-axis" class="row chart-key-items">
                    <ul class="row list-unstyled align-items-center">
                        <li class="col-1">
                            <svg class="january" width="15" height="15">
                                <rect x="0" y="0" width="15" height="15"/>
                            </svg> 
                        </li>
                        <li class="col-1">
                            <svg class="february" width="15" height="15">
                                <rect x="0" y="0" width="15" height="15"/>
                            </svg> 
                        </li>
                        <li class="col-1">
                            <svg class="march" width="15" height="15">
                                <rect x="0" y="0" width="15" height="15"/>
                            </svg> 
                        </li>
                        <li class="col-1">
                            <svg class="april" width="15" height="15">
                                <rect x="0" y="0" width="15" height="15"/>
                            </svg> 
                        </li>
                        <li class="col-1">
                            <svg class="may" width="15" height="15">
                                <rect x="0" y="0" width="15" height="15"/>
                            </svg> 
                        </li>
                        <li class="col-1">
                            <svg class="june" width="15" height="15">
                                <rect x="0" y="0" width="15" height="15"/>
                            </svg> 
                        </li>
                        <li class="col-1">
                            <svg class="july" width="15" height="15">
                                <rect x="0" y="0" width="15" height="15"/>
                            </svg> 
                        </li>
                        <li class="col-1">
                            <svg class="august" width="15" height="15">
                                <rect x="0" y="0" width="15" height="15"/>
                            </svg> 
                        </li>
                        <li class="col-1">
                            <svg class="september" width="15" height="15">
                                <rect x="0" y="0" width="15" height="15"/>
                            </svg> 
                        </li>
                        <li class="col-1">
                            <svg class="october" width="15" height="15">
                                <rect x="0" y="0" width="15" height="15"/>
                            </svg> 
                        </li>
                        <li class="col-1">
                            <svg class="november" width="15" height="15">
                                <rect x="0" y="0" width="15" height="15"/>
                            </svg> 
                        </li>
                        <li class="col-1">
                            <svg class="december" width="15" height="15">
                                <rect x="0" y="0" width="15" height="15"/>
                            </svg> 
                        </li>
                    </ul>
                </div> 
                <!-- X-Axis Label -->
                <div class="row justify-content-center">
                    <div class="col-md-4 text-center">
                        <span id="x-axis-label">
                            Months
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 offset-md-1">
            <div id="filter-button-row" class="col-md-4">
                        <button type="button" class="btn btn-md" 
                                data-toggle="modal" data-target="#filterModal">
                            Filter<i class="fas fa-filter"></i>
                        </button>
                    </div>
                <div id="chart-key" class="row">
                    <div class="col-md-6">
                        <h5>
                            Key
                        </h5>
                    </div>
                </div>
                <div id="" class="row chart-key-items">
                    <ul class="row list-unstyled align-items-center">
                        <li class="col-4 col-md-12 m-1">
                            <svg class="january" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            Julius Berger
                        </li>
                        <li class="col-4 col-md-12 m-1">
                            <svg class="february" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            Knight Corp
                        </li>
                        <li class="col-4 col-md-12 m-1">
                            <svg class="march" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            Samsung
                        </li>
                        <li class="col-4 col-md-12 m-1">
                            <svg class="april" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            CCNCC
                        </li>
                        <li class="col-4 col-md-12 m-1">
                            <svg class="may" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            HNG
                        </li>
                        <li class="col-4 col-md-12 m-1">
                            <svg class="june" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            Hauwie
                        </li>
                        <li class="col-4 col-md-12 m-1">
                            <svg class="july" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            July
                        </li>
                        <li class="col-4 col-md-12 m-1">
                            <svg class="august" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            MTN
                        </li>
                        <li class="col-4 col-md-12 m-1">
                            <svg class="september" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            Setraco
                        </li>
                        <li class="col-4 col-md-12 m-1">
                            <svg class="november" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            Dangote Group
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Filter Modal -->
        <div class="row justify-content-center">
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
                        <section class="row">
                            <div class="col-6">
                            <p class="font-weight-bold">Select Date</p>
                            <input type="date" name="" id="" class="form-control">
                            </div>
                        </section>
                        <br>
                        <section>
                            <p class="font-weight-bold">View by</p>
                            <div class="row">
                                <div class="col-4">
                                <button class="btn btn-block btn-pick active">Day</button>
                                </div>
                                <div class="col-4">
                                <button class="btn btn-block btn-pick">Month</button>
                                </div>
                                <div class="col-4">
                                <button class="btn btn-block btn-pick">Year</button>
                                </div>
                            </div>
                        </section>
                        <br>
                        <section>
                            <p class="font-weight-bold">Sort by</p>
                            <div class="mx-3">
                                <button class="btn btn-block btn-pick active">Amount (Highest to Lowest)</button>
                                <button class="btn btn-block btn-pick">Amount (Lowest to Highest)</button>
                            </div>
                        </section>
                        </div>
                        <!-- Footer -->
                        <div class="modal-footer">
                        <button type="button" class="btn btn-block active mx-5" data-dismiss="modal">Apply Filter</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- Chart Presentation ends here -->
    <section> <!-- Tabular Presentation begins here -->
    	<div class="table-section reponsive-div">
        <div class="main-table">
          <div class="table-top">
            <h6>Daily Expenditure</h6>
            <p>Amount Spent: <span>124,3453.00</span></p>
            <button class="col-md-2">Filter <i class="fas fa-filter"></i></button>
          </div>
          <div class="table-data">
            <div style="overflow-x: auto;">
              <table>
                <tr>
                  <th>COMPANY</th>
                  <th>MINISTRY</th>
                  <th>PROJECT</th>
                  <th>AMOUNT</th>
                  <th>DATE</th>
                </tr>
                <tr>
                  <td>JULIUS BERGER</td>
                  <td>Transport</td>
                  <td>Rehabilitation of Lagos</td>
                  <td>72,874,647.00</td>
                  <td>20th, may 2020</td>
                </tr>
                <tr>
                  <td>DATATA</td>
                  <td>Education</td>
                  <td>Building of Class Blocks</td>
                  <td>72,874,647.00</td>
                  <td>20th, may 2020</td>
                </tr>
                <tr>
                  <td>MTN</td>
                  <td>ICT</td>
                  <td>Internet Services</td>
                  <td>72,874,647.00</td>
                  <td>20th, may 2020</td>
                </tr>
                <tr>
                  <td>Julius Berger</td>
                  <td>Transport</td>
                  <td>Rehabilitation of Lagos</td>
                  <td>72,874,647.00</td>
                  <td>20th, may 2020</td>
                </tr>
                <tr>
                  <td>CCNCC</td>
                  <td>Transport</td>
                  <td>Rehabilitation of Lagos</td>
                  <td>72,874,647.00</td>
                  <td>20th, may 2020</td>
                </tr>
                <tr>
                  <td>CAT</td>
                  <td>Transport</td>
                  <td>Rehabilitation of Lagos</td>
                  <td>72,874,647.00</td>
                  <td>20th, may 2020</td>
                </tr>
                <tr>
                  <td>SMile</td>
                  <td>ICT</td>
                  <td>Internet Services</td>
                  <td>72,874,647.00</td>
                  <td>20th, may 2020</td>
                </tr>
                <tr>
                  <td>DATATA</td>
                  <td>Education</td>
                  <td>Building of Class Blocks</td>
                  <td>72,874,647.00</td>
                  <td>20th, may 2020</td>
                </tr>
                <tr>
                <tr>
                  <td>AIRTEL</td>
                  <td>ICT</td>
                  <td>Internet Services</td>
                  <td>72,874,647.00</td>
                  <td>20th, may 2020</td>
                </tr>
                <tr>
                  <td>ASSU</td>
                  <td>Education</td>
                  <td>Member Staff Benefits</td>
                  <td>72,874,647.00</td>
                  <td>20th, may 2020</td>
                </tr>
                 <tr>
                  <td>Unilever</td>
                  <td>Education</td>
                  <td>School Feeding Program at Kwasan</td>
                  <td>72,874,647.00</td>
                  <td>20th, may 2020</td>
                </tr>
                 <tr>
                  <td>CCNCC</td>
                  <td>Transport</td>
                  <td>Rehabilitation of Lagos</td>
                  <td>72,874,647.00</td>
                  <td>20th, may 2020</td>
                </tr>
                <tr>
                  <td>Glo</td>
                  <td>ICT</td>
                  <td>Internet Services</td>
                  <td>72,874,647.00</td>
                  <td>20th, may 2020</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="table-footer">
            <span> 1-20 of 320 results </span>
            <div class="pagination">
              <a href="#"><i class="fas fa-less-than"></i></a>
              <a href="#">1</a>
              <a class="active" href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">6</a>
              <a href="#"><i class="fas fa-greater-than"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
@endsection
