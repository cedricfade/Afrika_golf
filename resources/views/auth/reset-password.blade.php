@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="text-center">@lang('Réinitialiser votre mot de passe')</h2>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label class="col-form-label">@lang('Email')</label>
                        <div class="form-input position-relative">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email', $email) }}" placeholder="@lang('Email')"
                                autocomplete="email" required autofocus>
                            @error('email')
                                <div class="show-hide">
                                    <span class="show">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">@lang('Password')</label>
                        <div class="form-input position-relative">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                placeholder="@lang('********')" autocomplete="current-password">
                            @error('password')
                                <div class="show-hide">
                                    <span class="show">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">{{ __('Confirm Password') }}</label>
                        <div class="form-input position-relative">
                            <input id="password-confirm" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" placeholder="@lang('********')" autocomplete="current-password"
                                required>
                            @error('password_confirmation')
                                <div class="show-hide">
                                    <span class="show">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-end mt-3">
                        <button class="btn btn-primary btn-block w-100" type="submit">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
