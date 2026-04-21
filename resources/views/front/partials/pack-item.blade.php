<div style="cursor: pointer;" onclick="clickLink('{{ $link }}')" class="card">
    <img src="{{ $image }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h3 class="card-title" style="font-size:25px;font-weight:900">{{ $title }}</h3>
        <h2 style="font-size: 18px">{!! $subtitle !!}</h2>
        <!--div class="card-text text-white">
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
        </div-->
    </div>
</div>
