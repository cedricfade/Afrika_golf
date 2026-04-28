@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'title' => __('formulaire.page_title'),
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
        <h2 style="text-center">{{ __('formulaire.form_title') }}</h2>
        
        
        @php 
        
        
        $database = [
            'IMIGONGO' => [
                'fr' => [
                    'title'   => 'IMIGONGO',
                    'space'   => 'PARTENAIRE ÉLÉGANCE',
                    'symbole' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Symbole</span></b><span style=\"font-size: 18px;\"> L'art décoratif traditionnel rwandais emblématique, caractérisé par des motifs géométriques.</span></font></p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Valeurs</span></b><span style=\"font-size: 18px;\"> Créativité, patrimoine, esthétique.</span></font></p>",
                ],
                'en' => [
                    'title'   => 'IMIGONGO',
                    'space'   => 'ELEGANCE PARTNER',
                    'symbole' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Symbol</span></b><span style=\"font-size: 18px;\"> The iconic traditional Rwandan decorative art, characterized by geometric patterns.</span></font></p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Values</span></b><span style=\"font-size: 18px;\"> Creativity, heritage, aesthetics.</span></font></p>",
                ],
            ],
            'GORILLES DES MONTAGNES' => [
                'fr' => [
                    'title'   => 'GORILLES DES MONTAGNES',
                    'space'   => 'PARTENAIRE MAJESTUEUX',
                    'symbole' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Symbole</span></b><span style=\"font-size: 18px;\"> Emblème national, richesse naturelle, protection, rareté.</span></font></p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Valeurs </span></b><span style=\"font-size: 18px;\">Respect, noblesse, puissance.</span></font></p>",
                ],
                'en' => [
                    'title'   => 'MOUNTAIN GORILLAS',
                    'space'   => 'MAJESTIC PARTNER',
                    'symbole' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Symbol</span></b><span style=\"font-size: 18px;\"> National emblem, natural wealth, protection, rarity.</span></font></p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Values </span></b><span style=\"font-size: 18px;\">Respect, nobility, power.</span></font></p>",
                ],
            ],
            'KARISIMBI' => [
                'fr' => [
                    'title'   => 'KARISIMBI',
                    'space'   => 'PARTENAIRE SUPRÊME',
                    'symbole' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Symbole</span></b><span style=\"font-size: 18px;\"> Culminant à 4 507 mètres, c'est le plus haut sommet du Rwanda, situé dans les monts Virunga, au sein du parc national des Volcans.</span></font></p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Valeurs </span></b><span style=\"font-size: 18px;\">Grandeur, prestige, ascension, excellence.</span></font></p>",
                ],
                'en' => [
                    'title'   => 'KARISIMBI',
                    'space'   => 'SUPREME PARTNER',
                    'symbole' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Symbol</span></b><span style=\"font-size: 18px;\"> Reaching an altitude of 4,507 meters, it is the highest peak in Rwanda, located in the Virunga Mountains, within Volcanoes National Park</span></font></p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Values </span></b><span style=\"font-size: 18px;\">Grandeur, prestige, ascent, excellence.</span></font></p>",
                ],
            ],
            'NYUNGWE' => [
                'fr' => [
                    'title'   => 'NYUNGWE',
                    'space'   => 'PACK DINER',
                    'symbole' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Symbole</span></b><span style=\"font-size: 18px;\"> Le dîner Africa Art Golf Cup est une expérience gastronomique orchestrée par le Chef Dieuveil Malonga. Il constitue également le moment de remise des trophées et des prix du tournoi.<br><br><b style=\"\"><span style=\"font-size: 18px;\">Formule et style du dîner </span></b> Casual chic<br><br><b style=\"\"><span style=\"font-size: 18px;\">Activités </span></b> Apéritifs, Remise de trophées du tournoi, animations<br><br><b style=\"\"><span style=\"font-size: 18px;\">Lieu </span></b> Atelier du vin - Kigali</span></font></p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Valeurs </span></b><span style=\"font-size: 18px;\">Profondeur, authenticité, exception, calme, beauté.</span></font></p>",
                ],
                'en' => [
                    'title'   => 'NYUNGWE',
                    'space'   => 'DINNER PACK',
                    'symbole' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Symbol</span></b><span style=\"font-size: 18px;\"> The Africa Art Golf Cup dinner is a gastronomic experience orchestrated by Chef Dieuveil Malonga. It also marks the trophy and prize ceremony of the tournament.<br><br><b style=\"\"><span style=\"font-size: 18px;\">Dinner format and style </span></b> Casual chic<br><br><b style=\"\"><span style=\"font-size: 18px;\">Activities </span></b> Aperitifs, Tournament trophy ceremony, entertainment<br><br><b style=\"\"><span style=\"font-size: 18px;\">Venue </span></b> Atelier du vin - Kigali</span></font></p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Values </span></b><span style=\"font-size: 18px;\">Depth, authenticity, exception, calm, beauty.</span></font></p>",
                ],
            ],
            'AKAGERA' => [
                'fr' => [
                    'title'   => 'AKAGERA',
                    'space'   => 'PACK BRUNCH',
                    'symbole' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b><span style=\"font-size: 18px;\">Symbole</span></b><span style=\"font-size: 18px;\"> Parc national emblématique, savane, lumière, paysage ouvert.<br><br>AKAGERA évoque une ambiance détendue très en phase avec le brunch à l'ambiance « lodge chic » autour du Chef Tamsir Ndir.</span></font></p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Valeurs </span></b><span style=\"font-size: 18px;\">Diversité, ouverture, vitalité, convivialité, chaleur.</span></font></p>",
                ],
                'en' => [
                    'title'   => 'AKAGERA',
                    'space'   => 'BRUNCH PACK',
                    'symbole' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b><span style=\"font-size: 18px;\">Symbol</span></b><span style=\"font-size: 18px;\"> Iconic national park, savanna, light, open landscape.<br><br>AKAGERA evokes a relaxed atmosphere perfectly in tune with the brunch\'s \"lodge chic\" vibe around Chef Tamsir Ndir.</span></font></p><p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Avenir Next&quot;;\"><font color=\"#cec6ce\"><b style=\"\"><span style=\"font-size: 18px;\">Values </span></b><span style=\"font-size: 18px;\">Diversity, openness, vitality, conviviality, warmth.</span></font></p>",
                ],
            ],
        ];
        
        @endphp 

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
                    <h2>{{ utf8_encode($database[$pack->title][app()->getLocale()]['space']) }} <br>{{ number_format($pack->price, 0, ',', ' ') }} USD</h2>
                    <div class="card-text">
                        {!! utf8_encode($database[$pack->title][app()->getLocale()]['symbole']) !!}
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
                            <button type="submit" class="btn" id="sponsoring-btn">{{ __('formulaire.btn_send') }}</button>
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
                    btn.textContent = '{{ __("formulaire.sending") }}';
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
                                        '{{ __("formulaire.success") }}';
                                    form.reset();
                                } else {
                                    const msg = json.message || (json.errors ? Object.values(json.errors).flat()
                                        .join(
                                            ' ') : '{{ __("formulaire.error_generic") }}');
                                    alert.className = 'alert alert-danger mb-3';
                                    alert.textContent = msg;
                                }
                            })
                            .catch(function() {
                                alert.className = 'alert alert-danger mb-3';
                                alert.textContent =
                                    '{{ __("formulaire.error_network") }}';
                            })
                            .finally(function() {
                                btn.disabled = false;
                                btn.textContent = '{{ __("formulaire.btn_send") }}';
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
