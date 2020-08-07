@extends('layouts.home')
@push('css')
<link rel="stylesheet" href="https://demos.creative-tim.com/material-dashboard/assets/css/material-dashboard.min.css?v=2.1.2">
  
<title>ExpenseNg - Edit Teams</title>
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
                                    <h3 class="section-title">Edit Teams</h3>
                                    <p></p>
                                </div>
                                <div class="card">
                                @if (Session::has('flash_message'))
                                <div class="alert alert-primary" role="alert">
                                    {{session('flash_message')}}
                                </div>
                                @endif
                                    <div class="card-body">
                                        <form method="post" action="{{'/admin/team/edit/' . $team->id}}" enctype="multipart/form-data">
                                            @method('put')
                                            @csrf
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label"> Name</label>
                                                <input id="inputText3" name="name" type="text" 
                                                class="form-control" value="{{$team->name}}" placeholder="e.g example oluwatobi">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Twitter Handle</label>
                                                <input id="inputEmail" name="twitter" value="{{$team->twitter_handle}}"
                                                type="text" placeholder="e.g @example" class="form-control">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Facebook Handle</label>
                                                <input id="inputEmail" name="facebook" value="{{$team->facebook_handle}}"
                                                type="text" placeholder="e.g otenaike" class="form-control">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Instagram Handle</label>
                                                <input id="inputEmail" name="instagram" value="{{$team->instagram}}"
                                                type="text" placeholder="e.g otenaike" class="form-control">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">linkedin Handle</label>
                                                <input id="inputEmail" name="linkedin" value="{{$team->twitter_handle}}"
                                                type="text" placeholder="e.g otenaike" class="form-control">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Role</label>
                                                <input id="inputText4" name="position" type="text" value="{{$team->role}}"
                                                class="form-control" placeholder="e.g position">
                                            </div>
                                            <div class="">
                                                <label for="inputPassword">Image</label>
                                                <input id="inputPassword" name="image" type="file" value="{{$team->avatar}}"
                                                class="form-control">
                                            </div>
                                            
                                            <div class="form-group text-right">
                                                <input type="submit" value="Edit Team"
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