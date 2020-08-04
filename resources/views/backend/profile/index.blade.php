@extends('layouts.home') 
@push('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/fixedHeader.bootstrap4.css">
    <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

    <!-- causes toggle error in navbar -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->

    <!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    
    <style type="text/css">
        .dataTable>tbody>tr>td, 
        .dataTable>tbody>tr>th, 
        .dataTable>tfoot>tr>td, 
        .dataTable>tfoot>tr>th, 
        .dataTable>thead>tr>td, 
        .dataTable>thead>tr>th {
        padding: 12px!important;
        }
    </style>
    <title>ExpenseNg - Profile</title>
@endpush

@section('content')
<div class="content">
    <div class="container-fluid">

        {{-- Flash message --}}
        <div id="alert">
         @include('backend.partials.flash')
        </div>
         {{-- Flash message end--}}
        <div class="container">
            <div class="row">
            <div class="col-xl-12">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0" style="float:left">PROFILE PAGE</h4>
                        
                        <a class="btn btn-success" style="float:right" data-toggle="modal" data-target="#exampleModal">{{ __('Change Password') }}
         
                        @can('edit')
                        <a href="{{'/admin/profile/edit/' . $user->id}}" class="btn btn-primary" style="float:right">Edit Profile</a>
                        @endcan
                    
                    </div>    
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class=" rounded-0 mt-3 border-primary">
                                <div class=" border-primary">
                                    
                                </div>
                                <!-- profile tab content -->
                                <div class="card-body">
                                    <div class="tab-content">
                                            <div class="  text-center lead">
                                                User ID : {{$user->id}}
                                            </div>
                                    <!-- Modal -->
                                    <div class="" aria-labelledby="myModalLabel" aria-hidden="true">
                        
                                    
                                        <div class="modal-body">
                                            <center>
                                            <img src="{{$user->image}}" alt="{{$user->name . '\'s image'}}" style="height:250px; width:250px; border-radius: 100%" class="img-fluid img-circle" ><br>
                                            <br>
                                            <br>
                                            
                                            <h3 class="media-heading bg-primary">{{$user->name}}</h3>
                                           
                                            </center>
                                            <hr>
                                            <div>
                                                <p class="card-text p-2 n-1 rounded" style="border:1px solid #0257d8;"><b>Name : </b>{{$user->name}}</p>

                                                <p class="card-text p-2 n-1 rounded" style="border:1px solid #0257d8;"><b>Email : </b>{{$user->email}}</p>

                                                <p class="card-text p-2 n-1 rounded" style="border:1px solid #0257d8;"><b>Gender : </b>{{$user->gender}}</p>

                                                <p class="card-text p-2 n-1 rounded" style="border:1px solid #0257d8;"><b>date of birth : </b>{{$user->date_of_birth}}</p>

                                                <p class="card-text p-2 n-1 rounded" style="border:1px solid #0257d8;"><b>Phone : </b>{{$user->phone_number}}</p>

                                                <p class="card-text p-2 n-1 rounded" style="border:1px solid #0257d8;"><b>Registered On : </b>{{$user->created_at}}</p>

                                                <p class="card-text p-2 n-1 rounded" style="border:1px solid #0257d8;"><b>Account Status : </b>{{$user->status->name}}</p>

                                                <p class="card-text p-2 n-1 rounded" style="border:1px solid #0257d8;"><b>Role : </b>{{implode(', ', $user->roles->pluck('name')->toArray())}}</p>
                                                
                                                <br>
                                                @if($user->status_id != 1)
                                                <p class="text-danger text-center">Your account is inactive, you won't be able to access Admin Dashboard. If its a new account, kindly wait for admin to manually activate your account</p>
                                                @endif

                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>    
                                <!-- profile tab content end -->
                                <!--modal begin-->
                                <div class="col-md-6">
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success text-white text-center lead">
                                                    <h5 class="modal-title text-center" id="exampleModalLabel">Change Password</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{'/admin/profile/change_password/' . $user->id}}" method="post" id="change_password" >

                                                    <div class="form-group">
                                                        <label for="curpass">Enter New Password</label>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                                                    </div>

                                                    <div class="form-group">
                                                    <label for="curpass">Repeat New Password</label>
                                                        <input id="password-confirm" type="password" class="form-control" placeholder="Repeat your password" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    @method('put')
                                                    @csrf
                                                    <input type="submit" class="btn btn-danger changePass" value="Change" id="changePass">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                    </div>
                                <div>               
                       

                    </div>
                </div>
        </div>
        <!-- ============================================================== -->
                <!-- end data table  -->
        <!-- ============================================================== -->
    </div>
</div>
@endsection

@section('js')

    
    <!-- main js -->
    <script src="{{ asset('js/main-js.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dashboard-ecommerce.js') }}" type="text/javascript"></script>

    <!-- bootstap bundle js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/slimscroll/jquery.slim.min.js"></script> -->
    <script src="/vendor/slimscroll/jquery.slimscroll.js"></script>

    <!-- sparkline js -->
    <script src="/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="/vendor/charts/c3charts/c3.min.js"></script>
    <script src="/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="/vendor/charts/c3charts/C3chartjs.js"></script>
    <script>
        jQuery(document).ready(function() {
    $('#example').DataTable();
    } );
    </script>

<script>
    $('.delete-user').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
</script>
    
 <script>
    $("document").ready(function(){
    setTimeout(function(){
       $("#alert").remove();
    }, 3000 ); // 5 secs
    $("#alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#alert").slideUp("500");
});
});
</script>

@endsection
