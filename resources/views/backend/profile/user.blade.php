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

        <div class="row">
            <div class="col-xl-12">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0" style="float:left">PROFILE PAGE</h4>
                        <p></p>
                    </div>
                    <div class="card-body">
                        

                        <div class="container">
                            
                            <!-- Modal -->
                            <div class="" aria-labelledby="myModalLabel" aria-hidden="true">
                                
                                    
                                        <div class="modal-body">
                                            <center>
                                            <img src="https://cdn0.iconfinder.com/data/icons/social-media-network-4/48/male_avatar-512.png" name="aboutme" width="auto" height="140" border="0" class="img-circle"></a>
                                            <h3 class="media-heading">{{$user->name}}</h3>
                                            <span><strong>Skills: </strong></span>
                                                <span class="label bg-warning">HTML5/CSS</span>
                                                <span class="label bg-danger">Adobe CS 5.5</span>
                                                <span class="label bg-info">Microsoft Office</span>
                                                <span class="label label-success">Windows XP, Vista, 7</span>
                                            </center>
                                            <hr>
                                            <div>
                                            <p class="text-left"><strong>Account Details: </strong><br>
                                                <ul>
                                                    <li>
                                                        Role:  <span>{{implode(', ', $user->roles->pluck('name')->toArray())}}</span>
                                                    </li>
                                                    <li>
                                                        Status: 
                                                        <span>
                                                            @if($user->status)
                                                                {{$user->status->name}}
                                                            @endif
                                                        </span>
                                                    </li>
                                                </ul>
                                            <br>
                                            @if($user->status_id != 1)
                                            <p class="text-danger text-center">Your account is inactive, you won't be able to access Admin Dahsboard. If its a new account, kindly wait for admin to manually activate your account</p>
                                            @endif

                                            </div>
                                        </div>

                                   
                                
                            </div>
                        </div>


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