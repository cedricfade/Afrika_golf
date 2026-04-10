@extends('back.main', ['title' => 'Contactez-nous'])
@section('content')
    @include('pageContent.contact', [
        'bannerTitle' => 'Contactez-nous',
        'bannerImage' => asset('assets/images/contact/banner.png'),
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
                            <label for="banner_title" class="form-label fw-semibold">Titre de la bannière</label>
                            <input type="text" class="form-control" id="banner_title" name="banner_title"
                                value="{{ $bannerTitle ?? 'Contactez-nous' }}">
                        </div>
                        <div class="mb-3 border rounded p-3">
                            <label for="banner_image" class="form-label fw-semibold">
                                <i class="fe fe-image me-1"></i> Image bannière
                            </label>
                            <input type="file" class="form-control form-control-sm mb-2" id="banner_image"
                                name="banner_image" accept="image/*">
                            <div class="text-center">
                                <img src="{{ $bannerImage ?? asset('assets/images/contact/banner.png') }}"
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

            {{-- ===== SECTION CONTACT ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                    <i class="fe fe-align-left"></i>
                    <span class="fw-semibold">Contenu de la section</span>
                </div>
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="section_label" class="form-label fw-semibold">
                                Libellé de section <small class="text-muted fw-normal">(en-tête court)</small>
                            </label>
                            <input type="text" class="form-control" id="section_label" name="section_label"
                                value="ENTRER EN CONTACT">
                        </div>
                        <div class="mb-3">
                            <label for="section_title" class="form-label fw-semibold">Titre principal</label>
                            <input type="text" class="form-control" id="section_title" name="section_title"
                                value="Demander une Invitation">
                        </div>
                        <div class="mb-3">
                            <label for="section_text" class="form-label fw-semibold">Texte de description</label>
                            <textarea class="form-control summernote-contact" id="section_text" name="section_text" rows="4">L'Africa Art Golf Cup est un événement exclusif, sur invitation uniquement. Veuillez contacter notre service de conciergerie pour toute question relative à la participation, aux partenariats ou à l'accréditation presse.</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer
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
            $('.summernote-contact').summernote({
                lang: 'fr-FR',
                height: 180,
                toolbar: summernoteToolbarConfig,
            });
        });
    </script>
@endpush
