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


    </style>
    <title>ExpenseNg - Web Stats</title>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">

            <!-- Step 1: Create the containing elements. -->
            <section id="auth-button"></section>
            <section id="view-selector"></section>
            <section id="timeline"></section>

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
        (function(w, d, s, g, js, fjs) {
            g = w.gapi || (w.gapi = {});
            g.analytics = {
                q: [],
                ready: function(cb) {
                    this.q.push(cb)
                }
            };
            js = d.createElement(s);
            fjs = d.getElementsByTagName(s)[0];
            js.src = 'https://apis.google.com/js/platform.js';
            fjs.parentNode.insertBefore(js, fjs);
            js.onload = function() {
                g.load('analytics')
            };
        }(window, document, 'script'));

    </script>
    <script>
        gapi.analytics.ready(function() {

            // Step 3: Authorize the user.

            var CLIENT_ID = '102136096746885655974';

            gapi.analytics.auth.authorize({
                container: 'auth-button',
                clientid: CLIENT_ID,
            });

            // Step 4: Create the view selector.

            var viewSelector = new gapi.analytics.ViewSelector({
                container: 'view-selector'
            });

            // Step 5: Create the timeline chart.

            var timeline = new gapi.analytics.googleCharts.DataChart({
                reportType: 'ga',
                query: {
                    'dimensions': 'ga:date',
                    'metrics': 'ga:sessions',
                    'start-date': '30daysAgo',
                    'end-date': 'yesterday',
                },
                chart: {
                    type: 'LINE',
                    container: 'timeline'
                }
            });

            // Step 6: Hook up the components to work together.

            gapi.analytics.auth.on('success', function(response) {
                viewSelector.execute();
            });

            viewSelector.on('change', function(ids) {
                var newIds = {
                    query: {
                        ids: ids
                    }
                }
                timeline.set(newIds).execute();
            });
        });

    </script>

@endsection
