@extends('back.main', ['title' => 'Nos rendez-vous'])
@section('content')
    @include('pageContent.partenaires', [
        'bannerTitle' => $bannerTitle ?? 'Partenaires',
        'bannerImage' => $bannerImage ?? asset('assets/images/partenaire/banner.png'),
        'sectionTitle' => $sectionTitle ?? 'Partenaires distingués',
        'sectionIntro' => $sectionIntro ?? '',
        'partners' => $partners ?? collect(),
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
                    <form method="POST" action="{{ route('back.partenaires.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="banner_title" class="form-label fw-semibold">Titre de la bannière</label>
                            <input type="text" class="form-control" id="banner_title" name="banner_title"
                                value="{{ $bannerTitle ?? 'Partenaires' }}">
                        </div>
                        <div class="mb-3 border rounded p-3">
                            <label for="banner_image" class="form-label fw-semibold">
                                <i class="fe fe-image me-1"></i> Image bannière
                            </label>
                            <input type="file" class="form-control form-control-sm mb-2" id="banner_image"
                                name="banner_image" accept="image/*">
                            <div class="text-center">
                                <img src="{{ $bannerImage ?? asset('assets/images/partenaire/banner.png') }}"
                                    class="img-fluid rounded" style="max-height:100px; object-fit:cover;">
                                <small class="d-block text-muted mt-1">Image actuelle</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer la bannière
                        </button>
                    </form>
                </div>
            </div>

            {{-- ===== SECTION INTRO ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                    <i class="fe fe-align-left"></i>
                    <span class="fw-semibold">Section — Partenaires</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.partenaires.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="section_title" class="form-label fw-semibold">Titre de la section</label>
                            <input type="text" class="form-control" id="section_title" name="section_title"
                                value="{{ $sectionTitle ?? 'Partenaires distingués' }}">
                        </div>
                        <div class="mb-3">
                            <label for="section_intro" class="form-label fw-semibold">Texte d'introduction</label>
                            <textarea class="form-control summernote-partenaires" id="section_intro" name="section_intro" rows="4">{{ $sectionIntro ?? '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer
                        </button>
                    </form>
                </div>
            </div>

            {{-- ===== LOGOS PARTENAIRES ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-grid"></i>
                    <span class="fw-semibold">Logos des partenaires</span>
                    <span class="badge bg-secondary ms-auto">{{ $partners->count() }} logo(s)</span>
                </div>
                <div class="card-body">

                    {{-- Liste des logos existants --}}
                    @if ($partners->isNotEmpty())
                        <div class="row g-3 mb-4">
                            @foreach ($partners as $logo)
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="border rounded p-2 text-center position-relative">
                                        <img src="{{ Storage::url($logo->image) }}" alt="{{ $logo->libelle }}"
                                            class="img-fluid mb-2" style="max-height:80px; object-fit:contain;">
                                        <p class="small fw-semibold mb-2 text-truncate">{{ $logo->libelle }}</p>
                                        <form method="POST" action="{{ route('back.partenaires.logos.destroy', $logo->id) }}"
                                            onsubmit="return confirm('Supprimer ce logo ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger w-100">
                                                <i class="fe fe-trash-2 me-1"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted fst-italic mb-4">Aucun logo ajouté pour le moment.</p>
                    @endif

                    {{-- Formulaire d'ajout --}}
                    <div class="border-top pt-3">
                        <h6 class="fw-semibold mb-3">
                            <i class="fe fe-plus-circle me-1 text-primary"></i> Ajouter un logo
                        </h6>
                        <form method="POST" action="{{ route('back.partenaires.logos.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3 align-items-end">
                                <div class="col-md-5">
                                    <label class="form-label fw-semibold">Nom du partenaire</label>
                                    <input type="text" class="form-control" name="logo_libelle"
                                        placeholder="Ex: Total Energies" required>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label fw-semibold">Logo (image)</label>
                                    <input type="file" class="form-control" name="logo_image" accept="image/*" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fe fe-plus me-1"></i> Ajouter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
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
            $('.summernote-partenaires').summernote({
                lang: 'fr-FR',
                height: 180,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['codeview']],
                ],
            });
        });
    </script>
@endpush
