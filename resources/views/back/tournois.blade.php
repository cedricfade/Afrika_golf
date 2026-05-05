@extends('back.main', ['title' => 'Tournoi'])
@section('content')
    @include('pageContent.tournois', [
        'bannerSentenceTitle' => $cfg['banner_title_fr'] ?? __('tournois.banner_title'),
        'bannerImage' => $cfg['banner_image'] ?? asset('assets/images/tournois/banner.png'),
        'galleryImages' => $galleryImages,
    ])

    @push('pageModal')
        <div class="container py-3">

            {{-- ===== IMAGE ===== --}}
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Image bannière</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.ajax.tournois') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 justify-content-center">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="m-2"><i class="fe fe-image me-1"></i> Bannière</div>
                                    <div class="m-2">
                                        <img src="{{ $cfg['banner_image'] ?? asset('assets/images/tournois/banner.png') }}"
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
                    <form method="POST" action="{{ route('back.ajax.tournois') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <i class="fe fe-type ms-1"></i>
                            <span class="fw-semibold">Titre bannière — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <input type="text" class="form-control" name="banner_title_fr"
                                    value="{{ $cfg['banner_title_fr'] ?? __('tournois.banner_title') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.tournois') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <i class="fe fe-type ms-1"></i>
                            <span class="fw-semibold">Banner title — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <input type="text" class="form-control" name="banner_title_en"
                                    value="{{ $cfg['banner_title_en'] ?? __('tournois.banner_title') }}">
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
                    <form method="POST" action="{{ route('back.ajax.tournois') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <span class="fw-semibold">Contenu — Français</span>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control summernote-trn" name="content_fr">{!! $cfg['content_fr'] ?? $defaultFr !!}</textarea>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.ajax.tournois') }}" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <span class="fw-semibold">Content — English</span>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control summernote-trn" name="content_en">{!! $cfg['content_en'] ?? $defaultEn !!}</textarea>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ===== GALERIE ===== --}}
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Galerie photos</span>
                    <span class="badge bg-secondary ms-auto">{{ $galleryImages->count() }}</span>
                </div>
                <div class="card-body">
                    @forelse ($galleryImages as $slide)
                        <div class="d-flex align-items-center justify-content-between border rounded p-2 mb-2">
                            <img src="{{ Storage::url($slide->content) }}" alt=""
                                style="height:60px;width:90px;object-fit:cover;border-radius:4px;">
                            <form method="POST" action="{{ route('back.tournois.slides.destroy', $slide->id) }}"
                                data-no-ajax onsubmit="return confirm('Supprimer cette image ?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fe fe-trash-2"></i>
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-muted fst-italic mb-3">Aucune image dans la galerie.</p>
                    @endforelse
                    <hr>
                    <form method="POST" action="{{ route('back.tournois.slides.store') }}" enctype="multipart/form-data"
                        data-no-ajax>
                        @csrf
                        <input type="hidden" name="page" value="tournois">
                        <div class="input-group">
                            <input type="file" class="form-control" name="image" accept="image/*">
                            <button type="submit" class="btn btn-success"><i class="fe fe-plus"></i></button>
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
            console.error('Tournois save error:', xhr && xhr.responseText);
            $btn.removeClass('btn-primary btn-success').addClass('btn-danger')
                .html('<i class="fe fe-alert-triangle"></i> Erreur');
            setTimeout(function() {
                $btn.attr('class', origClass).html(origHtml).prop('disabled', false);
            }, 3000);
        }

        $('#pageModal').on('submit', 'form:not([data-no-ajax])', function(e) {
            e.preventDefault();
            var form = this;
            var $form = $(form);
            var $btn = $form.find('button[type="submit"]').first();
            var origHtml = $btn.html();
            var origClass = $btn.attr('class') || 'btn btn-sm btn-primary';

            $form.find('.summernote-trn').each(function() {
                $(this).val($(this).summernote('code'));
            });

            $btn.prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm" role="status"></span>');

            $.ajax({
                url: '{{ route('back.ajax.tournois') }}',
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
            $('.summernote-trn').summernote({
                lang: 'fr-FR',
                height: 300,
                toolbar: summernoteToolbarConfig,
            });
        });
    </script>
@endpush
