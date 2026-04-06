@extends('layouts.guest')

@section('content')
    <form class="theme-form" method="post" action="{{ route('password.email') }}">
        @csrf
        @error('email')
            <div class="alert alert-primary my-2 p-2" role="alert">
                <p class="mb-0 text-white">{{ $message }}</p>
            </div>
        @else
            <h2 class="text-center">@lang('Réinitialiser votre mot de passe')</h2>
            <div class="alert alert-primary my-2 p-2" role="alert">
                <p class="mb-0 text-white">@lang('Veuillez entrer votre adresse e-mail et nous vous enverrons un lien de réinitialisation de mot de passe.')</p>
            </div>

            <div class="form-group">
                <label class="col-form-label">@lang('Email')</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" placeholder="@lang('Email')" required autocomplete="email" autofocus>
            </div>
            <div class="form-group mb-0 checkbox-checked">
                <div class="text-end mt-3">
                    <button class="btn btn-primary btn-block w-100" type="submit">@lang('Envoyer le lien de réinitialisation')</button>
                </div>
            </div>
            @endif
        </form>
    @endsection
    @push('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/cute-alert/cute-alert.css') }}">
    @endpush
    @push('js')
        <script src="{{ asset('plugins/cute-alert/cute-alert.js') }}"></script>
        <script>
            var time_alert_success = 10000;
            var time_alert_error = 3000;

            $('form').submit(function(event) {
                event.preventDefault();
                var $form = $(this);
                var formdata = window.FormData ? new FormData($form[0]) : null;
                var data = formdata !== null ? formdata : $form.serialize();

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="_token"]').attr("value")
                    }
                });
                $.ajax({
                    url: $(this).attr("action"),
                    type: $(this).attr("method"),
                    processData: false,
                    contentType: false,
                    data: data,
                    success: function(result) {

                        console.log('!! form post');
                        console.log(result);

                        if (result.success == true) {
                            cuteToast({
                                type: "success",
                                message: result.message,
                                timer: time_alert_success,
                            }).then(() => {

                                location.href = "{{ route('login') }}";

                            });
                        } else {
                            cuteToast({
                                type: "error",
                                message: (result.message) ? result.message : 'Erreur...',
                                timer: time_alert_error,
                            });
                        }
                    }
                });
            });
        </script>
    @endpush
