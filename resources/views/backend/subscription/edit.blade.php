@extends('layouts.home')
@push('css')
<link rel="stylesheet" href="https://demos.creative-tim.com/material-dashboard/assets/css/material-dashboard.min.css?v=2.1.2">
  
<title>ExpenseNg - Edit Subscription</title>
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
        {{-- Flash message --}}
        <div id="alert">
         @include('backend.partials.flash')
        </div>
         {{-- Flash message end--}}
                <div class="row">
                    <div class="col-xl-10">
<!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Edit Subscription</h3>
                                    <p></p>
                                </div>
                                <div class="card">
    
                                    <div class="card-body">
                                        <form method="post" action="{{'/admin/subscribe/edit/'. $details->id}}" >
                                            @method('put')

                                            @csrf
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label"> Name</label>
                                                <input id="inputText3" name="name" type="text" value="{{$details->name}}"
                                                class="form-control"  placeholder="e.g example Cabinet" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                <input id="inputEmail" name="email" value="{{$details->email}}"
                                                type="email" placeholder="e.g email@example.com" class="form-control" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Subscription Type</label>
                                            
                                                <select class="form-control" name="sub_type" required>
                                                    <option value="{{$details->subscription_type}}">{{$details->subscription_type}}</option>
                                                    @if ($details->subscription_type !== "expenses")  
                                                      <option value="expenses">Expenses</option>
                                                    @endif
                                                    
                                                    @if($details->subscription_type !== 'daily report')
                                                      <option value="daily report"> Daily Reports</option>
                                                    @endif

                                                    @if($details->subscription_type !== 'ministry report')
                                                      <option value="ministry report">Ministry Reports</option>
                                                    @endif

                                                    @if ($details->subscription_type !== 'company report')
                                                      <option value="company report">Company Reports</option>
                                                    @endif
                                                </select>
                                            </div>
                                            
                                            <div class="form-group text-right">
                                                <input type="submit" value="Edit Subscription"
                                                class="form-control" 
                                                style="background-color: #00945E; color:honeydew; border: none; border-radius: 12px; width: 12rem"/>
                                            </div>
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

    <!-- slimscroll js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/slimscroll/jquery.slim.min.js"></script>
    
    @endsection