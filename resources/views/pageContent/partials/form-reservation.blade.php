<div class="mb-3">
    <span>{{ __('partials.contact_us') }}</span>
</div>
<div class="mb-3 d-flex gap-3">
    <a href="https://www.instagram.com/africa.art.golf?igsh=ZmlxYjRydmx2ZXZq" target="_blank" rel="noopener noreferrer" class="text-white fs-5">
        <i class="fa-brands fa-instagram"></i>
    </a>
    <a href="https://www.linkedin.com/company/africa-art-golf/" target="_blank" rel="noopener noreferrer" class="text-white fs-5">
        <i class="fa-brands fa-linkedin-in"></i>
    </a>
    <a href="https://x.com/africa_art_golf" target="_blank" rel="noopener noreferrer" class="text-white fs-5">
        <i class="fa-brands fa-x-twitter"></i>
    </a>
</div>
<div class="formulaire" style="background: #0f1c15; padding: 20px; color: #fff; border: 0.5px solid #707070;">
    <div id="reservationAlert" class="alert d-none mb-3" role="alert"></div>
    <form id="reservationForm" action="{{ route('form-contact') }}" method="POST">
        @csrf
        <input type="hidden" name="page" value="{{ url()->current() }}">
        <div class="mb-4">
            <label class="ff-avenir mb-1" for="">{{ __('partials.label_full_name') }}</label>
            <input type="text" name="nomComplet" class="form-control ff-avenir bg-dark text-grey py-2 border-color"
                required>
        </div>
        <div class="mb-4">
            <label class="ff-avenir mb-1" for="">{{ __('partials.label_email') }}</label>
            <input type="email" name="email" class="form-control ff-avenir bg-dark text-grey py-2 border-color"
                required>
        </div>
        <div class="mb-4">
            <label class="ff-avenir mb-1" for="">{{ __('partials.label_subject') }}</label>
            <input type="text" name="objet" class="form-control ff-avenir bg-dark text-grey py-2 border-color"
                required>
        </div>
        <div class="mb-4">
            <label class="ff-avenir mb-1" for="">{{ __('partials.label_message') }}</label>
            <textarea name="message" cols="20" rows="5"
                class="form-control ff-avenir text-grey bg-dark text-grey py-2 border-color" required></textarea>
        </div>
        <div class="mb-4 text-center">
            <button type="submit" class="btn"
                style="background: #b07f49;color: #0f1c15;width: 100%; border-radius: 0px; height: 50px;">{{ __('partials.btn_send') }}</button>
        </div>
    </form>
</div>



@push('js2')
    @if (config('services.recaptcha.site_key'))
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer>
        </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('reservationForm');
            var alertBox = document.getElementById('reservationAlert');
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
                    btn.textContent = '{{ __('partials.sending') }}';
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
                            var msg = result.data.message || '{{ __('partials.error_generic') }}';
                            if (result.data.errors) {
                                msg = Object.values(result.data.errors).flat().join(' ');
                            }
                            alertBox.className = 'alert alert-danger mb-3';
                            alertBox.textContent = msg;
                        }
                    })
                    .catch(function() {
                        alertBox.className = 'alert alert-danger mb-3';
                        alertBox.textContent = '{{ __('partials.error_connection') }}';
                    })
                    .finally(function() {
                        if (btn) {
                            btn.disabled = false;
                            btn.textContent = '{{ __('partials.btn_send') }}';
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
