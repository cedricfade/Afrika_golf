@extends('back.main', ['title' => 'Backoffice - Accueil'])
@section('content')
    @include('pageContent.home', [
        'description' =>
            $description ??
            'Découvrez l\'Africa Art Golf Cup, un événement unique qui allie l\'art et le golf pour soutenir les autistes adultes. Rejoignez-nous pour une expérience inoubliable de sport, culture et solidarité.',
        'keywords' =>
            $keywords ??
            'Africa Art Golf Cup, golf, art, autisme, événement caritatif, soutien aux autistes adultes',
        'image' => $image ?? asset('assets/images/home/banner.png'),
        'bannerImage' => $bannerImage ?? asset('assets/images/home/banner.png'),
        'middleImage' => $middleImage ?? asset('assets_custom/home/svg/aagc-kigali.svg'),
        'bottomImage' => $bottomImage ?? asset(__('assets_custom/home/png/aagc-golfeur.png')),
        'bannerContent' => $bannerContent ?? __('ACHETER UNE BALLE DE GOLF POUR ACCOMPAGNER LES AUTISTES ADULTES'),
    ])

    @push('pageModal')
        <div class="container py-3">
            {{-- ===== BANNIÈRE ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Bannière principale</span>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Images — ligne 1 : og:image + bannerImage --}}
                        <div class="row g-3 mb-3">

                            {{-- Image bannière (affichage page) --}}
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="m-2">
                                        <i class="fe fe-image me-1"></i> Image bannière
                                    </div>
                                    <div class="m-2">
                                        @if (!empty($bannerImage))
                                            <img src="{{ $bannerImage }}" alt="Bannière actuelle" class="my-1 rounded"
                                                style="height:150px;width:100%; object-fit:cover;">
                                        @endif
                                        <input type="file" class="form-control my-2" name="banner_image" accept="image/*">
                                    </div>
                                    <div class="card-footer">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fe fe-save"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Image du milieu --}}
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="m-2">
                                        <i class="fe fe-image me-1"></i> Image du milieu
                                    </div>
                                    <div class="m-2 bg-secondary">
                                        @if (!empty($middleImage))
                                            <img src="{{ $middleImage }}" alt="Image du milieu actuelle"
                                                class="my-1 w-100 rounded" style="height:150px; object-fit:cover;">
                                        @endif
                                        <input type="file" class="form-control my-2" name="middle_image" accept="image/*">
                                    </div>
                                    <div class="card-footer">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fe fe-save"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Image du bas --}}
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="m-2">
                                        <i class="fe fe-image me-1"></i> Image du bas
                                    </div>
                                    <div class="m-2 bg-secondary">
                                        @if (!empty($bottomImage))
                                            <img src="{{ $bottomImage }}" alt="Image du bas actuelle"
                                                class="my-1 w-100 rounded" style="height:150px; object-fit:cover;">
                                        @endif
                                        <input type="file" class="form-control my-2" name="bottom_image" accept="image/*">
                                    </div>
                                    <div class="card-footer">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fe fe-save"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- ===== À PROPOS ===== --}}
            <div class="card mb-2 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-info"></i>
                    <span class="fw-semibold">Section "À propos"</span>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" enctype="multipart/form-data" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <span class="fw-semibold">À propos — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="about_title_fr" class="form-label fw-semibold">Titre</label>
                                <input type="text" class="form-control" id="about_title_fr" name="about_title_fr"
                                    value="">
                            </div>
                            <div class="mb-3">
                                <label for="about_text_fr" class="form-label fw-semibold">Texte</label>
                                <textarea class="form-control summernote" id="about_text_fr" name="about_text_fr" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="about_image" class="form-label fw-semibold">Image</label>
                                <input type="file" class="form-control" id="about_image" name="about_image" accept="image/*">
                                <img src="{{ asset('assets/images/home/img1.png') }}" alt="About" class="img-fluid mt-2"
                                    style="max-height:120px;">
                            </div>
                            <div class="mb-3">
                                <label for="about_year" class="form-label fw-semibold">Année</label>
                                <input type="text" class="form-control" id="about_year" name="about_year"
                                    value="2026">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fe fe-save me-1"></i>
                            </button>
                        </div>
                    </form>
                    <form method="POST" enctype="multipart/form-data" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <span class="fw-semibold">Concept — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="concept_title_fr" class="form-label fw-semibold">Titre</label>
                                <input type="text" class="form-control" id="concept_title_fr" name="concept_title_fr"
                                    value="">
                            </div>
                            <div class="mb-3">
                                <label for="concept_text_fr" class="form-label fw-semibold">Texte</label>
                                <textarea class="form-control summernote" id="concept_text_fr" name="concept_text_fr" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fe fe-save me-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" enctype="multipart/form-data" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <span class="fw-semibold">À propos — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="about_title_en" class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control" id="about_title_en" name="about_title_en"
                                    value="">
                            </div>
                            <div class="mb-3">
                                <label for="about_text_en" class="form-label fw-semibold">Text</label>
                                <textarea class="form-control summernote" id="about_text_en" name="about_text_en" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="about_image_en" class="form-label fw-semibold">Image</label>
                                <input type="file" class="form-control" id="about_image_en" name="about_image_en"
                                    accept="image/*">
                                <img src="{{ asset('assets/images/home/img1.png') }}" alt="About" class="img-fluid mt-2"
                                    style="max-height:120px;">
                            </div>
                            <div class="mb-3">
                                <label for="about_year_en" class="form-label fw-semibold">Year</label>
                                <input type="text" class="form-control" id="about_year_en" name="about_year_en"
                                    value="2026">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fe fe-save me-1"></i>
                            </button>
                        </div>
                    </form>
                    <form method="POST" enctype="multipart/form-data" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <span class="fw-semibold">Concept — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="concept_title_en" class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control" id="concept_title_en" name="concept_title_en"
                                    value="">
                            </div>
                            <div class="mb-3">
                                <label for="concept_text_en" class="form-label fw-semibold">Text</label>
                                <textarea class="form-control summernote" id="concept_text_en" name="concept_text_en" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fe fe-save me-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <form method="POST" enctype="multipart/form-data" class="card mb-4">
                @csrf
                <div class="card-header">
                    Section Fondations
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="fondation_img1" class="form-label">Image 1</label>
                            <input type="file" class="form-control" id="fondation_img1" name="fondation_img1">
                            <img src="{{ asset('assets/images/home/img4.png') }}" alt="Fondation 1" class="img-fluid mt-2"
                                style="max-height:80px;">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="fondation_img2" class="form-label">Image 2</label>
                            <input type="file" class="form-control" id="fondation_img2" name="fondation_img2">
                            <img src="{{ asset('assets/images/home/img3.png') }}" alt="Fondation 2" class="img-fluid mt-2"
                                style="max-height:80px;">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="fondation_img3" class="form-label">Image 3</label>
                            <input type="file" class="form-control" id="fondation_img3" name="fondation_img3">
                            <img src="{{ asset('assets/images/home/img5.png') }}" alt="Fondation 3" class="img-fluid mt-2"
                                style="max-height:80px;">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fe fe-save"></i>
                    </button>
                </div>
            </form>
            <form method="POST" enctype="multipart/form-data" class="mb-4 card">
                <div class="card-header">Section Hôte de l’édition - Français</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="edition_title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="edition_title" name="edition_title"
                            value="HÔTE DE L’ÉDITION 2026">
                    </div>
                    <div class="mb-3">
                        <label for="edition_city" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="edition_city" name="edition_city" value="Kigali">
                    </div>
                    <div class="mb-3">
                        <label for="edition_text" class="form-label">Texte</label>
                        <textarea class="form-control summernote" id="edition_text" name="edition_text" rows="3">Découvrez le Pays des Mille Collines...</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edition_image" class="form-label">Image de fond</label>
                        <input type="file" class="form-control" id="edition_image" name="edition_image">
                        <img src="{{ asset('assets/images/home/img6.png') }}" alt="Edition" class="img-fluid mt-2"
                            style="max-height:120px;">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fe fe-save"></i>
                    </button>
                </div>
            </form>
            <form method="POST" enctype="multipart/form-data" class="mb-4 card">
                <div class="card-header">Section Contact</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="contact_title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="contact_title" name="contact_title"
                            value="Demander une Invitation">
                    </div>
                    <div class="mb-3">
                        <label for="contact_text" class="form-label">Texte</label>
                        <textarea class="form-control summernote" id="contact_text" name="contact_text" rows="3">L'Africa Art Golf Cup est un événement exclusif...</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="contact_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="contact_email" name="contact_email"
                            value="Concierge@africaartgolfcup.com">
                    </div>
                    <div class="mb-3">
                        <label for="contact_phone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="contact_phone" name="contact_phone"
                            value="+225 27 20 00 00 00">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fe fe-save"></i>
                    </button>
                </div>
            </form>
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
                toolbar: summernoteToolbarConfig,
                callbacks: {
                    onInit: function() {
                        $(this).closest('.note-editor').css('z-index', 1);
                    }
                }
            });
        });
    </script>
@endpush
