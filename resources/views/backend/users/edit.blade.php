@extends('layouts.home')
@push('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<title>ExpenseNg - Edit Expense</title>
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
                                <div class="card-header text-center"><h3>{{ __('Update User') }}</h3></div>
                                <div class="card-body">
                                    <form method="POST" action="{{'/admin/users/edit/' . $user->id}}" id="update_user">
                                        @method('put')
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                                            <div class="col-md-6">
                                                <input id="phone" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{$user->phone_number}}"  autocomplete="email" autofocus>

                                                @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                                            <div class="col-md-6">
                                                <select name="gender" class="form-control">
                                                    @isset($user->gender)
                                                        <option value="{{$user->gender}}"  style="display:none">{{$user->gender}}</option>
                                                    @endisset
                                                    @empty($user->gender)
                                                        <option value=""  style="display:none">Select Gender</option>
                                                    @endempty
                                                        <option value="{{'male'}}">{{'Male'}}</option>
                                                         <option value="{{'female'}}">{{'Female'}}</option>
                                                </select>
                                                @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        @can('add')
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                            <div class="col-md-6">
                                                <select name="role_id" class="form-control">
                                                    @isset($user->roles)
                                                        <option value="{{implode(', ', $user->roles->pluck('id')->toArray())}}"  style="display:none">{{implode(', ', $user->roles->pluck('name')->toArray())}}</option>
                                                    @endisset
                                                    @empty($user->roles)
                                                        <option value=""  style="display:none">Select Role</option>
                                                    @endempty
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                                            <div class="col-md-6">
                                                <select name="status_id" class="form-control">
                                                    @isset($user->status->id)
                                                        <option value="{{$user->status->id}}"  style="display:none">{{$user->status->name}}</option>
                                                    @endisset
                                                    @empty($user->status->id)
                                                        <option value=""  style="display:none">Select Status</option>
                                                    @endempty
                                                    @foreach ($status as $status)
                                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        @endcan
                                        <div class="form-group row mb-0">
                                            <div class="col-md-4 offset-md-4">
                                                <input type="submit" class="btn btn-primary" form="update_user" value="{{ __('Update') }}">
                                            </div>

                                            <div class="col-md-2">
                                                <a class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">{{ __('Change Password') }}
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--modal begin-->
                        <div class="col-md-6">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">New Password</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{'/admin/users/change_password/' . $user->id}}" method="post" id="change_password" >
                                            <div class="form-group">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                                            </div>

                                            <div class="form-group">
                                                <input id="password-confirm" type="password" class="form-control" placeholder="Repeat your password" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            @method('put')
                                            @csrf
                                            <input type="submit" class="btn btn-danger changePass" value="Change" id="changePass">
                                            </form>
                                        </div>
                                    </div>
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
    <!-- causes toggle error in navbar -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script> -->
    
    <!-- main js -->
    <script src="{{ asset('js/main-js.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dashboard-ecommerce.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

    <script src="/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/slimscroll/jquery.slim.min.js"></script>
    <script src="/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- chart chartist js -->
    <script src="/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="/vendor/charts/c3charts/c3.min.js"></script>
    <script src="/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="/vendor/charts/c3charts/C3chartjs.js"></script>

    @endsection