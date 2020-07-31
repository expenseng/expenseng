@extends('layouts.master')
@push('css')
<title>Government Twitter Handles</title>
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('css/handles.css') }}">
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
						<table id="Table" cell-spacing="0" data-pagination="true" data-page-size="10" class="table table-striped table-responsive-sm">
							<thead class="text-left">
								<tr>
									<th class="section-shadow row-ministry row-m port-row">Portfolio</th>
									<th class="row-project text-center text-center" style="background-color: #00945E; color: #fff; height: 10vh; width: 20vw;">Incumbent</th>
									<th class="row-company text-left table-overflow">Twitter Handles</th>
                                </tr>
                            </thead>
							<tbody class="t-body text-left">
								
									
										@foreach ($cabinet as $cabinet)
											<tr>
												<td>{{$cabinet->role}}</td>
												<td>{{$cabinet->name}}</td>
												<td class="table-overflow">{{$cabinet->twitter_handle}}</td>
											<tr>
										@endforeach
									
								

							</tbody>
						</table>
                    <div class="row float-right results pagination">
                    <label for="year" class="year">Fiscal Year</label>
                    <select name="year" id="year">
                          <option value="2019">2019</option>
                          <option value="2019">2020</option>
                    </select>
                    <span class="page">1-20 of 320,573 results</span>
                    </div>

                <div class="clear"></div>

                <div class="float-right mt-5">

                    <nav aria-label="Page navigation example">
                      <ul class="pagination pg-blue">
                        <li class="page-item ">
                          <a class="page-link" tabindex="-1"><i class="fa fa- fa-angle-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link">1</a></li>
                        <li class="page-item active">
                          <a class="page-link">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link">3</a></li>
                        <li class="page-item"><a class="page-link">4</a></li>
                        <li class="page-item"><a class="page-link">...</a></li>
                        <li class="page-item"><a class="page-link">3000</a></li>
                        <li class="page-item ">
                          <a class="page-link"><i class="fa fa- fa-angle-right"></i></a>
                        </li>
                      </ul>
                    </nav>
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
						<table id="Table" cell-spacing="0" data-pagination="true" data-page-size="10" class="table table-striped table-responsive-sm">
							<thead class="text-left">
								<tr>
									<th class="section-shadow row-ministry w-50">Ministry</th>
									<th class="row-project text-center w-25" style="background-color: #00945E; color: #fff; height: 10vh">Twitter Handles</th>
									<th class="row-company"></th>
								</tr>
							</thead>
							<tbody class="t-body text-left">


							@foreach ($ministries as $ministry)
								<tr>
									<td>{{$ministry->name}}</td>
									<td>{{$ministry->twitter}}</td>
									<td class="table-overflow"></td>
								<tr>
							@endforeach

							</tbody>
						</table>
                    <div class="row float-right results">
                    <label for="year" class="year">Fiscal Year</label>
                    <select name="year" id="year">
                          <option value="2019">2019</option>
                          <option value="2019">2020</option>
                    </select>
                    <span class="page">1-20 of 320,573 results</span>
                    </div>

                <div class="clear"></div>

                <div class="float-right mt-5">

                    <nav aria-label="Page navigation example">
                      <ul class="pagination pg-blue">
                        <li class="page-item ">
                          <a class="page-link" tabindex="-1"><i class="fa fa- fa-angle-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link">1</a></li>
                        <li class="page-item active">
                          <a class="page-link">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link">3</a></li>
                        <li class="page-item"><a class="page-link">4</a></li>
                        <li class="page-item"><a class="page-link">...</a></li>
                        <li class="page-item"><a class="page-link">3000</a></li>
                        <li class="page-item ">
                          <a class="page-link"><i class="fa fa- fa-angle-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                </div>

    </div>
</div>
</div>
    </div>
    </div>
@endsection
