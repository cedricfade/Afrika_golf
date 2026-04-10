@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerTitle' => $bannerTitle ?? 'MENER UNE VIE PLEINE ET RICHE AVEC L’AUTISME',
    'bannerImage' => $bannerImage ?? asset('assets/images/accompagnon/banner.jpg'),
])

@push('css2')
    <style>
        .banner {
            margin: 0;
            padding: 30px;
            padding-bottom: 50px;
            height: 100vh;

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        .banner-titre h1 {
            font-size: clamp(1.5em, 5vw, 7.8em) !important;
            color: #fff !important;
            font-family: "AveniNext" !important;
            font-weight: 100;

        }
    </style>
@endpush

<section class='accompagnon'>
    <div id="content"></div>
    <div id="formPage"></div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')

@push('js2')
    <script>
        var contentView = function() {
            $('#content').load("{{ route('accompagnon.ajax.content') }}");
        };

        var formPageView = function() {
            $('#formPage').load("{{ route('accompagnon.ajax.formPage') }}");
        };

        $(document).ready(function() {
            contentView();
            formPageView();
        });
    </script>
@endpush
