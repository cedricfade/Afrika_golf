<a href="#" style="display:block;text-decoration:none;" class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
    <div class="info-rdv">
        <div class="card"
            @if (!empty($image)) style="background-image:url('{{ $image }}'); background-size:cover; background-position:center;" @endif>
        </div>
        <div class="titre">
            <h3>Actualité</h3>
            <span class="date-info">{{ $date ?? '' }}</span>
        </div>
        <h2>{{ $title ?? '' }}</h2>
        <p class="description">
            {{ Str::limit(strip_tags($description ?? ''), 130) }}
        </p>
    </div>
</a>
