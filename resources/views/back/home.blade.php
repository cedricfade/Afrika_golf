@extends('back.main', ['title' => 'Backoffice - Accueil'])
@section('content')
    @include('pageContent.home', [
        'description' =>
            $description ??
            'Découvrez l\'Africa Art Golf Cup, un événement unique qui allie l\'art et le golf pour soutenir les autistes adultes. Rejoignez-nous pour une expérience inoubliable de sport, culture et solidarité.',
        'keywords' =>
            $keywords ??
            'Africa Art Golf Cup, golf, art, autisme, événement caritatif, soutien aux autistes adultes',
        'image' => $cfg['banner_image'] ?? asset('assets/images/home/banner.png'),
        'bannerImage' => $cfg['banner_image'] ?? asset('assets/images/home/banner.png'),
        'middleImage' => $cfg['middle_image'] ?? asset('assets_custom/home/svg/aagc-kigali.svg'),
        'bottomImage' =>
            (app()->getLocale() === 'en' ? $cfg['bottom_image_en'] ?? null : null) ??
            ($cfg['bottom_image'] ?? asset('assets_custom/home/png/aagc-golfeur.png')),
        'bannerContent' =>
            (app()->getlocale() == 'fr' ? $cfg['banner_content_fr'] : $cfg['banner_content_en']) ??
            __('ACHETER UNE BALLE DE GOLF POUR ACCOMPAGNER LES AUTISTES ADULTES'),
    ])

    @push('pageModal')
        <div class="container py-3">
            {{-- ===== SEO ===== --}}
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fe fe-search"></i>
                    <span class="fw-semibold">SEO / Méta-données</span>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <form method="POST" class="card">
                                @csrf
                                <div class="card-header d-flex align-items-center gap-2">
                                    <span class="fi fi-fr"></span>
                                    <span class="fw-semibold">SEO — Français</span>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="seo_description_fr" class="form-label">Description</label>
                                        <textarea class="form-control" id="seo_description_fr" name="seo_description_fr" rows="3">{{ $cfg['seo_description_fr'] ?? ($description ?? '') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="seo_keywords_fr" class="form-label">Mots-clés</label>
                                        <input type="text" class="form-control" id="seo_keywords_fr" name="seo_keywords_fr"
                                            value="{{ $cfg['seo_keywords_fr'] ?? ($keywords ?? '') }}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <form method="POST" class="card">
                                @csrf
                                <div class="card-header d-flex align-items-center gap-2">
                                    <span class="fi fi-gb"></span>
                                    <span class="fw-semibold">SEO — English</span>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="seo_description_en" class="form-label">Description</label>
                                        <textarea class="form-control" id="seo_description_en" name="seo_description_en" rows="3">{{ $cfg['seo_description_en'] ?? ($description_en ?? '') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="seo_keywords_en" class="form-label fw-semibold">Keywords</label>
                                        <input type="text" class="form-control" id="seo_keywords_en" name="seo_keywords_en"
                                            value="{{ $cfg['seo_keywords_en'] ?? ($keywords_en ?? '') }}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fe fe-save"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="m-2">
                                        <i class="fe fe-image me-1"></i> Image bannière
                                    </div>
                                    <div class="m-2">
                                        <img src="{{ $cfg['banner_image'] ?? asset('assets/images/home/banner.png') }}"
                                            class="img-preview my-1 rounded" style="height:150px;width:100%;object-fit:cover;">
                                        <input type="file" class="form-control my-2" name="banner_image" accept="image/*">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fe fe-save"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- Image du milieu --}}
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="m-2">
                                        <i class="fe fe-image me-1"></i> Image du milieu
                                    </div>
                                    <div class="m-2 bg-secondary">
                                        <img src="{{ $cfg['middle_image'] ?? asset('assets_custom/home/svg/aagc-kigali.svg') }}"
                                            class="img-preview my-1 w-100 rounded" style="height:150px;object-fit:cover;">
                                        <input type="file" class="form-control my-2" name="middle_image" accept="image/*">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fe fe-save"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- Image du bas — Français --}}
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="m-2 d-flex align-items-center gap-2">
                                        <span class="fi fi-fr"></span>
                                        <span><i class="fe fe-image me-1"></i> Image du bas</span>
                                    </div>
                                    <div class="m-2 bg-secondary">
                                        <img src="{{ $cfg['bottom_image'] ?? asset('assets_custom/home/png/aagc-golfeur.png') }}"
                                            class="img-preview my-1 w-100 rounded" style="height:150px;object-fit:cover;">
                                        <input type="file" class="form-control my-2" name="bottom_image"
                                            accept="image/*">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fe fe-save"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- Image du bas — English --}}
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="m-2 d-flex align-items-center gap-2">
                                        <span class="fi fi-gb"></span>
                                        <span><i class="fe fe-image me-1"></i> Image du bas</span>
                                    </div>
                                    <div class="m-2 bg-secondary">
                                        <img src="{{ $cfg['bottom_image_en'] ?? ($cfg['bottom_image'] ?? asset('assets_custom/home/png/aagc-golfeur.png')) }}"
                                            class="img-preview my-1 w-100 rounded" style="height:150px;object-fit:cover;">
                                        <input type="file" class="form-control my-2" name="bottom_image_en"
                                            accept="image/*">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fe fe-save"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Texte bannière FR / EN --}}
                        <div class="row g-3 mt-2">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="m-2 d-flex align-items-center gap-2">
                                        <span class="fi fi-fr"></span>
                                        <span class="fw-semibold">Texte bannière — Français</span>
                                    </div>
                                    <div class="m-2">
                                        <textarea class="form-control" name="banner_content_fr" rows="3">{{ $cfg['banner_content_fr'] ?? '' }}</textarea>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-sm btn-primary"><i
                                                class="fe fe-save"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="m-2 d-flex align-items-center gap-2">
                                        <span class="fi fi-gb"></span>
                                        <span class="fw-semibold">Banner text — English</span>
                                    </div>
                                    <div class="m-2">
                                        <textarea class="form-control" name="banner_content_en" rows="3">{{ $cfg['banner_content_en'] ?? '' }}</textarea>
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
                                <label for="about_image" class="form-label fw-semibold">Image</label>
                                <input type="file" class="form-control" id="about_image" name="about_image"
                                    accept="image/*">
                                <img src="{{ $cfg['about_image'] ?? asset('assets/images/home/img1.png') }}"
                                    class="img-preview img-fluid mt-2" style="max-height:120px;">
                            </div>
                            <div class="mb-3">
                                <label for="about_year" class="form-label fw-semibold">Année</label>
                                <input type="text" class="form-control" id="about_year" name="about_year"
                                    value="{{ $cfg['about_year'] ?? '2026' }}">
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
                                    value="{{ $cfg['concept_title_fr'] ?? __('ajax_home.about_concept_title') }}">
                            </div>
                            <div class="mb-3">
                                <label for="concept_text_fr" class="form-label fw-semibold">Texte</label>
                                <textarea class="form-control summernote" id="concept_text_fr" name="concept_text_fr" rows="4">{!! $cfg['concept_text_fr'] ?? __('ajax_home.about_concept_text') !!}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fe fe-save me-1"></i>
                            </button>
                        </div>
                    </form>
                    <form method="POST" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <span class="fw-semibold">MCN — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="mcn_title_fr" class="form-label fw-semibold">Titre</label>
                                <input type="text" class="form-control" id="mcn_title_fr" name="mcn_title_fr"
                                    value="{{ $cfg['mcn_title_fr'] ?? __('ajax_home.about_mcn_title') }}">
                            </div>
                            <div class="mb-3">
                                <label for="mcn_text_fr" class="form-label fw-semibold">Texte</label>
                                <textarea class="form-control summernote" id="mcn_text_fr" name="mcn_text_fr" rows="4">{!! $cfg['mcn_text_fr'] ?? __('ajax_home.about_mcn_text') !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="mcn_link_fr" class="form-label fw-semibold">Texte du lien</label>
                                <input type="text" class="form-control" id="mcn_link_fr" name="mcn_link_fr"
                                    value="{{ $cfg['mcn_link_fr'] ?? __('ajax_home.about_mcn_link') }}">
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
                                <label for="about_image_en" class="form-label fw-semibold">Image</label>
                                <input type="file" class="form-control" id="about_image_en" name="about_image_en"
                                    accept="image/*">
                                <img src="{{ $cfg['about_image_en'] ?? asset('assets/images/home/img1.png') }}"
                                    class="img-preview img-fluid mt-2" style="max-height:120px;">
                            </div>
                            <div class="mb-3">
                                <label for="about_year_en" class="form-label fw-semibold">Year</label>
                                <input type="text" class="form-control" id="about_year_en" name="about_year_en"
                                    value="{{ $cfg['about_year'] ?? '2026' }}">
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
                                    value="{{ $cfg['concept_title_en'] ?? __('ajax_home.about_concept_title') }}">
                            </div>
                            <div class="mb-3">
                                <label for="concept_text_en" class="form-label fw-semibold">Text</label>
                                <textarea class="form-control summernote" id="concept_text_en" name="concept_text_en" rows="4">{!! $cfg['concept_text_en'] ?? __('ajax_home.about_concept_text') !!}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fe fe-save me-1"></i>
                            </button>
                        </div>
                    </form>
                    <form method="POST" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <span class="fw-semibold">MCN — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="mcn_title_en" class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control" id="mcn_title_en" name="mcn_title_en"
                                    value="{{ $cfg['mcn_title_en'] ?? __('ajax_home.about_mcn_title') }}">
                            </div>
                            <div class="mb-3">
                                <label for="mcn_text_en" class="form-label fw-semibold">Text</label>
                                <textarea class="form-control summernote" id="mcn_text_en" name="mcn_text_en" rows="4">{!! $cfg['mcn_text_en'] ?? __('ajax_home.about_mcn_text') !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="mcn_link_en" class="form-label fw-semibold">Link text</label>
                                <input type="text" class="form-control" id="mcn_link_en" name="mcn_link_en"
                                    value="{{ $cfg['mcn_link_en'] ?? __('ajax_home.about_mcn_link') }}">
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

            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" enctype="multipart/form-data" class="card mb-4">
                        @csrf
                        <div class="card-header">
                            Section Fondations - Francais
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fondation_img1" class="form-label">Image 1</label>
                                    <input type="file" class="form-control" id="fondation_img1" name="fondation_img1">
                                    <img src="{{ $cfg['fondation_img1'] ?? asset('assets/images/home/img4.png') }}"
                                        class="img-preview img-thumbnail mt-2" style="max-height:200px;">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fondation_img2" class="form-label">Image 2</label>
                                    <input type="file" class="form-control" id="fondation_img2" name="fondation_img2">
                                    <img src="{{ $cfg['fondation_img2'] ?? asset('assets/images/home/img3.png') }}"
                                        class="img-preview img-thumbnail mt-2" style="max-height:200px;">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fondation_img3" class="form-label">Image 3</label>
                                    <input type="file" class="form-control" id="fondation_img3" name="fondation_img3">
                                    <img src="{{ $cfg['fondation_img3'] ?? asset('assets/images/home/img5.png') }}"
                                        class="img-preview img-thumbnail mt-2" style="max-height:200px;">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fe fe-save"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" enctype="multipart/form-data" class="card mb-4">
                        @csrf
                        <div class="card-header">
                            Section Fondations - Anglais
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Image 1</label>
                                    <input type="file" class="form-control" name="fondation_img1_en">
                                    <img src="{{ $cfg['fondation_img1_en'] ?? asset('assets/images/home/img4.png') }}"
                                        class="img-preview img-thumbnail mt-2" style="max-height:200px;">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Image 2</label>
                                    <input type="file" class="form-control" name="fondation_img2_en">
                                    <img src="{{ $cfg['fondation_img2_en'] ?? asset('assets/images/home/img3.png') }}"
                                        class="img-preview img-thumbnail mt-2" style="max-height:200px;">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Image 3</label>
                                    <input type="file" class="form-control" name="fondation_img3_en">
                                    <img src="{{ $cfg['fondation_img3_en'] ?? asset('assets/images/home/img5.png') }}"
                                        class="img-preview img-thumbnail mt-2" style="max-height:200px;">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fe fe-save"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" enctype="multipart/form-data" class="mb-4 card">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span> Section Hôte de l'édition — Français
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Titre</label>
                                <input type="text" class="form-control" name="edition_title_fr"
                                    value="{{ $cfg['edition_title_fr'] ?? __('ajax_home.edition_host') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ville</label>
                                <input type="text" class="form-control" name="edition_city"
                                    value="{{ $cfg['edition_city'] ?? __('ajax_home.edition_city') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Texte</label>
                                <textarea class="form-control summernote" name="edition_text_fr" rows="3">{!! $cfg['edition_text_fr'] ?? __('ajax_home.edition_text') !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image de fond</label>
                                <input type="file" class="form-control" name="edition_image" accept="image/*">
                                <img src="{{ $cfg['edition_image'] ?? asset('assets/images/home/img6.png') }}"
                                    class="img-preview img-fluid mt-2" style="max-height:120px;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Texte du bouton "Explorer"</label>
                                <input type="text" class="form-control" name="edition_explore_fr"
                                    value="{{ $cfg['edition_explore_fr'] ?? __('ajax_home.edition_explore') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fe fe-save"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" enctype="multipart/form-data" class="mb-4 card">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span> Section Host of the Edition — English
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="edition_title_en"
                                    value="{{ $cfg['edition_title_en'] ?? __('ajax_home.edition_host') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">City (shared)</label>
                                <input type="text" class="form-control" name="edition_city"
                                    value="{{ $cfg['edition_city'] ?? __('ajax_home.edition_city') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Text</label>
                                <textarea class="form-control summernote" name="edition_text_en" rows="3">{!! $cfg['edition_text_en'] ?? __('ajax_home.edition_text') !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Background image (shared)</label>
                                <input type="file" class="form-control" name="edition_image" accept="image/*">
                                <img src="{{ $cfg['edition_image'] ?? asset('assets/images/home/img6.png') }}"
                                    class="img-preview img-fluid mt-2" style="max-height:120px;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Explore button text</label>
                                <input type="text" class="form-control" name="edition_explore_en"
                                    value="{{ $cfg['edition_explore_en'] ?? __('ajax_home.edition_explore') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fe fe-save"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- ===== INFO RÉSERVATION ===== --}}
            <div class="card mb-2 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-map-pin"></i>
                    <span class="fw-semibold">Section "Info Réservation" (conciergerie)</span>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <span class="fw-semibold">Info Réservation — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="reservation_address_fr" class="form-label fw-semibold">Adresse MCN</label>
                                <input type="text" class="form-control" name="reservation_address"
                                    value="{{ $cfg['reservation_address'] ?? 'Abidjan Plateau, Côte d\'Ivoire' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Libellé Concierge (FR)</label>
                                <input type="text" class="form-control" name="reservation_concierge_label_fr"
                                    value="{{ $cfg['reservation_concierge_label_fr'] ?? __('partials.concierge') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email Concierge</label>
                                <input type="email" class="form-control" name="reservation_concierge_email"
                                    value="{{ $cfg['reservation_concierge_email'] ?? 'cmangoua@mcn-cgp.com' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Téléphone Concierge</label>
                                <input type="text" class="form-control" name="reservation_concierge_phone"
                                    value="{{ $cfg['reservation_concierge_phone'] ?? '+225 07 87 05 03 15' }}">
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
                    <form method="POST" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <span class="fw-semibold">Info Reservation — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">MCN Address (shared)</label>
                                <input type="text" class="form-control" name="reservation_address"
                                    value="{{ $cfg['reservation_address'] ?? 'Abidjan Plateau, Côte d\'Ivoire' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Concierge label (EN)</label>
                                <input type="text" class="form-control" name="reservation_concierge_label_en"
                                    value="{{ $cfg['reservation_concierge_label_en'] ?? __('partials.concierge') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Concierge email (shared)</label>
                                <input type="email" class="form-control" name="reservation_concierge_email"
                                    value="{{ $cfg['reservation_concierge_email'] ?? 'cmangoua@mcn-cgp.com' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Concierge phone (shared)</label>
                                <input type="text" class="form-control" name="reservation_concierge_phone"
                                    value="{{ $cfg['reservation_concierge_phone'] ?? '+225 07 87 05 03 15' }}">
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

            {{-- ===== INFO PARTICIPATION ===== --}}
            <div class="card mb-2 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-dollar-sign"></i>
                    <span class="fw-semibold">Section "Info Participation" (tarifs)</span>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-fr"></span>
                            <span class="fw-semibold">Info Participation — Français</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="participation_title_fr" class="form-label fw-semibold">Titre section</label>
                                <input type="text" class="form-control" id="participation_title_fr"
                                    name="participation_title_fr"
                                    value="{{ $cfg['participation_title_fr'] ?? __('partials.participation_title') }}">
                            </div>
                            <div class="mb-3">
                                <label for="non_national_price_fr" class="form-label fw-semibold">Tarif non-nationaux</label>
                                <input type="text" class="form-control" id="non_national_price_fr"
                                    name="non_national_price"
                                    value="{{ $cfg['non_national_price'] ?? __('partials.non_national_price') }}">
                            </div>
                            <div class="mb-3">
                                <label for="discover_offers_fr" class="form-label fw-semibold">Texte du lien offres</label>
                                <input type="text" class="form-control" id="discover_offers_fr" name="discover_offers_fr"
                                    value="{{ $cfg['discover_offers_fr'] ?? __('partials.discover_offers') }}">
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
                    <form method="POST" class="card mb-4">
                        @csrf
                        <div class="card-header d-flex align-items-center gap-2">
                            <span class="fi fi-gb"></span>
                            <span class="fw-semibold">Info Participation — English</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="participation_title_en" class="form-label fw-semibold">Section title</label>
                                <input type="text" class="form-control" id="participation_title_en"
                                    name="participation_title_en"
                                    value="{{ $cfg['participation_title_en'] ?? __('partials.participation_title') }}">
                            </div>
                            <div class="mb-3">
                                <label for="non_national_price_en" class="form-label fw-semibold">Non-nationals price
                                    (shared)</label>
                                <input type="text" class="form-control" id="non_national_price_en"
                                    name="non_national_price"
                                    value="{{ $cfg['non_national_price'] ?? __('partials.non_national_price') }}">
                            </div>
                            <div class="mb-3">
                                <label for="discover_offers_en" class="form-label fw-semibold">Partnership link text</label>
                                <input type="text" class="form-control" id="discover_offers_en" name="discover_offers_en"
                                    value="{{ $cfg['discover_offers_en'] ?? __('partials.discover_offers') }}">
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

            {{-- Réseaux Sociaux --}}
            <div class="card-header bg-dark text-white mb-3">
                <i class="fe fe-share-2 me-2"></i> Réseaux Sociaux
            </div>
            <div class="row mb-4">
                <div class="col-lg-8">
                    <form method="POST" class="card mb-4">
                        @csrf
                        <div class="card-header">Liens des réseaux sociaux</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="social_instagram" class="form-label fw-semibold">
                                    <i class="fa-brands fa-instagram me-1"></i> Instagram
                                </label>
                                <input type="url" class="form-control" id="social_instagram" name="social_instagram"
                                    value="{{ $cfg['social_instagram'] ?? 'https://www.instagram.com/africa.art.golf?igsh=ZmlxYjRydmx2ZXZq' }}">
                            </div>
                            <div class="mb-3">
                                <label for="social_linkedin" class="form-label fw-semibold">
                                    <i class="fa-brands fa-linkedin-in me-1"></i> LinkedIn
                                </label>
                                <input type="url" class="form-control" id="social_linkedin" name="social_linkedin"
                                    value="{{ $cfg['social_linkedin'] ?? 'https://www.linkedin.com/company/africa-art-golf/' }}">
                            </div>
                            <div class="mb-3">
                                <label for="social_twitter" class="form-label fw-semibold">
                                    <i class="fa-brands fa-x-twitter me-1"></i> X / Twitter
                                </label>
                                <input type="url" class="form-control" id="social_twitter" name="social_twitter"
                                    value="{{ $cfg['social_twitter'] ?? 'https://x.com/africa_art_golf' }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fe fe-save"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Package Participants --}}
            <div class="card-header bg-dark text-white mb-3">
                <i class="fe fe-list me-2"></i> Package Participants
            </div>
            <div class="row mb-4">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.home.store') }}" class="card mb-4">
                        @csrf
                        <div class="card-header">
                            <span class="fi fi-fr me-1"></span> Package Participants — Français
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Titre</label>
                                <input type="text" class="form-control" name="package_title_fr"
                                    value="{{ $cfg['package_title_fr'] ?? __('partials.package_title') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Items</label>
                                <div id="package-items-fr">
                                    @foreach ($packageItemsFr ?? [] as $item)
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="package_items_fr[]"
                                                value="{{ $item }}">
                                            <button type="button" class="btn btn-outline-danger btn-remove-item"
                                                title="Supprimer">
                                                <i class="fe fe-x"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-success mt-1"
                                    onclick="addPackageItem('package-items-fr', 'package_items_fr[]')">
                                    <i class="fe fe-plus me-1"></i> Ajouter un item
                                </button>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Détails (lien)</label>
                                <input type="text" class="form-control" name="package_details_fr"
                                    value="{{ $cfg['package_details_fr'] ?? __('partials.package_details') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fe fe-save"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('back.home.store') }}" class="card mb-4">
                        @csrf
                        <div class="card-header">
                            <span class="fi fi-gb me-1"></span> Package Participants — English
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control" name="package_title_en"
                                    value="{{ $cfg['package_title_en'] ?? __('partials.package_title') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Items</label>
                                <div id="package-items-en">
                                    @foreach ($packageItemsEn ?? [] as $item)
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="package_items_en[]"
                                                value="{{ $item }}">
                                            <button type="button" class="btn btn-outline-danger btn-remove-item"
                                                title="Remove">
                                                <i class="fe fe-x"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-success mt-1"
                                    onclick="addPackageItem('package-items-en', 'package_items_en[]')">
                                    <i class="fe fe-plus me-1"></i> Add item
                                </button>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Details (link text)</label>
                                <input type="text" class="form-control" name="package_details_en"
                                    value="{{ $cfg['package_details_en'] ?? __('partials.package_details') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fe fe-save"></i>
                            </button>
                        </div>
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
        // ── CSRF global ──────────────────────────────────────────────────────────
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        // ── Helpers bouton ───────────────────────────────────────────────────────
        function btnOk($btn, origClass, origHtml) {
            $btn.removeClass('btn-primary btn-danger').addClass('btn-success')
                .html('<i class="fe fe-check"></i> OK');
            setTimeout(function() {
                $btn.attr('class', origClass).html(origHtml).prop('disabled', false);
            }, 2000);
        }

        function btnErr($btn, origClass, origHtml, xhr) {
            console.error('AJAX home save error:', xhr && xhr.responseText);
            $btn.removeClass('btn-primary btn-success').addClass('btn-danger')
                .html('<i class="fe fe-alert-triangle"></i> Erreur');
            setTimeout(function() {
                $btn.attr('class', origClass).html(origHtml).prop('disabled', false);
            }, 3000);
        }

        // ── Sauvegarde AJAX : tous les forms du pageModal ───────────────────────
        $('#pageModal').on('submit', 'form', function(e) {
            e.preventDefault();
            var form = this;
            var $form = $(form);
            var $btn = $form.find('button[type="submit"]').first();
            var origHtml = $btn.html();
            var origClass = $btn.attr('class') || 'btn btn-sm btn-primary';

            // Sync Summernote editors to their hidden textarea before reading FormData
            $form.find('.summernote').each(function() {
                $(this).val($(this).summernote('code'));
            });

            $btn.prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm" role="status"></span>');

            $.ajax({
                url: '{{ route('back.ajax.home') }}',
                type: 'POST',
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data && data.success) {
                        btnOk($btn, origClass, origHtml);
                    } else {
                        btnErr($btn, origClass, origHtml, null);
                    }
                },
                error: function(xhr) {
                    btnErr($btn, origClass, origHtml, xhr);
                }
            });
        });

        // ── Prévisualisation image à la sélection ────────────────────────────────
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

        // ── Package items : ajout / suppression ──────────────────────────────────
        function addPackageItem(containerId, inputName) {
            var container = document.getElementById(containerId);
            var row = document.createElement('div');
            row.className = 'input-group mb-2';
            row.innerHTML =
                '<input type="text" class="form-control" name="' + inputName + '" placeholder="Nouvel item...">' +
                '<button type="button" class="btn btn-outline-danger btn-remove-item" title="Supprimer">' +
                '<i class="fe fe-x"></i></button>';
            container.appendChild(row);
            row.querySelector('input').focus();
        }

        $(document).on('click', '.btn-remove-item', function() {
            $(this).closest('.input-group').remove();
        });

        // ── Summernote ───────────────────────────────────────────────────────────
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
