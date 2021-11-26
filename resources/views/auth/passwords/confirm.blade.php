@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary card-outline rounded-lg">
                <div class="card-header text-center rounded-lg">
                    <h2 class="card-title text-uppercase mx-auto mb-0" id="">{{ __('Confirm Password') }}</h2>
                </div>
                <div class="card-body" style="padding: 0 !important;">
                    {{ __('Please confirm your password before continuing.') }}

                    <form class="mx-5 pt-3 pb-5" method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <hr class="">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-outline mb-2">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-outline mb-2">

                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-success btn-block btn-lg bg-green text-white">{{ __('Confirm
                        Password') }}</button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection