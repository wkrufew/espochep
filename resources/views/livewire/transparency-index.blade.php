<div class="pb-10">
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <div>
            <section class="h-auto rounded-lg bg-white p-6 shadow-sm sticky top-20 text-center md:text-left select-none">
                <span class="text-center font-bold text-sm  select-none"><i class="fa-solid fa-calendar-days pr-1"></i>
                    {{ __('AÑO') }}</span>
                <div class="flex-col">
                    <div class="py-4">
                        <div class="pt-1 flex-col space-y-1">
                            <div class="pb-2 font-semibold hover:text-red-700 cursor-pointer transition duration-500 ease-in-out transform hover:translate-y-0.5 hover:scale-105 {{ $this->identificador == '' ? 'text-red-700' : '' }}"
                                wire:click="limpiar">{{ __('Transparencia') }}</div>
                            <ul class="space-y-2">
                                @forelse ($transparency as $item)
                                    <li class="{{ $this->identificador == $item->id ? 'text-red-700' : '' }} font-semibold text-sm hover:text-red-700 cursor-pointer transition duration-500 ease-in-out transform hover:translate-y-0.5 hover:scale-105"
                                        wire:click="cargarMes({{ $item }})">{{ $item->anio }}
                                    </li>
                                @empty
                                    <li>{{ __('No tiene opciones') }}</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="md:col-span-2 lg:col-span-4 ">
            <div class="rounded-lg bg-white p-0 md:p-5 select-none">
                @if ($this->transparencia)
                    <div class="bg-white col-span-2 rounded-lg w-full mx-auto">
                        <div class="">
                            {{-- <h1 class="font-medium w-full mx-auto pb-2">Meses</h1> --}}
                            <div class="bg-neutral-200 mx-auto border border-neutral-300 rounded-lg"
                                x-data="{ selected: {{ $this->idmes->id }} }">
                                <ul class="shadow-box">
                                    @foreach ($this->transparencia->years as $key => $year)
                                        <li class="relative border-b border-neutral-200 w-full">
                                            <button type="button" class="w-full px-4 py-2 text-left"
                                                @click="selected !== {{ $year->id }} ? selected = {{ $year->id }} : selected = null">
                                                <div class="flex items-center justify-between">
                                                    <span
                                                        class="font-semibold text-xs md:text-sm text-neutral-900">{{ $year->mes }}</span>
                                                    <span class="fa-solid transition ease-in-out duration-500">
                                                </div>
                                            </button>
                                            @foreach ($year->months as $ky => $month)
                                                <div class="relative bg-white overflow-hidden transition-all max-h-0 duration-700"
                                                    style="" x-ref="container{{ $year->id }}"
                                                    x-bind:style="selected == {{ $year->id }} ? 'max-height: ' + $refs
                                                        .container{{ $year->id }}.scrollHeight + 'px' : ''">
                                                    <div class="px-4 pt-2 pb-1 my-1 flex justify-between items-center">
                                                        @if ($month->url_file)
                                                            <div class="py-2 flex flex-col lg:hidden">
                                                                <span class="text-xs flex"><i
                                                                        class="fa-solid fa-circle-check text-red-700 px-0 md:px-4 pr-2 cursor-default"></i>
                                                                    {{ $month->title ?: '' }}
                                                                </span>
                                                                <a href="{{ $month->url_file }}" target="_blank"
                                                                    rel="noopener noreferrer"
                                                                    class="flex justify-center items-center bg-red-700 hover:bg-neutral-900 rounded-full w-40 mx-1 mt-1 px-1 md:px-4 py-1 text-white">
                                                                    <span
                                                                        class="font-medium text-xs pr-2">{{ __('Descargar Archivos') }}</span><i
                                                                        class="fa-solid fa-file-lines"></i>
                                                                </a>
                                                            </div>
                                                            <span class="text-xs hidden lg:flex "><i
                                                                    class="fa-solid fa-circle-check text-red-700 px-0 md:px-4 cursor-default"></i>
                                                                {{ $month->title ?: '' }}
                                                            </span>
                                                            <a href="{{ $month->url_file }}" target="_blank"
                                                                rel="noopener noreferrer"
                                                                class="hidden lg:flex justify-center items-center bg-red-700 hover:bg-neutral-900 rounded-full w-40 mx-1 mt-1 px-1 md:px-4 py-1 text-white">
                                                                <span
                                                                    class="font-medium text-xs pr-2">{{ __('Descargar Archivos') }}</span><i
                                                                    class="fa-solid fa-file-lines"></i>
                                                            </a>
                                                        @else
                                                            <span class="text-sm font-semibold">
                                                                {{ $month->title ?: '' }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-gray-800 font-sans mx-auto max-w-3xl py-2 leading-normal px-4">
                        <h2 class="text-2xl font-semibold pb-2">DETALLE</h2>
                        <p class="text-justify">
                            <strong>Articulo 1. DENOMINACIÓN Y NATURALEZA.- </strong> Créase la Empresa Pública ESPOCH, como una persona
                            juridica de derecho público, con personalidad jurídica, con patrimonio propio, dotada de
                            autonomía presupuestaria, financiera, económica, administrativa y de gestión, que opera
                            sobre bases comerciales, sujeta al ordenamiento juridico y legal de la República del
                            Ecuador, y en especial a la Ley Orgánica de Empresa Pública, su reglamento y a la presente
                            resolución de creación.
                            <br>

                            <strong>Articulo 2. DOMICILIO. </strong> La EMPRESA PÚBLICA ESPOCH tendrá su domicilio principal en el cantón

                            Riobamba, provincia de Chimborazo, República del Ecuador, en la Panamericana sur Km 1 ½ (via
                            a

                            Guayaquil). Sin perjuicio de que pueda prestar sus servicios en el ámbito local, provincial,
                            regional,

                            directamente o a través de la creación de empresas filiales, subsidiarias, agencias o
                            unidades de negocio,

                            por asociación o subcontratación, dentro o fuera del país, de conformidad con la ley.
                            <br>
                            <strong>Artículo 3. OBJETO SOCIAL.- </strong> La Empresa Pública ESPOCH EP, tendrá por objeto principal,
                            ofertar alternativas de solución a necesidades y problemas de personas jurídicas o
                            naturales, a nivel nacional como internacional, mediante la formulación, ejecución y
                            evaluación de proyectos; consultorías, prestación de servicios, comercialización y demás
                            productos derivados.

                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
