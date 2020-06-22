@extends('layouts.master')

@section('banner')
    <div class="banner-section">
        <div class="home-banner">Home</div>
        <div class="banner remove-margin-top">
            <h1>Track Government <br>
                Expenses easily</h1>
            <p>Expenseng.com tracks federal spending to ensure citizens can see how their money is being used in communities across Nigeria. It was created to promote transparency and accountability in government operations and transactions. 
                Learn more on how this money was spent with tools to help you navigate spending from top to bottom.</p>
        </div>
    </div>
@endsection

@section('content')
    <main class="container">
        <!-- Chart Header Row -->
        <div id="chart-header-row" class="row justify-content-center align-items-center">
            <div class="col-md-10 text-center font-weight-normal">
                <h3 class="Expenditure-heading">
                    Daily Expenditure in Real Time
                </h3>
            </div>
        </div>
        
        <!-- Toggle Button Row -->
        <div id="toggle-button-row" class="row">
            <div class="col-md-3 offset-md-8">
                <div class="row align-items-center">
                    <div id="chart-button" class="col-md-4 offset-md-4">
                        <button id="chart-btn" onclick="toggleDataPresentation()" 
                                type="button" class="btn btn-md">
                            <i class="fas fa-th fa-2x"></i>
                        </button>
                    </div>
                    <div id="table-button" class="col-md-4">
                        <button id="table-btn" onclick="toggleDataPresentation()" 
                                type="button" class="btn btn-md">
                            <i class="fas fa-list fa-2x"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Date & Filter Row -->
        <div id="date-filter-row" class="row">
            <div class="col-md-3 offset-md-6">
                <div class="row align-items-center">
                    <!-- Report Date -->
                    <div id="report-date-row" class="col-md-8">
                        <span >
                            20th May, 2020
                        </span>
                    </div>
                    <!-- Filter Button -->
                    <div id="filter-button-row" class="col-md-4">
                        <button type="button" class="btn btn-md" 
                                data-toggle="modal" data-target="#filterModal">
                            Filter<i class="fas fa-filter"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Presentation - Chart/Table Row -->
        <div id="data-presentation" class="row">
            <div class="col-md-6 offset-md-2">
                <canvas id="expenditure-chart" height="175">
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
                <div id="chart-key" class="row">
                    <div class="col-md-6">
                        <h5>
                            Key
                        </h5>
                    </div>
                </div>
                <div id="" class="row chart-key-items">
                    <ul class="row list-unstyled align-items-center">
                        <li class="col-4 col-md-12">
                            <svg class="january" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            January
                        </li>
                        <li class="col-4 col-md-12">
                            <svg class="february" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            February
                        </li>
                        <li class="col-4 col-md-12">
                            <svg class="march" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            March
                        </li>
                        <li class="col-4 col-md-12">
                            <svg class="april" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            April
                        </li>
                        <li class="col-4 col-md-12">
                            <svg class="may" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            May
                        </li>
                        <li class="col-4 col-md-12">
                            <svg class="june" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            June
                        </li>
                        <li class="col-4 col-md-12">
                            <svg class="july" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            July
                        </li>
                        <li class="col-4 col-md-12">
                            <svg class="august" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            August
                        </li>
                        <li class="col-4 col-md-12">
                            <svg class="september" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            September
                        </li>
                        <li class="col-4 col-md-12">
                            <svg class="october" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            October
                        </li>
                        <li class="col-4 col-md-12">
                            <svg class="november" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            November
                        </li>
                        <li class="col-4 col-md-12">
                            <svg class="december" width="20" height="20">
                                <rect x="0" y="0" width="25" height="25"/>
                            </svg> 
                            December
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
    </main>

    <!-- BEGINNING OF OUR MAIN FEATURE -->
    <div class="mainfeature-section">
        <div class="mainfeature-heading">
            <h3 >Our Main Features</h3>
        </div>

        <div class="mainfeature-item">
            <div class="left-image"></div>
        
            <div class="right-content">
                <h3 class="green-heading">Ministry Report</h3>
                <p class="mb-5">When validation fails the api will return a 422 code and the errors object
                    containing an array with the field name as the key and the error message as the
                    value.Nested fields use dot notation as shown in the example</p>
                <button class="btn">See Details</button>
            </div>
        </div>

        <div class="mainfeature-item">
            <div class="left-content">
                <h3 class="green-heading">Company Report</h3>
                <p class="mb-5">When validation fails the api will return a 422 code and the errors object
                    containing an array with the field name as the key and the error message as the
                    value.Nested fields use dot notation as shown in the example</p>
                <button class="btn">See Details</button>
            </div>
            <div class="right-image"></div>
        </div>
    </div>
    <!-- END OF MAIN FEATURE LIST -->

    <!-- Connect -->
    <div class="connect">
        <div class ="connect-text">
        <h2>Connect With Us</h2><br>
        <h5>Connect with us via mail. We are always available.
        Describe the issue with your Email address.</h5>
        <h5>Tell us how to the platform has kept you informed. Give us feedbacks on how to inform you better.</h5>
        </div>
        <div class = "social">
            <button>Contact Us</button>
        </div>
    </div>    
@endsection