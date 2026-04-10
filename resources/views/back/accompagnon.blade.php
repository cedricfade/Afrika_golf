@extends('back.main', ['title' => 'ACCOMPAGNEMENT'])
@section('content')
    @include('pageContent.accompagnon', [
        'bannerTitle' => $bannerTitle ?? 'MENER UNE VIE PLEINE ET RICHE AVEC L’AUTISME',
        'bannerImage' => $bannerImage ?? asset('assets/images/accompagnon/banner.jpg'),
    ])

    @push('pageModal')
        <div class="container py-3">

            <div class="row">
                <div class="col-lg-4">
                    {{-- ===== BANNIÈRE ===== --}}
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                            <i class="fe fe-image"></i>
                            <span class="fw-semibold">Bannière</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('back.accompagnon.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="banner_title" class="form-label fw-semibold">Titre de la bannière</label>
                                    <input type="text" class="form-control" id="banner_title" name="banner_title"
                                        value="{{ $bannerTitle ?? 'MENER UNE VIE PLEINE ET RICHE AVEC L\'AUTISME' }}">
                                </div>
                                <div class="mb-3 border rounded p-3">
                                    <div class="text-center">
                                        <img src="{{ $bannerImage ?? asset('assets/images/accompagnon/banner.jpg') }}"
                                            class="img-fluid rounded" style="max-height:150px; object-fit:cover;">
                                        <small class="d-block text-muted mt-1">Image actuelle</small>
                                    </div>
                                    <label for="banner_image" class="form-label fw-semibold">
                                        <i class="fe fe-image me-1"></i> Image bannière
                                    </label>
                                    <input type="file" class="form-control form-control-sm mb-2" id="banner_image"
                                        name="banner_image" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fe fe-save me-1"></i> Enregistrer la bannière
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    {{-- ===== SECTION TEXTES ===== --}}
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                            <i class="fe fe-align-left"></i>
                            <span class="fw-semibold">Contenu de la section</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('back.accompagnon.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Contenu</label>
                                    <textarea class="form-control summernote-accompagnon" name="paragraph1" rows="4">{!! $paragraph1 ?? '' !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="form_title" class="form-label fw-semibold">Titre du formulaire d'achat</label>
                                    <input type="text" class="form-control" id="form_title" name="form_title"
                                        value="{{ $formTitle }}">
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fe fe-save me-1"></i> Enregistrer
                                </button>
                            </form>
                        </div>
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
    @stack('js2')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote-accompagnon').summernote({
                lang: 'fr-FR',
                height: 200,
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
