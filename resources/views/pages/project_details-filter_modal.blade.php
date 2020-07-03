@extends('layouts.master')
@section('css')
  <title>FG Expense - Contact</title>
  <link rel="stylesheet" href="{{ asset('css/about us-header_footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/project_details-filter_modal.css')}}">
@endsection

@section('content')

<section id="modal-content">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary mt-5 mb-5" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <img class="card-img-top" src="{{asset('images/Lagos-Ibadan-Expressway.jpg')}}" alt="Card image cap" height="140rem">                 
        <div class="modal-header">
          <str>Project
          <h6 class="modal-title text-success" id="exampleModalLongTitle">Rehabilitation Of Lagos Ibadan Expressway <b class="date text-dark">20th, May 2020</b></h6>
          
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
            <!-- <span aria-hidden="true">&times;</span> -->
          </button>
        </div>
        <div class="modal-body">

            <div class="container">
                
                <p class="small">Contracted Company <br> Julius Berger</p>

                <p class="small">Company's CEO <br> Julius Berger</p>

                <p class="small">Company's Twitter Handle <a href="">@fedmintransport</a> </p>


                <p class="small">Contracting Ministry <br> Ministry of Transportation</p>

                <p class="small"><br></p>

                <p class="small">Ministry's Twitter Handle <a href="">@fedmintransport</a> </p>


                <br><p class="small">Contracting Minister <br> Mohammed Musa Bello</p>

                <p><br></p>

                <p class="small">Minister's Twitter Handle <a href="">@fedmintransport</a> </p>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white border-primary text-primary social tweet" data-dismiss="modal">Tweet 
            <i class="fab fa-twitter" aria-hidden="true"></i>
            </button>
          <button type="button" class="btn btn-success social">Share
            <i class="fab fa-share-alt" aria-hidden="true"></i>
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