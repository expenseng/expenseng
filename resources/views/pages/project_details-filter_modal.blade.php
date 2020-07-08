@extends('layouts.master')
@section('css')
  <title>FG Expense - Contact</title>
  <link rel="stylesheet" href="{{ asset('css/about us-header_footer.css') }}">
@endsection

@section('content')

<link rel="stylesheet" href="{{ asset('css/project_details-filter_modal.css')}}">

<script src="https://kit.fontawesome.com/9b1c8d52ed.js" crossorigin="anonymous"></script>
<section id="modal-content">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary mt-5 mb-5" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <img class="card-img-top" src="{{asset('images/express.svg')}}" alt="Card image cap">                 
        <div class="modal-header">
          <div class="row alignment">
            <div class="col-md-8">
              <small>Project</small>
              <h6 class="modal-title text-success" id="exampleModalLongTitle">Rehabilitation Of Lagos Ibadan Expressway</h6>         
            </div>
            <div class="col-md-4">
              <strong>20th, May 2020</strong>
            </div>
          </div>
          
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
            <!-- <span aria-hidden="true">&times;</span> -->
          </button>
        </div>
        <div class="modal-body">

            <div class="container">
{{--                 
                <p class="small">Contracted Company <br> Julius Berger</p>

                <p class="small">Company's CEO <br> Julius Berger</p>

                <p class="small">Company's Twitter Handle <a href="">@fedmintransport</a> </p>


                <p class="small">Contracting Ministry <br> Ministry of Transportation</p>

                <p class="small"><br></p>

                <p class="small">Ministry's Twitter Handle <a href="">@fedmintransport</a> </p>


                <br><p class="small">Contracting Minister <br> Mohammed Musa Bello</p>

                <p><br></p>

                <p class="small">Minister's Twitter Handle <a href="">@fedmintransport</a> </p>
 --}}
                <div class="container-grid">
                  <div>
                    <p class="small-text safe">Contracted Company</p>
                    <p class="font-bold">Julius Berger</p>
                  </div>
                  <div>
                    <p class="small-text safe">Company's CEO</p>
                    <p class="font-bold">Julius Berger</p>
                  </div>
                  <div class="expand-div">
                    <p class="small-text">Company's Twitter Handle</p><br>
                    <a href="" class="social-link">@fedmintransport</a> 
                  </div>
                </div>
<br>

                <div class="container-grid ">
                  <div>
                    <p class="small-text safe">Contracting Ministry</p>
                    <p class="font-bold long-text">Ministry Of Transportation</p>
                  </div>
                  <div>
                  </div>
                  <div class="expand-div">
                    <p class="small-text">Ministry's Twitter Handle</p><br>
                    <a href="" class="social-link">@fedmintransport</a> 
                  </div>
                </div>

<br>
                <div class="container-grid">
                  <div>
                    <p class="small-text safe">Contracting Minister</p>
                    <p class="font-bold long-text">Mohammed Musa Bello</p>
                  </div>
                  <div></div>
                  <div class="expand-div">
                    <p class="small-text">Minister's Twitter Handle</p><br>
                    <a href="" class="social-link">@mohammedbello</a> 
                  </div>
                </div>


            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white border-primary text-primary social tweet" data-dismiss="modal">Tweet 
            <i class="fab fa-twitter" aria-hidden="true"></i>
            </button>
          <button type="button" class="btn btn-success social">Share<i class="fas fa-share-alt"></i>
          </button>
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
  <script src="{{ asset('js/index.js') }}"></script>
@endsection