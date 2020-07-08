@extends('layouts.master')

<!-- Import CSS -->
@section('css')
<title>FG Expense - Expense Report</title>
<link rel="stylesheet" href="{{ asset('css/about us-header_footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/ministry_report_comments.css') }}">
<script src="https://kit.fontawesome.com/9b1c8d52ed.js" crossorigin="anonymous"></script>
@endsection

@section('content')
  <!-- Main body start -->
  <section id="main">
    <!-- Start here -->
    <div class="container mt-5">
        <div class="navigation">
            <ul>
                <li class="ml-0"><a class="green-text" href="/">Home</a></li>
                <span>.</span>
                <li><a class="green-text" href="#">Reports</a></li>
                <span>.</span>
                <li><a class="green-text" href="#">Ministry Reports</a></li>
            </ul>
        </div>
    </div>

    <div class="container mt-4 mb-4">
        <h1 class="mb-3">
            Ministry Spending
        </h1>
        <p class="w-50 paragraph">
            ExpenseNG tracks federal spending to ensure taxpayers can see how their money is being used in communities across America.
            Learn more on how this money was spent with tools to help you navigate spending from top to bottom.
        </p>
    </div>

    <div class="container">
        <div class="navigation-page ">
            <ul>
                <li class="ml-0"><a class="grey-text" href="#">Expense Summary</a></li>
                <li><a class="grey-text" href="#">Projects Summary</a></li>
                <li><a class="grey-text" href="#">Purchases Summary</a></li>
                <li><a class="grey-text" href="#">Income Summary</a></li>
                <li class="active"><a class="grey-text" href="#">Comments</a></li>  
            </ul>
            <hr>
        </div>
    </div>

    <div class="container mb-4 mt-4">
        <div class="card p-3">
            <div class="container">
                <div class="row occupy">
                    <div class="col-sm-1 mt-1 row d-flex container">
                        <img src="/images/profile-image.svg"class="resize"alt="profile-image">
                        <div class="ml-3 mt-2 be-gone">
                            <p class="green-text">James Emmanuel<br>
                            <span class="mt-0 grey-text small mt-1">2mins ago</span></p>
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

   
    <div class="container mb-4 mt-4">
        <div class="card p-3">
            <div class="container">
                <div class="row occupy">
                    <div class="col-sm-1 mt-1 row d-flex container">
                        <img src="/images/profile-image.svg"class="resize"alt="profile-image">
                        <div class="ml-3 mt-2 be-gone">
                            <p class="green-text">James Emmanuel<br>
                            <span class="mt-0 grey-text small mt-1">2mins ago</span></p>
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

    
    <div class="container mb-4 mt-4">
        <div class="card p-3">
            <div class="container">
                <div class="row occupy">
                    <div class="col-sm-1 mt-1 row d-flex container">
                        <img src="/profile-image.svg"class="resize"alt="profile-image">
                        <div class="ml-3 mt-2 be-gone">
                            <p class="green-text">James Emmanuel<br>
                            <span class="mt-0 grey-text small mt-1">2mins ago</span></p>
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

    <div class="container mb-4 mt-4">
        <div class="card p-3">
            <div class="container">
                <div class="row occupy">
                    <div class="col-sm-1 mt-1 row d-flex container">
                        <img src="/images/profile-image.svg"class="resize"alt="profile-image">
                        <div class="ml-3 mt-2 be-gone">
                            <p class="green-text">James Emmanuel<br>
                            <span class="mt-0 grey-text small mt-1">2mins ago</span></p>
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
                        <div class="container mb-4 mt-4">
                            <div class="container p-2">
                                <div class="container">
                                    <div class="row container occupy">
                                        <div class="col-sm-1 mt-1 row d-flex container">
                                            <img src="/images/profile-image.svg"class="reduce"alt="profile-image">
                                            <div class="ml-3 mt-2 be-gone">
                                                <p class="green-text">James Emmanuel<br>
                                                <span class="mt-0 grey-text small mt-1">2mins ago</span></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-11 ">
                                            <div class="d-flex justify-content-between ">
                                                <div class="d-flex no-show">
                                                    <p class="green-text">Kingsley Adams</p>
                                                    <p class="ml-3 grey-text small mt-1">2mins ago</p>
                                                </div>
                                                <i class="fas fa-ellipsis-h grey-text no-show"></i>
                                            </div>
                                            <div>
                                                <p>Yes, I agree. It's Amazing!</p>
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
    </div>
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
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection