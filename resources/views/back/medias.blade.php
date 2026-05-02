@extends('back.main', ['title' => 'Espace média'])
@section('content')
    @include('pageContent.medias', [
        'bannerColor' => $bannerColor ?? '#0A140F',
        'pressReleases' => $pressReleases ?? collect(),
        'mediaKits' => $mediaKits ?? collect(),
    ])

    @push('pageModal')
        <div class="container py-3">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Bannière --}}
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                    <i class="fe fe-droplet"></i>
                    <span class="fw-semibold">Bannière — Espace média</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('back.medias.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fe fe-droplet me-1"></i> Couleur de fond de la bannière
                            </label>
                            <div class="d-flex align-items-center gap-3">
                                <input type="color" class="form-control form-control-color" id="banner_color_med"
                                    name="banner_color" value="{{ $bannerColor ?? '#0A140F' }}" style="width:60px; height:38px;"
                                    oninput="document.getElementById('banner_color_text_med').value=this.value">
                                <input type="text" class="form-control" id="banner_color_text_med"
                                    value="{{ $bannerColor ?? '#0A140F' }}" placeholder="#0A140F"
                                    oninput="document.getElementById('banner_color_med').value=this.value">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fe fe-save me-1"></i> Enregistrer la bannière
                        </button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    {{-- Sorties de presse --}}
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                            <i class="fe fe-file-text"></i>
                            <span class="fw-semibold">Sorties de presse</span>
                        </div>
                        <div class="card-body">

                            {{-- Liste existante --}}
                            @forelse ($pressReleases ?? [] as $item)
                                <div class="d-flex align-items-center justify-content-between border rounded p-3 mb-2">
                                    <div>
                                        <p class="mb-0 fw-semibold">{{ $item->title }}</p>
                                        <small class="text-muted">{{ $item->formatted_date }}</small>
                                        &nbsp;
                                        <a href="{{ Storage::url($item->file) }}" target="_blank" class="small">
                                            <i class="fe fe-download me-1"></i>Voir le fichier
                                        </a>
                                    </div>
                                    <form method="POST" action="{{ route('back.medias.media-spaces.destroy', $item->id) }}"
                                        onsubmit="return confirm('Supprimer cette sortie de presse ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fe fe-trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            @empty
                                <p class="text-muted fst-italic mb-3">Aucune sortie de presse pour l'instant.</p>
                            @endforelse

                            {{-- Formulaire d'ajout --}}
                            <hr>
                            <h6 class="fw-semibold text-muted mb-3">Ajouter une sortie de presse</h6>
                            <form method="POST" action="{{ route('back.medias.media-spaces.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="Sortie de presse">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="mb-2">
                                            <label class="form-label">Titre <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Ex: Official Brand Guidelines">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-2">
                                            <label class="form-label">Forme <span class="text-danger">*</span></label>
                                            <select name="form" class="form-control">
                                                <option value="fichier_externe" selected>Fichier externe</option>
                                                <option value="lien">lien</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3" id="press_select_file">
                                    <label class="form-label">Fichier (PDF, ZIP, DOC, image) <span
                                            class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="file"
                                        accept=".pdf,.zip,.doc,.docx,.png,.jpg,.jpeg">
                                </div>
                                <div class="mb-3" id="press_select_link" style="display:none">
                                    <label class="form-label">Lien <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="file">
                                </div>
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fe fe-plus me-1"></i> Ajouter la sortie de presse
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- Kits média --}}
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-header bg-dark text-white d-flex align-items-center gap-2">
                            <i class="fe fe-package"></i>
                            <span class="fw-semibold">Kits média</span>
                        </div>
                        <div class="card-body">

                            {{-- Liste existante --}}
                            @forelse ($mediaKits ?? [] as $item)
                                <div class="d-flex align-items-center justify-content-between border rounded p-3 mb-2">
                                    <div>
                                        <p class="mb-0 fw-semibold">{{ $item->title }}</p>
                                        <small class="text-muted">{{ $item->formatted_date }}</small>
                                        &nbsp;
                                        <a href="{{ Storage::url($item->file) }}" target="_blank" class="small">
                                            <i class="fe fe-download me-1"></i>Voir le fichier
                                        </a>
                                    </div>
                                    <form method="POST" action="{{ route('back.medias.media-spaces.destroy', $item->id) }}"
                                        onsubmit="return confirm('Supprimer ce kit média ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fe fe-trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            @empty
                                <p class="text-muted fst-italic mb-3">Aucun kit média pour l'instant.</p>
                            @endforelse

                            {{-- Formulaire d'ajout --}}
                            <hr>
                            <h6 class="fw-semibold text-muted mb-3">Ajouter un kit média</h6>
                            <form method="POST" action="{{ route('back.medias.media-spaces.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="Kit media">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="mb-2">
                                            <label class="form-label">Titre <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Ex: Official Brand Guidelines">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-2">
                                            <label class="form-label">Forme <span class="text-danger">*</span></label>
                                            <select name="form" class="form-control">
                                                <option value="fichier_externe" selected>Fichier externe</option>
                                                <option value="lien">lien</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3" id="kit_select_file">
                                    <label class="form-label">Fichier (PDF, ZIP, DOC, image) <span
                                            class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="file"
                                        accept=".pdf,.zip,.doc,.docx,.png,.jpg,.jpeg">
                                </div>
                                <div class="mb-3" id="kit_select_link" style="display:none">
                                    <label class="form-label">Lien <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="file">
                                </div>
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fe fe-plus me-1"></i> Ajouter le kit média
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endpush
@endsection

@push('js')
    <script>
        $('select[name="form"]').on('change', function() {
            var $form = $(this).closest('form');
            if ($(this).val() === 'lien') {
                $form.find('[id*="_select_file"]').hide();
                $form.find('[id*="_select_link"]').show();
            } else {
                $form.find('[id*="_select_file"]').show();
                $form.find('[id*="_select_link"]').hide();
            }
        });
    </script>
@endpush

@push('css')
    @stack('css2')
@endpush
