@extends('layouts.home')
@push('css')
<link rel="stylesheet" href="https://demos.creative-tim.com/material-dashboard/assets/css/material-dashboard.min.css?v=2.1.2">
  

<title>ExpenseNg - Create Tweet</title>
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
      
                <div class="row">
                    <div class="col-xl-10">
<!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Create New Tweet</h3>
                                    <p></p>
                                </div>
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <form method="post" action="{{route('tweets.store')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Twitter Handle</label>
                                                <input id="inputText3" name="twitter_handle" type="text" 
                                                class="form-control" placeholder="e.g @expenseng" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Text</label>
                                                <textarea id="inputEmail" name="body" type="textarea"
                                                 placeholder="e.g example" class="form-control" required >Type your tweet here</textarea>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Company Twitter Handle</label>
                                                <input id="inputText4" name="company_twitter" type="text" 
                                                class="form-control" placeholder="e.g @examplecompany" required />
                                            </div>
                                            <div class="form-group text-right">
                                                <input type="submit" value="Post Tweet!"
                                                class="form-control" 
                                                style="background-color: #00945E; color:honeydew; border: none; border-radius: 12px; width: 12rem"/>
                                            </div>
                                            </form>
                                            <!-- Default checked -->
											<div class="custom-control custom-switch">
												&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
												<label class="custom-control-label" for="customSwitch1">Enable Auto-Tweet</label>
											</div>
											<select name="time-select" class="custom-select" size="1">
												<option value="" disabled selected>Choose Tweet Interval</option>
												<option value="1">1 Hour</option>
												<option value="2">30 Mins</option>
												<option value="3">15 Mins</option>
											</select>

											<div class="form-group text-center">
                                                <input type="submit" value="Save"
                                                class="form-control text-center" 
                                                style="background-color: #00945E; color:honeydew; border: none; border-radius: 12px; width: 12rem"/>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form  -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <!-- main js -->
    <script src="{{ asset('js/main-js.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dashboard-ecommerce.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

    <script src="/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/slimscroll/jquery.slim.min.js"></script>
    <script src="/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- chart chartist js -->
    <script src="/vendor/charts/chartist-bundle/chartist.min.js"></script>
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
        @inject('tweeter', 'App\Http\Controllers\Admin\TweetsController')
  $(function() {
    $('.custom-control-input').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/autoTweet',
            data: {'status': status},
            success: function(data){
              if(data == 1){
                console.log(data.success);
                 // {{$tweeter->autoTweetStatus()}}
              }else{
                  return;
              }
            }
        });
    })
  })
</script>
@inject('tweeter', 'App\Http\Controllers\Admin\TweetsController')
@section('php')
<?php 

    if(isset($_POST['time-select'])){
      if ( $_POST['time-select'] == '1' ){
          $schedule->call(function () {
            // To run every hour here
            $tweeter->autoTweetStatus();
        })->everyHour();  
      }
      elseif( $_POST['time-select'] == '2' ){
        $schedule->call(function () {
            // Tsomething to run every 30 minutes here
            $tweeter->autoTweetStatus();
        })->everyThirtyMinutes();
          }
      elseif( $_POST['time-select'] == '3' ){
        $schedule->call(function () {
            // To run every 15 minutes here
            $tweeter->autoTweetStatus();
        })->addMinutes(15);
    }else {
        return;
    }
}

?>
    @endsection