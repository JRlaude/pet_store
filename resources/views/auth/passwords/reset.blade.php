@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 400px;">
    <div class="row justify-content-center"">
            <div class=" modal-content" style="border-radius: 10px;">
        <div class="modal-header text-white" style="background: green; border-radius: 10px 10px 0 0; padding: 20px;">
            <h2 class="modal-title text-uppercase mx-auto">{{ __('Reset Password') }}</h2>
        </div>
        <div class="card-body" style="padding: 0 !important;">
            <form class="mx-5 pt-3 pb-5"  method="POST" action="{{ route('password.update') }}">
                @csrf
                <hr class="">
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-outline mb-2">
                    <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus />
                    @error('email')
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
                <div class="form-outline mb-2">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

</div>
@endsection