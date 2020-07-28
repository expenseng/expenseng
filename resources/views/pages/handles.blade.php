@extends('layouts.master')
@push('css')
<title>Government Twitter Handles</title>
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('css/handles.css') }}">
@endpush
@section('content')
<div class="pt-1 pb-5 body-bg" style="background-color: #FFF;">

<div class="container">
	{{ Breadcrumbs::render('handles') }}
</div>

<div class="container bg-white pt-5 bg-inner">
    <div class="container">
        <div class="container heading">
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


								<tr class="" style="background-color: white;">
									<td class="section-shadow">Presidnet of Nigeria</td>
									<td>Muhammadu Buhari</td>

									<td col-span="1" class="table-overflow " >@MBuhari</td>

								</tr>
								<tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Vice President</td>
									<td>Yemi Osinbajo</td>
									<td class="table-overflow" >@ProfOsinbajo</td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Minister of Justice Attorney General</td>
									<td>Abubakar Malami</td>
									<td class="table-overflow">@MalamiSan</td>
								</tr>
								<tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Minster of Foreign Affair</td>
									<td>Geoffrey Onyeama</td>
									<td class="table-overflow" >@GeoffreyOnyeama</td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Minister of Finance,Budget and National Planning</td>
									<td>Zainab Ahmed</td>
									<td class="table-overflow" >@ZShamsuma</td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Vice President</td>
									<td>Yemi Osinbajo</td>
									<td class="table-overflow" >@ProfOsinbajo</td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Minister of Defence</td>
									<td>Bashir Salihi Magashi</td>
									<td class="table-overflow" >@GenMagashi</td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Minister of Education</td>
									<td>Adamu Adamu</td>
									<td class="table-overflow" >@adamu02adamu</td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Minister of Inndustry, Trade and Investment</td>
									<td>Richard Adeniyi Adebayo</td>
									<td class="table-overflow" >@NiyiAdebayo_</td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Minister of Labour and Employment</td>
									<td>Chris Ngige</td>
									<td class="table-overflow" >@SenChrisNgige</td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Minister of Federal Capital Territory</td>
									<td>Mohammed Musa Bello</td>
									<td class="table-overflow" >@FCT_Minister</td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Minister of Science and Technology</td>
									<td>Ogbonnaya Onu</td>
									<td class="table-overflow" >@Dr_OgbonnayaOnu</td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Minister of Mines and steel Developement</td>
									<td>Olamilekan Adegbite</td>
									<td class="table-overflow" >@_LekanAdegbite</td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Minister of Interior</td>
									<td>Rauf Aregbesola</td>
									<td class="table-overflow">@raufaregbesola</td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Minister of State Budget and Nation Planning</td>
									<td>Clement Agba</td>
									<td class="table-overflow" >@ClemAgba</td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Minister of Work and Housing</td>
									<td>Babatunde Fashola</td>
									<td class="table-overflow" >@tundefashola</td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Minister of Agriculture and Rural Development</td>
									<td>Sabo Nanono</td>
									<td class="table-overflow" >@Nanonosabo</td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Minister of Transportation</td>
									<td>Rotimi Amaechi</td>
									<td class="table-overflow" >@ChibuikeAmeachi</td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Minister of Power</td>
									<td>Saleh Mamman</td>
									<td class="table-overflow" >@EngrSMamman</td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Minister of Health</td>
									<td>Osagie Ehanire</td>
									<td class="table-overflow">@DrEOEhanire</td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Minister of Women Affairs</td>
									<td>Paulen Tallen</td>
									<td class="table-overflow">@PaulineKTallen</td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Minister of Niger Delta</td>
									<td>Godswill Akpabio</td>
									<td class="table-overflow">@Senatore_Akpabio</td>
								</tr>

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


								<tr class="" style="background-color: white;">
									<td class="section-shadow">Agriculture</td>
									<td>@FmardNg</td>
									<td class="table-overflow" ></td>
								</tr>
								<tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Aviation</td>
									<td>@fmaviationng</td>
									<td class="table-overflow"></td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Defence</td>
									<td>@DefenceInfoNG</td>
									<td class="table-overflow" ></td>
								</tr>
								<tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Education</td>
									<td>@NigEducation</td>
									<td class="table-overflow" ></td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Energy</td>
									<td>@MinistryofPower</td>
									<td class="table-overflow"></td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Environment</td>
									<td>@FMEnvbg</td>
									<td class="table-overflow" ></td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Federal Capital Territory</td>
									<td>@officialFCTA</td>
									<td class="table-overflow" ></td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Finance</td>
									<td>@FinMinNigeria</td>
									<td class="table-overflow"></td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Foreign Affairs</td>
									<td>@NigeriaMFA</td>
									<td class="table-overflow"></td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">VHealth</td>
									<td>@Fmohnigeria</td>
									<td class="table-overflow"></td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Information and Culture</td>
									<td>@FMICNigeria</td>
									<td class="table-overflow" ></td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Interior</td>
									<td>@MinOfInteriorNG</td>
									<td class="table-overflow" ></td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Justice</td>
									<td>@FedMinOfJustice</td>
									<td class="table-overflow" ></td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Labour and Productivity</td>
									<td>@LabourMinNg</td>
									<td class="table-overflow" ></td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Lands & Urban Development</td>
									<td>@ministry_lands</td>
									<td class="table-overflow" ></td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Mines and Steel Development</td>
									<td>@fmmsdngr</td>
									<td class="table-overflow" ></td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Niger Delta</td>
									<td>@MNDA_Ng</td>
									<td class="table-overflow"></td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Petroleum Resources</td>
									<td>@FMPRng</td>
									<td class="table-overflow" ></td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Power, Works and Housing</td>
									<td>@PowerMinNigeria</td>
									<td class="table-overflow" ></td>
								</tr>
                                <tr style="background-color: #FFF;">
									<td class="section-shadow">Science and Technology</td>
									<td>@FmstNgtd>
									<td class="table-overflow"></td>
								</tr>
                                <tr style="background-color: #F2FAF7;">
									<td class="section-shadow">Trade and Investment</td>
									<td>@TradeInvestNG</td>
									<td class="table-overflow" ></td>
								</tr>

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
