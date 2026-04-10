@extends('back.main', ['title' => 'Nos rendez-vous'])
@section('content')
    @include('pageContent.rdv_aagc', [
        'bannerColor' => $bannerColor ?? '#0A140F',
        'sectionTitle' => $sectionTitle ?? 'Nos rendez-vous',
        'sectionText' => $sectionText ?? '',
        'posts' => $posts ?? collect(),
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
                <form method="POST" action="{{ route('back.rendez-vous.store') }}">
                    <i class="fe fe-droplet me-1"></i> Couleur de fond de la bannière
                    </label>
                    <div class="d-flex align-items-center gap-2">
                        <input type="color" class="form-control form-control-color" id="banner_color" name="banner_color"
                            value="{{ $bannerColor ?? '#0A140F' }}">
                        <input type="text" class="form-control form-control-sm font-monospace" id="banner_color_hex"
                            value="{{ $bannerColor ?? '#0A140F' }}"
                            oninput="document.getElementById('banner_color').value=this.value">
                    </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">
                <i class="fe fe-save me-1"></i> Enregistrer la bannière
            </button>
            </form>
        </div>
        </div>

        {{-- ===== SECTION RENDEZ-VOUS ===== --}}
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-secondary text-white d-flex align-items-center gap-2">
                <i class="fe fe-calendar"></i>
                <span class="fw-semibold">Section — Nos rendez-vous</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('back.rendez-vous.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="section_title" class="form-label fw-semibold">Titre principal</label>
                        <input type="text" class="form-control" id="section_title" name="section_title"
                            value="{{ $sectionTitle ?? 'Nos rendez-vous' }}">
                    </div>
                    <div class="mb-3">
                        <label for="section_text" class="form-label fw-semibold">Texte d'introduction</label>
                        <textarea class="form-control summernote-rdvaagc" id="section_text" name="section_text" rows="4">{{ $sectionText ?? '' }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fe fe-save me-1"></i> Enregistrer
                    </button>
                </form>
            </div>
        </div>

        {{-- ===== POSTS ===== --}}
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                <i class="fe fe-file-text"></i>
                <span class="fw-semibold">Posts — Rendez-vous AAGC</span>
            </div>
            <div class="card-body">

                {{-- Liste existante --}}
                @forelse ($posts ?? [] as $post)
                    <div class="border rounded mb-2">
                        <div class="d-flex align-items-center justify-content-between p-3">
                            <div>
                                <p class="mb-0 fw-semibold">{{ $post->title }}</p>
                                <small class="text-muted">{{ $post->formatted_date }}</small>
                                @if ($post->published)
                                    <span class="badge bg-success ms-2">Publié</span>
                                @else
                                    <span class="badge bg-secondary ms-2">Brouillon</span>
                                @endif
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#edit-post-{{ $post->id }}">
                                    <i class="fe fe-edit"></i> Éditer
                                </button>
                                <form method="POST" action="{{ route('back.rendez-vous.posts.destroy', $post->id) }}"
                                    onsubmit="return confirm('Supprimer ce post ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fe fe-trash-2"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        {{-- Formulaire d'édition --}}
                        <div class="collapse p-3 border-top" id="edit-post-{{ $post->id }}">
                            <form method="POST" action="{{ route('back.rendez-vous.posts.update', $post->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label">Titre</label>
                                    <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Contenu</label>
                                    <textarea class="form-control summernote-post" name="content" rows="3">{!! $post->content !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Image</label>
                                    @if ($post->image)
                                        <div class="mb-1">
                                            <img src="{{ Storage::url($post->image) }}" alt=""
                                                style="height:60px; object-fit:cover; border-radius:4px;">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="published" value="1"
                                        id="published-{{ $post->id }}" {{ $post->published ? 'checked' : '' }}>
                                    <label class="form-check-label" for="published-{{ $post->id }}">Publié</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm w-100">
                                    <i class="fe fe-save me-1"></i> Mettre à jour
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-muted fst-italic mb-3">Aucun post pour l'instant.</p>
                @endforelse

                {{-- Formulaire d'ajout --}}
                <hr>
                <h6 class="fw-semibold text-muted mb-3">Ajouter un post</h6>
                <form method="POST" action="{{ route('back.rendez-vous.posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label class="form-label">Titre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title"
                            placeholder="Ex: AAGC 2026 — Inscription ouverte">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Contenu <span class="text-danger">*</span></label>
                        <textarea class="form-control summernote-post" name="content" rows="3" placeholder="Contenu du post..."></textarea>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Image
                            <small class="text-muted fw-normal">(JPG, PNG, WEBP — max 5 Mo)</small>
                        </label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="published" value="1" id="new_published">
                        <label class="form-check-label" for="new_published">Publier immédiatement</label>
                    </div>
                    <button type="submit" class="btn btn-success w-100">
                        <i class="fe fe-plus me-1"></i> Ajouter le post
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
            $('.summernote-rdvaagc').summernote({
                lang: 'fr-FR',
                height: 180,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['codeview']],
                ],
            });
            $('.summernote-post').summernote({
                lang: 'fr-FR',
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['codeview']],
                ],
            });
            $('#banner_color').on('input', function() {
                $('#banner_color_hex').val($(this).val());
            });
        });
    </script>
@endpush
