<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ config('app.name') }} | {{ $title ?? '' }} </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <style>
        /* Boutons flottants améliorés */
        .btnClick {
            cursor: pointer;
            position: fixed;
            z-index: 1000;
            bottom: 40px;
            right: 40px;
            min-width: 56px;
            min-height: 56px;
            border-radius: 0;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
            color: #fff;
            border: none;
            outline: none;
        }

        .btnClick span {
            display: none;
            margin-left: 8px;
            font-size: 1rem;
        }

        .btnSetting {
            background: #333;
            right: 110px;
        }

        .btnEdit {
            background: #34b7a7;
            right: 40px;
        }

        @media (max-width: 768px) {

            .btnClick,
            #pageModal {
                display: none !important;
            }
        }

        #pageModal .modal-dialog {
            position: fixed;
            margin: auto;
            width: 75%;
            height: 100%;
            transition: none;
        }

        #pageModal .modal-content {
            height: 100%;
            overflow-y: auto;
            border-radius: 0px;
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 100%;
                margin: 1.75rem auto;
            }
        }
    </style>
    <style>
        .preloader {
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>

    <button class="btnClick btnSetting" onclick="pageSetting()">
        <i class="fe fe-settings"></i>
    </button>
    <button class="btnClick btnEdit" onclick="page()">
        <i class="fe fe-edit"></i>
    </button>

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
                    <span class="badge bg-dark tab-badge"></span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link d-flex align-items-center gap-2" id="tab-balls" data-bs-toggle="tab"
                    data-bs-target="#pane-balls" type="button" role="tab">
                    <i class="fe fe-shopping-cart"></i> Commandes de Balles
                    <span class="badge bg-dark tab-badge"></span>
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
            <div class="tab-pane fade show active p-5" id="pane-invitations" role="tabpanel">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== ONGLET 2 — COMMANDES DE BALLES ===== --}}
            <div class="tab-pane fade p-5" id="pane-balls" role="tabpanel">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/cute-alert/cute-alert.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatable.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            var dtLang = {
                url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/fr-FR.json'
            };

            // ── INVITATIONS ──────────────────────────────────────
            $('#tableInvitations').DataTable({
                ajax:"{{ route('back.settings.ajax.invitations') }}",
            });

            // ── COMMANDES BALLES ─────────────────────────────────
            $('#tableCommandBalls').DataTable({
                ajax:"{{ route('back.settings.ajax.command-balls') }}",
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

</body>