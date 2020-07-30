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
                        <h4 class="mb-0" style="float:left"> EDIT PROFILE PAGE</h4>
                        <a href="{{'/admin/user/profile/'}}" class="btn btn-primary" style="float:right">Back</a>
                        <p></p>
                    </div>    
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class=" rounded-0 mt-3 border-primary">
                                <div class=" border-primary">
                                    
                                </div>
                                <!-- edit profile tab content -->
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
                                            </div>
                                            <form method="POST" action="{{'/admin/profile/edit/' . $user->id}}"  class="px-3 mt-2" enctype="multipart/form-data" id="update_user">
                                                @method('put')
                                                @csrf
                                                
                                                <label for="image">upload picture</label>
                                                <input id="image" name="image" type="file" value="{{$user->image}}">
                                            

                                                
                                                <div class="form-group n-0">
                                                    <label for="name" class="m-1">Name</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group n-0">
                                                    <label for="gender" class="m-1">Gender</label>
                                                    <select name="gender" id="gender" class="form-control">
                                                        <option value="" disabled <?php if($user->gender ==null){echo 'selected';} ?>>Select
                                                        
                                                        </option>
                                                        <option value="Male"  <?php if($user->gender =='Male'){echo 'selected';} ?>>Male
                                                        </option>
                                                        <option value="Female"  <?php if($user->gender == 'Female'){echo 'selected';} ?>>Female
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group n-0">
                                                    <label for="date_of_birth" class="m-1">Date of birth</label>
                                                    <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{$user->date_of_birth}}" required autocomplete="date_of_birth" autofocus>
                                                    @error('date_of_birth')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group n-0">
                                                    <label for="phone_number" class="m-1">phone_number</label>
                                                    <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{$user->phone_number}}" required autocomplete="phone_number" autofocus>
                                                    @error('phone_number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                

                                                <div class="form-group mt-2">
                                                   <input type="submit" name="profile_update" value="{{ __('Update') }}" form="update_user" class="btn btn-danger btn-block" id="ProfileUpdateBtn"> 
                                                </div>
                                            </form>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- edit profile tab content ends -->
                    
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


