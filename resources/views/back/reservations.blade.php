@extends('back.main', ['title' => 'Réservations'])
@section('content')
    @include('pageContent.reservation', [
        'bannerColor' => '#0A140F',
    ])

    @push('pageModal')
        <div class="container py-3">

            {{-- ===== PARTICIPANT ===== --}}
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.reservations') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <i class="fe fe-user ms-1"></i>
                            <span class="fw-semibold">Participation — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Titre</label>
                                <input type="text" class="form-control" name="participation_title_fr"
                                    value="{{ $cfg['participation_title_fr'] ?? __('reservation.participation_title') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Libellé Nationaux</label>
                                <input type="text" class="form-control" name="national_golfers_fr"
                                    value="{{ $cfg['national_golfers_fr'] ?? __('reservation.national_golfers') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Prix Nationaux</label>
                                <input type="text" class="form-control" name="national_price"
                                    value="{{ $cfg['national_price'] ?? '1400$' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Libellé Non-Nationaux</label>
                                <input type="text" class="form-control" name="international_golfers_fr"
                                    value="{{ $cfg['international_golfers_fr'] ?? __('reservation.international_golfers') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Prix Non-Nationaux</label>
                                <input type="text" class="form-control" name="international_price"
                                    value="{{ $cfg['international_price'] ?? '1750$' }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.reservations') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <i class="fe fe-user ms-1"></i>
                            <span class="fw-semibold">Participation — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control" name="participation_title_en"
                                    value="{{ $cfg['participation_title_en'] ?? __('reservation.participation_title') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">National label</label>
                                <input type="text" class="form-control" name="national_golfers_en"
                                    value="{{ $cfg['national_golfers_en'] ?? __('reservation.national_golfers') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">International label</label>
                                <input type="text" class="form-control" name="international_golfers_en"
                                    value="{{ $cfg['international_golfers_en'] ?? __('reservation.international_golfers') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ===== PACKAGE ===== --}}
            @php
                $defaultItems = [
                    __('reservation.package_transport'),
                    __('reservation.package_tournament'),
                    __('reservation.package_dinner'),
                    __('reservation.package_brunch'),
                ];
                $itemsFr = isset($cfg['package_items_fr']) ? json_decode($cfg['package_items_fr'], true) : null;
                $itemsEn = isset($cfg['package_items_en']) ? json_decode($cfg['package_items_en'], true) : null;
                $itemsFr = is_array($itemsFr) && count($itemsFr) ? $itemsFr : $defaultItems;
                $itemsEn = is_array($itemsEn) && count($itemsEn) ? $itemsEn : $defaultItems;
            @endphp
            <div class="row mb-4">

                {{-- Titre FR --}}
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.reservations') }}" class="card mb-3">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <i class="fe fe-package ms-1"></i>
                            <span class="fw-semibold">Package — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <label class="form-label fw-semibold">Titre</label>
                                <input type="text" class="form-control" name="package_title_fr"
                                    value="{{ $cfg['package_title_fr'] ?? __('reservation.package_title') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>

                    {{-- Items FR --}}
                    <div class="card mb-3">
                        <div class="card-header fw-semibold small">Items</div>
                        <ul class="list-group list-group-flush" id="pkg-list-fr">
                            @foreach ($itemsFr as $i => $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $item }}</span>
                                    <button type="button" class="btn btn-sm btn-outline-danger pkg-delete" data-lang="fr"
                                        data-index="{{ $i }}">
                                        <i class="fe fe-trash-2"></i>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                        <div class="card-footer">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm pkg-new-item"
                                    placeholder="Nouvel item…" data-lang="fr">
                                <button type="button" class="btn btn-sm btn-primary pkg-add" data-lang="fr">
                                    <i class="fe fe-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Titre EN --}}
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.reservations') }}" class="card mb-3">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <i class="fe fe-package ms-1"></i>
                            <span class="fw-semibold">Package — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <label class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control" name="package_title_en"
                                    value="{{ $cfg['package_title_en'] ?? __('reservation.package_title') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>

                    {{-- Items EN --}}
                    <div class="card mb-3">
                        <div class="card-header fw-semibold small">Items</div>
                        <ul class="list-group list-group-flush" id="pkg-list-en">
                            @foreach ($itemsEn as $i => $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $item }}</span>
                                    <button type="button" class="btn btn-sm btn-outline-danger pkg-delete" data-lang="en"
                                        data-index="{{ $i }}">
                                        <i class="fe fe-trash-2"></i>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                        <div class="card-footer">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm pkg-new-item"
                                    placeholder="New item…" data-lang="en">
                                <button type="button" class="btn btn-sm btn-primary pkg-add" data-lang="en">
                                    <i class="fe fe-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ===== CONTACTS ===== --}}
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.reservations') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <i class="fe fe-phone ms-1"></i>
                            <span class="fw-semibold">Contacts — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Titre</label>
                                <input type="text" class="form-control" name="contacts_title_fr"
                                    value="{{ $cfg['contacts_title_fr'] ?? __('reservation.contacts_title') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control" name="contact_email"
                                    value="{{ $cfg['contact_email'] ?? 'cmangoua@mcn-cgp.com' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Téléphone</label>
                                <input type="text" class="form-control" name="contact_phone"
                                    value="{{ $cfg['contact_phone'] ?? '+225 07 87 05 03 15' }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.reservations') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <i class="fe fe-phone ms-1"></i>
                            <span class="fw-semibold">Contacts — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control" name="contacts_title_en"
                                    value="{{ $cfg['contacts_title_en'] ?? __('reservation.contacts_title') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    @endpush
