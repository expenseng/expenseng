@extends('layouts.master')

@push('css')
  <link rel="stylesheet" href="{{asset('css/ministry_list.css') }}">
  <link rel="stylesheet" href="{{asset('css/freedomofact.css') }}">
  <title>FG Expense - Freedom of Infromation Act</title>
@endpush


@section('content')
{{ Breadcrumbs::render('FOIA') }}
  <div class="wrapper">
    <div class="container content">
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
 
@endsection

