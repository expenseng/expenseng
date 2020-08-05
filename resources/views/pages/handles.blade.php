@extends('layouts.master')
@push('css')
<title>Government Twitter Handles</title>
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('css/handles.css') }}">

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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>

@endpush
@section('content')
<div class="pt-1 pb-5 body-bg" style="background-color: #FFF;">

<div class="container">
	{{ Breadcrumbs::render('handles') }}
</div>

<div class="container bg-white pt-5 bg-inner">
        <div class="heading">
            <h1>Government Twitter Handles.</h1>
            <p>Get the Twitter handles of Federal Mininstries in Nigeria and the twitter handles of incumbent ministers of Federal Republic of Nigeria.</p>
        </div>
        <div class="border bd-1 rounded p-4 mb-4">
            <h2 class="d-inline mx-5">Ministers Handles</h2>
            <div class="arrow">
            <i class="fa fa-2x fa-angle-up fa-edit float-right d-inline" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2"></i>
            </div>
        </div>
    <div class="table-data collapse show" id="collapseExample2">
					<div style="overflow-x: auto;">
                        <input type="text" id="search-handles" class="  form-control " placeholder="type a minister-name">
                        <br>
						<table id="Table" cell-spacing="0" data-pagination="true" data-page-size="10" class="table table-striped table-responsive-sm">
							<thead class="text-left">
								<tr>
									<th class="section-shadow row-ministry row-m port-row">Portfolio</th>
									<th class="row-project text-center text-center" style="background-color: #00945E; color: #fff; height: 10vh; width: 20vw;">Incumbent</th>
									<th class="row-company text-left table-overflow">Twitter Handles</th>
                                </tr>
                            </thead>
							<tbody id='dynamic-row' class="t-body text-left">
								
                                @if (count($cabinet) >0)
										@foreach ($cabinet as $cabinet)
											<tr>
												<td>{{$cabinet->role}}</td>
												<td>{{$cabinet->name}}</td>
												<td class="table-overflow"> <a href=" https://twitter.com/{{$cabinet->twitter_handle}}" target="_blank">{{$cabinet->twitter_handle}}</a></td>
											<tr>
										@endforeach
                                @else
                                    <tr><td></td><td style="color:red">No data available for this period<td><td></td></tr>  
                                @endif
                                                                    

							</tbody>
						</table>
                    <div class="row float-right results pagination">
                    
                    
                    </div>

                <div class="clear"></div>

                <div class="float-right mt-5">

                    
                </div>
            </div>
        </div>
<!--MINISTRY HANDLES-->
        <div class="border bd-2 rounded p-4 mb-4 mt-5">
            <h2 class="d-inline mx-5">Ministry Handles</h2>
            <div class="arrow">
                <i class="fa fa-2x fa-angle-up fa-edit float-right d-inline" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
            </div>
        </div>
            <div class="table-data collapse in" id="collapseExample">
					<div style="overflow-x: auto;">
                        <input type="text" id="search-handle" class=" float-left form-control" placeholder="type a ministry-name">
                        <br>
                        <br>
						<table id="Tables" cell-spacing="0" data-pagination="true" data-page-size="10" class="table table-striped table-responsive-sm">
							<thead class="text-left">
								<tr>
									<th class="section-shadow row-ministry w-50">Ministry</th>
									<th class="row-project text-center w-25" style="background-color: #00945E; color: #fff; height: 10vh">Twitter Handles</th>
									<th class="row-company"></th>
								</tr>
							</thead>
							<tbody id='dynamic-rows' class="t-body text-left">

                            @if (count($ministries ) > 0)
                                @foreach ($ministries as $ministry)
                                    <tr>
                                        <td>{{$ministry->name}}</td>
                                        <td><a href="https://twitter.com/{{$ministry->twitter}}" target="_blank">{{$ministry->twitter}}</a></td>
                                        <td class="table-overflow"></td>
                                    <tr>
                                @endforeach
                            @else
                                <tr><td></td><td style="color:red">No data available for this period<td><td></td></tr>  
                            @endif
							</tbody>
						</table>
                    <div class="row float-right results">
                    
                    
                    </div>

                <div class="clear"></div>

                <div class="float-right mt-5">

                   
                </div>

    </div>
