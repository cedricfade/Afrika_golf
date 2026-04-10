@extends('layouts.guest')

@section('content')
    <form class="theme-form" method="post" action="{{ route('login') }}">
        @csrf
        <h2 class="text-center">@lang('Login')</h2>
        <p class="text-center">Bienvenue sur votre compte</p>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-group">
            <label class="col-form-label">@lang('Email')</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required placeholder="@lang('Email')" autocomplete="email" autofocus>
            @error('email')
                <div class="show-hide">
                    <span class="show">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-form-label">@lang('Password')</label>
            <div class="form-input position-relative">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required placeholder="@lang('********')" autocomplete="current-password">
                @error('password')
                    <div class="show-hide">
                        <span class="show">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group mb-0 checkbox-checked">
            <div class="row py-2">
                <div class="col">
                    <div class="form-check checkbox-solid-info">
                        <input class="form-check-input" id="solid6" type="checkbox">
                        <label class="form-check-label" for="solid6">@lang('Se souvenir')</label>
                    </div>
                </div>
                <div class="col">
                    @if (Route::has('password.request'))
                        <a class="link" href="{{ route('password.request') }}">@lang('Mot de passe oublié ?')</a>
                    @endif
                </div>
            </div>
            <div class="text-end mt-3">
                <button class="btn btn-primary btn-block w-100" type="submit">@lang('se connecter')</button>
            </div>
        </div>
    </form>
@endsection
