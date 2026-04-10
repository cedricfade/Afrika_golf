@extends('back.main', ['title' => 'Backoffice - Accueil'])
@section('content')
    @include('pageContent.home', [
        'description' =>
            'Découvrez l\'Africa Art Golf Cup, un événement unique qui allie l\'art et le golf pour soutenir les autistes adultes. Rejoignez-nous pour une expérience inoubliable de sport, culture et solidarité.',
        'keywords' => 'Africa Art Golf Cup, golf, art, autisme, événement caritatif, soutien aux autistes adultes',
        'image' => asset('assets/images/home/banner.png'),
        'bannerImage' => asset('assets/images/home/banner.png'),
        'middleImage' => asset('assets_custom/home/svg/aagc-kigali.svg'),
        'bottomImage' => asset('assets_custom/home/svg/aagc-golfeur.svg'),
        'bannerContent' => __('ACHETER UNE BALLE DE GOLF POUR ACCOMPAGNER LES AUTISTES ADULTES'),
    ])

    @push('pageModal')
        <div class="container py-3">

            {{-- ===== BANNIÈRE ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Bannière principale</span>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Titre --}}
                        <div class="mb-3">
                            <label for="banner_title" class="form-label fw-semibold">
                                <i class="fe fe-type me-1"></i> Titre de la bannière
                            </label>
                            <input type="text" class="form-control" id="banner_title" name="banner_title"
                                placeholder="Titre affiché sur la bannière" value="{{ $bannerContent ?? '' }}">
                        </div>

                        {{-- Description (SEO) --}}
                        <div class="mb-3">
                            <label for="banner_description" class="form-label fw-semibold">
                                <i class="fe fe-align-left me-1"></i> Description
                                <small class="text-muted fw-normal">(meta description SEO)</small>
                            </label>
                            <textarea class="form-control summernote" id="banner_description" name="banner_description" rows="3">{{ $description ?? '' }}</textarea>
                        </div>

                        {{-- Mots-clés --}}
                        <div class="mb-3">
                            <label for="banner_keywords" class="form-label fw-semibold">
                                <i class="fe fe-tag me-1"></i> Mots-clés
                                <small class="text-muted fw-normal">(meta keywords, séparés par des virgules)</small>
                            </label>
                            <input type="text" class="form-control" id="banner_keywords" name="banner_keywords"
                                placeholder="golf, art, autisme, événement caritatif..." value="{{ $keywords ?? '' }}">
                        </div>

                        {{-- Images — ligne 1 : og:image + bannerImage --}}
                        <div class="row g-3 mb-3">
                            {{-- Image OG (og:image / SEO) --}}
                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <label for="og_image" class="form-label fw-semibold">
                                        <i class="fe fe-share-2 me-1"></i> Image de partage
                                        <small class="text-muted fw-normal d-block">og:image — réseaux sociaux &amp; SEO</small>
                                    </label>
                                    <input type="file" class="form-control form-control-sm mb-2" id="og_image"
                                        name="og_image" accept="image/*">
                                    @if (!empty($image))
                                        <div class="text-center">
                                            <img src="{{ $image }}" alt="og:image actuelle" class="img-fluid rounded"
                                                style="max-height:110px; object-fit:cover;">
                                            <small class="d-block text-muted mt-1">Image actuelle</small>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Image bannière (affichage page) --}}
                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
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
                            </div>
                        </div>

                        {{-- Images — ligne 2 : middleImage + bottomImage --}}
                        <div class="row g-3 mb-3">
                            {{-- Image du milieu --}}
                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <label for="middle_image" class="form-label fw-semibold">
                                        <i class="fe fe-layout me-1"></i> Image centrale
                                        <small class="text-muted fw-normal d-block">middleImage — section milieu de page</small>
                                    </label>
                                    <input type="file" class="form-control form-control-sm mb-2" id="middle_image"
                                        name="middle_image" accept="image/*,.svg">
                                    @if (!empty($middleImage))
                                        <div class="text-center">
                                            <img src="{{ $middleImage }}" alt="Image centrale actuelle"
                                                class="img-fluid rounded" style="max-height:110px; object-fit:contain;">
                                            <small class="d-block text-muted mt-1">Image actuelle</small>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Image du bas --}}
                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <label for="bottom_image" class="form-label fw-semibold">
                                        <i class="fe fe-arrow-down-circle me-1"></i> Image bas de page
                                        <small class="text-muted fw-normal d-block">bottomImage — section bas de page</small>
                                    </label>
                                    <input type="file" class="form-control form-control-sm mb-2" id="bottom_image"
                                        name="bottom_image" accept="image/*,.svg">
                                    @if (!empty($bottomImage))
                                        <div class="text-center">
                                            <img src="{{ $bottomImage }}" alt="Image bas actuelle" class="img-fluid rounded"
                                                style="max-height:110px; object-fit:contain;">
                                            <small class="d-block text-muted mt-1">Image actuelle</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer la bannière
                        </button>
                    </form>
                </div>
            </div>

            <hr>
            <h3 class="mb-3">Section "À propos"</h3>
            <form method="POST" enctype="multipart/form-data" class="mb-4">
                <div class="mb-3">
                    <label for="about_title" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="about_title" name="about_title" value="à propos de MCN">
                </div>
                <div class="mb-3">
                    <label for="about_text" class="form-label">Texte</label>
                    <textarea class="form-control summernote" id="about_text" name="about_text" rows="4">MCN - CGP est spécialisée dans la gestion des patrimoines artistiques...</textarea>
                </div>
                <div class="mb-3">
                    <label for="about_image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="about_image" name="about_image">
                    <img src="{{ asset('assets/images/home/img1.png') }}" alt="About" class="img-fluid mt-2"
                        style="max-height:120px;">
                </div>
                <div class="mb-3">
                    <label for="about_year" class="form-label">Année</label>
                    <input type="text" class="form-control" id="about_year" name="about_year" value="2026">
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer la section "À propos"</button>
            </form>

            <hr>
            <h3 class="mb-3">Section Fondations</h3>
            <form method="POST" enctype="multipart/form-data" class="mb-4">
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
                <button type="submit" class="btn btn-primary">Enregistrer les fondations</button>
            </form>

            <hr>
            <h3 class="mb-3">Section Hôte de l’édition</h3>
            <form method="POST" enctype="multipart/form-data" class="mb-4">
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
                <button type="submit" class="btn btn-primary">Enregistrer la section édition</button>
            </form>

            <hr>
            <h3 class="mb-3">Section Contact</h3>
            <form method="POST" enctype="multipart/form-data" class="mb-4">
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
                <button type="submit" class="btn btn-primary">Enregistrer le contact</button>
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
