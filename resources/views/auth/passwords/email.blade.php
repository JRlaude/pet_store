@extends('layouts.app')

@section('content')


<div class="container" style="max-width: 450px;">
    <div class="row justify-content-center">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header text-white" style="background: green; border-radius: 10px 10px 0 0; padding: 20px;">
                <h2 class="modal-title text-uppercase mx-auto">{{ __('Reset Password') }}</h2>
            </div>
            <div class="card-body" style="padding: 0 !important;">
                <form class="mx-5 pt-3 pb-5" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <hr class="">
                    <div class="form-outline mb-2">
                        <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                       
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button type="submit" class="btn btn-success btn-block btn-lg bg-green text-white">{{ __('Send Password Reset Link') }}</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>
@endsection