</div>
</div>
    </div>
    </div>
@endsection
@section('js')
<script>
        $(document).ready(function(){
    $('#Tables').after('<div id="nav" style="float:right"></div>');
    var rowsShown = 20;
    var rowsTotal = $('#Tables tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('<a  rel="'+i+'" class="btn btn-light" >'+pageNum+'</a> ');
    }
    $('#Tables tbody tr').hide();
    $('#Tables tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#Tables tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
    });
});

    </script>
    
<script>
    $(document).ready(function(){
    $('#Table').after('<div id="nav" style="float:right"></div>');
    var rowsShown = 20;
    var rowsTotal = $('#Table tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('<a  rel="'+i+'" class="btn btn-light" >'+pageNum+'</a> ');
    }
    $('#Table tbody tr').hide();
    $('#Table tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#Table tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
    });
});

    </script>


    
    <script type="text/javascript">
         $('body').on('keyup','#search-handles',function(){
             var searchQuest = $(this).val();
             
             $.ajax({
                method: 'POST',
                url: '{{ route("search-handles") }}',
                dataType: 'json',
                data: {
                    '_token': '{{ csrf_token() }}',
                    searchQuest: searchQuest,
                },
                success: function(res){
                    
                    var tableRow = '';
                    if(res.length >0){

                        $('#dynamic-row').html('');
                
                        $.each(res, function(index, value){
                            if(!value.twitter_handle){
                                tableRow += '<tr><td>'+value.role+'</td><td>'+value.name+'</td><td class="table-overflow"></td><tr>';
                            } 
                            else 
                            {
                                tableRow += '<tr><td>'+value.role+'</td><td>'+value.name+'</td><td class="table-overflow"><a href="https://twitter.com/'+value.twitter_handle+'" target="_blank">'+value.twitter_handle+'</a></td><tr>';
                            }
                           

                            $('#dynamic-row').html(tableRow);
                            

                        });
                    }
                    else
                    {
                        tableRow += '<tr>';
                        tableRow += '<td colspan="5">No minister_handle found</td>';
                        tableRow += '</tr>';
                        $('#dynamic-row').html(tableRow);
                       
                    }    
                }
                
            });
        });
    </script>
     <script type="text/javascript">
         $('body').on('keyup','#search-handle',function(){
             var searchQuests = $(this).val();
             
             $.ajax({
                method: 'POST',
                url: '{{ route("search-handle") }}',
                dataType: 'json',
                data: {
                    '_token': '{{ csrf_token() }}',
                    searchQuests: searchQuests,
                },
                success: function(res){
                    
                    var tableRow = '';
                    if(res.length >0){
                        
                        $('#dynamic-rows').html('');
                        $.each(res, function(index, ministry){
                            if(!ministry.twitter){
                                tableRow += '<tr><td>'+ministry.name+'</td><td></td><td class="table-overflow"></td><tr>';
                            }
                            else 
                            {
                                tableRow += '<tr><td>'+ministry.name+'</td><td><a href="https://twitter.com/'+ministry.twitter+'" target="_blank">'+ministry.twitter+'</a></td><td class="table-overflow"></td><tr>';
                            }
                            

                            $('#dynamic-rows').html(tableRow);
                            

                        });
                    }
                    else
                    {
                        tableRow += '<tr>';
                        tableRow += '<td colspan="5">No ministry_handle found</td>';
                        tableRow += '</tr>';
                        $('#dynamic-rows').html(tableRow);
                       
                    }
                    
                    
                }
             });
         });
    </script>


@endsection
