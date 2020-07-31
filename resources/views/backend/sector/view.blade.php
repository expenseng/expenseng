@extends('layouts.home')
@push('css')

    <link rel="stylesheet" href="{{ asset('css/dash-table.css') }}">
    
<title>ExpenseNg - Ministries</title>
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
        {{-- Flash message --}}
        <div id="alert">
         @include('backend.partials.flash')
        </div>
         {{-- Flash message end--}}
        <div class="col-xl-12">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-md-flex justify-content-between">
                                <h3 class="mb-0">All Sector </h3>
                                @can('add')
                                <a href="{{route('sector.create')}}" class="btn btn-primary mt-3 section-btn-margin" style="float:right">CREATE NEW SECTOR</a>
                                @endcan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>

                                                @can('manage')
                                                <th>Action</th>
                                                @endcan
                                            </tr>
                                        </thead>


                                        <tbody>
                                        @if (count($sectors ) > 0)
                                            <tr>

                                                @foreach ($sectors as $sector)
                                                    <td>
                                                        {{++$count}}
                                                    </td>
                                                    <td>{{$sector->name}}</td>

                                                    @can('manage')
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                @can('edit')
                                                                <a href="{{'/admin/sector/edit/' . $sector->id}}"><i class="fa fa-edit" style="color: #00945E"></i></a>
                                                                @endcan
                                                            </div>

                                                            <div class="col-md-6">
                                                                @can('delete')
                                                                <i class="fa fa-trash" data-toggle="modal" data-target="{{'#exampleModal'.$sector->id}}" style="color: red"></i>
                                                                @endcan
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="{{'exampleModal'. $sector->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Deleting <strong>{{$sector->name}}</strong> from Sector
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <form action="{{'/admin/sector/delete/'. $sector->id}}" method="post" >
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

    <script>
        jQuery(document).ready(function() {
    $('#example').DataTable();
    } );
    </script>



@endsection
