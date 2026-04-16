@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'title' => 'FORMULAIRE',
    'bannerColor' => '#0A140F',
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
        <h2 style="text-center">@lang('RECEVEZ NOTRE OFFRE DE SPONSORING PAR MAIL EN REMPLISSANT CE FORMULAIRE.')</h2>

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
                    <h2>{{ $pack->space }} : <br>{{ number_format($pack->price, 0, ',', ' ') }} USD</h2>
                    <div class="card-text">
                        {!! $pack->symbole !!}
                    </div>
                @else
                    <h3>
                        IMIGONGO
                    </h3>
                    <h2>Partenaire elégance: <br>7.500 USD </h2>
                    <div class="card-text">
                        <b>Symbole:</b>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae expedita, architecto
                            voluptates soluta repudiandae obcaecati quaerat cupiditate
                        </p>
                        <b>Valeur:</b>
                        <p>
                            Créativité,patrimoine,esthétique.
                        </p>
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
                            <label for="">@lang('Nom de l\'entreprise')</label>
                            <input type="text" class="form-control" name="companyName" required>
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">@lang('Nom & prénoms')</label>
                            <input type="text" class="form-control" name="nomPrenoms" required>
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">@lang('Pays')</label>
                            <input type="text" class="form-control" name="country" required>
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">@lang('Email')</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">@lang('Secteur d\'activité')</label>
                            <input type="text" class="form-control" name="sector" required>
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">@lang('Téléphone')</label>
                            <input type="text" class="form-control" name="telePhone">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn" id="sponsoring-btn">@lang('Envoyer')</button>
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
                    btn.textContent = '{{ __('Envoi en cours…') }}';
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
                                        '{{ __('Votre demande a bien été envoyée. Un email de confirmation vous a été adressé.') }}';
                                    form.reset();
                                } else {
                                    const msg = json.message || (json.errors ? Object.values(json.errors).flat()
                                        .join(
                                            ' ') : '{{ __('Une erreur est survenue. Veuillez réessayer.') }}');
                                    alert.className = 'alert alert-danger mb-3';
                                    alert.textContent = msg;
                                }
                            })
                            .catch(function() {
                                alert.className = 'alert alert-danger mb-3';
                                alert.textContent =
                                    '{{ __('Erreur réseau. Veuillez vérifier votre connexion et réessayer.') }}';
                            })
                            .finally(function() {
                                btn.disabled = false;
                                btn.textContent = '{{ __('Envoyer') }}';
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
