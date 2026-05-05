@extends('back.main', ['title' => 'ACCOMPAGNEMENT'])
@section('content')
    @include('pageContent.accompagnon', [
        'bannerTitle' =>
            app()->getLocale() === 'fr'
                ? $cfg['banner_title_fr'] ?? __('accompagnon.banner_title')
                : $cfg['banner_title_en'] ?? __('accompagnon.banner_title'),
        'bannerImage' => $cfg['banner_image'] ?? asset('assets/images/accompagnon/banner.jpg'),
    ])

    @push('pageModal')
        <div class="container py-3">

            {{-- ===== IMAGE BANNIÈRE ===== --}}
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Image bannière</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.ajax.accompagnon') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 justify-content-center">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="m-2"><i class="fe fe-image me-1"></i> Bannière</div>
                                    <div class="m-2">
                                        <img src="{{ $cfg['banner_image'] ?? asset('assets/images/accompagnon/banner.jpg') }}"
                                            class="img-preview my-1 rounded" style="height:150px;width:100%;object-fit:cover;">
                                        <input type="file" class="form-control my-2" name="banner_image" accept="image/*">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-sm btn-primary"><i
                                                class="fe fe-save"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ===== TITRE BANNIÈRE ===== --}}
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.accompagnon') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <i class="fe fe-type ms-1"></i>
                            <span class="fw-semibold">Titre bannière — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <input type="text" class="form-control" name="banner_title_fr"
                                    value="{{ $cfg['banner_title_fr'] ?? __('accompagnon.banner_title') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.accompagnon') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <i class="fe fe-type ms-1"></i>
                            <span class="fw-semibold">Banner title — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <input type="text" class="form-control" name="banner_title_en"
                                    value="{{ $cfg['banner_title_en'] ?? __('accompagnon.banner_title') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ===== CONTENU ===== --}}
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.accompagnon') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <i class="fe fe-align-left ms-1"></i>
                            <span class="fw-semibold">Contenu — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Texte</label>
                                <textarea class="form-control summernote-accompagnon" name="content_text_fr">{!! $cfg['content_text_fr'] ?? __('ajax_accompagnon.content_text') !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Bouton "Programme"</label>
                                <input type="text" class="form-control" name="btn_programme_fr"
                                    value="{{ $cfg['btn_programme_fr'] ?? __('ajax_accompagnon.content_btn_programme') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Bouton "Réserver"</label>
                                <input type="text" class="form-control" name="btn_reserve_fr"
                                    value="{{ $cfg['btn_reserve_fr'] ?? __('ajax_accompagnon.content_btn_reserve') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.accompagnon') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <i class="fe fe-align-left ms-1"></i>
                            <span class="fw-semibold">Content — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Text</label>
                                <textarea class="form-control summernote-accompagnon" name="content_text_en">{!! $cfg['content_text_en'] ?? __('ajax_accompagnon.content_text') !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">"Programme" button</label>
                                <input type="text" class="form-control" name="btn_programme_en"
                                    value="{{ $cfg['btn_programme_en'] ?? __('ajax_accompagnon.content_btn_programme') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">"Reserve" button</label>
                                <input type="text" class="form-control" name="btn_reserve_en"
                                    value="{{ $cfg['btn_reserve_en'] ?? __('ajax_accompagnon.content_btn_reserve') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ===== TITRE FORMULAIRE ===== --}}
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.accompagnon') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <i class="fe fe-file-text ms-1"></i>
                            <span class="fw-semibold">Titre formulaire — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <input type="text" class="form-control" name="form_title_fr"
                                    value="{{ $cfg['form_title_fr'] ?? __('ajax_accompagnon.form_title') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.accompagnon') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <i class="fe fe-file-text ms-1"></i>
                            <span class="fw-semibold">Form title — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <input type="text" class="form-control" name="form_title_en"
                                    value="{{ $cfg['form_title_en'] ?? __('ajax_accompagnon.form_title') }}">
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    @stack('css2')
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
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
            console.error('Accompagnon save error:', xhr && xhr.responseText);
            $btn.removeClass('btn-primary btn-success').addClass('btn-danger')
                .html('<i class="fe fe-alert-triangle"></i> Erreur');
            setTimeout(function() {
                $btn.attr('class', origClass).html(origHtml).prop('disabled', false);
            }, 3000);
        }

        $('#pageModal').on('submit', 'form', function(e) {
            e.preventDefault();
            var form = this;
            var $form = $(form);
            var $btn = $form.find('button[type="submit"]').first();
            var origHtml = $btn.html();
            var origClass = $btn.attr('class') || 'btn btn-sm btn-primary';

            $form.find('.summernote-accompagnon').each(function() {
                $(this).val($(this).summernote('code'));
            });

            $btn.prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm" role="status"></span>');

            $.ajax({
                url: '{{ route('back.ajax.accompagnon') }}',
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

        $(document).on('change', 'input[type="file"][accept*="image"]', function() {
            var file = this.files[0];
            if (!file) return;
            var $img = $(this).closest('div').find('img.img-preview').first();
            if (!$img.length) return;
            var reader = new FileReader();
            reader.onload = function(e) {
                $img.attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        });

        $(document).ready(function() {
            $('.summernote-accompagnon').summernote({
                lang: 'fr-FR',
                height: 200,
                toolbar: summernoteToolbarConfig,
            });
        });
    </script>
@endpush