@endsection

@push('css')
    @stack('css2')
@endpush

@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        function btnOk($btn, origClass, origHtml) {
            $btn.removeClass('btn-primary btn-danger').addClass('btn-success')
                .html('<i class="fe fe-check"></i> OK');
            setTimeout(function() {
                $btn.attr('class', origClass).html(origHtml).prop('disabled', false);
            }, 2000);
        }

        function btnErr($btn, origClass, origHtml, xhr) {
            console.error('Reservation save error:', xhr && xhr.responseText);
            $btn.removeClass('btn-primary btn-success').addClass('btn-danger')
                .html('<i class="fe fe-alert-triangle"></i> Erreur');
            setTimeout(function() {
                $btn.attr('class', origClass).html(origHtml).prop('disabled', false);
            }, 3000);
        }

        /* ── Package items ── */
        function rebuildList(lang, items) {
            var $ul = $('#pkg-list-' + lang);
            $ul.empty();
            $.each(items, function(i, text) {
                $ul.append(
                    '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                    '<span>' + $('<span>').text(text).html() + '</span>' +
                    '<button type="button" class="btn btn-sm btn-outline-danger pkg-delete" data-lang="' +
                    lang + '" data-index="' + i + '">' +
                    '<i class="fe fe-trash-2"></i></button></li>'
                );
            });
        }

        $('#pageModal').on('click', '.pkg-add', function() {
            var lang = $(this).data('lang');
            var $input = $(this).closest('.input-group').find('.pkg-new-item');
            var text = $input.val().trim();
            if (!text) return;
            $(this).prop('disabled', true);
            $.post('{{ route('back.ajax.reservations.package.add') }}', {
                lang: lang,
                item: text
            }, function(data) {
                if (data.success) {
                    rebuildList(lang, data.items);
                    $input.val('');
                }
            }).always(function() {
                $('.pkg-add[data-lang="' + lang + '"]').prop('disabled', false);
            });
        });

        $('#pageModal').on('keydown', '.pkg-new-item', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                $(this).closest('.input-group').find('.pkg-add').trigger('click');
            }
        });

        $('#pageModal').on('click', '.pkg-delete', function() {
            var lang = $(this).data('lang');
            var index = $(this).data('index');
            var $btn = $(this).prop('disabled', true);
            $.ajax({
                url: '{{ route('back.ajax.reservations.package.delete', ['lang' => '__LANG__', 'index' => '__IDX__']) }}'
                    .replace('__LANG__', lang).replace('__IDX__', index),
                type: 'DELETE',
                success: function(data) {
                    if (data.success) rebuildList(lang, data.items);
                }
            }).always(function() {
                $btn.prop('disabled', false);
            });
        });

        $('#pageModal').on('submit', 'form', function(e) {
            e.preventDefault();
            var form = this;
            var $form = $(form);
            var $btn = $form.find('button[type="submit"]').first();
            var origHtml = $btn.html();
            var origClass = $btn.attr('class') || 'btn btn-sm btn-primary';

            $btn.prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm" role="status"></span>');

            $.ajax({
                url: '{{ route('back.ajax.reservations') }}',
                type: 'POST',
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data && data.success) btnOk($btn, origClass, origHtml);
                    else btnErr($btn, origClass, origHtml, null);
                },
                error: function(xhr) {
                    btnErr($btn, origClass, origHtml, xhr);
                }
            });
        });
    </script>
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
