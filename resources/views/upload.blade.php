@extends('layouts.home')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/fixedHeader.bootstrap4.css">
    <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
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
    <title>ExpenseNg - Users</title>
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
                                <h3 class="mb-0">excel upload</h3>
                                <p></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">


                                    <form  action="{{route('importExcel')}}"
                                      method='post' enctype='multipart/form-data'>
                                    {{ csrf_field() }}


                                    @if(session('errors'))
                                           @foreach($errors as $error)

                                    <div class="alert alert-danger">{{$error}}</div>

                                           @endforeach
                                    @endif

                                    @if(session('success'))

                                    <div class="alert alert-success">
                                    {{ session('success') }}
                                    </div>

                                    @endif

                                    <br>
                                    <br>


                                    select the excel file to upload

                                    <br>
                                    <br>
                                        <input type="file" name='file' required id='file'>
                                        <br><br>
                                        <label for="sheet">select sheet type to upload</label>
                                        <select name="sheetType" >
                                            <option value="budget">budget</option>
                                            <option value="company">company</option>
                                            <option value="people">people</option>
                                            <option value="sector">sector</option>
                                            <option value="expense">expense</option>
                                            <!-- <option value="payment">payment</option>  -->
                                            <!-- <option value="ministry">ministry</option> -->
                                            <option value="citizen">citizen</option>
                                            <!-- <option value="cabinet">cabinet</option> -->
                                        </select>

                                        <br>
                                        <br>
                                    <button type='submit'>upload file</button>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- table ends here  -->
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
