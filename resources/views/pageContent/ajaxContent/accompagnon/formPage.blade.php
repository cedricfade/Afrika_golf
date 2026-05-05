<div class="container">
    <div class="form">
        <div id="commandBallAlert" class="alert d-none mb-3" role="alert"></div>
        <form action="{{ route('form-command-ball') }}" method="POST" id="commandBallForm">
            @csrf
            <div class="row">
                <h2 class="fs-xl text-center" data-acc="form_title">{{ __('ajax_accompagnon.form_title') }}</h2>
                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="">{{ __('ajax_accompagnon.label_nom') }}</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('ajax_accompagnon.label_prenom') }}</label>
                        <input type="text" class="form-control" name="prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('ajax_accompagnon.label_phone') }}</label>
                        <input type="text" class="form-control" name="telephone">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-group ">
                        <label for="">{{ __('ajax_accompagnon.label_email') }}</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('ajax_accompagnon.label_balls') }}</label>
                        <input type="number" class="form-control" name="nombre_de_balles" min="1" required>
                    </div>
                </div>
                <div id="commandBallAlert" class="alert d-none mb-3"></div>
                <div class="form-group text-center">
                    <button type="submit" class="btn">{{ __('ajax_accompagnon.btn_send') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('jsAccompagnon')
    @if (config('services.recaptcha.site_key'))
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer>
        </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('commandBallForm');
            var alertBox = document.getElementById('commandBallAlert');
            if (!form) return;

            function submitForm(token) {
                if (token) {
                    var existing = form.querySelector('input[name="g-recaptcha-response"]');
                    if (existing) existing.remove();
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'g-recaptcha-response';
                    input.value = token;
                    form.appendChild(input);
                }

                var btn = form.querySelector('[type="submit"]');
                if (btn) {
                    btn.disabled = true;
                    btn.textContent = '{{ __("ajax_accompagnon.sending") }}';
                }
                alertBox.className = 'alert d-none mb-3';

                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        },
                        body: new FormData(form)
                    })
                    .then(function(res) {
                        return res.json().then(function(data) {
                            return {
                                ok: res.ok,
                                data: data
                            };
                        });
                    })
                    .then(function(result) {
                        if (result.ok && result.data.success) {
                            alertBox.className = 'alert alert-success mb-3';
                            alertBox.textContent = result.data.message;
                            form.reset();
                        } else {
                            var msg = result.data.message || '{{ __("ajax_accompagnon.error_generic") }}';
                            if (result.data.errors) {
                                msg = Object.values(result.data.errors).flat().join(' ');
                            }
                            alertBox.className = 'alert alert-danger mb-3';
                            alertBox.textContent = msg;
                        }
                    })
                    .catch(function() {
                        alertBox.className = 'alert alert-danger mb-3';
                        alertBox.textContent = '{{ __("ajax_accompagnon.error_network") }}';
                    })
                    .finally(function() {
                        if (btn) {
                            btn.disabled = false;
                            btn.textContent = '{{ __("ajax_accompagnon.btn_send_caps") }}';
                        }
                    });
            }

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                @if (config('services.recaptcha.site_key'))
                    grecaptcha.ready(function() {
                        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                                action: 'reservation'
                            })
                            .then(function(token) {
                                submitForm(token);
                            });
                    });
                @else
                    submitForm(null);
                @endif
            });
        });
    </script>
@endpush
