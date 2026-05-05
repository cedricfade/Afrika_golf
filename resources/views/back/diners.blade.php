@extends('back.main', ['title' => 'Dinners'])
@section('content')
    @include('pageContent.diners', [
        'bannerTitle'   => $bannerTitleFr ?? 'Le Dîner',
        'bannerImage'   => $bannerImage ?? asset('assets/images/diners/banner.png'),
        'introTitle'    => $introTitleFr ?? 'Un dîner sur mesure',
        'introText'     => $introTextFr ?? '',
        'cities'        => $cities ?? [],
        'chefs'         => $chefs ?? collect(),
        'galleryImages' => $galleryImages ?? collect(),
    ])

    @push('pageModal')
        <div class="container py-3">

            {{-- ===== BANNIÈRE ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Bannière</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.diners.store') }}" enctype="multipart/form-data" data-ajax
                        data-reload>
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="banner_title_fr" class="form-label fw-semibold">
                                        <span class="fi fi-fr me-1"></span> Titre de la bannière (FR)
                                    </label>
                                    <input type="text" class="form-control" id="banner_title_fr" name="banner_title_fr"
                                        value="{{ $bannerTitleFr ?? 'Le Dîner' }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="banner_title_en" class="form-label fw-semibold">
                                        <span class="fi fi-gb me-1"></span> Titre de la bannière (EN)
                                    </label>
                                    <input type="text" class="form-control" id="banner_title_en" name="banner_title_en"
                                        value="{{ $bannerTitleEn ?? 'The Dinner' }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 border rounded p-3">
                            <label for="banner_image" class="form-label fw-semibold">
                                <i class="fe fe-image me-1"></i> Image bannière
                                <small class="text-muted fw-normal d-block">Affichée en fond</small>
                            </label>
                            <input type="file" class="form-control form-control-sm mb-2" id="banner_image"
                                name="banner_image" accept="image/*">
                            @if (!empty($bannerImage))
                                <div class="text-center">
                                    <img src="{{ $bannerImage }}" alt="Bannière actuelle" class="img-fluid rounded"
                                        style="max-height:100px; object-fit:cover;">
                                    <small class="d-block text-muted mt-1">Image actuelle</small>
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer la bannière
                        </button>
                    </form>
                </div>
            </div>

            {{-- ===== INTRO FR / EN ===== --}}
            <div class="row g-3 mb-4">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.diners.store') }}" class="card h-100 border-0 shadow-sm"
                        data-ajax>
                        @csrf
                        <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <i class="fe fe-align-left ms-1"></i>
                            <span class="fw-semibold">Section intro — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Titre</label>
                                <input type="text" class="form-control" name="intro_title_fr"
                                    value="{{ $introTitleFr ?? 'Un dîner sur mesure' }}">
                            </div>
                            <div class="mb-0">
                                <label class="form-label fw-semibold">Texte</label>
                                <textarea class="form-control summernote-intro" name="intro_text_fr"
                                    rows="4">{!! $introTextFr ?? '' !!}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary w-100">
                                <i class="fe fe-save me-1"></i> Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.diners.store') }}" class="card h-100 border-0 shadow-sm"
                        data-ajax>
                        @csrf
                        <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <i class="fe fe-align-left ms-1"></i>
                            <span class="fw-semibold">Section intro — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control" name="intro_title_en"
                                    value="{{ $introTitleEn ?? 'A tailor-made dinner' }}">
                            </div>
                            <div class="mb-0">
                                <label class="form-label fw-semibold">Text</label>
                                <textarea class="form-control summernote-intro" name="intro_text_en"
                                    rows="4">{!! $introTextEn ?? '' !!}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary w-100">
                                <i class="fe fe-save me-1"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ===== CHEFS CUISINIERS ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                    <i class="fe fe-user"></i>
                    <span class="fw-semibold">Chefs cuisiniers</span>
                    <span class="badge bg-light text-dark ms-auto">{{ $chefs->count() }}</span>
                </div>
                <div class="card-body">

                    {{-- Liste des chefs existants --}}
                    @forelse ($chefs as $chef)
                        <div class="border rounded p-3 mb-3">
                            <div class="d-flex align-items-center gap-3">
                                @if ($chef->image)
                                    <img src="{{ Storage::url($chef->image) }}"
                                        style="width:55px;height:55px;object-fit:cover;border-radius:50%;">
                                @endif
                                <div class="flex-grow-1">
                                    <strong>{{ $chef->name }}</strong>
                                    @if ($chef->nameLogo)
                                        <img src="{{ Storage::url($chef->nameLogo) }}"
                                            style="height:24px;object-fit:contain;margin-left:10px;">
                                    @endif
                                </div>
                                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse"
                                    data-bs-target="#editChef{{ $chef->id }}">
                                    <i class="fe fe-edit-2"></i>
                                </button>
                                <form method="POST" action="{{ route('back.diners.cookers.destroy', $chef) }}" data-ajax
                                    data-reload data-confirm="Supprimer ce chef ?">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fe fe-trash-2"></i>
                                    </button>
                                </form>
                            </div>

                            {{-- Formulaire d'édition --}}
                            <div class="collapse mt-3" id="editChef{{ $chef->id }}">
                                <form method="POST"
                                    action="{{ route('back.diners.cookers.update', ['cooker' => $chef->id]) }}"
                                    enctype="multipart/form-data" data-ajax data-reload>
                                    @csrf
                                    <div class="mb-2">
                                        <label class="form-label fw-semibold">Nom du chef</label>
                                        <input type="text" class="form-control" name="name" value="{{ $chef->name }}"
                                            required>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label fw-semibold">Biographie (FR)</label>
                                                <textarea class="form-control summernote-chef" name="content_fr" id="editBioFr{{ $chef->id }}" rows="4">{!! $chef->content_fr !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label fw-semibold">Biographie (EN)</label>
                                                <textarea class="form-control summernote-chef" name="content_en" id="editBioEn{{ $chef->id }}" rows="4">{!! $chef->content_en !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Photo</label>
                                            <input type="file" class="form-control form-control-sm" name="image"
                                                accept="image/*">
                                            @if ($chef->image)
                                                <img src="{{ Storage::url($chef->image) }}" class="img-fluid rounded mt-2"
                                                    style="max-height:70px;object-fit:cover;">
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Logo (optionnel)</label>
                                            <input type="file" class="form-control form-control-sm" name="nameLogo"
                                                accept="image/*">
                                            @if ($chef->nameLogo)
                                                <img src="{{ Storage::url($chef->nameLogo) }}" class="img-fluid mt-2"
                                                    style="max-height:50px;object-fit:contain;">
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm w-100 mt-3">
                                        <i class="fe fe-save me-1"></i> Enregistrer les modifications
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center py-2">Aucun chef ajouté.</p>
                    @endforelse

                    <hr>

                    {{-- Formulaire d'ajout --}}
                    <h6 class="fw-semibold mb-3"><i class="fe fe-plus-circle me-1"></i>Ajouter un chef</h6>
                    <form method="POST" action="{{ route('back.diners.cookers.store') }}" enctype="multipart/form-data"
                        data-ajax data-reload>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nom du chef <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Ex: Jean-Pierre Nkosi"
                                required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Biographie - Français <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control summernote-chef" name="content_fr" id="addChefBioFr" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Biographie - Anglais <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control summernote-chef" name="content_en" id="addChefBioEn" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Photo <span class="text-danger">*</span></label>
                                <input type="file" class="form-control form-control-sm" name="image" accept="image/*"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Logo (optionnel)</label>
                                <input type="file" class="form-control form-control-sm" name="nameLogo" accept="image/*">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success w-100 mt-3">
                            <i class="fe fe-user-plus me-1"></i> Ajouter le chef
                        </button>
                    </form>
                </div>
            </div>

            {{-- ===== GALERIE PHOTOS ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Galerie photos</span>
                    <span class="badge bg-light text-dark ms-auto">{{ ($galleryImages ?? collect())->count() }}</span>
                </div>
                <div class="card-body">
                    @forelse ($galleryImages ?? [] as $slide)
                        <div class="d-flex align-items-center justify-content-between border rounded p-2 mb-2">
                            <img src="{{ Storage::url($slide->content) }}" alt=""
                                style="height:60px; width:90px; object-fit:cover; border-radius:4px;">
                            <form method="POST" action="{{ route('back.diners.slides.destroy', $slide->id) }}" data-ajax
                                data-reload data-confirm="Supprimer cette image ?">
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
                    <h6 class="fw-semibold text-muted mb-3">Ajouter une image</h6>
                    <form method="POST" action="{{ route('back.diners.slides.store') }}" enctype="multipart/form-data"
                        data-ajax data-reload>
                        @csrf
                        <input type="hidden" name="page" value="diners">
                        <div class="mb-3">
                            <label class="form-label">Image <span class="text-danger">*</span>
                                <small class="text-muted fw-normal">(JPG, PNG, WEBP — max 5 Mo)</small>
                            </label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fe fe-plus me-1"></i> Ajouter à la galerie
                        </button>
                    </form>
                </div>
            </div>

        </div>

        {{-- Toast de notification AJAX --}}
        <div id="ajaxToast" class="toast align-items-center text-white border-0 position-fixed bottom-0 end-0 m-3"
            role="alert" aria-live="assertive" aria-atomic="true" style="z-index:9999; min-width:280px;">
            <div class="d-flex">
                <div class="toast-body fw-semibold"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endpush
@endsection

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            var summernoteConfig = {
                lang: 'fr-FR',
                height: 180,
                toolbar: summernoteToolbarConfig,
            };

            $('.summernote-intro').summernote(summernoteConfig);
            $('#addChefBioFr').summernote(summernoteConfig);
            $('#addChefBioEn').summernote(summernoteConfig);

            $('[id^="editChef"]').on('shown.bs.collapse', function() {
                var $ta = $(this).find('.summernote-chef');
                if (!$ta.next('.note-editor').length) {
                    $ta.summernote(summernoteConfig);
                }
            });

            // ── Toast helper ──────────────────────────────────────────────────
            var $toast = $('#ajaxToast');
            var toastInstance = bootstrap.Toast.getOrCreateInstance($toast[0], {
                delay: 4000
            });

            function showToast(message, type) {
                $toast.removeClass('bg-success bg-danger').addClass(type === 'success' ? 'bg-success' :
                    'bg-danger');
                $toast.find('.toast-body').html(message);
                toastInstance.show();
            }

            // ── Generic AJAX form handler ─────────────────────────────────────
            $(document).on('submit', 'form[data-ajax]', function(e) {
                e.preventDefault();
                var $form = $(this);

                var confirmMsg = $form.data('confirm');
                if (confirmMsg && !confirm(confirmMsg)) return;

                // Sync Summernote content to underlying textarea before building FormData
                $form.find('textarea').each(function() {
                    if ($(this).next('.note-editor').length) {
                        $(this).val($(this).summernote('code'));
                    }
                });

                var $btn = $form.find('[type="submit"]');
                var btnOriginal = $btn.html();
                $btn.prop('disabled', true).html(
                    '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Enregistrement...'
                );

                $.ajax({
                    url: $form.attr('action'),
                    type: $form.attr('method'),
                    data: new FormData($form[0]),
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        showToast(res.message || 'Opération réussie.', 'success');
                        if ($form.is('[data-reload]')) {
                            setTimeout(function() {
                                location.reload();
                            }, 900);
                        } else {
                            $btn.prop('disabled', false).html(btnOriginal);
                        }
                    },
                    error: function(xhr) {
                        var msg = 'Une erreur est survenue.';
                        if (xhr.responseJSON) {
                            if (xhr.responseJSON.errors) {
                                msg = Object.values(xhr.responseJSON.errors).flat().join(
                                    '<br>');
                            } else if (xhr.responseJSON.message) {
                                msg = xhr.responseJSON.message;
                            }
                        }
                        showToast(msg, 'danger');
                        $btn.prop('disabled', false).html(btnOriginal);
                    },
                });
            });
        });
    </script>
@endpush
