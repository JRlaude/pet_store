@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card card-primary card-outline rounded-lg">
                <div class="card-header text-center rounded-lg">
                    <h2 class="text-uppercase mb-0" id="">{{ __('Login') }}</h2>
                </div>
                <div class="card-body p-0">
                    <form class="mx-3 p-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-outline mb-2">
                            <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        @if (Route::has('password.request'))
                        <div class="form-check d-flex justify-content-center mb-4 p-0 pt-2">
                            <a href="{{ route('password.request') }}" class="text-body"><u>{{ __('Forgot Your Password?') }}</u></a>
                        </div>
                        @endif

                        <div class="d-flex justify-content-center m-auto">
                            <button type="submit" class="btn btn-primary btn-block btn-md">{{ __('Login') }}</button>
                        </div>

                        <p class="text-center text-muted mt-4 mb-0">Don't have an account? <a href="{{ url('/register') }}" class="fw-bold text-body"><u>Register here</u></a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection