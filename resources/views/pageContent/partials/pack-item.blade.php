<div style="cursor: pointer;" onclick="clickLink('{{ $link }}')" class="card">
    <img src="{{ $image }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h3 class="card-title">{{ $title }}</h3>
        <h2>{!! $subtitle !!}</h2>
        <div class="card-text">
            {!! $content !!}
        </div>
        <div class="button">
            <a href="#" class="btn">Télécharger le formulaire</a>
        </div>
    </div>
</div>
