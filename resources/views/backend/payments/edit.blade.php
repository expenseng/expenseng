@extends('layouts.home')
@push('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<title>ExpenseNg - Edit Payments</title>
@endpush

@section('content')
    <div class="content">
            <div class="container-fluid ">
            <!-- ============================================================== -->
            <!-- flash messages  -->
            <!-- ============================================================== -->
                @include('backend.partials.flash')
             <!-- ============================================================== -->
            <!-- end flash messages  -->
            <!-- ============================================================== -->

                        <!-- ============================================================== -->
                    <div class="container" style="display:">
                        <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header text-center"><h4>{{ __('UPDATE PAYMENT') }}</h4></div>
                                        <div class="card-body">
                                            <form class="" method="post" action="{{'/admin/payments/edit/' . $payment->id}}">
                                                @method('put')
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group px-sm-3 col-md-6">
                                                        <label class="label-for-payment_code" >Payment Code</label>
                                                        <input type="text" required = 'required'  name="payment_code"  id="payment_code" value="{{$payment->payment_code}}" class="form-control">
                                                        <p id="payment_codeErr" class="text-danger"></p>
                                                    </div>

                                                    <div class="form-group px-sm-3 col-md-6">
                                                        <label class="label-for-payment_no" >Payment No</label>
                                                        <input type="text" required = 'required'  name="payment_no" value="{{$payment->payment_no}}" id="payment_no" class="form-control">
                                                        <p id="payment_noErr" class="text-danger"></p>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group px-sm-3 col-md-6">
                                                        <label class="label-for-date" >Date</label>
                                                        <input type="date" required = 'required' name="payment_date" value="{{$payment->payment_date}}" id="payment_date" class="form-control">
                                                        <p id="payment_dateErr" class="text-danger"></p>
                                                    </div>

                                                    <div class="form-group px-sm-3 col-md-6">
                                                        <label class="label-for-amount" >Amount(N)</label>
                                                        <input type="text" required = 'required' name="amount" value="{{$payment->amount}}" id="amount" class="form-control">
                                                        <p id="amountErr" class="text-danger"></p>
                                                    </div>
                                                </div>

                                                <div class="form-group px-sm-3 col-md-12">
                                                    <label class="label-for-organization" >Organization(MDA)</label>
                                                    <input type="text" required = 'required' name="organization" value="{{$payment->organization()}}" id="organization" class="form-control">
                                                    <p id="organizationErr" class="text-danger"></p>
                                                </div>


                                                <div class="form-group px-sm-3 col-md-12">
                                                    <label class="label-for-beneficiary" >Beneficiary</label>
                                                    <input type="text" required = 'required' name="beneficiary" value="{{$payment->beneficiary}}" id="beneficiary" class="form-control">
                                                    <p id="beneficiaryErr" class="text-danger"></p>
                                                </div>
                                               

                                                <div class="form-group px-sm-3 col-md-12">
                                                    <label class="label-for-amount" >Description</label>
                                                    <textarea  required = 'required' name="description"  id="description" class="form-control" rows=3>{{$payment->description}}</textarea>
                                                    <p id="descriptionErr" class="text-danger"></p>
                                                </div>

                                                <button type="submit" value="Create" class="btn btn-primary" name="createExpense" >UPDATE</button>     
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