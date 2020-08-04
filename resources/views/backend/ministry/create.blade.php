@extends('layouts.home')
@push('css')
< <link rel="stylesheet" href="https://demos.creative-tim.com/material-dashboard/assets/css/material-dashboard.min.css?v=2.1.2">
  
<title>ExpenseNg - Create Ministry</title>
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
      
                <div class="row">
                    <div class="col-xl-10">
<!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Create New Ministry</h3>
                                    <p></p>
                                </div>
                                @if (Session::has('flash_message'))
                                <div class="alert alert-primary" role="alert">
                                    {{session('flash_message')}}
                                </div>
                                @endif
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <form method="post" action="{{route('create.ministry')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Ministry Name</label>
                                                <input id="inputText3" name="ministry_name" 
                                                type="text" class="form-control" 
                                                placeholder="e.g Agriculture" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="ministryCode">Ministry Code</label>
                                                <input type="number" name="code" class="form-control"
                                                placeholder="e.g 01234" required />
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Short Name</label>
                                                <input id="inputEmail" name="ministry_shortname" type="text" 
                                                placeholder="e.g Agric" class="form-control" required />
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Ministry Head</label>
                                                <input id="inputEmail" name="head" type="text" 
                                                placeholder="john" class="form-control" required />
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="sector_id">Sector</label>
                                                
                                                <select name="sector_id" class="form-control">

                                                <option value="">Select Sector</option>
                                                @foreach($sectors as $sector)
                                                
                                                <option name="sector_id" class="form-control" 
                                                value="{{$sector->id}}" required>
                                                    {{$sector->name}}
                                                </option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Ministry Twitter Handle</label>
                                                <input id="inputText4" name="ministry_twitter" type="text" 
                                                class="form-control" placeholder="e.g @example" required />
                                            </div>
                                             <div class="form-group">
                                                <label for="inputPassword">Ministry's Website</label>
                                                <input id="inputPassword" name="website" type="url"
                                                 placeholder="e.g  https://example.gov.ng" class="form-control" required>
                                            </div>
                                           
                                            <div class="form-group text-right">
                                                <input type="submit" value="Create New Ministry"
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