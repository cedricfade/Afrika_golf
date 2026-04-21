<style>
    .tournoi-form .form-control {
        background: #0a1810 !important;
        border: 1px solid #3a3a3a !important;
        color: #ccc !important;
        border-radius: 0 !important;
        font-size: 13px;
    }

    .tournoi-form .form-control::placeholder {
        color: #777 !important;
    }

    .tournoi-form .form-check-input {
        background-color: transparent;
        border-color: #b07f49;
        border-radius: 0 !important;
    }

    .tournoi-form .form-check-input:checked {
        background-color: #b07f49;
        border-color: #b07f49;
    }

    .tournoi-form .form-check-input[type="radio"] {
        border-radius: 50% !important;
    }

    .tournoi-form .form-check-label {
        font-size: 13px;
        color: #ccc;
    }

    .tournoi-form .participant-title {
        font-size: 15px;
        color: #b07f49;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: bold;
    }

    .tournoi-form .section-divider {
        border-color: #3a3a3a;
        margin: 20px 0;
    }

    .btn-remove-participant {
        background: transparent;
        border: 1px solid #c0392b;
        color: #c0392b;
        font-size: 12px;
        padding: 3px 12px;
        cursor: pointer;
        border-radius: 0;
    }

    .btn-remove-participant:hover {
        background: #c0392b;
        color: #fff;
    }

    .btn-add-participant {
        background: transparent;
        border: 1px solid #b07f49;
        color: #b07f49;
        font-size: 13px;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 0;
        width: 100%;
    }

    .btn-add-participant:hover {
        background: #b07f49;
        color: #0f1c15;
    }

    @media (max-width: 767px) {
        .tournoi-form {
            padding: 20px 16px !important;
        }

        .tournoi-form .participant-title {
            font-size: 13px;
        }
    }

    @media (max-width: 400px) {
        .tournoi-form {
            padding: 14px 10px !important;
        }
    }
</style>

