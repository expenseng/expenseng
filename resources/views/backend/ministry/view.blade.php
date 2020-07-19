@extends('layouts.home')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/fixedHeader.bootstrap4.css">
    <script src="/extras/jquery/jquery-3.3.1.min.js"></script>
    <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

    <!-- causes toggle error in navbar -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://demos.creative-tim.com/material-dashboard/assets/css/material-dashboard.min.css?v=2.1.2">
  
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<title>ExpenseNg - Ministries</title>
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
      
        <div class="col-xl-12">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">All Ministries </h3>
                                @can('add')
                                <a href="{{route('ministry.create')}}" class="btn btn-primary" style="float:right">CREATE NEW MINISTRY</a>
                                @endcan
                                <p></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Short Name</th>
                                                <th>Code</th>
                                                <th>Minister in charge</th>
                                                <th>Ministry's Twitter Handle</th>
                                                <th>Website</th>
                                                @can('manage')
                                                <th>Action</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        
                                        
                                        <tbody>
                                        @if (count($ministries ) > 0)
                                            <tr>
                                                
                                                @foreach ($ministries as $ministry)
                                                <td>
                                                    {{++$count}}
                                                </td>
                                                <td>{{$ministry->name}}</td>
                                                <td>{{$ministry->shortname}}</td>
                                                <td>{{$ministry->code}}</td>
                                                <td>{{$ministry->head}}</td>
                                                <td>{{$ministry->twitter}}</td>
                                                <td>
                                                    {{$ministry->website}}
                                                </td>
                                                @can('manage')
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            @can('edit')
                                                            <a href="{{'/admin/ministry/edit/' . $ministry->id}}"><i class="fa fa-edit" style="color: #00945E"></i></a>
                                                            @endcan
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            @can('delete')
                                                            <i class="fa fa-trash" data-toggle="modal" data-target="{{'#exampleModal'.$ministry->id}}" style="color: red"></i>
                                                            @endcan
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="{{'exampleModal'. $ministry->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Deleting <strong>{{$ministry->name}}</strong> from Ministry
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="{{'/admin/ministry/delete/'. $ministry->id}}" method="post" >
                                                                @method('delete')
                                                                @csrf
                                                                <button type="" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <!--end modal -->
                                                        </div>


                                                    </div>
                                                </td>
                                                @endcan
                                                
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                       
                                        <tfoot>
                                            <tr>
                                            <th>S/N</th>
                                                <th>Name</th>
                                                <th>Short Name</th>
                                                <th>Code</th>
                                                <th>Minister in charge</th>
                                                <th>Ministry's Twitter Handle</th>
                                                <th>Website</th>
                                                @can('manage')
                                                <th>Actions</th>
                                                @endcan
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
                </div>
@endsection

@section('js')

    
    <!-- main js -->
    <script src="{{ asset('js/main-js.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dashboard-ecommerce.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

    <!-- bootstap bundle js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/slimscroll/jquery.slim.min.js"></script>
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
    


@endsection