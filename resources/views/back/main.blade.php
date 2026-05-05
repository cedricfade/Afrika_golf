<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ config('app.name') }} | {{ $title ?? '' }} </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/styles.css') }}">
    <style>
        /* Boutons flottants améliorés */
        .btnClick {
            cursor: pointer;
            position: fixed;
            z-index: 1000;
            bottom: 40px;
            right: 40px;
            min-width: 56px;
            min-height: 56px;
            border-radius: 0;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
            color: #fff;
            border: none;
            outline: none;
        }

        .btnClick span {
            display: none;
            margin-left: 8px;
            font-size: 1rem;
        }

        .btnSetting {
            background: #333;
            right: 110px;
        }

        .btnEdit {
            background: #34b7a7;
            right: 40px;
        }

        @media (max-width: 768px) {

            .btnClick,
            #pageModal {
                display: none !important;
            }
        }

        #pageModal .modal-dialog {
            position: fixed;
            margin: auto;
            width: 75%;
            height: 100%;
            transition: none;
        }

        #pageModal .modal-content {
            height: 100%;
            overflow-y: auto;
            border-radius: 0px;
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 100%;
                margin: 1.75rem auto;
            }
        }
    </style>
    <style>
        .preloader {
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    @stack('css')
</head>

<body>

    @php $state = $state ?? 'back'; @endphp

    @yield('content')

    <button class="btnClick btnSetting" onclick="pageSetting()">
        <i class="fe fe-settings"></i>
    </button>
    <button class="btnClick btnEdit" onclick="page()">
        <i class="fe fe-edit"></i>
    </button>

    <div id="pageModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" style="overflow-y:auto">
                    @stack('pageModal')
                </div>
                <div class="modal-footer">
                    <button type="button" id="closePageModal" class="btn btn-sm btn-danger">
                        <i class="fe text-white fe-x"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if (config('services.recaptcha.site_key'))
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer>
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/cute-alert/cute-alert.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            var slider = document.querySelector('.slider');
            var next   = document.querySelector('.next');
            var prev   = document.querySelector('.prev');
            var dots   = document.querySelectorAll('.dot');

            if (!slider || !next || !prev) return;

            var slides = document.querySelectorAll('.slide');
            var index  = 0;

            function showSlide(i) {
                if (i >= slides.length) index = 0;
                else if (i < 0) index = slides.length - 1;
                else index = i;

                slider.style.transform = 'translateX(-' + (index * 100) + '%)';

                dots.forEach(function(dot) { dot.classList.remove('active'); });
                if (dots[index]) dots[index].classList.add('active');
            }

            next.addEventListener('click', function() { showSlide(index + 1); });
            prev.addEventListener('click', function() { showSlide(index - 1); });

            dots.forEach(function(dot) {
                dot.addEventListener('click', function() {
                    showSlide(parseInt(this.getAttribute('data-slide')));
                });
            });

        });
    </script>
    <script>
        var summernoteToolbarConfig = [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['font-size', ['fontname', 'fontsize']],
            ['color', ['color']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview']],
        ];
    </script>
    <script>
        var route_home = "{{ route('home') }}";
        var route_actual = "{{ url()->current() }}";
        var font_size_menu = "1.1rem";

        // Empêche la fermeture du modal en cliquant à l'extérieur
        var pageModal = new bootstrap.Modal(document.getElementById('pageModal'), {
            backdrop: 'static',
            keyboard: false
        });

        // Animation d'entrée/sortie personnalisée
        var pageModalEl = document.getElementById('pageModal');
        var closeBtn = document.getElementById('closePageModal');


        // Ouvre le modal normalement
        var page = function() {
            pageModal.show();
        }
        // Ferme le modal normalement
        if (closeBtn) {
            closeBtn.onclick = function() {
                pageModal.hide();
            }
        }

        // Amélioration boutons : active
        $('.btnClick').on('click', function() {
            $('.btnClick').removeClass('active');
            $(this).addClass('active');
        });

        var edit = function() {
            $('#editModal').modal();
        }

        var pageSetting = function() {
            document.location.href = "{{ route('back.settings.index') }}";
        }
    </script>
    @stack('js')

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                cuteAlert({
                    type: 'success',
                    title: 'Succès',
                    message: '{{ addslashes(session('success')) }}',
                    btnText: 'OK'
                });
            });
        </script>
    @endif

    @if ($errors->has('recaptcha'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                cuteAlert({
                    type: 'error',
                    title: 'Vérification échouée',
                    message: '{{ addslashes($errors->first('recaptcha')) }}',
                    btnText: 'Réessayer'
                });
            });
        </script>
    @endif

    @if (config('services.recaptcha.site_key'))
        <script>
            // reCAPTCHA v3 — formulaires POST hors pageModal uniquement
            // Les formulaires du pageModal sont soumis via AJAX et n'ont pas besoin de reCAPTCHA
            grecaptcha.ready(function() {
                document.querySelectorAll('form[method="POST"]').forEach(function(form) {
                    if (form.closest('#pageModal')) return;
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        var submittedForm = this;
                        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                                action: 'submit'
                            })
                            .then(function(token) {
                                var existing = submittedForm.querySelector(
                                    'input[name="g-recaptcha-response"]');
                                if (existing) existing.remove();
                                var input = document.createElement('input');
                                input.type = 'hidden';
                                input.name = 'g-recaptcha-response';
                                input.value = token;
                                submittedForm.appendChild(input);
                                submittedForm.submit();
                            });
                    });
                });
            });
        </script>
    @endif
</body>

</html>
