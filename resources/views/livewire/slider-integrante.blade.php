<div wire:init="loadSlider" class="">
    @if (count($integrantes))
        <div class="swipers mySwiper">
            <div class="swiper-wrapper">
                @foreach ($integrantes as $integrante)
                    <div class="swiper-slide group/item overflow-hidden rounded-lg">
                        <img loading="lazy" alt="integrante-{{$integrante->order}}" src="{{ Storage::url($integrante->url) }}" />
                        <div class="info absolute bottom-0 text-center transition-all transform translate-y-16 group-hover/item:translate-y-0 invisible group-hover/item:visible  w-full h-12 text-sm bg-neutral-800 rounded-t-md bg-opacity-60">
                            <h2 class="text-white text-sm font-semibold pt-1">{{ $integrante->nombre }}</h2>
                            <p class="text-xs text-white">{{ $integrante->cargo }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    @else
        <div class="altura-integrantes flex justify-center items-center bg-neutral-900">
            <div class="animate-spin ease duration-300 w-16 h-16 border-2 border-red-700"></div>
        </div>
    @endif
</div>