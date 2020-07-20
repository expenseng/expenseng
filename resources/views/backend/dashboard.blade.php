@extends('layouts.home')
@push('css')

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/material-dashboard/assets/css/material-dashboard.min.css?v=2.1.2">
    <link rel="stylesheet" href="{{asset('css/dash.css')}}" />
@endpush
<title>
    ExpenseNg - Admin Dashboard
</title>
@section('content')
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{{$message}}</strong>
    </div>
  @endif

  @if(Session::has('flash_message'))
    <p class="alert {{Session::get('alert-class','alert-info')}}">{{Session::get('flash_message')}}</p>
  @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-3 col-md-6 col-sm-6 panel">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">mode_edit</i>
                            </div>
                            <p class="card-category">Total Comments</p>
                            <h3 class="card-title">0

                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 panel">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">account_balance_wallet</i>
                            </div>
                            <p class="card-category">Total {{date('Y')}} Budget</p>
                            <h3 class="card-title">₦{{number_format($year_budget)}}</h3>

                        </div> <hr />
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 panel">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">account_balance</i>
                            </div>
                            <p class="card-category">Total Ministries</p>
                            <h3 class="card-title">{{$total_ministry}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 panel">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">dns</i>
                            </div>
                            <p class="card-category">Total Companies</p>
                            <h3 class="card-title">{{$total_company}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">Recent Expenses</h4>
                            <p class="card-category">Last 7 expenses</p>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                <th>S/N</th>
                                <th>Company</th>
                                <th>Project</th>
                                <th>Ministry</th>
                                <th>Amount Spent</th>
                                </thead>
                                <tbody>
                                @if (count($recent_expenses)>0)

                                    @foreach ($recent_expenses as $recent_expense)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$recent_expense->year}}</td>
                                            <td>{{$recent_expense->project}}</td>
                                            <td>{{$recent_expense->month}}</td>
                                            <td>₦{{number_format($recent_expense->amount_spent)}}</td>
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
    <div class="row mr-5">
        <div class="col d-flex">
            <div class="row ml-auto">

                <button type="button " class="btn btn-white py-4" data-toggle="modal" data-target="#exampleModal">
                    tweet <i class="fa fa-twitter fa-10x text-primary"></i>
                </button>

                <!-- Modal -->
                <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Type in tweet below</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert1 " >

                                </div>
                                <form class="user" action="">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="tweet"  maxlength="260" class="form-control tweet" id="" cols="50" rows="6"></textarea>
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
            </div>
        </div>

        <div class="col-xl-8 col-lg-12 col-md-8 col-sm-12 col-12">
                        <div class="card">
                            <h2 class="p-4 card-header">Visitors Suggestions</h2>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">

                                                <th class="border-0">Firstname</th>
                                                <th class="border-0">Lastname</th>
                                                <th class="border-0">Cabinet</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        @if (count($feedbacks)> 0 && isset($feedbacks))
                                            @foreach ($feedbacks as $feedback)
                                                <tr>
                                                    <td>{{$feedback->firstName}} </td>
                                                    <td>{{$feedback->lastName}}  </td> 
                                                    <td>{{$feedback->ministry_id}}</td>
                                                    <td>
                                                        <a href="{{route('feedback.approve', ['id' => $feedback->id])}}" class="btn btn-success btn-sm ">Approve</button>
                                                        <a href="{{route('feedback.ignore', ['id' => $feedback->id])}}" class="btn btn-danger btn-sm">Ignore</button>

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

    <footer class="footer">
        <div class="container-fluid">
            <nav class="float-left">
                <ul>
                    <li>
                        <a href="https://www.expenseng.com">
                            ExpenseNg
                        </a>
                    </li>
                    <li>
                        <a href="#">
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
                &copy; {{date('Y')}}, All Rights Reserved
            </div>
        </div>
    </footer>
    </div>
    </div>
@endsection
@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>


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
                jQuery(".sendTweet").click(function () {
                    var token =  $('input[name="_token"]').attr('value');
                    $tweet = jQuery('.tweet').val();
                    jQuery.ajax({
                        type : 'POST',
                        url : "{{URL::to('post_tweet')}}",
                        data:{'tweet': $tweet},
                        success:function (data) {
                            jQuery('.tweet').val('');
                            jQuery('.alert1').removeClass('alert-danger');
                            jQuery('.alert1').fadeIn(5000);
                            jQuery('.alert1').addClass('alert alert-success text-white');
                            jQuery('.alert1').html('tweet sent ');
                            jQuery('.alert1').fadeOut(5000);
                            // $('#savingsStatus').html(data);
                    },error: function (data){
                            jQuery('.tweet').val('');
                            jQuery('.alert1').removeClass('alert-success');
                            jQuery('.alert1').fadeIn(5000);
                            jQuery('.alert1').addClass('alert alert-danger text-white');
                            jQuery('.alert1').html('tweet not sent');
                            jQuery('.alert1').fadeOut(5000);

                        }
                    });


                });


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

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if (jQuery('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = jQuery('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
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

                        jQuery('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

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
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
    </noscript>
    <script>
        jQuery(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
    </script>
@endsection
