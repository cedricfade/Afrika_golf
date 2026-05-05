@extends('front.main', ['title' => 'ACCOMPAGNEMENT'])

@section('content')
    @include('pageContent.accompagnon', [
        'bannerTitle' => $bannerTitle,
        'bannerImage' => $bannerImage,
    ])
@endsection

@push('css')
    @stack('css2')
@endpush

@push('js')
    @stack('jsAccompagnon')
    <script>
        (function () {
            $.get('{{ route('accompagnon.ajax.content') }}', function (data) {
                $('[data-acc]').each(function () {
                    var key = $(this).data('acc');
                    if (data[key] === undefined || data[key] === null) return;
                    if ($(this).data('acc-html')) {
                        $(this).html(data[key]);
                    } else {
                        $(this).text(data[key]);
                    }
                });
            });
        })();
    </script>
@endpush
