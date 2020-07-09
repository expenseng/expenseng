@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ asset('css/about us-header_footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/contracts_awarded.css') }}">
<title>FG Expense - Contracts</title>
@endsection

@section('content')
<!-- Main body start -->
<section id="main">

  <!-- Start here -->
  <!-- Section 1 -->
  <div class="section-1 container">
    <div class="navigation-links">
      <ul>
        <li>
          <a href="">HOME</a>
        </li>
        <li>
          <span>&#8226;</span>
        </li>
        <li>
          <a href="">PROFILES</a>
        </li>
        <li>
          <span>&#8226;</span>
        </li>
        <li>
          <a href="">COMPANIES</a>
        </li>
        <li>
          <span>&#8226;</span>
        </li>
        <li>
          <a href="">COMPANY PROFILE</a>
        </li>
      </ul>
    </div>

    <div class="user-profile">
      <h3 class="name">Julius Berger
        <img src="{{ asset('images/image 13.png') }}" alt="">
      </h3>
      <div class="profile-overview mt-3">
        <div class="row">
          <div class="col-sm-4">
            <p class="font-weight-bold">Company twitter handle</p>
            <p><a href="" class="twitter-handle">@JuliusBerger</a></p>
            <p>2000</p>
          </div>
          <div class="col-sm-4">
            <p class="font-weight-bold">Total amount rewarded</p>
            <p class="amount-rewarded">#38.8M</p>
            <p>2000</p>
          </div>
          <div class="col-sm-4">
            <p class="font-weight-bold">Total number of contracts awarded</p>
            <p class="contract-number">27</p>
            <p>2000</p>
          </div>
        </div>
      </div>
    </div>

    <div class="content-navigator">
      <a href="" class="position-relative active">Contract awards</a>
      <a href="../director_board.html" class="position-relative">Board of Directors</a>
      <a href="" class="position-relative">Comments</a>
    </div>
    <hr>
  </div>

  <!-- Section 2 -->
  <div class="section-2 container">
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h5>Date: 28th May, 2020</h5>
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
  <!-- Section 3 -->
  <div class="section-3 container mt-4">
    <div class="summary">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">YEAR</th>
              <td scope="col">2016</td>
              <td scope="col">2017</td>
              <td scope="col">2018</td>
              <td scope="col">2019</td>
              <td scope="col">2020</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">TOTAL AMOUNT</th>
              <td>N72,000,000</td>
              <td>N65,000,000</td>
              <td>N96,000,000</td>
              <td>N96,000,000</td>
              <td>N96,000,000</td>
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
</section>

<!--Directors Board-->
<div class="container tab-pane fade" id="board" role="tabpanel">
  <div class="container-fluid padding"  >
    <!-- cards -->
    <div class="row padding">
      <div class="col-md-3">
          <div class="card">
            <img src="{{ asset('images/row1-1.png') }}" alt="Mutiu Sunmonu" class="img-fluid">
              <div class="card-body">
                  <h1 class="card-title director-name mt-2">Mutiu Sunmonu</h1>
                  <span class="director-title">Chairman of the board</span>
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
                  <span class="director-title">Managing Director</span>
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
                  <span class="director-title">Financial Director</span>
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
                  <span class="director-title">Vice Chairman</span>
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
                  <span class="director-title">Independent Director</span>
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
                  <span class="director-title">Non-executive Director</span>
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
                  <span class="director-title">Non-executive Director</span>
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
                  <span class="director-title">Director Corporate Development</span>
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
  <!-- card 3 -->
  <div class="row padding">
      <div class="col-md-3">
          <div class="card">
            <img src="{{ asset('images/row3-1.png') }}" alt="Alhaji Zubairu I. Bayi" class="img-fluid">
              <div class="card-body">
                  <h1 class="card-title director-name mt-2">Alhaji Zubairu I. Bayi</h1>
                  <span class="director-title">Director Administration</span>
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
                  <span class="director-title">Non-executive Director</span>
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
                  <span class="director-title">Non-executive Director</span>
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
                  <span class="director-title">Non-executive Director</span>
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
                <span class="director-title">Non-executive Director</span>
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
<!-- Main body end -->
@include('partials.contract_comment')
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection