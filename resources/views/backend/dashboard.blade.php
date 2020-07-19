@extends('layouts.dash')
@push('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<title>ExpenseNg - Dashboard</title>
@endpush

@section('content')
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{{$message}}</strong>
    </div>
  @endif

  @if(Session::has('flash_message'))
    <p class="alert {{Session::get('alert-class','alert-info')}}">{{Session::get('flash_message')}}</p>
  @endif
  {{$counter_feedback}}
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">ExpenseNG Admin Dashboard </h2>
                        <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- flash messages  -->
            <!-- ============================================================== -->
                @include('backend.partials.flash')
             <!-- ============================================================== -->
            <!-- end flash messages  -->
            <!-- ============================================================== -->
           
            <div class="ecommerce-widget">

                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Total Comments</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">100</h1>
                                </div>
                                
                            </div>
                            <div id="sparkline-revenue"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Total Budget for {{date('Y')}}</h5>
                                <div class="metric-value d-inline-block">
                                    <h3 class="mb-1">
                                    ₦{{number_format($amount, 2)}}
                                            
                                    </h3>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    
                                </div>
                            </div>
                            <div id="sparkline-revenue2"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Total Number of Ministries</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{$total_ministry}}</h1>
                                </div>

                            </div>
                            <div id="sparkline-revenue3"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Total Number of Companies</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{$total_company}}</h1>
                                </div>

                            </div>
                            <div id="sparkline-revenue4"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- ============================================================== -->

                <!-- ============================================================== -->

                              <!-- recent orders  -->
                <!-- ============================================================== -->
                <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header"><strong> Recent Expenses</strong></h5>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">

                                            <th class="border-0">Image</th>
                                            <th class="border-0">Contractors</th>
                                            <th class="border-0">Contract Awarded</th>
                                            <th class="border-0">Awarding Ministry</th>
                                            <th class="border-0">Amount</th>
                                            <th class="border-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($recent_expenses)> 0)
                                            @foreach ($recent_expenses as $recent_expense)
                                        <tr>
                                            
                                            <td>
                                                <div class="m-r-10"><img src="/images/product-pic.jpg" alt="user" class="rounded" width="45"></div>
                                            </td>
                                            <td>{{$recent_expense->year}} </td>
                                            <td>{{$recent_expense->project}}  </td>
                                            <td>{{$recent_expense->month}}</td>
                                            <td>₦{{number_format($recent_expense->amount_spent,2)}}</td>
                                            <td><span class="badge-dot badge-brand mr-1"></span>Not Completed </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                       
                                        <tr>
                                            <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end recent orders  -->


                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- customer acquistion  -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Top Benficiary</h5>
                        <div class="card-body">
                            <div class="ct-chart ct-golden-section" style="height: 54px;">
                                <span>Julius Berger</span>
                                <span class="legend-item mr-2">N450,000,000<span>
                            </div>
                            <div class="text-center">
                                
                                <span class="legend-text"><a class="btn btn-default">View All</a></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <h5 class="card-header">Top Sector</h5>
                        <div class="card-body">
                            <div class="ct-chart ct-golden-section" style="height: 54px;"></div>
                            <div class="text-center">
                                <span class="legend-item mr-2">
                                        <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">Returning</span>
                                </span>
                                <span class="legend-item mr-2">

                                        <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">First Time</span>
                                </span>
                            </div>
                        </div>

                    </div>

                    <div class="card">
                        <h5 class="card-header">Top Ministry</h5>
                        <div class="card-body">
                            <div class="ct-chart ct-golden-section" style="height: 54px;"></div>
                            <div class="text-center">
                                <span class="legend-item mr-2">
                                        <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">Returning</span>
                                </span>
                                <span class="legend-item mr-2">

                                        <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">First Time</span>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- ============================================================== -->
                <!-- end customer acquistion  -->
                <!-- ============================================================== -->
            </div>

            <div class="row">
                <!-- ============================================================== -->
                <!--  top perfomimg  -->
                <!-- ============================================================== -->
                <div class="col-md-12">
                    <div class="card">
                    <h5 class="card-header">Top Performing Companies</h5>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table no-wrap p-table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">Campaign</th>
                                            <th class="border-0">Visits</th>
                                            <th class="border-0">Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Campaign#1</td>
                                            <td>98,789 </td>
                                            <td>$4563</td>
                                        </tr>
                                        <tr>
                                            <td>Campaign#2</td>
                                            <td>2,789 </td>
                                            <td>$325</td>
                                        </tr>
                                        <tr>
                                            <td>Campaign#3</td>
                                            <td>1,459 </td>
                                            <td>$225</td>
                                        </tr>
                                        <tr>
                                            <td>Campaign#4</td>
                                            <td>5,035 </td>
                                            <td>$856</td>
                                        </tr>
                                        <tr>
                                            <td>Campaign#5</td>
                                            <td>10,000 </td>
                                            <td>$1000</td>
                                        </tr>
                                        <tr>
                                            <td>Campaign#5</td>
                                            <td>10,000 </td>
                                            <td>$1000</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <a href="#" class="btn btn-outline-light float-right">Details</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end top perfomimg  -->
                <!-- ============================================================== -->
            </div>

            <div class="row">
                <!-- ============================================================== -->
                <!-- Tabbed Quick Forms -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h2 class="p-4 card-header">Quick Forms</h2>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="expense_form-tab" data-toggle="tab" href="#expense_form" role="tab" aria-controls="expense_form" aria-selected="true">EXPENSE</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="company_form-tab" data-toggle="tab" href="#company_form" role="tab" aria-controls="company_form" aria-selected="false">COMPANY</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="payments_form-tab" data-toggle="tab" href="#payments_form" role="tab" aria-controls="payments_form" aria-selected="false">PAYMENTS</a>
                      </li>
                    </ul>
                    <div class="tab-content card" id="myTabContent">
                        <div class="tab-pane fade show active" id="expense_form" role="tabpanel" aria-labelledby="expense_form-tab">
                            <div class="col-md-8 mt-4 offset-2">
                                <div class="card">
                                    <h5 class="card-header">CREATE NEW EXPENSE</h5>
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
                        <div class="tab-pane fade" id="company_form" role="tabpanel" aria-labelledby="company_form-tab">
                        <div class="col-md-8 mt-4 offset-2">
                                <div class="card">
                                    <h5 class="card-header">CREATE NEW COMPANY</h5>
                                    <div class="card-body p-3 form-group">
                                        <form class="" method="post" action="{{action('Admin\CompanyController@createCompany')}}">
                                            {{csrf_field()}}
                                            <label class="label-for-name" >Name</label>
                                            <input typ0e="text" required = 'required' name="name" id="name" class="form-control">
                                            <p id="nameErr" class="text-danger"></p>

                                            <label class="label-for-shortname">Short Name</label>
                                            <input type="text"  required = 'required' name="shortname" id="short_name" class="form-control">
                                            <p id="snameErr" class="text-danger"></p>

                                            <label class="label-for-industry">Industry</label>
                                            <input type="text" required = 'required' name="industry" id="industry" class="form-control">
                                            <p id="industryErr" class="text-danger"></p>

                                            <label class="label-for-ceo">CEO</label>
                                            <input type="ceo" required = 'required' name="ceo"  id="ceo" class="form-control">
                                            <p id="ceoErr" class="text-danger"></p>

                                            <label class="label-for-twitter">Twitter</label>
                                            <input type="twitter" required = 'required'  name="twitter" id="twitter" class="form-control">
                                            <p id="twitterErr" class="text-danger"></p>

                                            <button type="submit" value="Add" class="btn btn-primary" name="addCompany" onmouseover="validateAddNew('submit')">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="payments_form" role="tabpanel" aria-labelledby="payments_form-tab-tab">
                            <div class="col-md-8 mt-4 offset-2">
                                <div class="card">
                                    <h5 class="card-header">CREATE NEW PAYMENTS</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- END Tabbed Quick Forms -->
                <!-- ============================================================== -->
            </div>  <!-- END ROW -->

            <div class="row">
                    <!-- ============================================================== -->

                                  <!-- recent comments  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h2 class="p-4 card-header">Recent Comments</h2>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">

                                                <th class="border-0">S/N</th>
                                                <th class="border-0">Source</th>
                                                <th class="border-0">Comment</th>
                                                <th class="border-0">User</th>
                                                <th class="border-0">Date</th>
                                                <th class="border-0">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Ministry of Health</td>
                                                <td>Kudos to the Minister,  He is really putting in much effort, especially in the fight againts COVID-19</td>
                                                <td>Jane Doe</td>
                                                <td>10/07/2020</td>
                                                <td>Published</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Expense Report - May 2020</td>
                                                <td>I just wonder why all this expenses is not translating into meaningful development</td>
                                                <td>Jaulius Akor</td>
                                                <td>09/07/2020</td>
                                                <td>Published</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Company Profile - Julius Berger</td>
                                                <td>I can attest for the quality of Jobs handled by this Company</td>
                                                <td>Daniel Sade</td>
                                                <td>08/07/2020</td>
                                                <td>Published</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Ministry of Health</td>
                                                <td>Kudos to the Minister,  He is really putting in much effort, especially in the fight againts COVID-19</td>
                                                <td>Jane Doe</td>
                                                <td>10/07/2020</td>
                                                <td>Published</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Expense Report - May 2020</td>
                                                <td>I just wonder why all this expenses is not translating into meaningful development</td>
                                                <td>Jaulius Akor</td>
                                                <td>09/07/2020</td>
                                                <td>Published</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Company Profile - Julius Berger</td>
                                                <td>I can attest for the quality of Jobs handled by this Company</td>
                                                <td>Daniel Sade</td>
                                                <td>08/07/2020</td>
                                                <td>Published</td>
                                            </tr>
                                            <tr>
                                                <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end recent comments  -->

                    <!-- ============================================================== -->
                    <!-- add comment  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Add Comment</h5>
                            <div class="card-body">
                                <div class="ct-chart ct-golden-section" style="height: 354px;"></div>
                                <div class="text-center">
                                    <span class="legend-item mr-2">
                                            <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                    <span class="legend-text">Returning</span>
                                    </span>
                                    <span class="legend-item mr-2">

                                            <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                    <span class="legend-text">First Time</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end add comment -->
                    <!-- ============================================================== -->
            </div> <!-- end row -->
            <div>
            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h2 class="p-4 card-header">Visitors Suggestions</h2>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">

                                                <th class="border-0">Firstname</th>
                                                <th class="border-0">Lastname</th>
                                                <th class="border-0">Cabinet</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        @if (count($feedbacks)> 0)
                                            @foreach ($feedbacks as $feedback)
                                                <tr>
                                                    <td>{{$feedback->firstName}} </td>
                                                    <td>{{$feedback->lastName}}  </td>
                                                    <td>{{$feedback->ministry_id}}</td>
                                                    <td>
                                                        <a href="{{route('feedback.approve', ['id' => $feedback->id])}}" class="btn btn-success btn-sm ">Approve</button>
                                                        <a href="{{route('feedback.ignore', ['id' => $feedback->id])}}" class="btn btn-danger btn-sm">Ignore</button>

                                                    </td>
                                                </tr>
                                        @endforeach
                                        @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            
        </div> <!-- END container-fluid dashboard-content  -->
    </div> <!-- end dashboard-ecommerce-->
</div> <!-- END dashboard-wrapper -->
@endsection
@section('js')
    <!-- Optional JavaScript -->

    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <!-- main js -->
    <script src="{{ asset('js/main-js.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dashboard-ecommerce.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

    <!-- Jquery js -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
    </script>
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
