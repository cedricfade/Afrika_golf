@extends('back.main', ['title' => 'MCN CGP'])
@section('content')
    @include('pageContent.mcn', [
        'bannerImage'      => $cfg['banner_image']       ?? asset('assets_custom/mcn-cgp/bg.jpg'),
        'rightImage'       => $cfg['right_image']        ?? asset('assets_custom/mcn-cgp/logo-mcn-cgp.png'),
        'rightBottomImage' => $cfg['right_bottom_image'] ?? asset('assets_custom/mcn-cgp/valoriser-votre-passion.png'),
    ])

    @push('pageModal')
        <div class="container py-3">

            {{-- ===== IMAGES ===== --}}
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Images</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.ajax.mcn') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="m-2"><i class="fe fe-image me-1"></i> Image de fond</div>
                                    <div class="m-2">
                                        <img src="{{ $cfg['banner_image'] ?? asset('assets_custom/mcn-cgp/bg.jpg') }}"
                                            class="img-preview my-1 rounded" style="height:150px;width:100%;object-fit:cover;">
                                        <input type="file" class="form-control my-2" name="banner_image" accept="image/*">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="m-2"><i class="fe fe-image me-1"></i> Logo MCN CGP</div>
                                    <div class="m-2 bg-secondary">
                                        <img src="{{ $cfg['right_image'] ?? asset('assets_custom/mcn-cgp/logo-mcn-cgp.png') }}"
                                            class="img-preview my-1 rounded" style="height:150px;width:100%;object-fit:cover;">
                                        <input type="file" class="form-control my-2" name="right_image" accept="image/*">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="m-2 d-flex align-items-center gap-1">
                                        <span class="fi fi-fr"></span>
                                        <i class="fe fe-image me-1"></i> Image secondaire
                                    </div>
                                    <div class="m-2 bg-secondary">
                                        <img src="{{ $cfg['right_bottom_image'] ?? asset('assets_custom/mcn-cgp/valoriser-votre-passion.png') }}"
                                            class="img-preview my-1 rounded" style="height:150px;width:100%;object-fit:cover;">
                                        <input type="file" class="form-control my-2" name="right_bottom_image" accept="image/*">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="m-2 d-flex align-items-center gap-1">
                                        <span class="fi fi-gb"></span>
                                        <i class="fe fe-image me-1"></i> Image secondaire
                                    </div>
                                    <div class="m-2 bg-secondary">
                                        <img src="{{ $cfg['right_bottom_image_en'] ?? $cfg['right_bottom_image'] ?? asset('assets_custom/mcn-cgp/valoriser-votre-passion.png') }}"
                                            class="img-preview my-1 rounded" style="height:150px;width:100%;object-fit:cover;">
                                        <input type="file" class="form-control my-2" name="right_bottom_image_en" accept="image/*">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ===== INTRODUCTION ===== --}}
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.mcn') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <span class="fw-semibold">Introduction — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <textarea class="form-control summernote-mcn" name="intro_text_fr">{!! $cfg['intro_text_fr'] ?? ('<p>' . __('mcn.intro') . '</p><ul><li>' . __('mcn.bullet_admin') . '</li><li>' . __('mcn.bullet_conseil') . '</li><li>' . __('mcn.bullet_conservation') . '</li><li>' . __('mcn.bullet_valorisation') . '</li></ul><p>' . __('mcn.intro_closing') . '</p><p><a href="https://www.mcn-cgp.com/">' . __('mcn.learn_more') . '</a></p>') !!}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.mcn') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <span class="fw-semibold">Introduction — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <textarea class="form-control summernote-mcn" name="intro_text_en">{!! $cfg['intro_text_en'] ?? ('<p>' . __('mcn.intro') . '</p><ul><li>' . __('mcn.bullet_admin') . '</li><li>' . __('mcn.bullet_conseil') . '</li><li>' . __('mcn.bullet_conservation') . '</li><li>' . __('mcn.bullet_valorisation') . '</li></ul><p>' . __('mcn.intro_closing') . '</p><p><a href="https://www.mcn-cgp.com/">' . __('mcn.learn_more') . '</a></p>') !!}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ===== SERVICE 1 — NOS ACTIONS ===== --}}
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.mcn') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <i class="fe fe-layers ms-1"></i>
                            <span class="fw-semibold">Nos actions — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Titre</label>
                                <input type="text" class="form-control" name="service1_title_fr"
                                    value="{{ $cfg['service1_title_fr'] ?? __('mcn.actions_title') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Texte</label>
                                <textarea class="form-control summernote-mcn" name="service1_text_fr" rows="4">{!! $cfg['service1_text_fr'] ?? __('mcn.actions_text') !!}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.mcn') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <i class="fe fe-layers ms-1"></i>
                            <span class="fw-semibold">Our actions — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control" name="service1_title_en"
                                    value="{{ $cfg['service1_title_en'] ?? __('mcn.actions_title') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Text</label>
                                <textarea class="form-control summernote-mcn" name="service1_text_en" rows="4">{!! $cfg['service1_text_en'] ?? __('mcn.actions_text') !!}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ===== SERVICE 2 — VALEUR AJOUTÉE ===== --}}
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.mcn') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <i class="fe fe-layers ms-1"></i>
                            <span class="fw-semibold">Notre valeur ajoutée — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Titre</label>
                                <input type="text" class="form-control" name="service2_title_fr"
                                    value="{{ $cfg['service2_title_fr'] ?? __('mcn.value_title') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Texte</label>
                                <textarea class="form-control summernote-mcn" name="service2_text_fr" rows="5">{!! $cfg['service2_text_fr'] ?? (__('mcn.value_text1') . '<br><br>' . __('mcn.value_text2') . '<br><br>' . __('mcn.value_text3')) !!}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.mcn') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <i class="fe fe-layers ms-1"></i>
                            <span class="fw-semibold">Our added value — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control" name="service2_title_en"
                                    value="{{ $cfg['service2_title_en'] ?? __('mcn.value_title') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Text</label>
                                <textarea class="form-control summernote-mcn" name="service2_text_en" rows="5">{!! $cfg['service2_text_en'] ?? (__('mcn.value_text1') . '<br><br>' . __('mcn.value_text2') . '<br><br>' . __('mcn.value_text3')) !!}</textarea>
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
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } });

        function btnOk($btn, origClass, origHtml) {
            $btn.removeClass('btn-primary btn-danger').addClass('btn-success')
                .html('<i class="fe fe-check"></i> OK');
            setTimeout(function () {
                $btn.attr('class', origClass).html(origHtml).prop('disabled', false);
            }, 2000);
        }

        function btnErr($btn, origClass, origHtml, xhr) {
            console.error('MCN save error:', xhr && xhr.responseText);
            $btn.removeClass('btn-primary btn-success').addClass('btn-danger')
                .html('<i class="fe fe-alert-triangle"></i> Erreur');
            setTimeout(function () {
                $btn.attr('class', origClass).html(origHtml).prop('disabled', false);
            }, 3000);
        }

        $('#pageModal').on('submit', 'form', function (e) {
            e.preventDefault();
            var form = this;
            var $form = $(form);
            var $btn = $form.find('button[type="submit"]').first();
            var origHtml  = $btn.html();
            var origClass = $btn.attr('class') || 'btn btn-sm btn-primary';

            $form.find('.summernote-mcn').each(function () {
                $(this).val($(this).summernote('code'));
            });

            $btn.prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm" role="status"></span>');

            $.ajax({
                url         : '{{ route("back.ajax.mcn") }}',
                type        : 'POST',
                data        : new FormData(form),
                processData : false,
                contentType : false,
                success: function (data) {
                    if (data && data.success) btnOk($btn, origClass, origHtml);
                    else btnErr($btn, origClass, origHtml, null);
                },
                error: function (xhr) { btnErr($btn, origClass, origHtml, xhr); }
            });
        });

        $(document).on('change', 'input[type="file"][accept*="image"]', function () {
            var file = this.files[0];
            if (!file) return;
            var $img = $(this).closest('div').find('img.img-preview').first();
            if (!$img.length) return;
            var reader = new FileReader();
            reader.onload = function (e) { $img.attr('src', e.target.result); };
            reader.readAsDataURL(file);
        });

        $(document).ready(function () {
            $('.summernote-mcn').summernote({
                lang    : 'fr-FR',
                height  : 200,
                toolbar : summernoteToolbarConfig,
            });
        });
    </script>
@endpush
