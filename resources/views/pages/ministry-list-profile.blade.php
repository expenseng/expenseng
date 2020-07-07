@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="/css/header_footer.css">
<link rel="stylesheet" href="{{ asset('css/ministry-list-profile.css') }}">
<title>FG Expense - Ministry List</title>
@endpush

@section('content')
    <section class="container-fluid first-section px-3">
        <div class="green pl-3">
            <span>Home</span>
            <i class="fa fa-circle px-2" aria-hidden="true"></i>
            <span>Profiles</span>
            <i class="fa fa-circle px-2" aria-hidden="true"></i>
            <span>Ministry</span>
            <i class="fa fa-circle px-2" aria-hidden="true"></i>
            <span>Ministry Profile</span>
        </div>
        <div class="second-part mt-5 pl-3">
            <img src="{{ asset('images/nglogo2.png') }}" class="img-fluid img" width="" alt="Nigeria's Logo">
            <span class="py-5">Ministry of Works and Human Development.</span>
        </div>
        <div class="row my-5 pl-3">
            <div class="col-lg-3 card border-0">
                <div class="card-header border-bottom-0">
                    <p>Ministry Twitter Handle</p>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <a href="#" class="links">@ministryworks</a>
                    </div>
                    <small>2020</small>
                </div>
            </div>
            <div class="col-lg-3 card border-0">
                <div class="card-header border-bottom-0">
                    <p>Total Amount Spent</p>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <p class="green"># 38.8M</p>
                    </div>
                    <small>2020</small>
                </div>
            </div>
            <div class="col-lg-4 card border-0">
                <div class="card-header border-bottom-0">
                    <p>Total Number of Projects Contracted</p>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <p class="green">27</p>
                    </div>
                    <small>2020</small>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid second-section px-3" id="cabinet">
        <div class="first-part pl-3 d-flex">
            <a href="#" class="link pl-2">Expense Summary</a>
            <a href="#" class="link pl-2">Cabinet</a>
            <a href="#" class="link pl-2">Comments</a>
        </div>
        <hr class="grey-line ml-n5 w-100"></hr>

        <div class="row mt-5 pl-3 d-flex justify-content-lg-around">
            <div class="col-lg-3 card border-top-0 border-left-0 border-right-0">
                <div class="card-img">
                    <img src="{{ asset('images/img1.png') }}" class="img-fluid" alt="Engr. Jafaru Damaluk">
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <p class="text-center">Engr. Jafaru Damulak</p>
                    </div>
                    <div class="card-text">
                        <p class="green text-center">Minister of Works</p>
                    </div>
                    <div class="social-handle text-center">
                        <a href="#" class="link ml-2"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" class="link ml-2"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="link ml-2"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#" class="link ml-2"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 card border-top-0 border-left-0 border-right-0">
                <div class="card-img">
                    <img src="{{ asset('images/img2.png') }}" class="img-fluid" alt="Alhaji Zubairu I. Bayi">
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <p class="text-center">Alhaji Zubairu I. Bayi</p>
                    </div>
                    <div class="card-text">
                        <p class="green text-center">Minister of State Works</p>
                    </div>
                    <div class="social-handle text-center">
                        <a href="#" class="link ml-2"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" class="link ml-2"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="link ml-2"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#" class="link ml-2"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 card border-top-0 border-left-0 border-right-0">
                <div class="card-img">
                    <img src="{{ asset('images/img3.png') }}" class="img-fluid" alt="Engr. Goni M. Sheikh">
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <p class="text-center">Engr. Goni M. Sheikh</p>
                    </div>
                    <div class="card-text">
                        <p class="green text-center">Director-Federal Department Of Works</p>
                    </div>
                    <div class="social-handle text-center">
                        <a href="#" class="link ml-2"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" class="link ml-2"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="link ml-2"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#" class="link ml-2"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection