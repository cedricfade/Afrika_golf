@extends('back.main', ['title' => 'Paramètres'])

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatable.min.css') }}">
    <style>
        .nav-tabs .nav-link {
            color: #495057;
            font-weight: 600;
        }

        .nav-tabs .nav-link.active {
            color: #000;
            border-bottom: 3px solid #000;
        }

        .tab-badge {
            font-size: .7rem;
            vertical-align: middle;
        }

        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #ced4da;
            border-radius: .25rem;
            padding: .25rem .5rem;
        }

        .btn-voir {
            min-width: 34px;
        }
    </style>
@endpush

@section('content')
    @include('back.partials.navbar')

    <div class="container-fluid py-4 px-4">

        {{-- En-tête --}}
        <div class="d-flex align-items-center gap-3 mb-4">
            <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center"
                style="width:44px;height:44px;min-width:44px;">
                <i class="fe fe-settings"></i>
            </div>
            <div>
                <h1 class="h5 mb-0 fw-bold">Paramètres & Données</h1>
                <small class="text-muted">Invitations web &amp; commandes de balles</small>
            </div>
        </div>

        {{-- ===== ONGLETS ===== --}}
        <ul class="nav nav-tabs mb-0 border-bottom" id="settingTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active d-flex align-items-center gap-2" id="tab-invitations" data-bs-toggle="tab"
                    data-bs-target="#pane-invitations" type="button" role="tab">
                    <i class="fe fe-mail"></i> Invitations Web
                    <span class="badge bg-dark tab-badge">{{ $invitations->count() }}</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link d-flex align-items-center gap-2" id="tab-balls" data-bs-toggle="tab"
                    data-bs-target="#pane-balls" type="button" role="tab">
                    <i class="fe fe-shopping-cart"></i> Commandes de Balles
                    <span class="badge bg-dark tab-badge">{{ $commandBalls->count() }}</span>
                </button>
            </li>
            {{-- Boutons export alignés à droite --}}
            <li class="ms-auto d-flex align-items-center gap-2 pe-1">
                <a href="{{ route('back.export.invitations') }}" id="btn-export-invitations"
                    class="btn btn-sm btn-success d-flex align-items-center gap-1">
                    <i class="fe fe-download"></i> Exporter Invitations
                </a>
                <a href="{{ route('back.export.command-balls') }}" id="btn-export-balls"
                    class="btn btn-sm btn-success d-flex align-items-center gap-1 d-none">
                    <i class="fe fe-download"></i> Exporter Commandes
                </a>
            </li>
        </ul>

        <div class="tab-content">

            {{-- ===== ONGLET 1 — INVITATIONS ===== --}}
            <div class="tab-pane fade show active" id="pane-invitations" role="tabpanel">
                <div class="card border-0 shadow-sm rounded-0 rounded-bottom">
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="tableInvitations" class="table table-hover table-striped align-middle w-100">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nom complet</th>
                                        <th>Email</th>
                                        <th>Objet</th>
                                        <th>Page</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($invitations as $inv)
                                        <tr>
                                            <td>{{ $inv->id }}</td>
                                            <td>{{ $inv->nomComplet }}</td>
                                            <td><a href="mailto:{{ $inv->email }}">{{ $inv->email }}</a></td>
                                            <td>{{ $inv->objet }}</td>
                                            <td><span class="badge bg-secondary">{{ $inv->page }}</span></td>
                                            <td>
                                                @if ($inv->created_at)
                                                    {{ \Carbon\Carbon::createFromTimestamp($inv->created_at)->format('d/m/Y H:i') }}
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-outline-dark btn-voir"
                                                    data-bs-toggle="modal" data-bs-target="#modalInvitation"
                                                    data-id="{{ $inv->id }}" data-nom="{{ $inv->nomComplet }}"
                                                    data-email="{{ $inv->email }}" data-objet="{{ $inv->objet }}"
                                                    data-page="{{ $inv->page }}" data-message="{{ $inv->message }}"
                                                    data-date="{{ $inv->created_at ? \Carbon\Carbon::createFromTimestamp($inv->created_at)->format('d/m/Y H:i') : '—' }}">
                                                    <i class="fe fe-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">
                                                <i class="fe fe-inbox me-1"></i> Aucune invitation enregistrée.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== ONGLET 2 — COMMANDES DE BALLES ===== --}}
            <div class="tab-pane fade" id="pane-balls" role="tabpanel">
                <div class="card border-0 shadow-sm rounded-0 rounded-bottom">
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="tableCommandBalls" class="table table-hover table-striped align-middle w-100">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Nb balles</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($commandBalls as $cmd)
                                        <tr>
                                            <td>{{ $cmd->id }}</td>
                                            <td>{{ $cmd->nom }}</td>
                                            <td>{{ $cmd->prenom }}</td>
                                            <td><a href="tel:{{ $cmd->telephone }}">{{ $cmd->telephone }}</a></td>
                                            <td><a href="mailto:{{ $cmd->email }}">{{ $cmd->email }}</a></td>
                                            <td><span class="badge bg-success">{{ $cmd->nombre_de_balles }}</span></td>
                                            <td>
                                                @if ($cmd->created_at)
                                                    {{ \Carbon\Carbon::createFromTimestamp($cmd->created_at)->format('d/m/Y H:i') }}
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-outline-dark btn-voir"
                                                    data-bs-toggle="modal" data-bs-target="#modalCommandBall"
                                                    data-id="{{ $cmd->id }}" data-nom="{{ $cmd->nom }}"
                                                    data-prenom="{{ $cmd->prenom }}"
                                                    data-telephone="{{ $cmd->telephone }}"
                                                    data-email="{{ $cmd->email }}"
                                                    data-balles="{{ $cmd->nombre_de_balles }}"
                                                    data-date="{{ $cmd->created_at ? \Carbon\Carbon::createFromTimestamp($cmd->created_at)->format('d/m/Y H:i') : '—' }}">
                                                    <i class="fe fe-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted py-4">
                                                <i class="fe fe-inbox me-1"></i> Aucune commande enregistrée.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>{{-- /tab-content --}}
    </div>

    {{-- ===== MODAL DÉTAIL INVITATION ===== --}}
    <div class="modal fade" id="modalInvitation" tabindex="-1" aria-labelledby="modalInvitationLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="modalInvitationLabel">
                        <i class="fe fe-mail me-2"></i>Détail de l'invitation
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-3 text-muted">ID</dt>
                        <dd class="col-sm-9" id="inv-id">—</dd>

                        <dt class="col-sm-3 text-muted">Nom complet</dt>
                        <dd class="col-sm-9" id="inv-nom">—</dd>

                        <dt class="col-sm-3 text-muted">Email</dt>
                        <dd class="col-sm-9"><a id="inv-email" href="#">—</a></dd>

                        <dt class="col-sm-3 text-muted">Objet</dt>
                        <dd class="col-sm-9" id="inv-objet">—</dd>

                        <dt class="col-sm-3 text-muted">Page source</dt>
                        <dd class="col-sm-9"><span id="inv-page" class="badge bg-secondary">—</span></dd>

                        <dt class="col-sm-3 text-muted">Date</dt>
                        <dd class="col-sm-9" id="inv-date">—</dd>

                        <dt class="col-sm-3 text-muted">Message</dt>
                        <dd class="col-sm-9">
                            <div id="inv-message" class="border rounded p-2 bg-light"
                                style="white-space:pre-wrap;min-height:60px;">—</div>
                        </dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== MODAL DÉTAIL COMMANDE BALLE ===== --}}
    <div class="modal fade" id="modalCommandBall" tabindex="-1" aria-labelledby="modalCommandBallLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="modalCommandBallLabel">
                        <i class="fe fe-shopping-cart me-2"></i>Détail de la commande
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4 text-muted">ID</dt>
                        <dd class="col-sm-8" id="cmd-id">—</dd>

                        <dt class="col-sm-4 text-muted">Nom</dt>
                        <dd class="col-sm-8" id="cmd-nom">—</dd>

                        <dt class="col-sm-4 text-muted">Prénom</dt>
                        <dd class="col-sm-8" id="cmd-prenom">—</dd>

                        <dt class="col-sm-4 text-muted">Téléphone</dt>
                        <dd class="col-sm-8"><a id="cmd-telephone" href="#">—</a></dd>

                        <dt class="col-sm-4 text-muted">Email</dt>
                        <dd class="col-sm-8"><a id="cmd-email" href="#">—</a></dd>

                        <dt class="col-sm-4 text-muted">Nombre de balles</dt>
                        <dd class="col-sm-8"><span id="cmd-balles" class="badge bg-success fs-6">—</span></dd>

                        <dt class="col-sm-4 text-muted">Date</dt>
                        <dd class="col-sm-8" id="cmd-date">—</dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/plugins/datatables/datatable.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            var dtLang = {
                url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/fr-FR.json'
            };

            // ── INVITATIONS ──────────────────────────────────────
            $('#tableInvitations').DataTable({
                language: dtLang,
                order: [
                    [0, 'desc']
                ],
                pageLength: 10,
                columnDefs: [{
                    orderable: false,
                    targets: [6]
                }]
            });

            // ── COMMANDES BALLES ─────────────────────────────────
            $('#tableCommandBalls').DataTable({
                language: dtLang,
                order: [
                    [0, 'desc']
                ],
                pageLength: 10,
                columnDefs: [{
                    orderable: false,
                    targets: [7]
                }]
            });

            // ── SWITCH BOUTON EXPORT SELON ONGLET ACTIF ──────────
            function updateExportButton() {
                var activeTab = $('[data-bs-toggle="tab"].active').attr('data-bs-target');
                if (activeTab === '#pane-invitations') {
                    $('#btn-export-invitations').show();
                    $('#btn-export-balls').hide();
                } else {
                    $('#btn-export-invitations').hide();
                    $('#btn-export-balls').show();
                }
            }

            // Init
            updateExportButton();

            // On tab switch
            $('[data-bs-toggle="tab"]').on('shown.bs.tab', function() {
                updateExportButton();
            });

            // ── MODAL INVITATION ─────────────────────────────────
            $('#modalInvitation').on('show.bs.modal', function(e) {
                var btn = e.relatedTarget;
                $('#inv-id').text(btn.dataset.id);
                $('#inv-nom').text(btn.dataset.nom);
                $('#inv-email').text(btn.dataset.email).attr('href', 'mailto:' + btn.dataset.email);
                $('#inv-objet').text(btn.dataset.objet);
                $('#inv-page').text(btn.dataset.page);
                $('#inv-date').text(btn.dataset.date);
                $('#inv-message').text(btn.dataset.message);
            });

            // ── MODAL COMMANDE BALLE ─────────────────────────────
            $('#modalCommandBall').on('show.bs.modal', function(e) {
                var btn = e.relatedTarget;
                $('#cmd-id').text(btn.dataset.id);
                $('#cmd-nom').text(btn.dataset.nom);
                $('#cmd-prenom').text(btn.dataset.prenom);
                $('#cmd-telephone').text(btn.dataset.telephone).attr('href', 'tel:' + btn.dataset
                    .telephone);
                $('#cmd-email').text(btn.dataset.email).attr('href', 'mailto:' + btn.dataset.email);
                $('#cmd-balles').text(btn.dataset.balles);
                $('#cmd-date').text(btn.dataset.date);
            });

        });
    </script>
@endpush
