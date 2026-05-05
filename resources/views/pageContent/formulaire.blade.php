@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'title'       => __('formulaire.page_title'),
    'bannerColor' => $bannerColor ?? '#0A140F',
])

<style>
    .banner {
        margin: 0;
        padding: 30px;
        padding-bottom: 50px;
        height: 19vh;

        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }

    @media screen and (max-width: 799px) {
        .banner {
            height: 15vh !important;
        }
    }
</style>

<section class="formulaire">
    <div class="container">
        <h2 style="text-center">{{ __('formulaire.form_title') }}</h2>


        <div class="row info">
            <div class="col-xl-6">
                @isset($pack)
                    <img src="{{ Storage::url($pack->image) }}" alt="{{ $pack->title }}" class="img-fluid">
                @else
                    <img src="{{ asset('assets/images/packs/card1.png') }}" alt="" class="img-fluid">
                @endisset
            </div>
            <div class="col-xl-1"></div>
            <div class="col-xl-5">
                @isset($pack)
                    <h3>{{ $pack->title }}</h3>
                    <h2>{{ $pack->{'space_' . app()->getLocale()} }}
                        <br>{{ number_format($pack->price, 0, ',', ' ') }} USD</h2>
                    <div class="card-text">
                        {!! $pack->{'symbole_' . app()->getLocale()} !!}
                    </div>
                @else
                    <h3>{{ __('formulaire.default_pack_name') }}</h3>
                    <h2>{{ __('formulaire.default_pack_label') }} <br>{{ __('formulaire.default_pack_price') }}</h2>
                    <div class="card-text">
                        <b>{{ __('formulaire.default_symbol') }}</b>
                        <p>{{ __('formulaire.default_symbol_text') }}</p>
                        <b>{{ __('formulaire.default_value') }}</b>
                        <p>{{ __('formulaire.default_value_text') }}</p>
                    </div>
                @endisset
            </div>
        </div>
        @if (!empty($pack))
            @if (config('services.recaptcha.site_key'))
                <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer>
                </script>
            @endif
            <div class="form">
                <div id="sponsoring-alert" class="alert d-none mb-3" role="alert"></div>
                <form id="sponsoring-form" action="{{ route('form-sponsoring') }}" method="POST">
                    @csrf
                    <input type="hidden" name="packId" value="{{ $pack->id ?? '' }}">
                    <div class="row">
                        <div class="form-group col-xl-6">
                            <label for="">{{ __('formulaire.label_company') }}</label>
                            <input type="text" class="form-control" name="companyName" required>
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">{{ __('formulaire.label_name') }}</label>
                            <input type="text" class="form-control" name="nomPrenoms" required>
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">{{ __('formulaire.label_country') }}</label>
                            <input type="text" class="form-control" name="country" required>
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">{{ __('formulaire.label_email') }}</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">{{ __('formulaire.label_sector') }}</label>
                            <input type="text" class="form-control" name="sector" required>
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">{{ __('formulaire.label_phone') }}</label>
                            <input type="text" class="form-control" name="telePhone">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn"
                                id="sponsoring-btn">{{ __('formulaire.btn_send') }}</button>
                        </div>
                    </div>
                </form>
            </div>

            <script>
                document.getElementById('sponsoring-form').addEventListener('submit', function(e) {
                    e.preventDefault();

                    const form = this;
                    const btn = document.getElementById('sponsoring-btn');
                    const alert = document.getElementById('sponsoring-alert');

                    btn.disabled = true;
                    btn.textContent = '{{ __('formulaire.sending') }}';
                    alert.className = 'alert d-none mb-3';
                    alert.textContent = '';

                    function submitForm(token) {
                        const data = new FormData(form);
                        if (token) {
                            const existing = form.querySelector('input[name="g-recaptcha-response"]');
                            if (existing) existing.remove();
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'g-recaptcha-response';
                            input.value = token;
                            form.appendChild(input);
                            data.set('g-recaptcha-response', token);
                        }

                        fetch(form.action, {
                                method: 'POST',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'Accept': 'application/json'
                                },
                                body: data,
                            })
                            .then(async function(res) {
                                const json = await res.json();
                                if (res.ok && json.success) {
                                    alert.className = 'alert alert-success mb-3';
                                    alert.textContent = json.message ||
                                        '{{ __('formulaire.success') }}';
                                    form.reset();
                                } else {
                                    const msg = json.message || (json.errors ? Object.values(json.errors).flat()
                                        .join(
                                            ' ') : '{{ __('formulaire.error_generic') }}');
                                    alert.className = 'alert alert-danger mb-3';
                                    alert.textContent = msg;
                                }
                            })
                            .catch(function() {
                                alert.className = 'alert alert-danger mb-3';
                                alert.textContent =
                                    '{{ __('formulaire.error_network') }}';
                            })
                            .finally(function() {
                                btn.disabled = false;
                                btn.textContent = '{{ __('formulaire.btn_send') }}';
                                alert.classList.remove('d-none');
                                alert.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'center'
                                });
                            });
                    }

                    @if (config('services.recaptcha.site_key'))
                        grecaptcha.ready(function() {
                            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                                    action: 'sponsoring'
                                })
                                .then(function(token) {
                                    submitForm(token);
                                });
                        });
                    @else
                        submitForm(null);
                    @endif
                });
            </script>
        @endif
    </div>


</section>

@include('front.partials.footer')
