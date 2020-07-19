@extends('layouts.app')

@section('content')
    <div class="main">

        <section class="signup mt-5">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="reg-container">
                <div class="signup-content mt-5">
                    <form method="POST" class="signup-form" action="{{ route('register') }}">
                        @csrf
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                             <input id="name" type="text" class="form-input @error('name') is-invalid @enderror" placeholder="Your Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <input id="email" type="email" class=" form-input @error('email') is-invalid @enderror" placeholder="Your Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="form-group">
                            <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-input" placeholder="Repeat your password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="#" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>
@endsection
