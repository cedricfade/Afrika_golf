@extends('back.main', ['title' => 'MCN CGP'])
@section('content')
    @include('pageContent.tournois', [
        'bannerTitle' => $bannerTitle ?? 'Le tournois',
        'bannerImage' => $bannerImage ?? asset('assets/images/tournois/banner.png'),
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
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="banner_title" class="form-label fw-semibold">
                                <i class="fe fe-type me-1"></i> Titre de la bannière
                            </label>
                            <input type="text" class="form-control" id="banner_title" name="banner_title"
                                value="{{ $bannerTitle ?? 'Le tournois' }}">
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

            {{-- ===== SECTION À PROPOS DU TOURNOIS ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                    <i class="fe fe-align-left"></i>
                    <span class="fw-semibold">Section "À propos du tournois"</span>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="about_title" class="form-label fw-semibold">Titre</label>
                            <input type="text" class="form-control" id="about_title" name="about_title"
                                value="Un jeu réinventé">
                        </div>
                        <div class="mb-3">
                            <label for="about_text" class="form-label fw-semibold">Texte de présentation</label>
                            <textarea class="form-control summernote-tournois" id="about_text" name="about_text" rows="4">Ce tournoi prestigieux se déroule sur des parcours de championnat, offrant un cadre idéal pour les rencontres professionnelles et sportives. Organisé sur des parcours de grande qualité, il favorise les échanges et le réseautage, où les affaires se conjuguent harmonieusement avec le jeu.</textarea>
                        </div>
                        <hr>
                        <h6 class="fw-semibold mb-3">Informations clés</h6>
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Format — Titre</label>
                                <input type="text" class="form-control form-control-sm" name="info_format_title"
                                    value="Format">
                                <label class="form-label mt-2">Format — Texte</label>
                                <input type="text" class="form-control form-control-sm" name="info_format_text"
                                    value="Tournoi en équipe avec formule adaptée favorisant compétition et convivialité.">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Participants — Titre</label>
                                <input type="text" class="form-control form-control-sm" name="info_participants_title"
                                    value="Participants">
                                <label class="form-label mt-2">Participants — Texte</label>
                                <input type="text" class="form-control form-control-sm" name="info_participants_text"
                                    value="Plus de 000 participants">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Remise des prix — Titre</label>
                                <input type="text" class="form-control form-control-sm" name="info_prix_title"
                                    value="Remise des prix">
                                <label class="form-label mt-2">Remise des prix — Texte</label>
                                <input type="text" class="form-control form-control-sm" name="info_prix_text"
                                    value="Cérémonie lors du dîner de gala">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer
                        </button>
                    </form>
                </div>
            </div>

            {{-- ===== SECTION PROGRAMME ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                    <i class="fe fe-calendar"></i>
                    <span class="fw-semibold">Section "Programme"</span>
                </div>
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="prog_accroche" class="form-label fw-semibold">Accroche (colonne gauche)</label>
                            <textarea class="form-control summernote-tournois" id="prog_accroche" name="prog_accroche" rows="3">Un rendez-vous d'exception ou la gastronomie fine, l'Art, le Luxe à l'Africaine et le Golf fusionnent.</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="prog_title" class="form-label fw-semibold">Titre principal</label>
                            <input type="text" class="form-control" id="prog_title" name="prog_title"
                                value="Offrez-vous l'expérience Africa Art Golf Cup">
                        </div>
                        <div class="mb-3">
                            <label for="prog_text" class="form-label fw-semibold">Texte</label>
                            <textarea class="form-control summernote-tournois" id="prog_text" name="prog_text" rows="5">Africa Art Golf Cup est un rendez-vous artistique et sportif qui ambitionne de réunir, sur un même lieu — parcours de golf — les amateurs et collectionneurs d'art ainsi que les passionnés de golf. Il est annuel, itinérant en Afrique et hors du continent dans les villes à fort potentiel culturel, favorisant ainsi le rayonnement de l'art et du sport.</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer
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
                            <form method="POST" action="{{ route('back.tournois.slides.destroy', $slide->id) }}"
                                onsubmit="return confirm('Supprimer cette image ?')">
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
                    <form method="POST" action="{{ route('back.tournois.slides.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page" value="tournois">
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
            $('.summernote-tournois').summernote({
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
