<span>PARTENAIRES</span>
<div class="row my-4">
    @foreach ($partners ?? [] as $partner)
        <div class="col-4 col-md-3 col-lg-2">
            <div class="card p-0 mx-1 mb-3">
                <img src="{{ Storage::url($partner->image) }}" alt="{{ $partner->libelle }}"
                    style="width:100%; object-fit:contain;">
            </div>
        </div>
    @endforeach
    <a href="{{ route('experience') }}" class="text-color ff-avenir fs lh"><span>{{ utf8_encode('Découvrez nos offres de partenariat') }}</span></a>
</div>
<div class="row">
    <div class="col-lg-12">
        @include('front.partials.info-participation')
    </div>
    <div class="col-lg-12">
        @include('front.partials.info-reservation')
    </div>
</div>
