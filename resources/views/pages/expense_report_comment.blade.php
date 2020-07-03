@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="../assets/css/header_footer.css">
<link rel="stylesheet" href="../assets/css/expense_report_comment.css">
<title>FG Expense - Expense Report</title>
@endsection

@section('content')
<!-- Main body start -->
    <section id="main">
        <!-- Start here -->
        <div class="container">
            <!-- page navigation -->
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">HOME</a></li>
                        <li class="breadcrumb-item"><a href="#">SPENDING</a></li>
                        <li class="breadcrumb-item active" aria-current="page">EXPENSE REPORT</li>
                        </ol>
                </nav>
            </div>
            <!-- page summary -->
            <div id="page-summary">
                <h1>Expense Report</h1>
                <p class="text-left">Expense report gives an insight to how much is being spent by the<br> 
                    federal government on a daily basis and how much is spent in major<br> 
                    sectors in Nigeria.
                </p>
            </div>
        </div>
    
        <!-- Page tabs -->
        <div>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <div class="container">
                        <a class="tab-link" id="daily-expenditure-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Daily Expenditure</a>
                        <a class="tab-link" id="power-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-power" aria-selected="false">Power</a>
                        <a class="tab-link" id="education-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-education" aria-selected="false">Education</a>
                        <a class="tab-link" id="security-tab" data-toggle="tab" href="#nav-security" role="tab" aria-controls="nav-security" aria-selected="false">Security</a>
                        <a class="tab-link" id="agriculture-tab" data-toggle="tab" href="#nav-agriculture" role="tab" aria-controls="nav-agriculture" aria-selected="false">Agriculture</a>
                        <a class="tab-link" id="infrastructure-tab" data-toggle="tab" href="#nav-infrastructure" role="tab" aria-controls="nav-infrastructure" aria-selected="false">Infrastructure</a>
                        <a class="tab-link active" id="comment-tab" data-toggle="tab" href="#nav-comment" role="tab" aria-controls="nav-comment" aria-selected="false">Comments</a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- comment section start -->
        <!-- first comment box -->
        <div class="container mb-4 mt-4">
            <div class="card p-3">
                <div class="container">
                    <div class="row occupy">
                        <div class="col-sm-1 mt-1 row d-flex container">
                            <img src="../assets/images/profile-image.svg"class="resize"alt="profile-image">
                            <div class="ml-3 mt-2 be-gone">
                                <p class="green-text">James Emmanuel<br>
                                    <span class="mt-0 grey-text small mt-1">2mins ago</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-11">
                            <div class="d-flex justify-content-between  no-show">
                                <div class="d-flex">
                                    <p class="green-text">James Emmanuel</p>
                                    <p class="ml-3 grey-text small mt-1">2mins ago</p>
                                </div>
                                <i class="fas fa-ellipsis-h grey-text"></i>
                            </div>
                            <div>
                                <p>This is so nice to read, I can see the improvement in this sector this is really encouraging . Kudos !!!</p>
                            </div>
                            <div class="d-flex text-center align-content-center  icons justify-content-start">
                                <span class="d-flex mr-3"><i class="far fa-thumbs-up"></i><p class="small mt-1">23</p></span>
                                <span class="d-flex mr-3"><i class="far fa-thumbs-down"></i> <p class="small mt-1">0</p></span>
                                <span class="d-flex mr-3"><i class="far fa-comment"></i><p class="small mt-1">Reply</p></span>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

        <!-- second comment box -->
        <div class="container mb-4 mt-4">
            <div class="card p-3">
                <div class="container">
                    <div class="row occupy">
                        <div class="col-sm-1 mt-1 row d-flex container">
                            <img src="../assets/images/profile-image.svg"class="resize"alt="profile-image">
                            <div class="ml-3 mt-2 be-gone">
                                <p class="green-text">James Emmanuel<br>
                                    <span class="mt-0 grey-text small mt-1">2mins ago</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-11">
                            <div class="d-flex justify-content-between  no-show">
                                <div class="d-flex">
                                    <p class="green-text">James Emmanuel</p>
                                    <p class="ml-3 grey-text small mt-1">2mins ago</p>
                                </div>
                                <i class="fas fa-ellipsis-h grey-text"></i>
                            </div>
                            <div>
                                <p>This is so nice to read, I can see the improvement in this sector this is really encouraging . Kudos !!!</p>
                            </div>
                            <div class="d-flex text-center align-content-center  icons justify-content-start">
                                <span class="d-flex mr-3"><i class="far fa-thumbs-up"></i><p class="small mt-1">23</p></span>
                                <span class="d-flex mr-3"><i class="far fa-thumbs-down"></i> <p class="small mt-1">0</p></span>
                                <span class="d-flex mr-3"><i class="far fa-comment"></i><p class="small mt-1">Reply</p></span>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

        <!-- third comment box -->
        <div class="container mb-4 mt-4">
            <div class="card p-3">
                <div class="container">
                    <div class="row occupy">
                        <div class="col-sm-1 mt-1 row d-flex container">
                            <img src="../assets/images/profile-image.svg"class="resize"alt="profile-image">
                            <div class="ml-3 mt-2 be-gone">
                                <p class="green-text">James Emmanuel<br>
                                    <span class="mt-0 grey-text small mt-1">2mins ago</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-11">
                            <div class="d-flex justify-content-between  no-show">
                                <div class="d-flex">
                                    <p class="green-text">James Emmanuel</p>
                                    <p class="ml-3 grey-text small mt-1">2mins ago</p>
                                </div>
                                <i class="fas fa-ellipsis-h grey-text"></i>
                            </div>
                            <div>
                                <p>This is so nice to read, I can see the improvement in this sector this is really encouraging . Kudos !!!</p>
                            </div>
                            <div class="d-flex text-center align-content-center  icons justify-content-start">
                                <span class="d-flex mr-3"><i class="far fa-thumbs-up"></i><p class="small mt-1">23</p></span>
                                <span class="d-flex mr-3"><i class="far fa-thumbs-down"></i> <p class="small mt-1">0</p></span>
                                <span class="d-flex mr-3"><i class="far fa-comment"></i><p class="small mt-1">Reply</p></span>
                            </div>
                        </div>
                        <!-- comment reply -->
                        <div class="container mb-4 mt-4">
                            <div class="container p-2">
                                <div class="container">
                                    <div class="row container occupy">
                                        <div class="col-sm-1 mt-1 row d-flex container">
                                            <img src="../assets/images/profile-image.svg"class="reduce"alt="profile-image">
                                            <div class="ml-3 mt-2 be-gone">
                                                <p class="green-text">James Emmanuel<br>
                                                    <span class="mt-0 grey-text small mt-1">2mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-11 ">
                                            <div class="d-flex justify-content-between ">
                                                <div class="d-flex no-show">
                                                    <p class="green-text">James Emmanuel</p>
                                                    <p class="ml-3 grey-text small mt-1">2mins ago</p>
                                                </div>
                                                <i class="fas fa-ellipsis-h grey-text no-show"></i>
                                            </div>
                                            <div>
                                                <p>This is so nice to read, I can see the improvement in this sector this is really encouraging . Kudos !!!</p>
                                            </div>
                                            <div class="d-flex text-center align-content-center  icons justify-content-start">
                                                <span class="d-flex mr-3"><i class="far fa-thumbs-up"></i><p class="small mt-1">23</p></span>
                                                <span class="d-flex mr-3"><i class="far fa-thumbs-down"></i> <p class="small mt-1">0</p></span>
                                                <span class="d-flex mr-3"><i class="far fa-comment"></i><p class="small mt-1">Reply</p></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <!-- comment entry -->
        <div class=" container d-flex align-content-center justify-content-center mb-5">
            <div class="container  d-flex align-content-center justify-content-center">
                <input   placeholder="Write a Comment" class="w-75 p-2">
                <i class="far fa-laugh"></i>
                <i class="far fa-image"></i>
            </div>
        </div>
    </section>
    <!-- Main body end -->
@endsection
  
 @section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection