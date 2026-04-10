@extends('back.main', ['title' => 'Expérience'])
@section('content')
    @include('pageContent.experience', [
        'bannerColor' => $bannerColor ?? '#0A140F',
        'packs' => $packs ?? collect(),
    ])

    @push('pageModal')
        <div class="container py-3">

            {{-- ===== BANNIÈRE ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-droplet"></i>
                    <span class="fw-semibold">Bannière — Expérience</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.experience.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="banner_color_exp" class="form-label fw-semibold">
                                <i class="fe fe-droplet me-1"></i> Couleur de fond de la bannière
                            </label>
                            <div class="d-flex align-items-center gap-3">
                                <input type="color" class="form-control form-control-color" id="banner_color_exp"
                                    name="banner_color" value="{{ $bannerColor ?? '#0A140F' }}" style="width:60px; height:38px;"
                                    oninput="document.getElementById('banner_color_text_exp').value=this.value">
                                <input type="text" class="form-control" id="banner_color_text_exp"
                                    value="{{ $bannerColor ?? '#0A140F' }}" placeholder="#0A140F"
                                    oninput="document.getElementById('banner_color_exp').value=this.value">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer
                        </button>
                    </form>
                </div>
            </div>

            {{-- ===== PACKS ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-package"></i>
                    <span class="fw-semibold">Packs de partenariat</span>
                    <span class="badge bg-secondary ms-auto">{{ ($packs ?? collect())->count() }} pack(s)</span>
                </div>
                <div class="card-body">

                    {{-- Liste des packs existants --}}
                    @forelse ($packs ?? [] as $pack)
                        <div class="border rounded mb-3 overflow-hidden">
                            {{-- En-tête du pack --}}
                            <div class="d-flex align-items-center gap-3 p-3 bg-light">
                                <img src="{{ Storage::url($pack->image) }}" alt="{{ $pack->title }}"
                                    style="width:60px; height:60px; object-fit:cover; border-radius:6px;">
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">{{ $pack->title }}</div>
                                    <div class="small text-muted">{{ $pack->space }} —
                                        {{ number_format($pack->price, 0, ',', ' ') }} USD</div>
                                </div>
                                <button class="btn btn-sm btn-outline-primary me-1" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#edit-pack-{{ $pack->id }}">
                                    <i class="fe fe-edit-2"></i> Éditer
                                </button>
                                <form method="POST" action="{{ route('back.experience.packs.destroy', $pack->id) }}"
                                    onsubmit="return confirm('Supprimer ce pack ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fe fe-trash-2"></i>
                                    </button>
                                </form>
                            </div>

                            {{-- Formulaire d'édition (collapse) --}}
                            <div class="collapse p-3 border-top" id="edit-pack-{{ $pack->id }}">
                                <form method="POST" action="{{ route('back.experience.packs.update', $pack->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Titre</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $pack->title }}" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold">Espace / Niveau</label>
                                            <input type="text" class="form-control" name="space"
                                                value="{{ $pack->space }}" placeholder="Ex: PARTENAIRE élégance" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold">Prix (USD)</label>
                                            <input type="number" class="form-control" name="price"
                                                value="{{ $pack->price }}" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Symbole / Description</label>
                                            <textarea class="form-control summernote-pack-edit" name="symbole" rows="3" required>{!! $pack->symbole !!}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Nouvelle image (optionnel)</label>
                                            <input type="file" class="form-control" name="image" accept="image/*">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fe fe-save me-1"></i> Enregistrer les modifications
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted fst-italic mb-4">Aucun pack ajouté pour le moment.</p>
                    @endforelse

                    {{-- Formulaire d'ajout d'un nouveau pack --}}
                    <div class="border-top pt-3 mt-2">
                        <h6 class="fw-semibold mb-3">
                            <i class="fe fe-plus-circle me-1 text-primary"></i> Ajouter un pack
                        </h6>
                        <form method="POST" action="{{ route('back.experience.packs.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Titre</label>
                                    <input type="text" class="form-control" name="title" placeholder="Ex: IMIGONGO"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Espace / Niveau</label>
                                    <input type="text" class="form-control" name="space"
                                        placeholder="Ex: PARTENAIRE élégance" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Prix (USD)</label>
                                    <input type="number" class="form-control" name="price" placeholder="7500" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Symbole / Description</label>
                                    <textarea class="form-control" id="addPackSymbole" name="symbole" rows="3"
                                        placeholder="Description HTML du pack..." required></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Image du pack</label>
                                    <input type="file" class="form-control" name="image" accept="image/*" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fe fe-plus me-1"></i> Créer le pack
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
    @stack('css2')
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

            // Summernote pour le formulaire d'ajout
            $('#addPackSymbole').summernote(summernoteConfig);

            // Summernote dans les collapses d'édition (initialisation au moment de l'ouverture)
            $('[id^="edit-pack-"]').on('shown.bs.collapse', function() {
                var $ta = $(this).find('.summernote-pack-edit');
                if (!$ta.next('.note-editor').length) {
                    $ta.summernote(summernoteConfig);
                }
            });
        });
    </script>
@endpush