<div class="tournoi-form" style="background: #0f1c15; padding: 30px; color: #fff; border: 0.5px solid #707070;">

    <div class="text-center mb-4">
        <span class="ff-avenir"
            style="color:#b07f49; letter-spacing:3px; border:1px solid #b07f49; padding:8px 24px; display:inline-block; font-size:14px; font-weight:bold;">{{ __("partials.tournoi_label") }}</span>
    </div>

    <div id="reservationAlertFront" class="alert d-none mb-3" role="alert"></div>

    <form id="reservationFormFront" method="POST" action="{{ route('form-reservation') }}">
        @csrf
        <input type="hidden" name="page" value="{{ url()->current() }}">

        <div id="participantsContainer">

            {{-- ===== PARTICIPANT 1 (index 0, Blade-rendered) ===== --}}
            <div class="participant-block" data-index="0">
                <span class="participant-title ff-avenir">{{ __("partials.form_participant_label") }} 1</span>
                <hr class="section-divider">

                {{-- Type --}}
                <div class="mb-3">
                    <label class="ff-avenir d-block mb-2"
                        style="font-size:13px; color:#b07f49; letter-spacing:1px;">{{ __("partials.form_type_label") }}</label>
                    <div class="d-flex gap-4 flex-wrap">
                        <div class="form-check mb-0">
                            <input class="form-check-input type-radio" type="radio" name="participants[0][type]"
                                id="p_0_type_golfeur" value="Golfeur" required>
                            <label class="form-check-label ff-avenir" for="p_0_type_golfeur">{{ __("partials.form_golfer") }}</label>
                        </div>
                        <div class="form-check mb-0">
                            <input class="form-check-input type-radio" type="radio" name="participants[0][type]"
                                id="p_0_type_non_golfeur" value="Non golfeur">
                            <label class="form-check-label ff-avenir" for="p_0_type_non_golfeur">{{ __("partials.form_non_golfer") }}</label>
                        </div>
                    </div>
                </div>

                {{-- Civilité --}}
                <div class="mb-3">
                    <label class="ff-avenir d-block mb-2"
                        style="font-size:13px; color:#b07f49; letter-spacing:1px;">{{ __("partials.form_civility") }}</label>
                    <div class="d-flex gap-4 flex-wrap">
                        <div class="form-check mb-0">
                            <input class="form-check-input" type="radio" name="participants[0][civilite]"
                                id="p_0_civilite_madame" value="Madame" required>
                            <label class="form-check-label ff-avenir" for="p_0_civilite_madame">{{ __("partials.form_madame") }}</label>
                        </div>
                        <div class="form-check mb-0">
                            <input class="form-check-input" type="radio" name="participants[0][civilite]"
                                id="p_0_civilite_mademoiselle" value="Mademoiselle">
                            <label class="form-check-label ff-avenir"
                                for="p_0_civilite_mademoiselle">{{ __("partials.form_mademoiselle") }}</label>
                        </div>
                        <div class="form-check mb-0">
                            <input class="form-check-input" type="radio" name="participants[0][civilite]"
                                id="p_0_civilite_monsieur" value="Monsieur">
                            <label class="form-check-label ff-avenir" for="p_0_civilite_monsieur">{{ __("partials.form_monsieur") }}</label>
                        </div>
                    </div>
                </div>

                {{-- Nom & Prénom --}}
                <div class="row g-2 mb-2">
                    <div class="col-sm-6">
                        <input type="text" class="form-control ff-avenir" name="participants[0][nom]"
                            placeholder="{{ __("partials.form_placeholder_nom") }}" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control ff-avenir" name="participants[0][prenom]"
                            placeholder="{{ __("partials.form_placeholder_prenom") }}">
                    </div>
                </div>

                {{-- Date de naissance --}}
                <div class="mb-2">
                    <input type="date" class="form-control ff-avenir" name="participants[0][date_naissance]"
                        title="{{ __('partials.form_placeholder_dob') }}" placeholder="{{ __('partials.form_placeholder_dob') }}">
                </div>

                {{-- Adresse --}}
                <div class="mb-2">
                    <input type="text" class="form-control ff-avenir" name="participants[0][adresse]"
                        placeholder="{{ __("partials.form_placeholder_address") }}">
                </div>

                {{-- Pays, Ville, Code Postal --}}
                <div class="row g-2 mb-2">
                    <div class="col-sm-4">
                        <input type="text" class="form-control ff-avenir" name="participants[0][pays]"
                            placeholder="{{ __("partials.form_placeholder_country") }}">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control ff-avenir" name="participants[0][ville]"
                            placeholder="{{ __("partials.form_placeholder_city") }}">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control ff-avenir" name="participants[0][code_postal]"
                            placeholder="{{ __("partials.form_placeholder_postal") }}">
                    </div>
                </div>

                {{-- Téléphone & Email --}}
                <div class="row g-2 mb-2">
                    <div class="col-sm-6">
                        <input type="tel" class="form-control ff-avenir" name="participants[0][telephone]"
                            placeholder="{{ __("partials.form_placeholder_phone") }}">
                    </div>
                    <div class="col-sm-6">
                        <input type="email" class="form-control ff-avenir" name="participants[0][email]"
                            placeholder="{{ __("partials.form_placeholder_email") }}" required>
                    </div>
                </div>

                {{-- Index Golf & N° Licence --}}
                <div class="row g-2 mb-2">
                    <div class="col-sm-6">
                        <input type="text" class="form-control ff-avenir" name="participants[0][index_golf]"
                            placeholder="{{ __("partials.form_placeholder_golf_index") }}">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control ff-avenir" name="participants[0][numero_licence]"
                            placeholder="{{ __("partials.form_placeholder_licence") }}">
                    </div>
                </div>

                {{-- Taille Polo --}}
                <div class="mb-2">
                    <label class="ff-avenir mb-2 d-block" style="font-size:13px; color:#aaa;">{{ __("partials.form_polo_size_label") }}</label>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach (['S', 'M', 'L', 'XL', 'XXL', 'Autre'] as $t)
                            <div class="form-check mb-0">
                                <input class="form-check-input" type="radio" name="participants[0][taille_polo]"
                                    id="p_0_polo_{{ strtolower($t) }}" value="{{ $t }}">
                                <label class="form-check-label ff-avenir"
                                    for="p_0_polo_{{ strtolower($t) }}">{{ $t }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Session (Non golfeur only) --}}
                <div class="session-section mt-2">
                    <small class="ff-avenir" style="color:#888;">{{ __("partials.form_session_hint") }}</small>
                    <div class="d-flex flex-wrap gap-3 mt-1">
                        <div class="form-check mb-0">
                            <input class="form-check-input" type="radio" name="participants[0][session]"
                                id="p_0_session_1" value="Session 1 : 9h00 - 12h00">
                            <label class="form-check-label ff-avenir" for="p_0_session_1">{{ __("partials.form_session_1") }}</label>
                        </div>
                        <div class="form-check mb-0">
                            <input class="form-check-input" type="radio" name="participants[0][session]"
                                id="p_0_session_2" value="Session 2 : 12h00 - 15h00">
                            <label class="form-check-label ff-avenir" for="p_0_session_2">{{ __("partials.form_session_2") }}</label>
                        </div>
                    </div>
                </div>

            </div>
            {{-- / participant-block 0 --}}

        </div>
        {{-- / participantsContainer --}}

        <div class="my-3">
            <button type="button" id="addParticipantBtn" class="btn-add-participant ff-avenir">{{ __("partials.form_add_participant") }}</button>
        </div>

        <div class="text-center">
            <button type="submit" id="reservationBtnFront" class="btn"
                style="background:#b07f49; color:#0f1c15; width:100%; border-radius:0; height:50px; font-weight:bold; letter-spacing:2px;">{{ __("partials.btn_send") }}</button>
        </div>
    </form>
