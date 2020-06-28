@extends('layouts.master')

@section('banner')
<div class="banner-section">
    <div class="home-banner">Expenditure Report</div>
    <div class="banner">
        <h1>Expenditure Report </h1> 
        <p>Explore the amount allocated to every ministry in both graphical and tabular format. Increase your knowledge about how much each ministry gets allocated every month. and how much they spend.</p>
    </div>
</div>
@endsection

@section('content')
<!-- Chart Header Row -->
<div id="chart-header-row" class="row justify-content-center align-items-center">
    <div class="col-md-10 text-center font-weight-normal">
        <h3>
            Top 10 Costly Expenditure
        </h3>
    </div>
</div>
<!-- Date & Filter Row -->
<div id="date-filter-row" class="row">
    <div class="col-md-3 offset-md-6">
        <div class="row d-flex align-items-center">
            <!-- Report Date -->
            <div id="report-date-row" class="col-md-8">
                <h5>Selected date:<span>20th May, 2020</span></h5>
            </div>
            <!-- Filter Button -->
            <div id="filter-button-row" class="col-md-4 filter-btn">
                <button type="button" class="btn btn-md" data-toggle="modal" data-target="#filterModal">
                    Filter<i class="fas fa-filter"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Data Presentation - Chart/Table Row -->
<div id="chart" class="row">
    <div class="col-md-6 offset-md-2 px-3">
        <canvas id="expenditure-chart" height="175">
        </canvas>
        <!-- X-Axis Legend -->
        <div id="x-axis" class="row chart-key-items">
            <ul class="row list-unstyled align-items-center">
                <li class="col-1">
                    <svg class="january" width="15" height="15">
                        <rect x="0" y="0" width="15" height="15" />
                    </svg>
                </li>
                <li class="col-1">
                    <svg class="february" width="15" height="15">
                        <rect x="0" y="0" width="15" height="15" />
                    </svg>
                </li>
                <li class="col-1">
                    <svg class="march" width="15" height="15">
                        <rect x="0" y="0" width="15" height="15" />
                    </svg>
                </li>
                <li class="col-1">
                    <svg class="april" width="15" height="15">
                        <rect x="0" y="0" width="15" height="15" />
                    </svg>
                </li>
                <li class="col-1">
                    <svg class="may" width="15" height="15">
                        <rect x="0" y="0" width="15" height="15" />
                    </svg>
                </li>
                <li class="col-1">
                    <svg class="june" width="15" height="15">
                        <rect x="0" y="0" width="15" height="15" />
                    </svg>
                </li>
                <li class="col-1">
                    <svg class="july" width="15" height="15">
                        <rect x="0" y="0" width="15" height="15" />
                    </svg>
                </li>
                <li class="col-1">
                    <svg class="august" width="15" height="15">
                        <rect x="0" y="0" width="15" height="15" />
                    </svg>
                </li>
                <li class="col-1">
                    <svg class="september" width="15" height="15">
                        <rect x="0" y="0" width="15" height="15" />
                    </svg>
                </li>
                <li class="col-1">
                    <svg class="october" width="15" height="15">
                        <rect x="0" y="0" width="15" height="15" />
                    </svg>
                </li>
                <li class="col-1">
                    <svg class="november" width="15" height="15">
                        <rect x="0" y="0" width="15" height="15" />
                    </svg>
                </li>
                <li class="col-1">
                    <svg class="december" width="15" height="15">
                        <rect x="0" y="0" width="15" height="15" />
                    </svg>
                </li>
            </ul>
        </div>
        <!-- X-Axis Label -->
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <span id="x-axis-label">
                    Projects
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
                        <rect x="0" y="0" width="25" height="25" />
                    </svg>
                    Project
                </li>
                <li class="col-4 col-md-12">
                    <svg class="february" width="20" height="20">
                        <rect x="0" y="0" width="25" height="25" />
                    </svg>
                    Project
                </li>
                <li class="col-4 col-md-12">
                    <svg class="march" width="20" height="20">
                        <rect x="0" y="0" width="25" height="25" />
                    </svg>
                    Project
                </li>
                <li class="col-4 col-md-12">
                    <svg class="april" width="20" height="20">
                        <rect x="0" y="0" width="25" height="25" />
                    </svg>
                    Project
                </li>
                <li class="col-4 col-md-12">
                    <svg class="may" width="20" height="20">
                        <rect x="0" y="0" width="25" height="25" />
                    </svg>
                   Project
                </li>
                <li class="col-4 col-md-12">
                    <svg class="june" width="20" height="20">
                        <rect x="0" y="0" width="25" height="25" />
                    </svg>
                    Project
                </li>
                <li class="col-4 col-md-12">
                    <svg class="july" width="20" height="20">
                        <rect x="0" y="0" width="25" height="25" />
                    </svg>
                    Project
                </li>
                <li class="col-4 col-md-12">
                    <svg class="august" width="20" height="20">
                        <rect x="0" y="0" width="25" height="25" />
                    </svg>
                    Project
                </li>
                <li class="col-4 col-md-12">
                    <svg class="september" width="20" height="20">
                        <rect x="0" y="0" width="25" height="25" />
                    </svg>
                    Project
                </li>
                <li class="col-4 col-md-12">
                    <svg class="october" width="20" height="20">
                        <rect x="0" y="0" width="25" height="25" />
                    </svg>
                    Project
                </li>
                <li class="col-4 col-md-12">
                    <svg class="november" width="20" height="20">
                        <rect x="0" y="0" width="25" height="25" />
                    </svg>
                    Project
                </li>
                <li class="col-4 col-md-12">
                    <svg class="december" width="20" height="20">
                        <rect x="0" y="0" width="25" height="25" />
                    </svg>
                    Project
                </li>
            </ul>
        </div>
    </div>
