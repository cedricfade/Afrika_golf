<span>PARTENAIRES</span>
<div class="row my-4">
    @foreach ($partners ?? [] as $partner)
        <div class="col-2">
            <div class="card p-0 m-1">
                <img src="{{ Storage::url($partner->image) }}" alt="{{ $partner->libelle }}"
                    style="width:100%; object-fit:contain;">
            </div>
        </div>
    @endforeach
</div>
<div class="row">
    <div class="col-lg-12">
        @include('front.partials.info-participation')
    </div>
    <div class="col-lg-12">
        @include('front.partials.info-reservation')
    </div>
</div>
