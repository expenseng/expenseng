@extends('layouts.home')
@push('css')
<link rel="stylesheet" href="https://demos.creative-tim.com/material-dashboard/assets/css/material-dashboard.min.css?v=2.1.2">
  
<title>ExpenseNg - Create Teams</title>
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
        {{-- Flash message --}}
        <div id="alert alert-danger">
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
                                    <h3 class="section-title">Create New Member</h3>
                                    <p></p>
                                </div>
                                <div class="card">
    
                                    <div class="card-body">
                                        <form method="post" action="{{route('create.team')}}"
                                        enctype="multipart/form-data"
                                        >
                                            @csrf
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label"> Name</label>
                                                <input id="inputText3" name="name" type="text" 
                                                class="form-control"  placeholder="e.g example oluwatobi" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Twitter Handle</label>
                                                <input id="inputEmail" name="twitter" 
                                                type="text" placeholder="e.g @example" required class="form-control">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Facebook Handle</label>
                                                <input id="inputEmail" name="facebook"
                                                type="text" placeholder="e.g otenaike" required class="form-control">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Instagram Handle</label>
                                                <input id="inputEmail" name="instagram" 
                                                type="text" placeholder="e.g otenaike" required class="form-control">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">linkedin Handle</label>
                                                <input id="inputEmail" name="linkedin" 
                                                type="text" placeholder="e.g otenaike" required class="form-control">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Role</label>
                                                <input id="inputText4" name="position" type="text" 
                                                class="form-control" placeholder="e.g position" required>
                                            </div>
                                            <div class="">
                                                <label for="inputPassword">Image</label>
                                                <input id="inputPassword" name="image" type="file" 
                                                class="form-control">
                                            </div>
                                            
                                            <div class="form-group text-right">
                                                <input type="submit" value="Create Team"
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