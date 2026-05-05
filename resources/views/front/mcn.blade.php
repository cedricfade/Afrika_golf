@extends('front.main', ['title' => 'MCN CGP'])

@section('content')
    @include('pageContent.mcn', [
        'bannerImage'      => $bannerImage,
        'rightImage'       => $rightImage,
        'rightBottomImage' => $rightBottomImage,
    ])
@endsection

@push('css')
    @stack('css2')
@endpush

@push('js')
    <script>
        (function () {
            $.get('{{ route('ajax.mcn.content') }}', function (data) {
                $('[data-mcn]').each(function () {
                    var key = $(this).data('mcn');
                    if (data[key] === undefined || data[key] === null) return;
                    if ($(this).data('mcn-html')) {
                        $(this).html(data[key]);
                    } else {
                        $(this).text(data[key]);
                    }
                });
            });
        })();
    </script>
@endpush
