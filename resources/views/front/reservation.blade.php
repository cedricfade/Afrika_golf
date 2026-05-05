@extends('front.main', ['title' => 'Réservations'])

@section('content')
    @include('pageContent.reservation', [
        'bannerColor' => '#0A140F',
    ])
@endsection

@push('css')
    @stack('css2')
@endpush

@push('js')
    <script>
        (function() {
            $.get('{{ route('ajax.reservations.content') }}', function(data) {
                $('[data-res]').each(function() {
                    var key = $(this).data('res');
                    if (data[key] !== undefined && data[key] !== null) {
                        $(this).text(data[key]);
                    }
                });

                $('[data-res-mailto]').each(function() {
                    var key = $(this).data('res-mailto');
                    if (data[key]) $(this).attr('href', 'mailto:' + data[key]).text(data[key]);
                });

                $('[data-res-tel]').each(function() {
                    var key = $(this).data('res-tel');
                    if (data[key]) $(this).attr('href', 'tel:' + data[key]).text(data[key]);
                });

                console.log(data);

                if (data.package_items && data.package_items.length) {
                    var $list = $('[data-res-list="package_items"]');
                    $list.empty();
                    $.each(data.package_items, function(i, item) {
                        $list.append(
                            '<span style="color:#c6c6c6;font-size:14px;font-family:\'AveniNext\'">- ' +
                            $('<span>').text(item).html() +
                            '</span><br>'
                        );
                    });
                }
            });
        })();
    </script>
@endpush
