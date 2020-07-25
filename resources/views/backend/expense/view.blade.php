@extends('layouts.home')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/dash-table.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/fixedHeader.bootstrap4.css">
    <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

    <!-- causes toggle error in navbar -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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
<title>ExpenseNg - Expenses</title>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">All Expenses </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th>SN</th>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Project</th>
                                            <th>Amount</th>
                                            <th>Ministry</th>
                                            @can('manage')
                                            <th>Action</th>
                                            @endcan
                                            </tr>
                                        </thead>
                                        
                                        
                                        <tbody>
                                        @if (count($expenses ) > 0)
                                         @foreach ($expenses as $expense)
                                            <tr>
                                                <td>{{$expense->id}} </td>
                                                <td>{{$expense->year}} </td>
                                                <td>{{$expense->month}}</td>
                                                <td>{{$expense->project}}  </td>
                                                <td>₦{{number_format($expense->amount_spent,2)}}</td>
                                                <td>Ministry of Works and Housing</td>
                                                @can('manage')
                                                <td>
                                                    @can('edit')
                                                    <a href="{{'/admin/expenses/edit/' . $expense->id}}"><i class="fa fa-edit" style="color: #00945E"></i></a>
                                                    @endcan

                                                    @can('delete')
                                                    <form method="POST" style="display: inline-flex;" action="{{'/admin/expenses/delete/'. $expense->id}}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <a type="submit" class="trash delete-expense">
                                                            <i class="fa fa-trash" style="color: red"></i>
                                                        </a>
                                                    </form>   
                                                    @endcan       
                                                </td>
                                                @endcan
                                        </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                       
                                        <tfoot>
                                            <tr>
                                            <th>SN</th>
                                            <th>Contractors</th>
                                            <th>Contract Awarded</th>
                                            <th>Awarding Ministry</th>
                                            <th>Amount</th>
                                            <th>Ministry</th>
                                            @can('manage')
                                            <th>Action</th>
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
            </div>
        </div>
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
    <script>
        $('.delete-expense').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    </script>
    


@endsection