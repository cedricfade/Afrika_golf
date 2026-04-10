@extends('back.main', ['title' => 'MCN CGP'])
@section('content')
    @include('pageContent.mcn', [
        'bannerImage' => $bannerImage ?? asset('assets_custom/mcn-cgp/bg.jpg'),
        'rightImage' => $rightImage ?? asset('assets_custom/mcn-cgp/logo-mcn-cgp.png'),
        'rightBottomImage' => $rightBottomImage ?? asset('assets_custom/mcn-cgp/valoriser-votre-passion.png'),
    ])

    @push('pageModal')
        <div class="container py-3">
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Bannière — MCN CGP</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.mcn-cgp.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <div class="border rounded p-3 h-100">
                                    <label for="banner_image" class="form-label fw-semibold">
                                        <i class="fe fe-image me-1"></i> Image fond bannière
                                        <small class="text-muted fw-normal d-block">bannerImage</small>
                                    </label>
                                    <input type="file" class="form-control form-control-sm mb-2" id="banner_image"
                                        name="banner_image" accept="image/*">
                                    @if (!empty($bannerImage))
                                        <div class="text-center">
                                            <img src="{{ $bannerImage }}" alt="Bannière actuelle" class="img-fluid rounded"
                                                style="max-height:90px; object-fit:cover;">
                                            <small class="d-block text-muted mt-1">Image actuelle</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border rounded p-3 h-100">
                                    <label for="right_image" class="form-label fw-semibold">
                                        <i class="fe fe-image me-1"></i> Logo MCN-CGP
                                        <small class="text-muted fw-normal d-block">rightImage</small>
                                    </label>
                                    <input type="file" class="form-control form-control-sm mb-2" id="right_image"
                                        name="right_image" accept="image/*">
                                    @if (!empty($rightImage))
                                        <div class="text-center">
                                            <img src="{{ $rightImage }}" alt="Logo actuel" class="img-fluid rounded"
                                                style="max-height:90px; object-fit:contain;">
                                            <small class="d-block text-muted mt-1">Image actuelle</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border rounded p-3 h-100">
                                    <label for="right_bottom_image" class="form-label fw-semibold">
                                        <i class="fe fe-image me-1"></i> Image bas droite
                                        <small class="text-muted fw-normal d-block">rightBottomImage</small>
                                    </label>
                                    <input type="file" class="form-control form-control-sm mb-2" id="right_bottom_image"
                                        name="right_bottom_image" accept="image/*">
                                    @if (!empty($rightBottomImage))
                                        <div class="text-center">
                                            <img src="{{ $rightBottomImage }}" alt="Image bas actuelle"
                                                class="img-fluid rounded" style="max-height:90px; object-fit:contain;">
                                            <small class="d-block text-muted mt-1">Image actuelle</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer
                        </button>
                    </form>
                </div>
            </div>
            {{-- ===== SECTION INTRO ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                    <i class="fe fe-info"></i>
                    <span class="fw-semibold">Section "À propos de MCN"</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.mcn-cgp.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="about_title" class="form-label fw-semibold">Titre</label>
                            <input type="text" class="form-control" id="about_title" name="about_title"
                                value="{{ $aboutTitle }}">
                        </div>
                        <div class="mb-3">
                            <label for="about_text" class="form-label fw-semibold">Texte d'introduction</label>
                            <textarea class="form-control summernote-mcn" id="about_text" name="about_text" rows="5">{!! $aboutText ?? '' !!}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer
                        </button>
                    </form>
                </div>
            </div>

            {{-- ===== SERVICE 1 ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                    <i class="fe fe-layers"></i>
                    <span class="fw-semibold">Service — Nos actions</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.mcn-cgp.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="service1_title" class="form-label fw-semibold">Titre</label>
                            <input type="text" class="form-control" id="service1_title" name="service1_title"
                                value="{{ $service1Title }}">
                        </div>
                        <div class="mb-3">
                            <label for="service1_text" class="form-label fw-semibold">Texte</label>
                            <textarea class="form-control summernote-mcn" id="service1_text" name="service1_text" rows="4">{!! $service1Text ?? '' !!}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer
                        </button>
                    </form>
                </div>
            </div>

            {{-- ===== SERVICE 2 ===== --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                    <i class="fe fe-layers"></i>
                    <span class="fw-semibold">Service — Notre valeur ajoutée</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.mcn-cgp.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="service2_title" class="form-label fw-semibold">Titre</label>
                            <input type="text" class="form-control" id="service2_title" name="service2_title"
                                value="{{ $service2Title }}">
                        </div>
                        <div class="mb-3">
                            <label for="service2_text" class="form-label fw-semibold">Texte</label>
                            <textarea class="form-control summernote-mcn" id="service2_text" name="service2_text" rows="5">{!! $service2Text ?? '' !!}</textarea>
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
            $('.summernote-mcn').summernote({
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
