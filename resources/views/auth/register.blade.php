@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px;">
    <div class="row justify-content-center">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header" style="background: green; border-radius: 10px 10px 0 0; color: white; padding: 20px;">
                <div class="row"></div>
                <h2 class="modal-title text-uppercase mx-auto">{{ __('Register') }}</h2>
            </div>
            <div class="card-body" style="padding: 0 !important;">
                <form class="mx-5 pt-3 pb-5" method="POST" action="{{ route('register') }}">
                    @csrf
                    <hr class="">
                    <div class="row">
                        <div class="col-lg">

                            <div class="form-outline mb-2">
                                <label class="form-label" for="firstname">{{ __('First name') }}</label>
                                <input type="text" id="firstname" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus />
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="lastname">{{ __('Last name') }}</label>
                                <input type="text" id="lastname" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus />
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                        </div>
                        <div class="col-lg">

                            <div class="form-outline mb-2">
                                <label class="form-label" for="contact_number">{{ __('Contact Number') }}</label>
                                <input type="text" id="contact_number" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" required autocomplete="contact_number" autofocus" />
                                @error('contact_number')
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
                                <label class="form-label" for="confirm_password">{{ __('Confirm Password') }}</label>
                                <input type="password" id="confirm_password" class="form-control" name="password_confirmation" required autocomplete="new-password" />
                            </div>

                        </div>
                    </div>
                    <div class="form-check d-flex justify-content-right mb-4 p-0 pt-2">
                        <p> By signing up you agree all statements in  <a href="" class="text-body"> <u> Terms of service</u> </a> and <a href="" class="text-body"> <u> Privacy Policy </u> </a> </p>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success btn-block btn-lg bg-green text-white ">{{ __('Register') }}</button>
                    </div>

                    <p class="text-center text-muted mt-4 mb-0">Have already an account? <a href="{{ url('/login') }}" class="fw-bold text-body"><u>Login here</u></a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection