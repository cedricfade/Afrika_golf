@extends('back.main', ['title' => 'Destination KIGALI'])
@section('content')
    @include('pageContent.destination', [
        'bannerImage' => $bannerImage ?? asset('assets/images/destination/banner.png'),
        'bannerTitle' => $bannerTitle ?? 'Kigali, Rwanda',
        'bannerDescription' => $bannerDescription ?? '',
        'sousTitle' => $sousTitle ?? 'ÉDITION 2026',
        'galleryImages' => $galleryImages ?? collect(),
    ])

    @push('pageModal')
        <div class="container py-3">
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-map-pin"></i>
                    <span class="fw-semibold">Bannière — Destination Kigali</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.destination.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="banner_title" class="form-label fw-semibold">
                                <i class="fe fe-type me-1"></i> Titre
                            </label>
                            <input type="text" class="form-control" id="banner_title" name="banner_title"
                                value="{{ $bannerTitle ?? 'Kigali, Rwanda' }}">
                        </div>
                        <div class="mb-3">
                            <label for="sous_title" class="form-label fw-semibold">
                                <i class="fe fe-type me-1"></i> Sous-titre
                                <small class="text-muted fw-normal">(ex : ÉDITION 2026)</small>
                            </label>
                            <input type="text" class="form-control" id="sous_title" name="sous_title"
                                value="{{ $sousTitle ?? 'ÉDITION 2026' }}">
                        </div>
                        <div class="mb-3">
                            <label for="banner_description" class="form-label fw-semibold">
                                <i class="fe fe-align-left me-1"></i> Description de la bannière
                            </label>
                            <textarea class="form-control summernote" id="banner_description" name="banner_description" rows="3">{{ $bannerDescription ?? '' }}</textarea>
                        </div>
                        <div class="mb-3 border rounded p-3">
                            <label for="banner_image" class="form-label fw-semibold">
                                <i class="fe fe-image me-1"></i> Image bannière
                                <small class="text-muted fw-normal d-block">Affichée en fond de la bannière</small>
                            </label>
                            <input type="file" class="form-control form-control-sm mb-2" id="banner_image"
                                name="banner_image" accept="image/*">
                            @if (!empty($bannerImage))
                                <div class="text-center">
                                    <img src="{{ $bannerImage }}" alt="Bannière actuelle" class="img-fluid rounded"
                                        style="max-height:110px; object-fit:cover;">
                                    <small class="d-block text-muted mt-1">Image actuelle</small>
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer
                        </button>
                    </form>
                </div>
            </div>

            {{-- Galerie --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Galerie photos</span>
                </div>
                <div class="card-body">

                    {{-- Liste existante --}}
                    @forelse ($galleryImages ?? [] as $slide)
                        <div class="d-flex align-items-center justify-content-between border rounded p-2 mb-2">
                            <img src="{{ Storage::url($slide->content) }}" alt=""
                                style="height:60px; width:90px; object-fit:cover; border-radius:4px;">
                            <form method="POST" action="{{ route('back.destination.slides.destroy', $slide->id) }}"
                                onsubmit="return confirm('Supprimer cette image ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fe fe-trash-2"></i>
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-muted fst-italic mb-3">Aucune image dans la galerie.</p>
                    @endforelse

                    {{-- Formulaire d'ajout --}}
                    <hr>
                    <h6 class="fw-semibold text-muted mb-3">Ajouter une image</h6>
                    <form method="POST" action="{{ route('back.destination.slides.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page" value="destination">
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
    @stack('css2')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                lang: 'fr-FR',
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview']],
                ],
            });
        });
    </script>
@endpush
