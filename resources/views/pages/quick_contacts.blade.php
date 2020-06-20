@extends('layouts.master')

@section('content')
        <div class="card bg-dark text-white imageCard">
            <img src=" {{ asset('img/Julius-Berger_1.png') }}" class="card-img" alt="...">
            <div class="card-img-overlay">
            <h2 class="card-title">Twitter Handle Page</h2>
            <p class="card-text">Get the twitter handles of Federal Ministries in Nigeria and twitter handles of incubent ministers of the Federal Republic of Nigeria</p>
            </div>
        </div>
          <div class="card" style="margin-left: 30px; margin-right: 30px; border: none;">
            <div class="card-body">
              <p class="card-text" style="text-align: center;">Check for all ministry or minister,by clicking</p>
            </div>

            <div class="row" id="contact">
                <!-- accordion gradient -->
                <div class="col-md-12 mb-12">
                    <div class="accordion mb-0 accordion-grad" style="text-align: center;" id="accordion3">
                        <div class="container">
                            <!-- item -->
                            <div class="accordion-item list-group-item" style="padding: 20px; border-radius: 5px;">
                                <div class="accordion-title pointer" data-toggle="collapse" href="#collapse-1">
                                    <a class="h6 mb-0 collapsed ">Ministers Handle</a>
                                </div>
                            </div>
                            <div class="collapse" id="collapse-1" data-parent="#accordion3">
                                <table class="table table-striped accordion-content">
                                    <thead>
                                      <tr>
                                        <th scope="col">Portfolio</th>
                                        <th scope="col" style="background-color: #00945E;">Incumbent</th>
                                        <th scope="col">Twitter Handle</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Minister of Education</td>
                                        <td>Adamu Adamu</td>
                                        <td>@mdo</td>
                                      </tr>
                                      <tr>
                                        <td>Minister of Health</td>
                                        <td>Osagie Ehanire </td>
                                        <td>@DrEOEhanire</td>
                                      </tr>
                                      <tr>
                                        <td>Minister of State for Budget</td>
                                        <td>Clement Ike</td>
                                        <td>@twitter</td>
                                      </tr>
                                    </tbody>
                                </table>

                            </div>

                            <!-- item -->
                               <div class="accordion-item list-group-item" style="padding: 20px; background-color:#00945E; margin-top: 20px; border-radius: 5px;">
                                <div class="accordion-title pointer" data-toggle="collapse" href="#collapse-2">
                                    <a class="h6 mb-0 collapsed"  style="color: white;">Ministry Handles</a>
                                </div>
                            </div>
                            <div class="collapse" id="collapse-2" data-parent="#accordion3">
                                <table class="table table-striped accordion-content">
                                    <thead>
                                      <tr>
                                        <th scope="col">Ministry</th>
                                        <th scope="col" style="background-color: #00945E;">Twitter Handle</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Ministry</td>
                                        <td>Twitter Handle</td>
                                      </tr>
                                      <tr>
                                        <td>Ministry of Finance, Budget and National Planning</td>
                                        <td>@FinMinNigeria</td>
                                      </tr>
                                      <tr>
                                        <td>Federal Ministry of Health</td>
                                        <td>@Fmohnigeria</td>
                                      </tr>
                                      <tr>
                                        <td>Federal Ministry of Education</td>
                                        <td>@NigEducation</td>
                                      </tr>
                                      <tr>
                                        <td>Federal Ministry of Power</td>
                                        <td>@PowerMinNigeria</td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
@endsection
