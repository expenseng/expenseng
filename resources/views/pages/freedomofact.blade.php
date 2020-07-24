@extends('layouts.master')

@push('css')
  <link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
  <link rel="stylesheet" href="{{asset('css/freedomofact.css') }}">
  <title>FG Expense - Freedom of Infromation Act</title>
@endpush


@section('content')
  <div class="wrapper">
    <div class="container content">
      {{ Breadcrumbs::render('FOIA') }}
        <h1>Freedom Of Information Act</h1>

        <div class="conditions">
            <p>
                Freedom of Information Act
            </p>
            <p>
                If your FOIA request is related to information concerning the Department of the Treasury, Bureau of the Fiscal Service,
                please visit the <a href="#" class="link">CBN FOIA site</a> or <a href="#" class="link">download the PDF</a> 
            </p>

            <p class="pdf-link">
               or Copy link: <a href="https://www.cbn.gov.ng/FOI/Freedom%20Of%20Information%20Act.pdf" class="link long-link">https://www.cbn.gov.ng/FOI/Freedom%20Of%20Information%20Act.pdf</a>  
            </p>
        </div>
    </div>
  </div>

  
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
<script src="{{asset('/js/index.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

