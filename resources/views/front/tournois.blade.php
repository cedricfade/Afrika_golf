@extends('front.main', ['title' => 'Tournoi'])

@section('content')
    @include('pageContent.tournois', [
        'bannerSentenceTitle' => $bannerSentenceTitle,
        'bannerImage'         => $bannerImage,
        'galleryImages'       => $galleryImages,
    ])
@endsection

@push('css')
    @stack('css2')
@endpush

@push('js')
    <script>
        (function () {
            $.get('{{ route('ajax.tournois.content') }}', function (data) {
                $('[data-trn]').each(function () {
                    var key = $(this).data('trn');
                    if (data[key] === undefined || data[key] === null) return;
                    if ($(this).data('trn-html')) {
                        $(this).html(data[key]);
                    } else {
                        $(this).text(data[key]);
                    }
                });
            });
        })();
    </script>
@endpush