</div>

<!---TABLE BEGINS--->
<section class="container-fluid">
    <div class="table-section reponsive-div">
        <div class="main-table">
            <div class="table-top">
                <h3>Daily Expenditure</h3>
                <h5>20th May, 2020 &nbsp;
                    <button>Filter <i class="fas fa-filter"></i></button></h5>
            </div>
            <div class="table-data">
                <div style="overflow-x: auto;">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Projects</th>
                                <th>Ministry</th>
                                <th>Company</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                            <tr>
                                <td class="profileSummary">Rehabilitation of Lagos</td>
                                <td>Transport</td>
                                <td>Julius Beger</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
                            <tr>
                                <td class="profileSummary">Building of Class Blocks</td>
                                <td>Education</td>
                                <td>Samsung</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
                            <tr>
                                <td class="profileSummary">Rehabilitation of Lagos</td>
                                <td>Transport</td>
                                <td>Julius Beger</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
                            <tr>
                                <td class="profileSummary">Building of Class Blocks</td>
                                <td>Education</td>
                                <td>Samsung</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
                            <tr>
                                <td class="profileSummary">Rehabilitation of Lagos</td>
                                <td>Transport</td>
                                <td>Julius Beger</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
                            <tr>
                                <td class="profileSummary">Building of Class Blocks</td>
                                <td>Education</td>
                                <td>Samsung</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
                            <tr>
                                <td class="profileSummary">Rehabilitation of Lagos</td>
                                <td>Transport</td>
                                <td>Julius Beger</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
                            <tr>
                                <td class="profileSummary">Building of Class Blocks</td>
                                <td>Education</td>
                                <td>Samsung</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
                            <tr>
                                <td class="profileSummary">Rehabilitation of Lagos</td>
                                <td>Transport</td>
                                <td>Julius Beger</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
                            <tr>
                                <td class="profileSummary">Building of Class Blocks</td>
                                <td>Education</td>
                                <td>Samsung</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
                            <tr>
                                <td class="profileSummary">Rehabilitation of Lagos</td>
                                <td>Transport</td>
                                <td>Julius Beger</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
                            <tr>
                                <td class="profileSummary">Building of Class Blocks</td>
                                <td>Education</td>
                                <td>Samsung</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
                            <tr>
                                <td class="profileSummary">Rehabilitation of Lagos</td>
                                <td>Transport</td>
                                <td>Julius Beger</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
                            <tr>
                                <td class="profileSummary">Building of Class Blocks</td>
                                <td>Education</td>
                                <td>Samsung</td>
                                <td>₦806,650,320</td>
                                <td>20th May, 2020</td>
                            </tr>
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
        <!---TABLE ENDS--->
</section>

<!-- Pop up for project summary -->

<section class="section-wrapper">
    <div class="section-container">
        <div class="section-img">
            <img src="img/Julius-Berger 1.svg" alt="user avatar">
        </div>
        <div class="section-write-up">
            <div class="project-date">
                <div class="projects">
                    <p class="project small-font">Project</p>
                    <p class="project-name big-font">Rehabilitation Of Lagos Ibadan Expressway</p>
                </div>
                <div class="dates">
                    <p class="date big-font">20th, May 2020</p>
                </div>
            </div>

            <div class="company-info">
                <div class="company">
                    <p class="small-font">Contracted Company</p>
                    <p class="big-font">Julius Berger</p>
                </div>
                <div class="company">
                    <p class="small-font">Company CEO</p>
                    <p class="big-font">Julius Berger</p>
                </div>
                <div class="company last">
                    <p class="small-font">Company Twitter Handle</p>
                    <p class="big-font">@fedmintransport</p>
                </div>
            </div>

            <div class="ministry-info">
                <div class="ministry">
                    <div class="ministry-name">
                        <p class="small-font">Contracting Ministry</p>
                        <p class="big-font">Ministry of Transportation</p>
                    </div>
                    <div class="ministry-name">
                        <p class="small-font">Ministry Twitter Handle</p>
                        <p class="big-font">@fedmintransport</p>
                    </div>
                </div>
                <div class="minister">
                    <div class="minister-name">
                        <p class="small-font">Minister</p>
                        <p class="big-font">Mohammed Musa Bello</p>
                    </div>
                    <div class="minister-name">
                        <p class="small-font">Minister Twitter Handle</p>
                        <p class="big-font">@mohammedbello</p>
                    </div>
                </div>
            </div>

            <div class="btns">
                <div class="share-button">
                    <div class="btn">
                        <a href="#" class="share small-font">Share</a>
                        <img src="img/Vector.svg" alt="user avatar">
                    </div>
                </div>
                <div class="close-button">
                    <div class="btn">
                        <a href="#" class="share small-font">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <script src="./js/ExpenditureScript.js"></script> --}}
@endsection