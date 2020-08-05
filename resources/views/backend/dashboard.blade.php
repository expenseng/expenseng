@extends('layouts.home')
@push('css')

    <!--     Fonts and icons     -->

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/material-dashboard/assets/css/material-dashboard.min.css?v=2.1.2">
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<link href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/dash-table.css') }}" />

      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" />
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/dash.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.toast.min.css')}}">
<!-- Global site tag (gtag.js) - Google Analytics -->

@endpush
<title>
    ExpenseNg - Admin Dashboard
</title>
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div id="alert">
                @include('backend.partials.flash')
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="card p-3">
                        <div class="d-flex justify-content-between ">
                            <div class="card-icon section-card-icon p-3">
                                <i class="material-icons">mode_edit</i>
                            </div>
                            <div class="card-write-up ">
                                <p class="card-category">Total Comments</p>
                            </div>
                        </div>
                        <div class="card-number">
                            <h3 class=""> {{$comments}}

                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="card p-3">
                        <div class="d-flex justify-content-between">
                            <div class="card-icon section-card-icon p-3">
                                <i class="material-icons">account_balance_wallet</i>
                            </div>
                            <div class="card-write-up">
                                <p class="card-category">Total {{ date('Y') }} Budget</p>
                            </div>
                        </div>
                        <div class="card-number">
                            <h3 class="">₦{{ number_format($year_budget) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="card p-3">
                        <div class="d-flex justify-content-between">
                            <div class="card-icon section-card-icon p-3">
                                <i class="material-icons">account_balance</i>
                            </div>
                            <div class="card-write-up">
                                <p class="card-category">Total Ministries</p>
                            </div>
                        </div>
                        <div class="card-number">
                            <h3 class="">{{ $total_ministry }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                    <div class="card p-3">
                        <div class="d-flex justify-content-between">
                            <div class="card-icon section-card-icon p-3">
                                <i class="material-icons">dns</i>
                            </div>
                            <div class="card-write-up">
                                <p class="card-category">Total Companies</p>
                            </div>
                        </div>
                        <div class="card-number">
                            <h3 class="">{{ $total_company }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="section-card-title">Recent Expenses</h4>
                            <p class="section-card-category">Last 7 expenses</p>
                        </div>
                        <div class="card-body bordered">
                            <div class="table-section reponsive-div">
                                <div class="main-table section-main-table">
                                    <div class="table-data">
                                        <div style="overflow-x: auto;">
                                            <table class="table table-striped table-responsive">
                                                <thead class="text-primary">
                                                    <th>S/N</th>
                                                    <th>Date</th>
                                                    <th>Ministry</th>
                                                    <th>Amount Spent</th>
                                                    <th>Description</th>
                                                    <th>Beneficary</th>
                                                </thead>
                                                <tbody>
                                                    @if (count($recent_expenses)>0)

                                                        @foreach ($recent_expenses as $recent_expense)
                                                            <tr>
                                                                <td>{{ ++$counter }}</td>
                                                                <td>{{ $recent_expense->payment_date }}</td>
                                                                <td>{{ $recent_expense->organization() }}</td>
                                                                <td>₦{{number_format($recent_expense->amount,2)}}</td>
                                                                <td>{{ $recent_expense->description }}</td>
                                                                <td>{{ $recent_expense->beneficiary }}</td>

                                                            </tr>
                                                        @endforeach

                                                    @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header d-md-flex justify-content-between">
                            <h4 class="section-card-title">Recent Activities</h4>

                            @can('delete')
                            @if (count($recent_activites)>0)
                                <button class="btn btn-primary" style="float:right" data-toggle="modal"
                                    data-target="#exampleModal1">Mark all as read</button>
                            @endif
                            @endcan

                            @can('delete')
                            @if (count($recent_activites)==0)
                                <button class="btn btn-primary" style="float:right" data-toggle="modal"
                                     disabled>No new notification</button>
                            @endif
                            @endcan



                        </div>
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Mark all as read</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        This action will Set all notifications status as read, including notifications you have not opened
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form action="{{ '/admin/activity/all/' }}" method="post">
                                           @method('put')
                                            @csrf
                                            <button type="" class="btn btn-danger">Proceed</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="card-body table-responsive-sm">
                            <table id='data' class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Description</th>
                                        <th>status</th>
                                        <th>Date</th>
                                        @can('manage')
                                            <th>Action</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($recent_activities)>0)

                                    @foreach ($recent_activities as $recent_activity)
                                    <tr>
                                    <td>{{ ++$count }}</td>
                                    <td>{{ $recent_activity->description }}</td>
                                    <td>{{ $recent_activity->status }}</td>
                                    <td>{{ $recent_activity->created_at }}</td>
                                    @can('manage')
                                    <td>
                                    <!--modal begin-->
                                    @can('delete')

                                        <a class="fa fa-eye" data-toggle="modal" data-target="{{ '#Modal' . $recent_activity->id }}"
                                            style="color: blue"></a>
                                        @can('delete')
                                            <a class="fa fa-trash" data-toggle="modal"
                                                data-target="{{ '#exampleModal'.$recent_activity->id }}"
                                                style="color: red;"></a>
                                        @endcan
                                    @endcan


                                    <div class="modal fade" id="{{ 'Modal' . $recent_activity->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel">Activity details
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><b>This action was performed by:</b> {{ $recent_activity->username}}</p>
                                                    <p><b>Privilage level:</b> {{ $recent_activity->privilage }}</p>

                                                    <p><b>Description:</b></p><textarea style="width:100%" disabled> {{ $recent_activity->description }}
                                                    </textarea>
                                                    <br>
                                                    <br>
                                                    <p><b>Carried out: </b>{{ $recent_activity->created_at }}</p>
                                                </div>

                                                <div class="modal-footer">

                                                        <form
                                                            action="{{ '/admin/activity/mark/' . $recent_activity->id }}"
                                                            method="post">
                                                            @method('put')

                                                            @csrf
                                                            <button type="" class="btn btn-danger">Seen</button>
                                                        </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="modal fade" id="{{ 'exampleModal' . $recent_activity->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you
                                                            sure???</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Deleting from activities
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <form
                                                            action="{{ '/admin/activity/delete/' . $recent_activity->id }}"
                                                            method="post">
                                                            @method('delete')

                                                            @csrf
                                                            <button type="" class="btn btn-danger">Delete</button>
                                                        </form>

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
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Date</th>
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
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="section-card-title">Visitors Suggestions</h2>
                    </div>
                    <div class="card-body bordered">
                        <div class="table-section reponsive-div">
                            <div class="main-table section-main-table">
                                <div class="table-data">
                                    <div style="overflow-x: auto;">
                                        <table class="table table-striped table-responsive-smr">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">Firstname</th>
                                                    <th class="border-0">Lastname</th>
                                                    <th class="border-0">Cabinet</th>
                                                    <th class="border-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if (count($feedbacks)> 0)
                                                    @foreach ($feedbacks as $feedback)
                                                        <tr>
                                                            <td>{{ $feedback->firstName }} </td>
                                                            <td>{{ $feedback->lastName }} </td>
                                                            <td>{{ $feedback->ministry_id }}</td>
                                                            <td>
                                                                <a href="{{ route('feedback.approve', ['id' => $feedback->id]) }}"
                                                                    class="btn btn-success btn-sm mr-2 btn-approve">Approve</button>
                                                                    <a href="{{ route('feedback.ignore', ['id' => $feedback->id]) }}"
                                                                        class="btn btn-danger btn-sm btn-ignore px-4">Ignore</button>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class=" offset-1 col-3">
            <div class="p-1 fixed-plugin tweet-plugin  " id="tweetButton">
                <button type="button" class="btn  p-3 btn-white bg-white text-primary  tweet-button" id="B1"
                    data-toggle="modal" data-target="#sendTweetModal">
                    <i class="fa fa-twitter fa-10x text-primary"></i> tweet
                </button>
            </div>
        </div>
        <div class=" offset-1 col-3 mr-auto ">
            <div class="p-1 mr-0 tweet-list-plugin fixed-plugin " id="tweetButton2">
                <button type="button"
                    class="btn btn-white bg-light text-primary border  p-3 tweet-list-button" id="B2"
                    data-toggle="modal" data-target="#listTweetModal">
                    <i class="fa fa-twitter fa-10x text-primary"></i>Tweets
                </button>
            </div>
        </div>
    </div>
    <div class="modal" id="sendTweetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Type in tweet below</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert1 ">

                    </div>
                    <form class="user" action="">
                        @csrf
                        <div class="form-group">
                            <textarea name="tweet" maxlength="260" class="form-control tweet" id="" cols="50"
                                rows="6"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary sendTweet" id="sendTweet">tweet</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="listTweetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tweets</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="" id="tweets">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="container-fluid">
            <nav class="float-left">
                <ul>
                    <li>
                        <a href='{{url('/')}}'>
                            ExpenseNg
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy; {{ date('Y') }}, All Rights Reserved
            </div>
        </div>
    </footer>

@endsection
@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"
        integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ=="
        crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery.toast.min.js')}}"></script>

<script>
$(document).ready( function () {
    $('#notification').DataTable();
} );
</script>
    <script>
        jQuery(document).ready(function() {
            jQuery().ready(function() {

                $sidebar = jQuery('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = jQuery('.full-page');

                $sidebar_responsive = jQuery('body > .navbar-collapse');

                window_width = jQuery(window).width();

                fixed_plugin_open = jQuery('.sidebar .sidebar-wrapper .nav li.active a p').html();

                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if (jQuery('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        jQuery('.fixed-plugin .dropdown').addClass('open');
                    }

                };
                jQuery.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                jQuery('.fixed-plugin a').click(function(event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if (jQuery(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });
                jQuery.fn.getTweets = function(){
                    jQuery.ajax({
                        url: "{{ URL::to('tweets') }}",
                        type: "get",
                        datatype: "html"
                    }).done(function(data) {
                        $("#tweets").empty().html(data);
                    }).fail(function(jqXHR, ajaxOptions, thrownError) {
                        $("#tweets").empty().html(
                            '<div class="alert alert-danger"> failed to load tweets </div>'
                        )
                    });
                }
                jQuery(".sendTweet").click(function() {
                    $tweet = jQuery('.tweet').val();
                    jQuery.ajax({
                        type: 'POST',
                        url: "{{ URL::to('post_tweet') }}",
                        data: {
                            'tweet': $tweet
                        },
                        success: function(data) {
                            jQuery('.tweet').val('');
                            jQuery.toast({
                                text: data,
                                showHideTransition: 'slide',
                                icon: 'success',
                                position: 'top-center',
                                hideAfter: 5000
                            });
                        },
                        error: function(data) {
                            jQuery.toast({
                                text: 'unable to tweet try again',
                                showHideTransition: 'slide',
                                icon: 'danger',
                                position: 'top-center',
                                hideAfter: 5000
                            });

                        }
                    });
                });
                if ($(window).width() < 960) {
                    $('#tweetButton').removeClass('fixed-plugin');
                    $('#tweetButton').removeClass('tweet-plugin');
                    $('#tweetButton2').removeClass('fixed-plugin');
                    $('#tweetButton2').removeClass('tweet-list-plugin');
                    $('#B1').removeClass('tweet-button');
                    $('#B2').removeClass('tweet-list-button');
                }

                $(window).on('resize', function() {
                    if ($(window).width() < 1000) {
                        $('#tweetButton').removeClass('fixed-plugin');
                        $('#tweetButton').removeClass('tweet-plugin');
                        $('#tweetButton2').removeClass('fixed-plugin');
                        $('#tweetButton2').removeClass('tweet-list-plugin');
                        $('#B1').removeClass('tweet-button');
                        $('#B2').removeClass('tweet-list-button');
                    } else {
                        $('#tweetButton').addClass('fixed-plugin');
                        $('#tweetButton2').addClass('fixed-plugin');
                        $('#tweetButton2').addClass('tweet-list-plugin');
                        $('#tweetButton').addClass('tweet-plugin');
                        $('#B1').addClass('tweet-button');
                        $('#B2').addClass('tweet-list-button');


                    }
                });
                jQuery('#B2').click(function() {
                    jQuery.fn.getTweets();
                });
                jQuery.fn.delete = function(data) {
                    $id = data;
                    $div = '#' + $id
                    $confirm = confirm('Are you sure you want to delete this tweet');
                    if ($confirm) {
                        jQuery.ajax({
                            url: "{{ URL::to('delete_tweet') }}",
                            type: "delete",
                            data: {
                                'id': $id
                            },
                        }).done(function(data) {
                            jQuery.toast({
                                text: data,
                                showHideTransition: 'slide',
                                icon: 'success',
                                position: 'top-center',
                                hideAfter: 5000
                            });
                            jQuery($div).fadeOut(4000);
                        }).fail(function(data) {
                            jQuery.toast({
                                text: 'unable to delete',
                                showHideTransition: 'slide',
                                icon: 'danger',
                                position: 'top-center',
                                hideAfter: 5000
                            });
                        })
                    }

                }
                jQuery.fn.retweet = function(data) {
                    $id = data;
                    $div = '#' + $id
                    jQuery.ajax({
                        url: "{{ URL::to('retweet') }}",
                        type: "post",
                        data: {
                            'id': $id
                        },
                    }).done(function(data) {
                        jQuery.toast({
                            text: data,
                            showHideTransition: 'slide',
                            icon: 'success',
                            position: 'top-center',
                            hideAfter: 5000
                        });
                        jQuery.fn.getTweets();
                    }).fail(function(data) {
                        jQuery.toast({
                            text: 'already retweeted',
                            showHideTransition: 'slide',
                            icon: 'error',
                            position: 'top-center',
                            hideAfter: 5000
                        });
                    })
                }

                jQuery('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');

                    jQuery(this).siblings().removeClass('active');
                    jQuery(this).addClass('active');

                    var new_color = jQuery(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                jQuery('.fixed-plugin .background-color .badge').click(function() {
                    jQuery(this).siblings().removeClass('active');
                    jQuery(this).addClass('active');

                    var new_color = jQuery(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                jQuery('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = jQuery('.full-page-background');

                    jQuery(this).parent('li').siblings().removeClass('active');
                    jQuery(this).parent('li').addClass('active');


                    var new_image = jQuery(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $(
                            '.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' +
                                new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $(
                            '.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                            'img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' +
                                new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if (jQuery('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr(
                            'src');
                        var new_image_full_page = jQuery('.fixed-plugin li.active .img-holder')
                            .find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' +
                            new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });

                jQuery('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');

                    $input = jQuery(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                jQuery('.switch-sidebar-mini input').change(function() {
                    $body = jQuery('body');

                    $input = jQuery(this);

                    if (md.misc.sidebar_mini_active == true) {
                        jQuery('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        jQuery('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        jQuery('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar(
                            'destroy');

                        setTimeout(function() {
                            jQuery('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });

    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
    </noscript>
    <script>
        jQuery(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });

    </script>
    <script>
        $("document").ready(function() {
            setTimeout(function() {
                $("#alert").remove();
            }, 3000); // 5 secs
            $("#alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#alert").slideUp("500");
            });
        });

    </script>
    <script>
        $(document).ready(function(){
    $('#data').after('<div id="nav" style="float:right"></div>');
    var rowsShown = 5;
    var rowsTotal = $('#data tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('<a  rel="'+i+'" class="btn btn-secondary" >'+pageNum+'</a> ');
    }
    $('#data tbody tr').hide();
    $('#data tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
    });
});

    </script>
@endsection
