<div class="container">
    <p class="fs-lg">
        {!! __('ajax_accompagnon.content_text') !!}
    </p>
    <div class="souscrire">
        <a href="{{ asset('assets/images/reglement-sportif-fr.pdf') }}">{{ __('ajax_accompagnon.content_btn_programme') }}</a>
        <a href="{{ route('reservations') }}">{{ __('ajax_accompagnon.content_btn_reserve') }}</a>
    </div>
</div>
