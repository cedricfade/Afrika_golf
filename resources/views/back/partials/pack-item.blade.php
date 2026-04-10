<div style="cursor: pointer;" onclick="clickLink('{{ $link }}')" class="card">
    <img src="{{ $image }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h3 class="card-title">{{ $title }}</h3>
        <h2>{!! $subtitle !!}</h2>
        <div class="card-text" style="color: white !important;">
            {!! $content !!}
        </div>
        <div class="button">
            @if (!empty($brochure))
                <a href="{{ $brochure }}" target="_blank" download onclick="event.stopPropagation()"
                    class="btn">Télécharger le formulaire</a>
            @else
                <a href="#" class="btn" onclick="event.stopPropagation(); event.preventDefault();">Télécharger
                    le formulaire</a>
            @endif
        </div>
    </div>
</div>
