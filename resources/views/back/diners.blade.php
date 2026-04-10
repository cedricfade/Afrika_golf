@extends('back.main', ['title' => 'Dinners'])
@section('content')
    @include('pageContent.diners', [
        'bannerTitle' => $bannerTitle ?? 'Le diners',
        'bannerImage' => $bannerImage ?? asset('assets/images/diners/banner.png'),
        'introTitle' => $introTitle ?? 'Un diner sur mesure',
        'introText' => $introText ?? '',
        'cities' => $cities ?? [],
        'chefs' => $chefs ?? collect(),
        'galleryImages' => $galleryImages ?? collect(),
    ])

    @push('pageModal')
        <div class="container py-3">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- ===== BANNIÈRE ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Bannière</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.diners.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="banner_title" class="form-label fw-semibold">Titre de la bannière</label>
                            <input type="text" class="form-control" id="banner_title" name="banner_title"
                                value="{{ $bannerTitle ?? 'Le diners' }}">
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

            {{-- ===== SECTION INTRO ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                    <i class="fe fe-align-left"></i>
                    <span class="fw-semibold">Section "Intro"</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.diners.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="intro_title" class="form-label fw-semibold">Titre</label>
                            <input type="text" class="form-control" id="intro_title" name="intro_title"
                                value="{{ $introTitle ?? 'Un diner sur mesure' }}">
                        </div>
                        <div class="mb-3">
                            <label for="intro_text" class="form-label fw-semibold">Texte d'introduction</label>
                            <textarea class="form-control summernote-diners" id="intro_text" name="intro_text" rows="3">{!! $introText ?? '' !!}</textarea>
                        </div>
                        <hr>
                        <h6 class="fw-semibold mb-2">Villes / Dates</h6>
                        <div class="row g-2 mb-3">
                            @php
                                $defaultCities = [
                                    ['name' => 'Marrakech (Maroc)', 'date' => 'Décembre 2025'],
                                    ['name' => 'Kinshasa (RD Congo)', 'date' => 'Février 2026'],
                                    ['name' => 'Abidjan (Côte d\'Ivoire)', 'date' => 'Mars 2026'],
                                    ['name' => 'Abuja (Nigeria)', 'date' => 'Mars 2026'],
                                    ['name' => 'Kigali (Rwanda)', 'date' => 'Mai 2026'],
                                    ['name' => 'Paris / Genève', 'date' => 'Juin 2026'],
                                ];
                                $cityList = !empty($cities) ? $cities : $defaultCities;
                            @endphp
                            @foreach ($cityList as $i => $city)
                                <div class="col-12">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">{{ $i + 1 }}</span>
                                        <input type="text" class="form-control" name="city_name[]"
                                            value="{{ $city['name'] }}" placeholder="Ville">
                                        <input type="text" class="form-control" name="city_date[]"
                                            value="{{ $city['date'] }}" placeholder="Date">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer
                        </button>
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
                                <form method="POST" action="{{ route('back.diners.cookers.destroy', $chef) }}"
                                    onsubmit="return confirm('Supprimer ce chef ?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fe fe-trash-2"></i>
                                    </button>
                                </form>
                            </div>

                            {{-- Formulaire d'édition --}}
                            <div class="collapse mt-3" id="editChef{{ $chef->id }}">
                                <form method="POST" action="{{ route('back.diners.cookers.update', $chef) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2">
                                        <label class="form-label fw-semibold">Nom du chef</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $chef->name }}" required>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label fw-semibold">Biographie</label>
                                        <textarea class="form-control summernote-chef" name="content" id="editBio{{ $chef->id }}" rows="4">{!! $chef->content !!}</textarea>
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
                    <form method="POST" action="{{ route('back.diners.cookers.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nom du chef <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Ex: Jean-Pierre Nkosi"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Biographie <span class="text-danger">*</span></label>
                            <textarea class="form-control summernote-chef" name="content" id="addChefBio" rows="4"></textarea>
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
                            <form method="POST" action="{{ route('back.diners.slides.destroy', $slide->id) }}"
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
                    <form method="POST" action="{{ route('back.diners.slides.store') }}" enctype="multipart/form-data">
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
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['codeview']],
                ],
            };

            // Initialise les summernotes non-collapse
            $('#intro_text').summernote(summernoteConfig);

            // Initialise les summernotes dans les formes collapse au moment de l'ouverture
            $('[id^="editChef"]').on('shown.bs.collapse', function() {
                var $ta = $(this).find('.summernote-chef');
                if (!$ta.next('.note-editor').length) {
                    $ta.summernote(summernoteConfig);
                }
            });

            // Summernote pour le formulaire d'ajout
            $('#addChefBio').summernote(summernoteConfig);
        });
    </script>
@endpush
