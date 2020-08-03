@extends('layouts.home')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/extras/datatables/css/fixedHeader.bootstrap4.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" <link
        rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css" <script
        type="text/javscript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"
        integrity="sha512-G8JE1Xbr0egZE5gNGyUm1fF764iHVfRXshIoUWCTPAbKkkItp/6qal5YAHXrxEu4HNfPTQs6HOu3D5vCGS1j3w=="
        crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    </style>
    <title>ExpenseNg - Web Stats</title>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
                       <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="card p-3">
                        <div class="d-flex justify-content-between ">
                            <div class="card-icon section-card-icon p-3">
                            </div>
                            <div class="card-write-up ">
                                <p class="card-category">Total Visitors</p>
                            </div>
                        </div>
                        <div class="card-number">
                            <h3 class=""> {{$total_users}}

                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="card p-3">
                        <div class="d-flex justify-content-between">
                            <div class="card-icon section-card-icon p-3">
                               
                            </div>
                            <div class="card-write-up">
                                <p class="card-category">New Visitors</p>
                            </div>
                        </div>
                        <div class="card-number">
                            <h3 class="">{{ $new_users }}</h3>
                        </div>
                    </div>
                </div>
               
                
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="card p-2">

                        <p>Comparisim between this week and last week's traffic</p>
                        <br>
                        <iframe width="500" height="270" seamless frameborder="0" scrolling="no"
                            src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRWouT153P7RbTf7p10550JSzFGqn5tOmQBRm8zDarEgTRmanZ4rhCSTLoartHIU42pgJEBH2lE_BHm/pubchart?oid=901905743&amp;format=interactive"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="card p-2">
                        <p>Top used browsers</p>

                        <iframe width="350" height="290" seamless frameborder="0" scrolling="no"
                            src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRWouT153P7RbTf7p10550JSzFGqn5tOmQBRm8zDarEgTRmanZ4rhCSTLoartHIU42pgJEBH2lE_BHm/pubchart?oid=1330098382&amp;format=interactive"></iframe>

                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="card p-2">
                        <p>Top used Operating systems</p>


                        <iframe width="472" height="291" seamless frameborder="0" scrolling="no"
                            src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRWouT153P7RbTf7p10550JSzFGqn5tOmQBRm8zDarEgTRmanZ4rhCSTLoartHIU42pgJEBH2lE_BHm/pubchart?oid=1049308531&amp;format=interactive"></iframe>
                    </div>
                </div>
                       <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="card p-2">
                    <iframe width="477" height="295" seamless frameborder="0" scrolling="no"
                        src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRWouT153P7RbTf7p10550JSzFGqn5tOmQBRm8zDarEgTRmanZ4rhCSTLoartHIU42pgJEBH2lE_BHm/pubchart?oid=70848&amp;format=interactive"></iframe>
                </div>

            </div>
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


        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        labels: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        </script>
    @endsection
