<div class="formulaire" style="background: #0f1c15; padding: 20px; color: #fff; border: 0.5px solid #707070;">
    <form id="reservationForm" action="" method="POST">
        @csrf
        <input type="hidden" name="page" value="{{ route('form-reservation') }}">
        <div class="mb-4">
            <label class="ff-avenir mb-1" for="">Nom & prénoms</label>
            <input type="text" name="nomComplet" class="form-control ff-avenir bg-dark text-grey py-2 border-color"
                required>
        </div>
        <div class="mb-4">
            <label class="ff-avenir mb-1" for="">Adresse Email</label>
            <input type="email" name="email" class="form-control ff-avenir bg-dark text-grey py-2 border-color"
                required>
        </div>
        <div class="mb-4">
            <label class="ff-avenir mb-1" for="">Objet</label>
            <input type="text" name="objet" class="form-control ff-avenir bg-dark text-grey py-2 border-color"
                required>
        </div>
        <div class="mb-4">
            <label class="ff-avenir mb-1" for="">Message</label>
            <textarea name="message" cols="20" rows="5"
                class="form-control ff-avenir text-grey bg-dark text-grey py-2 border-color" required></textarea>
        </div>
        <div class="mb-4 text-center">
            <button type="submit" class="btn"
                style="background: #b07f49;color: #0f1c15;width: 100%; border-radius: 0px; height: 50px;">ENVOYER</button>
        </div>
    </form>
</div>

@once
    @push('js')
        @if (config('services.recaptcha.site_key'))
            <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer>
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var form = document.getElementById('reservationForm');
                    if (!form) return;
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        var submittedForm = this;
                        grecaptcha.ready(function() {
                            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                                    action: 'reservation'
                                })
                                .then(function(token) {
                                    var existing = submittedForm.querySelector(
                                        'input[name="g-recaptcha-response"]');
                                    if (existing) existing.remove();
                                    var input = document.createElement('input');
                                    input.type = 'hidden';
                                    input.name = 'g-recaptcha-response';
                                    input.value = token;
                                    submittedForm.appendChild(input);
                                    submittedForm.submit();
                                });
                        });
                    });
                });
            </script>
        @endif
    @endpush
@endonce
