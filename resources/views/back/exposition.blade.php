@extends('back.main', ['title' => 'Exposition'])
@section('content')
    @include('pageContent.exposition', [
        'citation1' => $citation1 ?? 'QUAND L’ART RACONTE L’AFRIQUE',
        'citation2' => $citation2 ?? 'QUAND LE GOLF CRÉE LE LIEN.',
        'bannerColor' => $bannerColor ?? '#FFFCF8',
        'subImage' => $subImage ?? asset('assets/images/exposition/image.png'),
        'imageHeader' => $imageHeader ?? asset('assets/images/exposition/banner.png'),
    ])

    @push('pageModal')
        <div class="container py-3">
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-image"></i>
                    <span class="fw-semibold">Bannière — Exposition</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.exposition.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="citation1" class="form-label fw-semibold">
                                <i class="fe fe-message-circle me-1"></i> Citation 1
                            </label>
                            <input type="text" class="form-control" id="citation1" name="citation1"
                                value="{{ $citation1 ?? 'QUAND L\'ART RACONTE L\'AFRIQUE' }}">
                        </div>
                        <div class="mb-3">
                            <label for="citation2" class="form-label fw-semibold">
                                <i class="fe fe-message-circle me-1"></i> Citation 2
                            </label>
                            <input type="text" class="form-control" id="citation2" name="citation2"
                                value="{{ $citation2 ?? 'QUAND LE GOLF CRÉE LE LIEN.' }}">
                        </div>
                        <div class="mb-3">
                            <label for="banner_color_expo" class="form-label fw-semibold">
                                <i class="fe fe-droplet me-1"></i> Couleur de fond de la bannière
                            </label>
                            <div class="d-flex align-items-center gap-3">
                                <input type="color" class="form-control form-control-color" id="banner_color_expo"
                                    name="banner_color" value="{{ $bannerColor ?? '#FFFCF8' }}" style="width:60px; height:38px;"
                                    oninput="document.getElementById('banner_color_text_expo').value=this.value">
                                <input type="text" class="form-control" id="banner_color_text_expo"
                                    value="{{ $bannerColor ?? '#FFFCF8' }}" placeholder="#FFFCF8"
                                    oninput="document.getElementById('banner_color_expo').value=this.value">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <label for="sub_image" class="form-label fw-semibold">
                                        <i class="fe fe-image me-1"></i> Image sous-section
                                        <small class="text-muted fw-normal d-block">subImage</small>
                                    </label>
                                    <input type="file" class="form-control form-control-sm mb-2" id="sub_image"
                                        name="sub_image" accept="image/*">
                                    @if (!empty($subImage))
                                        <div class="text-center">
                                            <img src="{{ $subImage }}" alt="Sous-image actuelle" class="img-fluid rounded"
                                                style="max-height:100px; object-fit:cover;">
                                            <small class="d-block text-muted mt-1">Image actuelle</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <label for="image_header" class="form-label fw-semibold">
                                        <i class="fe fe-image me-1"></i> Image en-tête bannière
                                        <small class="text-muted fw-normal d-block">imageHeader</small>
                                    </label>
                                    <input type="file" class="form-control form-control-sm mb-2" id="image_header"
                                        name="image_header" accept="image/*">
                                    @if (!empty($imageHeader))
                                        <div class="text-center">
                                            <img src="{{ $imageHeader }}" alt="En-tête actuelle" class="img-fluid rounded"
                                                style="max-height:100px; object-fit:cover;">
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
        </div>

        {{-- ===== SECTION EXPOSITION ===== --}}
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                <i class="fe fe-align-left"></i>
                <span class="fw-semibold">Section — Exposition</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('back.exposition.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="expo_text" class="form-label fw-semibold">Texte principal</label>
                        <textarea class="form-control summernote-expo" id="expo_text" name="expo_text" rows="3">{!! $expoText ?? '' !!}</textarea>
                    </div>
                    <hr>
                    <h6 class="fw-semibold mb-2">Dates importantes</h6>
                    <div class="mb-3">
                        <label for="date_vernissage" class="form-label fw-semibold">Date du vernissage</label>
                        <input type="text" class="form-control" id="date_vernissage" name="date_vernissage"
                        value="{{ $dateVernissage }}">
                    </div>
                    <div class="mb-3">
                        <label for="date_catalogue" class="form-label fw-semibold">Date du catalogue</label>
                        <input type="text" class="form-control" id="date_catalogue" name="date_catalogue"
                        value="{{ $dateCatalogue }}">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fe fe-save me-1"></i> Enregistrer
                    </button>
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
            $('.summernote-expo').summernote({
                lang: 'fr-FR',
                height: 180,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['codeview']],
                ],
            });
            document.getElementById('banner_color_expo').addEventListener('input', function() {
                document.getElementById('banner_color_text_expo').value = this.value;
            });
        });
    </script>
@endpush
