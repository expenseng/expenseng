@extends('layouts.home')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/fixedHeader.bootstrap4.css">
    <script src="/extras/jquery/jquery-3.3.1.min.js"></script>
    <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/dash-table.css') }}" />
    <!-- causes toggle error in navbar -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://demos.creative-tim.com/material-dashboard/assets/css/material-dashboard.min.css?v=2.1.2">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<title>ExpenseNg - Sheets</title>
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
                            <div class="card-header d-md-flex justify-content-between">
                                <h3 class="mb-0">Sheets </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Type</th>
                                                <th>Link</th>
                                                <th>Status</th>
                                                @can('manage')
                                                <th>Actions</th>
                                                @endcan



                                            </tr>
                                        </thead>

                                        <tbody>
                                        
                                        @if (count($sheets) > 0)

                                            <tr>
                                            @foreach ($sheets as $sheet)
                                                <td>
                                                    {{++$count}}
                                                </td>
                                                <td>{{$sheet->type}}</td>
                                                <td>{{$sheet->link}}</td>
                                                <td>{{$sheet->parsed ? 'Parsed' : 'New' }}</td>
                                                @can('manage')
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            
                                                            <a target="_blank" href="{{$sheet->link}}"><i class="fa fa-download" style="color: #00945E"></i></a>
                                                            
                                                        </div>
                                                        <div class="col-md-6">
                                                         <a href="#"><i class="fa fa-database"></i></a>
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
                                                <th>Type</th>
                                                <th>Link</th>
                                                <th>Status</th>
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



    <!-- bootstap bundle js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.js"></script>
    
    <!-- slimscroll js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/slimscroll/jquery.slim.min.js"></script>
    
    <!-- datatable  js -->
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    
    <script>
        jQuery(document).ready(function() {
    $('#example').DataTable();
    } );
    </script>



@endsection

