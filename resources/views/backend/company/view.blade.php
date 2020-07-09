@extends('layouts.home')
@push('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link rel="stylesheet" href="/extras/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/fixedHeader.bootstrap4.css">
<title>ExpenseNg - Companies</title>
@endpush

@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">Registered Companies </h3>
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
                                                <th>Industry Twitter</th>
                                                <th>CEO</th>
                                                <th>CEO Twitter</th>
                                                
                                            </tr>
                                        </thead>
                                        @if (count($companies ) > 0)
                                        @foreach ($companies as $company)
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>{{$company->name}}</td>
                                                <td>{{$company->shortname}}</td>
                                                <td>{{$company->industry}}</td>
                                                <td>{{$company->ceo}}</td>
                                                <td>{{$company->twitter}}</td>
                                            </tr>
                                            
                                        </tbody>
                                        @endforeach
                                        @endif
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Company Name</th>
                                                <th>Short Name</th>
                                                <th>Industry Twitter</th>
                                                <th>CEO</th>
                                                <th>CEO Twitter</th>
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
<script src="/extras/jquery/jquery-3.3.1.min.js"></script>
    <script src="/extras/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/extras/slimscroll/jquery.slimscroll.js"></script>
    <script src="/extras/multi-select/js/jquery.multi-select.js"></script>
    <script src="/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="/extras/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="/extras/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="/extras/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
@endsection