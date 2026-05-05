@extends('back.main', ['title' => 'Exposition'])
@section('content')
    @include('pageContent.exposition', [
        'citation1' =>
            $citation1Fr ?? '<h3>QUAND L\'ART RACONTE L\'AFRIQUE</h3><h3>QUAND LE GOLF CRÉE LE LIEN.</h3>',
        'bannerColor' => $bannerColor ?? '#FFFCF8',
        'subImage' => $subImage ?? asset('assets/images/exposition/image.png'),
        'imageHeader' => $imageHeader ?? asset('assets/images/exposition/banner.png'),
        'expoText' => $expoTextFr ?? '',
        'dateVernissage' => $dateVernissageFr ?? '',
        'dateCatalogue' => $dateCatalogueFr ?? '',
        'galleryImages' => $galleryImages ?? collect(),
    ])

    @push('pageModal')
        <div class="container py-3">

            {{-- ===== BANNIÈRE — Images & couleur (partagé) ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Bannière — Exposition</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.exposition.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Couleur bannière --}}
                        <div class="mb-3">
                            <label for="banner_color_expo" class="form-label fw-semibold">
                                <i class="fe fe-droplet me-1"></i> Couleur de fond de la bannière
                            </label>
                            <div class="d-flex align-items-center gap-3">
                                <input type="color" class="form-control form-control-color" id="banner_color_expo"
                                    name="banner_color" value="{{ $bannerColor ?? '#FFFCF8' }}" style="width:60px; height:38px;"
                                    oninput="document.getElementById('banner_color_text_expo').value=this.value">
                                <input type="text" class="form-control" id="banner_color_text_expo"
                                    value="{{ $bannerColor ?? '#FFFCF8' }}" placeholder="#FFFCF8"
                                    oninput="document.getElementById('banner_color_expo').value=this.value">
                            </div>
                        </div>

                        {{-- Images --}}
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <div class="card h-100 border shadow-none">
                                    <div class="card-header d-flex align-items-center gap-2">
                                        <i class="fe fe-image"></i>
                                        <span class="fw-semibold">Image sous-section</span>
                                        <code class="ms-auto text-muted" style="font-size:.75rem;">subImage</code>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="form-control form-control-sm mb-2" id="sub_image"
                                            name="sub_image" accept="image/*">
                                        @if (!empty($subImage))
                                            <div class="text-center mt-2">
                                                <img src="{{ $subImage }}" alt="Sous-image actuelle"
                                                    class="img-fluid rounded" style="max-height:100px; object-fit:cover;">
                                                <small class="d-block text-muted mt-1">Image actuelle</small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100 border shadow-none">
                                    <div class="card-header d-flex align-items-center gap-2">
                                        <i class="fe fe-image"></i>
                                        <span class="fw-semibold">Image en-tête bannière</span>
                                        <code class="ms-auto text-muted" style="font-size:.75rem;">imageHeader</code>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="form-control form-control-sm mb-2" id="image_header"
                                            name="image_header" accept="image/*">
                                        @if (!empty($imageHeader))
                                            <div class="text-center mt-2">
                                                <img src="{{ $imageHeader }}" alt="En-tête actuelle" class="img-fluid rounded"
                                                    style="max-height:100px; object-fit:cover;">
                                                <small class="d-block text-muted mt-1">Image actuelle</small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer
                        </button>
                    </form>
                </div>
            </div>

            {{-- ===== CITATIONS FR / EN (formulaires séparés) ===== --}}
            <div class="row g-3 mb-4">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.exposition.store') }}" class="card h-100 border-0 shadow-sm">
                        @csrf
                        <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <i class="fe fe-message-circle ms-1"></i>
                            <span class="fw-semibold">Citations — Français</span>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control summernote-citation" name="citation1_fr" rows="3">{!! $citation1Fr ?? '' !!}</textarea>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary w-100">
                                <i class="fe fe-save me-1"></i> Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.exposition.store') }}" class="card h-100 border-0 shadow-sm">
                        @csrf
                        <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <i class="fe fe-message-circle ms-1"></i>
                            <span class="fw-semibold">Citations — English</span>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control summernote-citation" name="citation1_en" rows="3">{!! $citation1En ?? '' !!}</textarea>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary w-100">
                                <i class="fe fe-save me-1"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ===== SECTION EXPOSITION FR / EN (formulaires séparés) ===== --}}
            <div class="row g-3 mb-4">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.exposition.store') }}" class="card h-100 border-0 shadow-sm">
                        @csrf
                        <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <i class="fe fe-align-left ms-1"></i>
                            <span class="fw-semibold">Section Exposition — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Texte principal</label>
                                <textarea class="form-control summernote-expo" name="expo_text_fr" rows="4">{!! $expoTextFr ?? '' !!}</textarea>
                            </div>
                            <hr>
                            <h6 class="fw-semibold mb-2"><i class="fe fe-calendar me-1"></i> Dates</h6>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Date du vernissage</label>
                                <input type="text" class="form-control" name="date_vernissage_fr"
                                    value="{{ $dateVernissageFr ?? '' }}">
                            </div>
                            <div class="mb-0">
                                <label class="form-label fw-semibold">Date du catalogue</label>
                                <input type="text" class="form-control" name="date_catalogue_fr"
                                    value="{{ $dateCatalogueFr ?? '' }}">
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
                    <form method="POST" action="{{ route('back.exposition.store') }}"
                        class="card h-100 border-0 shadow-sm">
                        @csrf
                        <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <i class="fe fe-align-left ms-1"></i>
                            <span class="fw-semibold">Section Exposition — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Main text</label>
                                <textarea class="form-control summernote-expo" name="expo_text_en" rows="4">{!! $expoTextEn ?? '' !!}</textarea>
                            </div>
                            <hr>
                            <h6 class="fw-semibold mb-2"><i class="fe fe-calendar me-1"></i> Dates</h6>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Opening date</label>
                                <input type="text" class="form-control" name="date_vernissage_en"
                                    value="{{ $dateVernissageEn ?? '' }}">
                            </div>
                            <div class="mb-0">
                                <label class="form-label fw-semibold">Catalogue date</label>
                                <input type="text" class="form-control" name="date_catalogue_en"
                                    value="{{ $dateCatalogueEn ?? '' }}">
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

            {{-- ===== GALERIE ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Galerie photos</span>
                    <span class="badge bg-light text-dark ms-auto">{{ ($galleryImages ?? collect())->count() }}</span>
                </div>
                <div class="card-body">

                    @if (($galleryImages ?? collect())->isEmpty())
                        <p class="text-muted fst-italic mb-3">Aucune image dans la galerie.</p>
                    @else
                        <div class="row g-3 mb-3">
                            @foreach ($galleryImages as $slide)
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="card border position-relative overflow-hidden" style="aspect-ratio:4/3;">
                                        <img src="{{ Storage::url($slide->content) }}" alt="" class="w-100 h-100"
                                            style="object-fit:cover;">
                                        <div class="position-absolute top-0 start-0 m-1 d-flex gap-1">
                                            <span class="badge bg-dark bg-opacity-75">{{ $loop->iteration }}</span>
                                            @if ($slide->page === 'destination')
                                                <span class="badge bg-warning text-dark bg-opacity-90"
                                                    title="Image partagée avec Destination">dest.</span>
                                            @endif
                                        </div>
                                        <div class="position-absolute bottom-0 end-0 m-1">
                                            <form method="POST"
                                                action="{{ route('back.exposition.slides.destroy', $slide->id) }}"
                                                onsubmit="return confirm('Supprimer cette image ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                                    <i class="fe fe-trash-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <hr>
                    <h6 class="fw-semibold text-muted mb-3">Ajouter une image</h6>
                    <form method="POST" action="{{ route('back.exposition.slides.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page" value="exposition">
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
    @endpush
@endsection

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    @stack('css2')
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote-citation').summernote({
                lang: 'fr-FR',
                height: 140,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'clear']],
                    ['para', ['paragraph']],
                    ['view', ['codeview']],
                ],
            });
            $('.summernote-expo').summernote({
                lang: 'fr-FR',
                height: 180,
                toolbar: summernoteToolbarConfig,
            });
            document.getElementById('banner_color_expo').addEventListener('input', function() {
                document.getElementById('banner_color_text_expo').value = this.value;
            });
        });
    </script>
@endpush
