@extends('layouts.home')
@push('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<title>ExpenseNg - Create Expense</title>
@endpush

@section('content')
    <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- flash messages  -->
            <!-- ============================================================== -->
                @include('backend.partials.flash')
             <!-- ============================================================== -->
            <!-- end flash messages  -->
            <!-- ============================================================== -->

                <div class="row">
                    <div class="col-xl-10">
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Create New Expense</h3>
                                    <p></p>
                                </div>
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <form class="" method="post" action="{{action('Admin\ExpenseController@storeExpense')}}">
                                            {{csrf_field()}}
                                            <label class="label-for-amount" >Amount</label>
                                            <input type="text" required = 'required' name="amount_spent" id="amount_spent" class="form-control">
                                            <p id="ammountErr" class="text-danger"></p>
                                            <label class="label-for-amount" >Year</label>
                                            <input type="text" required = 'required' name="year" id="year" class="form-control">
                                            <p id="yearErr" class="text-danger"></p>
                                            <label class="label-for-amount" >Month</label>
                                            <input type="text" required = 'required' name="month" id="month" class="form-control">
                                            <p id="monthErr" class="text-danger"></p>
                                            <label class="label-for-amount" >Project</label>
                                            <textarea  required = 'required' name="project" id="project" class="form-control" rows=3></textarea>
                                            <p id="projectErr" class="text-danger"></p>
                                            <button type="submit" value="Create" class="btn btn-primary" name="createExpense" >Create</button>     
                                       </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form  -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('js')
    <!-- causes toggle error in navbar -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script> -->
    
    <!-- main js -->
    <script src="{{ asset('js/main-js.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dashboard-ecommerce.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

    <script src="/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/slimscroll/jquery.slim.min.js"></script>
    <script src="/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- chart chartist js -->
    <script src="/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="/vendor/charts/c3charts/c3.min.js"></script>
    <script src="/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="/vendor/charts/c3charts/C3chartjs.js"></script>
    @endsection