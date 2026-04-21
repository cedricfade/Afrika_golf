<a href="{{ route('blog') }}" style="display:block;text-decoration:none;"
    class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
    <div class="info-rdv">
        <div class="card"></div>
        <div class="titre">
            <h3>{{ __('partials.front_card_category') }}</h3>
            <span class="date-info">{{ __('partials.front_card_date') }}</span>
        </div>
        <h2>{{ __('partials.front_card_title') }}</h2>
        <p class="description">
            {{ __('partials.front_card_desc') }}
        </p>
        <div class="user">
            <div class="img">
                <span></span>
            </div>
            <div class="user-info">
                <span class="name">Lionel AKE</span>
                <br>
                <span class="role">{{ __('partials.front_card_author_role') }}</span>
            </div>
        </div>
    </div>
</a>
