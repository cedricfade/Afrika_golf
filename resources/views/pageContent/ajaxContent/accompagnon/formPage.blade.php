<div class="container">
    <div class="form">
        <form action="{{ route('form-command-ball') }}" method="POST" id="commandBallForm">
            @csrf
            <div class="row">
                <h2 class="fs-xl text-center">INTERVENTION D'ACHAT DE BALLE</h2>
                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Prénom</label>
                        <input type="text" class="form-control" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Téléphone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-group ">
                        <label for="">Adresse Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nombre de balles</label>
                        <input type="number" class="form-control" name="balls" min="1" required>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
</div>

@once
    @push('js')
        @if (config('services.recaptcha.site_key'))
            <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer>
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var form = document.getElementById('commandBallForm');
                    if (!form) return;
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        var submittedForm = this;
                        grecaptcha.ready(function() {
                            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                                    action: 'command_ball'
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
