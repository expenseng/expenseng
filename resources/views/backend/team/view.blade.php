@extends('layouts.home')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/dash-table.css') }}" />

<title>ExpenseNg - Teams</title>
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
                                <h3 class="mb-0">All Team Members </h3>
                                @can('add')
                                <a href="{{route('team.create')}}" class="btn btn-primary mt-3 section-btn-margin" style="float:right">CREATE A TEAM MEMBER</a>
                                @endcan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Twitter Handle</th>
                                                <th>Facebook Handle</th>
                                                <th>Instagram</th>
                                                <th>linkden Handle</th>
                                                <th>Role</th>
                                                <th>Image</th>
                                                
                                                @can('manage')
                                                <th>Actions</th>
                                                @endcan
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @if (count($team ) > 0)

                                            <tr>
                                            @foreach ($team as $team)
                                                <td>
                                                    {{++$count}}
                                                </td>
                                                <td>{{$team->name}}</td>
                                                <td>{{$team->twitter_handle}}</td>
                                                <td>{{$team->facebook_handle}}</td>
                                                <td>{{$team->instagram}}</td>
                                                <td>{{$team->linkedIn_handle}}</td>
                                                <td>{{$team->role}}</td>
                                                <td><img src="{{$team->avatar}}" alt="{{$team->name . '\'s image'}}" style="height: 50px; width:50px; border-radius: 50%"></td>
                                                @can('manage')
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            @can('edit')
                                                            <a href="{{'/admin/team/edit/' . $team->id}}"><i class="fa fa-edit" style="color: #00945E"></i></a>
                                                            @endcan
                                                        </div>
                                                        <!--modal begin-->

                                                            <div class="col-md-6">
                                                            @can('delete')
                                                            <i class="fa fa-trash" data-toggle="modal" data-target="{{'#exampleModal'. $team->id}}" style="color: red"></i>
                                                            @endcan

                                                            <div class="modal fade" id="{{'exampleModal' . $team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure???</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                Deleting <strong>{{$team->name}}</strong> from teams
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <form action="{{'/admin/team/delete/'. $team->id}}" method="post" >
                                                                @method('delete')

                                                                @csrf
                                                                <button type="" class="btn btn-danger">Delete</button>
                                                                </form>
                                                                </div>
                                                                </div>
  </div>
</div>
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
                                                <th>Twitter Handle</th>
                                                <th>Facebook Handle</th>
                                                <th>Instagram</th>
                                                <th>linkden Handle</th>
                                                <th>Role</th>
                                                <th>Image</th>
                                                
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

    <!-- slimscroll js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/slimscroll/jquery.slim.min.js"></script>

    <script>
        jQuery(document).ready(function() {
    $('#example').DataTable();
    } );
    </script>



@endsection

