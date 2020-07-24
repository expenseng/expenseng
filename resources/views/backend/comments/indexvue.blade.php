@extends('layouts.home')
@push('css')
   <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
            padding: 15px 8px !important;
        }
    </style>


    <title>ExpenseNg - Comments</title>
@endpush

@section('content')
    <div class="content" id="app">
        <div class="container-fluid">
            <admin-comments></admin-comments>
        </div>    
    </div>

@endsection

@section('js')

 
    
    <!-- main js -->
    <script src="{{ asset('js/main-js.js') }}" type="text/javascript"></script>
    
    <script src="{{ asset('js/app.js') }}" type="application/javascript"></script>

    <script>
        jQuery(document).ready(function() {
            $.noConflict();
            setTimeout(function() { 
               var table = $('#example').DataTable({
                 "order": [[ 0, "desc" ]]
               });
            }, 4000);
           
        });
    </script>

   

@endsection