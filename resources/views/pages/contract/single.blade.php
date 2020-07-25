@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('css/contracts_awarded.css') }}">
<link rel="stylesheet" href="{{ asset('css/director_board.css') }}">
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">

<title>FG Expense - Contracts</title>
@endpush

@section('content')
<!-- Main body start -->
<div class="container">
    {{ Breadcrumbs::render('contractor', $company) }}
</div>
<section id="main">

  <!-- Start here -->
  <!-- Section 1 -->
  <div class="section-1 container">
    <div class="user-profile">
      <h3 class="name brand-name">
        {{ $company->name }}
        <img src="{{ asset('images/image 13.png') }}" alt="Berger logo">
      </h3>
      <div class="profile-overview mt-3">
        <div class="row">
          <div class="col-sm-4">
            <p class="font-weight-bold">Company twitter handle</p>
            <p><a href="{{ $company->twitterUrl() }}" class="twitter-handle">{{ $company->twitter }}</a></p>
          </div>
          <div class="col-sm-4">
            <p class="font-weight-bold">Total amount rewarded</p>
            <p class="amount-rewarded">
              {{ $company->contract(date("Y"))->amount }}
            </p>
            <p class="year">{{ date("Y") }}</p>
          </div>
          <div class="col-sm-4">
            <p class="font-weight-bold">Total number contracts awarded</p>
            <p class="contract-number">
              {{ 20 }}
            </p>
            <p class="year">{{ date("Y") }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="nav content-navigator nav-tabs">
      <a href="#contract" class="active" data-toggle="tab" role="tab">Contract awards</a>
      <a href="#board" data-toggle="tab" role="tab">Board of Directors</a>
      <a href="#comments" data-toggle="tab" role="tab">Comments</a>
    </div>
  </div>

  <!-- Section 2 -->
  <div class="tab-content">
  <div class="section-2 container table tab-pane fade show active" id="contract" role="tabpanel">
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h5>Date: {{ date("dS M, Y") }}</h5>
          <button class="btn date-btn">
            Select Date
            <i class="fa fa-filter" aria-hidden="true"></i>
          </button>
        </div>
        <div class="table-responsive">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col">Project</th>
                <th scope="col">Ministry</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
              <tr>
                <td>Building of class bricks</td>
                <td>Transport</td>
                <td>N76,000,000</td>
                <td>20th May, 2020</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="table-pagination .card-text">
          <p>1 - 10 of 100 results</p>
          <nav class="d-flex justify-content-center">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item activ"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link active" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  <!-- Section 3 -->
  <div class="section-3 container mt-4">
    <div class="summary">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">YEAR</th>
              <td class="td-year" scope="col">2016</td>
              <td class="td-year" scope="col">2017</td>
              <td class="td-year" scope="col">2018</td>
              <td class="td-year" scope="col">2019</td>
              <td class="td-year" scope="col">2020</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">TOTAL AMOUNT</th>
              <td class="amount">N72,000,000</td>
              <td class="amount">N65,000,000</td>
              <td class="amount">N96,000,000</td>
              <td class="amount">N96,000,000</td>
              <td class="amount">N96,000,000</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- Pagination -->
      <div class="table-pagination .card-text mt-4">
        <p>1 - 10 of 100 results</p>
        <nav class="d-flex justify-content-center">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

  <!--Board of Directors-->
  <div class="container tab-pane fade" id="board" role="tabpanel">
    <div class="container-fluid padding"  >
      <!-- cards -->
      <div class="row padding">
        @foreach($company->people as $people)
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('images/row1-1.png') }}" alt="{{ $people->name }}" class="img-fluid">
                <div class="card-body">
                    <h1 class="card-title director-name mt-2">Mutiu Sunmonu</h1>
                    <p class="director-title">Chairman of the board</p>
                    <div class="socials d-flex justify-content-center align-items-center mt-2">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('images/row1-2.png') }}" alt="Engr. Dr.Lars Richter" class="img-fluid">
                <div class="card-body">
                    <h1 class="card-title director-name mt-2">Engr. Dr.Lars Richter</h1>
                    <p class="director-title">Managing Director</p>
                    <div class="socials d-flex justify-content-center align-items-center mt-2">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('images/row1-3.png') }}" alt="Martin Brack" class="img-fluid">
                <div class="card-body">
                    <h1 class="card-title director-name mt-2">Martin Brack</h1>
                    <p class="director-title">Financial Director</p>
                    <div class="socials d-flex justify-content-center align-items-center mt-2">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('images/row1-4.png') }}" alt="George Marks" class="img-fluid">
                <div class="card-body">
                    <h1 class="card-title director-name mt-2">George Marks</h1>
                    <p class="director-title">Vice Chairman</p>
                    <div class="socials d-flex justify-content-center align-items-center mt-2">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- card 2 -->
    <div class="row padding">
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('images/row2-1.png') }}" alt="Ernest Chukwudi Ebi" class="img-fluid">
                <div class="card-body">
                    <h1 class="card-title director-name mt-2">Ernest Chukwudi Ebi</h1>
                    <p class="director-title">Independent Director</p>
                    <div class="socials d-flex justify-content-center align-items-center mt-2">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('images/row2-2.png') }}" alt="Belinda Ajoke Disu" class="img-fluid">
                <div class="card-body">
                    <h1 class="card-title director-name mt-2">Belinda Ajoke Disu</h1>
                    <p class="director-title">Non-executive Director</p>
                    <div class="socials d-flex justify-content-center align-items-center mt-2">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('images/row2-3.png') }}" alt="Dr. Ernest N. Azudialu" class="img-fluid">
                <div class="card-body">
                    <h1 class="card-title director-name mt-2">Dr. Ernest N. Azudialu</h1>
                    <p class="director-title">Non-executive Director</p>
                    <div class="socials d-flex justify-content-center align-items-center mt-2">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('images/row2-4.png') }}" alt="Tobias Meletschus" class="img-fluid">
                <div class="card-body">
                    <h1 class="card-title director-name mt-2">Tobias Meletschus</h1>
                    <p class="director-title">Director Corporate Dev</p>
                    <div class="socials d-flex justify-content-center align-items-center mt-2">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- card 3 -->
    <div class="row padding">
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('images/row3-1.png') }}" alt="Alhaji Zubairu I. Bayi" class="img-fluid">
                <div class="card-body">
                    <h1 class="card-title director-name mt-2">Alhaji Zubairu I. Bayi</h1>
                    <p class="director-title">Director Administration</p>
                    <div class="socials d-flex justify-content-center align-items-center mt-2">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('images/row3-2.png') }}" alt="Karsten Hensel" class="img-fluid">
                <div class="card-body">
                    <h1 class="card-title director-name mt-2">Karsten Hensel</h1>
                    <p class="director-title">Non-executive Director</p>
                    <div class="socials d-flex justify-content-center align-items-center mt-2">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('images/row3-3.png') }}" alt="Gladys O.Talabi" class="img-fluid">
                <div class="card-body">
                    <h1 class="card-title director-name mt-2">Gladys O.Talabi</h1>
                    <p class="director-title">Non-executive Director</p>
                    <div class="socials d-flex justify-content-center align-items-center mt-2">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('images/row3-4.png') }}" alt="Engr. Gomi M.Sheikh" class="img-fluid">
                <div class="card-body">
                    <h1 class="card-title director-name mt-2">Engr. Gomi M.Sheikh</h1>
                    <p class="director-title">Non-executive Director</p>
                    <div class="socials d-flex justify-content-center align-items-center mt-2">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- card 4 -->
    <div class="row padding">
      <div class="col-md-3">
          <div class="card">
            <img src="{{ asset('images/row4-1.png') }}" alt="Engr.Jafaru Damulak" class="img-fluid">
              <div class="card-body">
                  <h1 class="card-title director-name mt-2">Engr.Jafaru Damulak</h1>
                  <p class="director-title">Non-executive Director</p>
                  <div class="socials d-flex justify-content-center align-items-center mt-2">
                      <a href="#"><i class="fab fa-facebook"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-linkedin"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>

<!---Comments section-->
  <div class="container tab-pane fade" id="comments" role="tabpanel">
    @include('partials.comments')
  </div>
<!-- Start here -->
</div>
</section>

<!-- Main body end -->
@endsection

@section('js')
<script src="{{ asset('js/index.js') }}"></script>
@endsection