</div>

{{-- Template for dynamically added participants --}}
<template id="participantTemplate">
    <div class="participant-block" data-index="__INDEX__">
        <hr class="section-divider">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="participant-title ff-avenir">{{ __("partials.form_participant_label") }} __NUM__</span>
            <button type="button" class="btn-remove-participant ff-avenir"
                onclick="tournoiRemoveParticipant(this)">&#x2715; {{ __("partials.form_remove") }}</button>
        </div>

        <div class="mb-3">
            <label class="ff-avenir d-block mb-2" style="font-size:13px; color:#b07f49; letter-spacing:1px;">{{ __("partials.form_type_label") }}</label>
            <div class="d-flex gap-4 flex-wrap">
                <div class="form-check mb-0">
                    <input class="form-check-input type-radio" type="radio" name="participants[__INDEX__][type]"
                        id="p___INDEX___type_golfeur" value="Golfeur">
                    <label class="form-check-label ff-avenir" for="p___INDEX___type_golfeur">{{ __("partials.form_golfer") }}</label>
                </div>
                <div class="form-check mb-0">
                    <input class="form-check-input type-radio" type="radio" name="participants[__INDEX__][type]"
                        id="p___INDEX___type_non_golfeur" value="Non golfeur">
                    <label class="form-check-label ff-avenir" for="p___INDEX___type_non_golfeur">{{ __("partials.form_non_golfer") }}</label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="ff-avenir d-block mb-2" style="font-size:13px; color:#b07f49; letter-spacing:1px;">{{ __("partials.form_civility") }}</label>
            <div class="d-flex gap-4 flex-wrap">
                <div class="form-check mb-0">
                    <input class="form-check-input" type="radio" name="participants[__INDEX__][civilite]"
                        id="p___INDEX___civilite_madame" value="Madame">
                    <label class="form-check-label ff-avenir" for="p___INDEX___civilite_madame">{{ __("partials.form_madame") }}</label>
                </div>
                <div class="form-check mb-0">
                    <input class="form-check-input" type="radio" name="participants[__INDEX__][civilite]"
                        id="p___INDEX___civilite_mademoiselle" value="Mademoiselle">
                    <label class="form-check-label ff-avenir"
                        for="p___INDEX___civilite_mademoiselle">{{ __("partials.form_mademoiselle") }}</label>
                </div>
                <div class="form-check mb-0">
                    <input class="form-check-input" type="radio" name="participants[__INDEX__][civilite]"
                        id="p___INDEX___civilite_monsieur" value="Monsieur">
                    <label class="form-check-label ff-avenir" for="p___INDEX___civilite_monsieur">{{ __("partials.form_monsieur") }}</label>
                </div>
            </div>
        </div>

        <div class="row g-2 mb-2">
            <div class="col-sm-6">
                <input type="text" class="form-control ff-avenir" name="participants[__INDEX__][nom]"
                    placeholder="{{ __("partials.form_placeholder_nom") }}">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control ff-avenir" name="participants[__INDEX__][prenom]"
                    placeholder="{{ __("partials.form_placeholder_prenom") }}">
            </div>
        </div>

        <div class="mb-2">
            <input type="date" class="form-control ff-avenir" name="participants[__INDEX__][date_naissance]"
                title="{{ __('partials.form_placeholder_dob') }}">
        </div>

        <div class="mb-2">
            <input type="text" class="form-control ff-avenir" name="participants[__INDEX__][adresse]"
                placeholder="{{ __("partials.form_placeholder_address") }}">
        </div>

        <div class="row g-2 mb-2">
            <div class="col-sm-4">
                <input type="text" class="form-control ff-avenir" name="participants[__INDEX__][pays]"
                    placeholder="{{ __("partials.form_placeholder_country") }}">
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control ff-avenir" name="participants[__INDEX__][ville]"
                    placeholder="{{ __("partials.form_placeholder_city") }}">
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control ff-avenir" name="participants[__INDEX__][code_postal]"
                    placeholder="{{ __("partials.form_placeholder_postal") }}">
            </div>
        </div>

        <div class="row g-2 mb-2">
            <div class="col-sm-6">
                <input type="tel" class="form-control ff-avenir" name="participants[__INDEX__][telephone]"
                    placeholder="{{ __("partials.form_placeholder_phone") }}">
            </div>
            <div class="col-sm-6">
                <input type="email" class="form-control ff-avenir" name="participants[__INDEX__][email]"
                    placeholder="{{ __("partials.form_placeholder_email") }}">
            </div>
        </div>

        <div class="row g-2 mb-2">
            <div class="col-sm-6">
                <input type="text" class="form-control ff-avenir" name="participants[__INDEX__][index_golf]"
                    placeholder="{{ __("partials.form_placeholder_golf_index") }}">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control ff-avenir" name="participants[__INDEX__][numero_licence]"
                    placeholder="{{ __("partials.form_placeholder_licence") }}">
            </div>
        </div>

        <div class="mb-2">
            <label class="ff-avenir mb-2 d-block" style="font-size:13px; color:#aaa;">{{ __("partials.form_polo_size_label") }}</label>
            <div class="d-flex flex-wrap gap-3">
                <div class="form-check mb-0">
                    <input class="form-check-input" type="radio" name="participants[__INDEX__][taille_polo]"
                        id="p___INDEX___polo_s" value="S">
                    <label class="form-check-label ff-avenir" for="p___INDEX___polo_s">S</label>
                </div>
                <div class="form-check mb-0">
                    <input class="form-check-input" type="radio" name="participants[__INDEX__][taille_polo]"
                        id="p___INDEX___polo_m" value="M">
                    <label class="form-check-label ff-avenir" for="p___INDEX___polo_m">M</label>
                </div>
                <div class="form-check mb-0">
                    <input class="form-check-input" type="radio" name="participants[__INDEX__][taille_polo]"
                        id="p___INDEX___polo_l" value="L">
                    <label class="form-check-label ff-avenir" for="p___INDEX___polo_l">L</label>
                </div>
                <div class="form-check mb-0">
                    <input class="form-check-input" type="radio" name="participants[__INDEX__][taille_polo]"
                        id="p___INDEX___polo_xl" value="XL">
                    <label class="form-check-label ff-avenir" for="p___INDEX___polo_xl">XL</label>
                </div>
                <div class="form-check mb-0">
                    <input class="form-check-input" type="radio" name="participants[__INDEX__][taille_polo]"
                        id="p___INDEX___polo_xxl" value="XXL">
                    <label class="form-check-label ff-avenir" for="p___INDEX___polo_xxl">XXL</label>
                </div>
                <div class="form-check mb-0">
                    <input class="form-check-input" type="radio" name="participants[__INDEX__][taille_polo]"
                        id="p___INDEX___polo_autre" value="Autre">
                    <label class="form-check-label ff-avenir" for="p___INDEX___polo_autre">Autre</label>
                </div>
            </div>
        </div>

        <div class="session-section mt-2" style="display:none;">
            <small class="ff-avenir" style="color:#888;">{{ __("partials.form_session_hint") }}</small>
            <div class="d-flex flex-wrap gap-3 mt-1">
                <div class="form-check mb-0">
                    <input class="form-check-input" type="radio" name="participants[__INDEX__][session]"
                        id="p___INDEX___session_1" value="Session 1 : 9h00 - 12h00">
                    <label class="form-check-label ff-avenir" for="p___INDEX___session_1">Session 1 : 9h00 -
                        12h00</label>
                </div>
                <div class="form-check mb-0">
                    <input class="form-check-input" type="radio" name="participants[__INDEX__][session]"
                        id="p___INDEX___session_2" value="Session 2 : 12h00 - 15h00">
                    <label class="form-check-label ff-avenir" for="p___INDEX___session_2">Session 2 : 12h00 -
                        15h00</label>
                </div>
            </div>
        </div>

    </div>
