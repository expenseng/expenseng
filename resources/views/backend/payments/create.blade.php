@extends('layouts.home')
@push('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<title>ExpenseNg - Create: Payment</title>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- flash messages  -->
        <!-- ============================================================== -->
            @include('backend.partials.flash')
         <!-- ============================================================== -->
        <!-- end flash messages  -->
        <!-- ============================================================== -->

            <div class="row">
                <div class="container" style="display:">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-center"><h3>{{ __('NEW PAYMENT') }}</h3></div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('payments.store') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Payment Code') }}</label>
                                            <div class="col-md-6">
                                                <input id="payment_code" type="text" class="form-control @error('payment_code') is-invalid @enderror" name="payment_code" value="{{ old('payment_code') }}" required autocomplete="payment_code" autofocus>
                                                @error('payment_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Payment No') }}</label>
                                            <div class="col-md-6">
                                                <input id="payment_no" type="text" class="form-control @error('payment_no') is-invalid @enderror" name="payment_no" value="{{ old('payment_no') }}" required autocomplete="payment_no">
                                                @error('payment_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="payment_date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>
                                            <div class="col-md-6">
                                                <input id="payment_date" type="date" class="form-control @error('payment_date') is-invalid @enderror" name="payment_date" value="{{ old('payment_date') }}" required autocomplete="payment_date">
                                                @error('payment_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount(N)') }}</label>
                                            <div class="col-md-6">
                                                <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount">
                                                @error('amount')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="organization" class="col-md-4 col-form-label text-md-right">{{ __('Organization (MDA)') }}</label>
                                            <div class="col-md-6">
                                                <select name="organization" class="form-control" id="organization">
                                                    <option value=""  style="display:none">Select Organization</option>
                                                    @foreach ( $organizations as $organization)
                                                        <option value="{{ $organization['name'] }}">{{$organization['name'] . ' - ' . $organization['code'] }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" name="other_organization" placeholder="Enter Organization" id="other_organization" class="d-none form-control">
                                                @error('role')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                            <div class="col-md-6">
                                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="beneficiary" class="col-md-4 col-form-label text-md-right">{{ __('Beneficiary') }}</label>
                                            <div class="col-md-6">
                                                <select name="beneficiary" class="form-control" id="beneficiary">
                                                    <option value=""  style="display:none">Select Company</option>
                                                    @foreach ( $beneficiaries as $beneficiary)
                                                        <option value="{{ $beneficiary['name'] }}">{{$beneficiary['name']}}</option>
                                                    @endforeach
                                                </select>
                                                 <input type="text" name="other_beneficiary" placeholder="Enter Beneficiary" id="other_beneficiary" class="d-none form-control">

                                                @error('beneficiary')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('CREATE') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')    
    <!-- main js -->
    <script src="{{ asset('js/main-js.js') }}" type="text/javascript"></script>
    
    <script>
        jQuery(document).ready(function() {
            $("#organization").change(function(e){
                let val = $(this).val();
                if (val === 'Others') {
                    $("#other_organization").removeClass('d-none'); 
                }else{
                    $("input#other_organization").addClass('d-none');
                    // $("input#other_organization").attr("disabled", "disabled");
                    e.stopPropagation();
                }
            });

            $("select#beneficiary").change(function(f){
                let val2 = $(this).val();
                if (val2 === 'Others') {
                    $("#other_beneficiary").removeClass('d-none'); 
                }else{
                    $("input#other_beneficiary").addClass('d-none');
                    // $("input#other_organization").attr("disabled", "disabled");
                    f.stopPropagation();
                }
            });
        }); 
          
    </script>

    @endsection