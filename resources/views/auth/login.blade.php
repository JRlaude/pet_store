@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 400px;">
    <div class="row justify-content-center">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header text-white text-center" style="background: green; border-radius: 10px 10px 0 0; padding: 15px;">
                <h2 class="modal-title text-uppercase mx-auto" id="">{{ __('Login') }}</h2>
            </div>
            <div class="card-body" style="padding: 0 !important;">
                <form class="mx-5 pt-3 pb-5" method="POST" action="{{ route('login') }}">
                    @csrf
                    <hr class="">
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

                    <div class="d-flex justify-content-center mt-3 mb-3">
                        <button type="submit" class="btn btn-success btn-block btn-lg bg-green text-white">{{ __('Login') }}</button>
                    </div>

                    <p class="text-center text-muted mt-4 mb-0">Don't have an account? <a href="{{ url('/register') }}" class="fw-bold text-body"><u>Register here</u></a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection