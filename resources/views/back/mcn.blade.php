@extends('back.main', ['title' => 'MCN CGP'])
@section('content')
    @include('pageContent.mcn', [
        'bannerImage' => asset('assets_custom/mcn-cgp/bg.jpg'),
        'rightImage' => asset('assets_custom/mcn-cgp/logo-mcn-cgp.png'),
        'rightBottomImage' => asset(__('assets_custom/mcn-cgp/valoriser-votre-passion.png')),
    ])

    @push('pageModal')
        <div class="container py-3">
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Bannière — MCN CGP</span>
                </div>
                <div class="card-body">
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="m-2">
                                    <i class="fe fe-image"></i> Image de fond
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
                        <div class="col-md-4">
                            <div class="card">
                                <div class="m-2">
                                    <i class="fe fe-image"></i> Logo MCN CGP
                                </div>
                                <div class="m-2 bg-secondary">
                                    @if (!empty($rightImage))
                                        <img src="{{ $rightImage }}" alt="Logo actuel" class="my-1 rounded"
                                            style="height:150px;width:100%; object-fit:cover;">
                                    @endif
                                    <input type="file" class="form-control my-2" name="right_image" accept="image/*">
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
                        <div class="col-md-4">
                            <div class="card">
                                <div class="m-2">
                                    <i class="fe fe-image"></i> Logo MCN CGP
                                </div>
                                <div class="m-2 bg-secondary">
                                    @if (!empty($rightBottomImage))
                                        <img src="{{ $rightBottomImage }}" alt="Logo actuel" class="my-1 rounded"
                                            style="height:150px;width:100%; object-fit:cover;">
                                    @endif
                                    <input type="file" class="form-control my-2" name="right_bottom_image" accept="image/*">
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
                </div>
            </div>
            {{-- ===== SECTION INTRO ===== --}}
            <div class="row">
                <div class="col-lg-6">
                    <form method="post" action="{{ route('back.mcn-cgp.store') }}" class="card mb-4">
                        @csrf
                        <div class="card-header">
                            <i class="fe fe-info"></i>
                            <span class="fw-semibold">Section "À propos de MCN"</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="about_title" class="form-label fw-semibold">Titre</label>
                                <input type="text" class="form-control" id="about_title" name="about_title"
                                    value="{{ $aboutTitle }}">
                            </div>
                            <div class="mb-3">
                                <label for="about_text" class="form-label fw-semibold">Texte d'introduction</label>
                                <textarea class="form-control summernote-mcn" id="about_text" name="about_text" rows="5">{!! $aboutText ?? '' !!}</textarea>
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
                    <form method="POST" action="{{ route('back.mcn-cgp.store') }}" class="card mb-4">
                        @csrf
                        <div class="card-header">
                            <i class="fe fe-info"></i>
                            <span class="fw-semibold">Section "À propos de MCN"</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="about_title" class="form-label fw-semibold">Titre</label>
                                <input type="text" class="form-control" id="about_title" name="about_title"
                                    value="{{ $aboutTitle }}">
                            </div>
                            <div class="mb-3">
                                <label for="about_text" class="form-label fw-semibold">Texte d'introduction</label>
                                <textarea class="form-control summernote-mcn" id="about_text" name="about_text" rows="5">{!! $aboutText ?? '' !!}</textarea>
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
        </div>

        {{-- ===== SERVICE 1 ===== --}}
        <div class="row">
            <div class="col-lg-6">
                <form method="POST" action="{{ route('back.mcn-cgp.store') }}" class="card mb-4">
                    @csrf
                    <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                        <i class="fe fe-layers"></i>
                        <span class="fw-semibold">Service — Nos actions</span>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="service1_title" class="form-label fw-semibold">Titre</label>
                            <input type="text" class="form-control" id="service1_title" name="service1_title"
                                value="{{ $service1Title }}">
                        </div>
                        <div class="mb-3">
                            <label for="service1_text" class="form-label fw-semibold">Texte</label>
                            <textarea class="form-control summernote-mcn" id="service1_text" name="service1_text" rows="4">{!! $service1Text ?? '' !!}</textarea>
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
                <form method="POST" action="{{ route('back.mcn-cgp.store') }}" class="card mb-4">
                    @csrf
                    <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                        <i class="fe fe-layers"></i>
                        <span class="fw-semibold">Service — Nos actions</span>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="service1_title" class="form-label fw-semibold">Titre</label>
                            <input type="text" class="form-control" id="service1_title" name="service1_title"
                                value="{{ $service1Title }}">
                        </div>
                        <div class="mb-3">
                            <label for="service1_text" class="form-label fw-semibold">Texte</label>
                            <textarea class="form-control summernote-mcn" id="service1_text" name="service1_text" rows="4">{!! $service1Text ?? '' !!}</textarea>
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

        {{-- ===== SERVICE 2 ===== --}}
        <div class="row">
            <div class="col-lg-6">
                <form method="POST" action="{{ route('back.mcn-cgp.store') }}" class="card mb-4">
                    @csrf
                    <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                        <i class="fe fe-layers"></i>
                        <span class="fw-semibold">Service — Notre valeur ajoutée</span>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="service2_title" class="form-label fw-semibold">Titre</label>
                            <input type="text" class="form-control" id="service2_title" name="service2_title"
                                value="{{ $service2Title }}">
                        </div>
                        <div class="mb-3">
                            <label for="service2_text" class="form-label fw-semibold">Texte</label>
                            <textarea class="form-control summernote-mcn" id="service2_text" name="service2_text" rows="5">{!! $service2Text ?? '' !!}</textarea>
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
                <form method="POST" action="{{ route('back.mcn-cgp.store') }}" class="card mb-4">
                    @csrf
                    <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                        <i class="fe fe-layers"></i>
                        <span class="fw-semibold">Service — Notre valeur ajoutée</span>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="service2_title" class="form-label fw-semibold">Titre</label>
                            <input type="text" class="form-control" id="service2_title" name="service2_title"
                                value="{{ $service2Title }}">
                        </div>
                        <div class="mb-3">
                            <label for="service2_text" class="form-label fw-semibold">Texte</label>
                            <textarea class="form-control summernote-mcn" id="service2_text" name="service2_text" rows="5">{!! $service2Text ?? '' !!}</textarea>
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
                toolbar: summernoteToolbarConfig,
            });
        });
    </script>
@endpush
