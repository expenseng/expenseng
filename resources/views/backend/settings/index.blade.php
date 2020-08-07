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
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
  
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
    <title>ExpenseNg - Settings</title>
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h3>Settings</h3>
            </div>
        </div>
                <div class="card" >
                        <!--Tabs Header-->
                        <ul class="nav nav-tabs py-3 " id = "settingsTab">
                            <li class="active "><a data-toggle="tab" class="active show" href="#general">General</a></li>
                            <li><a data-toggle="tab" href="#notification">Notifications</a></li>
                            <li><a data-toggle="tab" href="#security">Security</a></li>
                        </ul>
                </div>   
                <!--Tab Body-->
                <div class="tab-content">
                    <!--1-->
                    <div id="general" class="tab-pane fade show active">
                        <div class = "card">
                            <div class="card-header security-header">
                                <h4>Profile</h4>
                                <a class= "save-link" href="/admin/profile/edit/1"><button class= "save-btn">Edit Profile</button></a>
                            </div>    
                        <hr>
                        <div class="card-body">
                            <div>
                                <form action="" method = "post" class = "row">
                                <div class="col-12 col-md-9">
                                    <h5>Profile Picture</h5> 
                                    <img src="{{$user->image}}" alt="{{$user->name . '\'s image'}}" style="height:250px; width:250px;" class="img-fluid img-thumbnail" ><br>
                                </div>

                                
                                <div class="col-12 col-md-9 push-top">
                                    <div class="form-group">
                                        <p><label class = "label-form" for="full-name">Full Name:</label><br> {{$user->name}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label class = "label-form" for="full-name">Email:</label>
                                        <p>{{$user->email}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label class = "label-form" for="full-name">Role:</label><br>{{implode(', ', $user->roles->pluck('name')->toArray())}}</p>
                                    </div> 
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        
                        <div class = "card">
                            <div class="card-header security-header">
                                <h4>Appearance</h4>
                               <button class="save-btn" id="savemebtn">Save</button>
                            </div>    
                        <hr>
                        <div class="card-body">
                            <h4 class = "mb-4 font-size-reduce">Dashboard Menu Arrangement</h4>
                            <ul id="sortable">
                                 @if (count($sidebar_items) > 0)
                                                    @foreach ($sidebar_items as $sidebar_item)
                                                          <li class="group" id="item_{{ $sidebar_item->name}}">
                                <div class="col-md-10 col-12">
                                <div class="row appearance-box">
                                    <div class="col-1">
                                    <i class="fas fa-arrows-alt-v"></i>
                                    </div>
                                    <div class="col-8">
                                    <p>{{ $sidebar_item->name }}</p>
                                    
                                    </div>
                                    <div class="col-1 hide-button-card text-muted">
                                    <i class="fas fa-eye-slash"></i> <p class = "font-weight-normal ">Hide</p>
                                    </div>
                                </div>
                                </div>
                                </li>
                                                    @endforeach
                                                @endif
                             

                            </ul>   
                        </div>
                        </div>


                     
                    </div>

                    
                    <!--Notifications Section-->
                    <div id="notification" class="tab-pane fade">
                        <div class = "card">
                            <div class="card-header security-header">
                                <h4>Notification Type</h4>
                                <a class= "save-link" href="#"><button class= "save-btn">Save</button></a>
                            </div>
                            <hr>
                            <div class="card-body">
                               <!-- Switch Slider -->
                               <div class = "d-flex switch-box">
                                    <div class="slider-box">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <p class = "slider-text">Email</p>
                                </div>
                                <div class = "d-flex switch-box">
                                    <div class="slider-box">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <p class = "slider-text">Notification Feed</p>
                                </div>
                                <div class = "d-flex switch-box">
                                    <div class="slider-box">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <p class = "slider-text">Pop-ups</p>
                                </div>
                            </div>                
                        </div>  
                        
                        <div class = "card">
                            <div class="card-header security-header">
                                <h4>Notify me when</h4>
                                <a class= "save-link" href="#"><button class= "save-btn">Save</button></a>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class = "d-flex switch-box">
                                    <div class="slider-box">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <p class = "slider-text">Anyone posts a comment</p>
                                </div>
                                <div class = "d-flex switch-box">
                                    <div class="slider-box">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <p class = "slider-text">A comment is held for moderation </p>
                                </div>
                                <div class = "d-flex switch-box">
                                    <div class="slider-box">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <p class = "slider-text">Someone likes a post </p>
                                </div>
                                <div class = "d-flex switch-box">
                                    <div class="slider-box">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <p class = "slider-text">Someone subscribes to a page</p>
                                </div>
                                <div class = "d-flex switch-box">
                                    <div class="slider-box">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <p class = "slider-text">Someone visits the site</p>
                                </div>
                                <div class = "d-flex switch-box">
                                    <div class="slider-box">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <p class = "slider-text">Anyone sends a message</p>
                                </div>
                                <div class = "d-flex switch-box">
                                    <div class="slider-box">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <p class = "slider-text">An admin changes/adds anything</p>
                                </div>
                            </div>                
                        </div>  
                    </div>
                           
                    <!--Security Section-->
                    
                    <div id="security" class="tab-pane fade">
                        <div class = "card">
                            <div class="card-header security-header">
                                <h4>Change Password</h4>
                            </div>
                            <hr>
                            <div class="card-body">
                                <form action="{{'/admin/settings/change_password/' . $user->id}}" method="post" id="change_password" >

                                    <div class="form-group">
                                        <label class = "label-form" for="curpass">Enter New Password</label>
                                        <input id="password" type="password" class="col-9 form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="curpass" class = "label-form">Confirm New Password</label>
                                        <input id="password-confirm" type="password" class="col-9 form-control" placeholder="Repeat your password" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    
                                    <div class="card-footer- mt-3">
                                        @method('put')
                                        @csrf
                                        <input type="submit"  class="save-btn m-0 changePass" value="Change" id="changePass">
                                    </div>
                                </form>                    
                        </div>  
                    </div>​
                </div>
            </div>
        </div>
    </div>
</div>                                     


        <!-- ============================================================== -->
                <!-- end data table  -->
        <!-- ============================================================== -->
    
@endsection

@section('js')
    <script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    </script>
    
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
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    
<script>
    console.log("Hi");
  $("document").ready(function() {
    $( "#sortable" ).sortable({connectWith:"ul"});
    $( "#sortable" ).disableSelection();
    
    $("#savemebtn").click(function(){
      var data = $( "#sortable" ).sortable('serialize');
      $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
     $.ajax({
               url: '/admin/user/settings/update',
               method: 'POST',
               dataType: 'text',
               data: {data:data},
               success: function (response) {
                    alert(response);
               }
            });
    });
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