</template>

@once
    @push('js')
        @if (config('services.recaptcha.site_key'))
            <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer>
            </script>
        @endif
        <script>
            (function() {
                'use strict';

                var participantCount = 1;

                function tournoiSetupSessionToggle(block) {
                    var radios = block.querySelectorAll('.type-radio');
                    var sessionSection = block.querySelector('.session-section');
                    if (!sessionSection) return;
                    radios.forEach(function(radio) {
                        radio.addEventListener('change', function() {
                            sessionSection.style.display = (radio.value === 'Non golfeur' && radio
                                .checked) ? 'block' : 'none';
                        });
                    });
                }

                function tournoiUpdateTitles() {
                    document.querySelectorAll('#participantsContainer .participant-block').forEach(function(block, i) {
                        var titleEl = block.querySelector('.participant-title');
                        if (titleEl) titleEl.textContent = '{{ __("partials.form_participant_label") }} ' + (i + 1);
                    });
                }

                // Init first block
                var firstBlock = document.querySelector('#participantsContainer .participant-block');
                if (firstBlock) tournoiSetupSessionToggle(firstBlock);

                // Add participant
                document.getElementById('addParticipantBtn').addEventListener('click', function() {
                    var idx = participantCount++;
                    var tpl = document.getElementById('participantTemplate');
                    var html = tpl.innerHTML
                        .replace(/__INDEX__/g, idx)
                        .replace(/__NUM__/g, idx + 1);
                    var wrapper = document.createElement('div');
                    wrapper.innerHTML = html;
                    var block = wrapper.firstElementChild;
                    document.getElementById('participantsContainer').appendChild(block);
                    tournoiSetupSessionToggle(block);
                });

                // Remove participant (global so onclick="" in template can reach it)
                window.tournoiRemoveParticipant = function(btn) {
                    btn.closest('.participant-block').remove();
                    tournoiUpdateTitles();
                };

                // AJAX submit
                var form = document.getElementById('reservationFormFront');
                var alertBox = document.getElementById('reservationAlertFront');
                var submitBtn = document.getElementById('reservationBtnFront');

                function tournoiDoSubmit(token) {
                    submitBtn.disabled = true;
                    submitBtn.textContent = '{{ __("partials.sending") }}';
                    alertBox.className = 'alert d-none mb-3';
                    alertBox.textContent = '';

                    if (token) {
                        var existing = form.querySelector('input[name="g-recaptcha-response"]');
                        if (existing) existing.remove();
                        var input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'g-recaptcha-response';
                        input.value = token;
                        form.appendChild(input);
                    }

                    fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            },
                            body: new FormData(form)
                        })
                        .then(function(res) {
                            return res.json();
                        })
                        .then(function(data) {
                            if (data.success) {
                                alertBox.className = 'alert alert-success mb-3';
                                alertBox.textContent = data.message ||
                                    '{{ __("partials.form_registered") }}';
                                form.reset();
                                // Remove extra participant blocks
                                document.querySelectorAll('#participantsContainer .participant-block').forEach(
                                    function(block, i) {
                                        if (i > 0) block.remove();
                                    });
                                // Hide all session sections
                                document.querySelectorAll('.session-section').forEach(function(s) {
                                    s.style.display = 'none';
                                });
                                participantCount = 1;
                            } else {
                                var msg = data.message || '{{ __("partials.error_generic") }}';
                                if (data.errors) {
                                    msg = Object.values(data.errors).flat().join(' ');
                                }
                                alertBox.className = 'alert alert-danger mb-3';
                                alertBox.textContent = msg;
                            }
                        })
                        .catch(function() {
                            alertBox.className = 'alert alert-danger mb-3';
                            alertBox.textContent = '{{ __("partials.error_connection") }}';
                        })
                        .finally(function() {
                            submitBtn.disabled = false;
                            submitBtn.textContent = '{{ __("partials.btn_send") }}';
                        });
                }

                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    @if (config('services.recaptcha.site_key'))
                        grecaptcha.ready(function() {
                            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                                    action: 'tournoi_inscription'
                                })
                                .then(function(token) {
                                    tournoiDoSubmit(token);
                                });
                        });
                    @else
                        tournoiDoSubmit(null);
                    @endif
                });

            })();
        </script>
    @endpush
@endonce
