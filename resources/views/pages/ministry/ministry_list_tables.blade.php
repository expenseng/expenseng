@extends('layouts.master')
@section('css')
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/aboutus-header_footer.css')}}">
<title>FG Expense - Profile</title>
@endsection

@section('content')

<link rel="stylesheet" href="{{asset('/css/ministry_list_table.css')}}">
<!-- Section-->
<div class="container mt-4 pt-2">
    <div class="container mt-4">

        <div class="row">
            <p id="header" class="font-weight-bold">
                <span class="head-cont text-success"> HOME</span>
                <span class="head-cont dot"> &#8226</span>
                <span class="head-cont text-success"> PROFILES</span>
                <span class="head-cont dot"> &#8226</span>
                <span class="head-cont text-success"> MINISTRIES</span>
                <span class="head-cont dot"> &#8226</span>
                <span class="head-cont text-success"> MINISTRY PROFILE</span>
            </p>
        </div>
    </div>
</div>

<div class="container d-flex centerize py-4">
    <div class="ministry-logo d-flex ">
        <img src="{{asset('/img/image_7.png')}}" class="ministry-logo-image" alt="ministry logo">
    </div>
    <div class="ministry">
        <h1 class="font-weight-bold">Ministry of Works and Human Development</h1>
    </div>
</div>

<div class="container intro mb-4 mt-4">
    <div class="row stats">
        <div class="col">
            <p>Ministry Twitter Handle</p>
            <h4 class="twitter-link"><?php echo urldecode('%40')?>ministryworks</h4>
            <small>2020</small>
        </div>
        <div class="col">
            <p>Total Amount Spent</p>
            <h4><span class="text-success">&#8358;38.8M</span></h4>
            <small>2020</small>
        </div>
        <div class="col">
            <p>Total Number of Projects Contracted</p>
            <h4><span class="text-success">27</span></h4>
            <small>2020</small>
        </div>
    </div>

</div>

<div class="container-2 list">
    <!--Tabs Header-->
    <ul class="nav container nav-tabs switch-list py-3 mb-3">
        <li><a data-toggle="tab" class="active" href="#expense">Expense Summary</a></li>
        <li><a data-toggle="tab" href="#board">Cabinet</a></li>
        <li><a data-toggle="tab" href="#comments">Comments</a></li>
    </ul>

    <hr>
    <!--Tab Body-->
    <div class="tab-content">

        <!--1-->
        <div id="expense" class="tab-pane fade show active">

            <div>
                <div id="table-border" class="container pt-3 mt-4 pb-3">
                    <div class="container pb-3 pt-1 py-4">
                        <div class="row centerize">
                            <div class="col">
                                <h3 class="index"> Date:28th May, 2020</h1>
                            </div>

                            <div class="col">
                                <button type="button" class="btn btn-success filter"> Select Date <img
                                        src="/img/vector__2_.png"></button>
                            </div>
                        </div>
                    </div>


                    <div class="container">
                        <div class="table-div">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Project</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td> Rehabilitation of Lago..</td>
                                        <td> Julius Berger</td>
                                        <td> N72,902,001.229</td>
                                        <td> 20th, May 2020</td>
                                    </tr>
                                    <tr class="back">
                                        <td> Rehabilitation of Lago..</td>
                                        <td> Samsung</td>
                                        <td> N65,001,901.123</td>
                                        <td> 20th, May 2020</td>
                                    </tr>
                                    <tr>
                                        <td> Rehabilitation of Lago..</td>
                                        <td> CCNCC</td>
                                        <td> N62,899,012.111</td>
                                        <td> 20th, May 2020</td>
                                    </tr>
                                    <tr class="back">
                                        <td> Building of Class Blocks</td>
                                        <td> HNG</td>
                                        <td> N56,901,889.101</td>
                                        <td> 20th, May 2020</td>
                                    </tr>
                                    <tr>
                                        <td> Building of Class Blocks</td>
                                        <td> Huawei</td>
                                        <td> N72,902,001.229</td>
                                        <td> 20th, May 2020</td>
                                    </tr>
                                    <tr class="back">
                                        <td> Building of Class Blocks</td>
                                        <td> MTN</td>
                                        <td> Amount</td>
                                        <td> 20th, May 2020</td>
                                    </tr>
                                    <tr>
                                        <td> Building of Class Blocks</td>
                                        <td> Amount</td>
                                        <td> Amount</td>
                                        <td> 20th, May 2020</td>
                                    </tr>
                                    <tr class="back">
                                        <td> Building of Class Blocks</td>
                                        <td> Amount</td>
                                        <td> Amount</td>
                                        <td> 20th, May 2020</td>
                                    </tr>
                                    <tr>
                                        <td> Building of Class Blocks</td>
                                        <td> Amount</td>
                                        <td> Amount</td>
                                        <td> 20th, May 2020</td>
                                    </tr>
                                    <tr class="back">
                                        <td> Building of Class Blocks</td>
                                        <td> Amount</td>
                                        <td> Amount</td>
                                        <td> 20th, May 2020</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>

                        <div class="row centerize mt-3 pt-3">
                            <div class="col-md result text-muted"> 1-20 of 320 results</div>
             
                                <div class="pagination">
                                    <a href="#">&laquo;</a>
                                    <a class="active" href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#">...</a>
                                    <a href="#">6</a>
                                    <a href="#">&raquo;</a>
                                </div>
                          
                        </div>
                    </div>

                </div>




                <div class="mt-5 mb-5">
                    <div class="container mt-5">
                        <div class="min-tab">
                            <div class="row">
                                <table class="minitable table-bordered">
                                    <thead class="thead">
                                        <th class="first-th text-white"> YEAR</th>
                                        <th> 2016 </th>
                                        <th class="minitable-inner"> 2017</th>
                                        <th> 2018</th>
                                        <th>2019</th>
                                        <th> 2020</th>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="text-success"> TOTAL<br>AMOUNT </td>
                                            <td>16,456,352,000</td>

                                            <td class="minitable-inner">32,890,762,000</td>

                                            <td> 16,456,352,000</td>
                                            <td> 32,890,762,000</td>
                                            <td> 32,890,762,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            <div class=" row mt-4  container centerize">
                                <div class=" col-md min-pag-parent text-muted">1-20 of 320 results </div>
                                <div class=" pagination">
                                    <a href="#">&laquo;</a>
                                    <a class="active" href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#">...</a>
                                    <a href="#">6</a>
                                    <a href="#">&raquo;</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>


    <!--2-->
    <div id="board" class="tab-pane fade">

        <div style="background:red; height: 40vh"></div>
        <!--This is where cabinet should be-->


    </div>

    <!--3-->
    <div id="comments" class="tab-pane fade">

        <div style="background:blue; height: 40vh"></div>
        <!--This is where comments should be-->

    </div>










</div>
@endsection


@section('js')
{{-- <script src="..assets/js/ministry_list.js" type="text/javascript"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('.tab').click(function() {
        $('.toggle-list.active').removeClass("active");
        $(this).addClass("active");
    });
});
</script>
@endsection