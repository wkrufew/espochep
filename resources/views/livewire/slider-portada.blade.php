<div wire:init="loadSlider">
     <style>
        .swiper {
            width: 100%;
            height: 85vh;
        }

        .retardador{
            animation-delay: 500ms;
        }

        .swiper-slide img {
            width: 100%;
            height: 610px;
            object-fit: cover;
        }
            .alturaslidercarga {
                height: 85vh;
            }
    </style>
    
    <section class="altura relative bg-neutral-900 z-20">
        @if (count($sliders))
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="retardador absolute top-56 left-20 text-white font-semibold text-lg">
                            <div class="uppercase text-2xl" >
                                {{ $slider->{'title_' . app()->getLocale()} }}</div>
                            <div class="my-3 max-w-2xl tracking-wide">
                                {{ $slider->{'subtitle_' . app()->getLocale()} }}</div>
        
                            <a class="rounded-full w-36 mt-3 text-center tracking-wide transition-all inline-block bg-none transition-opacityfont-semibold bg-red-700 text-white hover:bg-neutral-800 hover:text-white px-4 py-2 text-sm"
                                href="{{ $slider->url_button }}">
                                Ver Ahora
                            </a>
                        </div>
                        <img class="object-cover bg-cover" src="{{ Storage::url($slider->url_img) }}">
                    </div>
                @endforeach
            </div>
            {{-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> --}}
          </div>
        @else
            <div class="alturaslidercarga flex justify-center items-center bg-transparent shadow-xl bg-neutral-900">
                <div class="animate-spin ease duration-300 w-16 h-16 border-2 border-red-700"></div>
            </div>
        @endif
    </section>
</div>
