<div class="formulaire" style="background: #0f1c15; padding: 20px; color: #fff; border: 0.5px solid #707070;">
    <div id="reservationAlertFront" class="alert d-none mb-3" role="alert"></div>
    <form id="reservationFormFront" method="POST" action="{{ route('form-reservation') }}">
        @csrf
        <input type="hidden" name="page" value="{{ url()->current() }}">
        <div class="mb-4">
            <label class="ff-avenir mb-1">Nom & prénoms</label>
            <input type="text" name="nomComplet" class="form-control ff-avenir bg-dark text-grey py-2 border-color"
                required>
        </div>
        <div class="mb-4">
            <label class="ff-avenir mb-1">Adresse Email</label>
            <input type="email" name="email" class="form-control ff-avenir bg-dark text-grey py-2 border-color"
                required>
        </div>
        <div class="mb-4">
            <label class="ff-avenir mb-1">Objet</label>
            <input type="text" name="objet" class="form-control ff-avenir bg-dark text-grey py-2 border-color"
                required>
        </div>
        <div class="mb-4">
            <label class="ff-avenir mb-1">Message</label>
            <textarea name="message" cols="20" rows="5"
                class="form-control ff-avenir text-grey bg-dark text-grey py-2 border-color" required></textarea>
        </div>
        <div class="mb-4 text-center">
            <button type="submit" id="reservationBtnFront" class="btn"
                style="background: #b07f49;color: #0f1c15;width: 100%; border-radius: 0px; height: 50px;">ENVOYER</button>
        </div>
    </form>
</div>

@once
    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var form = document.getElementById('reservationFormFront');
                var alertBox = document.getElementById('reservationAlertFront');
                var btn = document.getElementById('reservationBtnFront');
                if (!form) return;

                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    btn.disabled = true;
                    btn.textContent = 'Envoi en cours...';
                    alertBox.className = 'alert d-none mb-3';

                    fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            },
                            body: new FormData(form)
                        })
                        .then(function(res) {
                            return res.json().then(function(data) {
                                return {
                                    ok: res.ok,
                                    data: data
                                };
                            });
                        })
                        .then(function(result) {
                            if (result.ok && result.data.success) {
                                alertBox.className = 'alert alert-success mb-3';
                                alertBox.textContent = result.data.message;
                                form.reset();
                            } else {
                                var msg = result.data.message || 'Une erreur est survenue.';
                                if (result.data.errors) {
                                    msg = Object.values(result.data.errors).flat().join(' ');
                                }
                                alertBox.className = 'alert alert-danger mb-3';
                                alertBox.textContent = msg;
                            }
                        })
                        .catch(function() {
                            alertBox.className = 'alert alert-danger mb-3';
                            alertBox.textContent = 'Une erreur de connexion est survenue.';
                        })
                        .finally(function() {
                            btn.disabled = false;
                            btn.textContent = 'ENVOYER';
                        });
                });
            });
        </script>
    @endpush
@endonce
