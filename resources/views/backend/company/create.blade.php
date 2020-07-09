@extends('layouts.home')
@push('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<title>ExpenseNg - Create Company</title>
@endpush

@section('content')
    <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
<!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Create New Company</h3>
                                    <p></p>
                                </div>
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <form method="post" action="{{route('create.company')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Company Name</label>
                                                <input id="inputText3" type="text" class="form-control" placeholder="e.g example company">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Short Name</label>
                                                <input id="inputEmail" type="text" placeholder="e.g example" class="form-control">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Industry Twitter Handle</label>
                                                <input id="inputText4" type="text" class="form-control" placeholder="e.g @example">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">CEO Name</label>
                                                <input id="inputPassword" type="text" placeholder="e.g Samuel Ogbede" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">CEO Twitter hande</label>
                                                <input id="inputPassword" type="text" placeholder="e.g  @Ogbede" class="form-control">
                                            </div>
                                            <div class="form-group text-right">
                                                <input type="submit" value="Create New Company"
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