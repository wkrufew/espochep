<div>
    <footer class="relative w-full h-full -mt-1 md:mt-0">
            {{-- <div class="absolute bg-red-700 w-1/2 md:w-11/12 -left-56 -top-10  h-full rounded-3xl"></div> --}}
            <div class="relative bg-neutral-900 h-full rounded-t-lg">

                <div class="py-6 max-w-7xl mx-auto h-auto">
                    {{-- <div>Hola esto es el footer</div> --}}
                    <div class="px-10 grid grid-cols-1 gap-2 md:grid-cols-3 md:gap-1">
                        <div class="flex justify-center items-center">
                           {{--  <img class="w-36 h-36 object-cover bg-cover rounded-full md:mx-auto border-2 border-red-700"
                                src="{{ asset('https://studio.swiperjs.com/demo-images/nature/03.jpg') }}"
                                alt="portada"> --}}
                                <div class="shrink-0 flex items-center">
                                    <a href="/">
                                        <x-jet-application-mark class="block h-9 w-auto" />
                                    </a>
                                </div>
                            {{-- <h1 class="text-base text-red-700 font-semibold text-center py-2">Institucioón</h1>
                            <p class="text-sm text-zinc-300 text-center">
                                Dedicada a las compras publicas nacionales o internacionales
                            </p> --}}

                        </div>
                        <div class="px-6 ml-0 md:ml-10 text-center md:text-left">
                            <h1 class="text-sm text-red-700 font-semibold py-2">{{ __('Empresa') }}</h1>
                            <ul class="space-y-2">
                                <li class="text-xs text-neutral-300 hover:text-neutral-500 cursor-pointer"><i class="hidden lg:inline-block fa-solid fa-circle-check pr-1"></i>{{ __('Procesos') }} </li>
                                <li class="text-xs text-neutral-300 hover:text-neutral-500 cursor-pointer"><i class="hidden lg:inline-block fa-solid fa-circle-check pr-1"></i>{{ __('Noticias') }} </li>
                                <li class="text-xs text-neutral-300 hover:text-neutral-500 cursor-pointer"><i class="hidden lg:inline-block fa-solid fa-circle-check pr-1"></i>{{ __('Proyectos') }} </li>
                                <li class="text-xs text-neutral-300 hover:text-neutral-500 cursor-pointer"><i class="hidden lg:inline-block fa-solid fa-circle-check pr-1"></i>{{ __('Rendición de Cuentas') }} </li>
                                <li class="text-xs text-neutral-300 hover:text-neutral-500 cursor-pointer"><i class="hidden lg:inline-block fa-solid fa-circle-check pr-1"></i>{{ __('Transparencia') }} </li>
                            </ul>
                        </div>

                        <div class="px-6 mx-auto md:ml-10 text-center md:text-left">
                            <h1 class="text-sm text-red-700 font-semibold py-2">{{ __('Servicios') }}</h1>
                            <ul class="space-y-2">
                                <li class="text-xs text-neutral-300 hover:text-neutral-500 cursor-pointer"><i class="hidden lg:inline-block fa-solid fa-circle-check pr-1"></i>{{ __('Infima Cuantía') }} </li>
                                <li class="text-xs text-neutral-300 hover:text-neutral-500 cursor-pointer"><i class="hidden lg:inline-block fa-solid fa-circle-check pr-1"></i>{{ __('Menor Cuantía') }} </li>
                                <li class="text-xs text-neutral-300 hover:text-neutral-500 cursor-pointer"><i class="hidden lg:inline-block fa-solid fa-circle-check pr-1"></i>{{ __('Licitación') }} </li>
                                <li class="text-xs text-neutral-300 hover:text-neutral-500 cursor-pointer"><i class="hidden lg:inline-block fa-solid fa-circle-check pr-1"></i>{{ __('Subasta Inversa') }} </li>
                                <li class="text-xs text-neutral-300 hover:text-neutral-500 cursor-pointer"><i class="hidden lg:inline-block fa-solid fa-circle-check pr-1"></i>{{ __('Régimen Especial') }} </li>
                                <li class="text-xs text-neutral-300 hover:text-neutral-500 cursor-pointer"><i class="hidden lg:inline-block fa-solid fa-circle-check pr-1"></i>{{ __('Verificación de Producción Nacional') }} </li>
                            </ul>

                        </div>
                        {{-- <div class="px-6 mx-auto md:ml-10 text-center md:text-left">
                            <h1 class="text-sm text-red-700 font-semibold py-2">{{ __('Ayuda') }}</h1>
                            <ul class="space-y-2">
                                <li class="text-xs md:text-sm text-neutral-300"><i class="fa-solid fa-circle-check pr-1"></i>{{ __('Manual de Usuario') }} </li>
                                <li class="text-xs md:text-sm text-neutral-300"><i class="fa-solid fa-circle-check pr-1"></i>{{ __('') }} </li>
                                <li class="text-xs md:text-sm text-neutral-300"><i class="fa-solid fa-circle-check pr-1"></i>{{ __('Licitación') }} </li>
                                <li class="text-xs md:text-sm text-neutral-300"><i class="fa-solid fa-circle-check pr-1"></i>{{ __('Subasta Inversa') }} </li>
                                <li class="text-xs md:text-sm text-neutral-300"><i class="fa-solid fa-circle-check pr-1"></i>{{ __('Régimen Especial') }} </li>
                                <li class="text-xs md:text-sm text-neutral-300"><i class="fa-solid fa-circle-check pr-1"></i>{{ __('Verificación de Producción Nacional') }} </li>
                            </ul>
                        </div> --}}
                        {{-- <div class="px-6 ml-10">
                            <h1 class="text-base text-red-700 font-semibold py-2">Redes Sociales</h1>
                            <div class="space-x-4">
                                <a href="https://www.facebook.com/profile.php?id=100075856870490" target="_blank"><i
                                        class="fab fa-facebook text-[#3b5998] text-lg cursor-pointer"></i></a>
                                <a href="https://web.whatsapp.com/" target="_blank"><i
                                        class="fab fa-whatsapp text-[#4dc247] text-lg cursor-pointer"></i></a>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="max-w-7xl mx-auto flex justify-around text-neutral-400 text-xs py-4 flex-wrap">
                    <div class="text-center lg:text-left">Copyright © {{ date('Y') }} {{ config('app.name') }}.  @lang('All rights reserved.'){{-- Copyright © 2023 {{ __('Todos los derechos reservados por ESPOCH-EP') }} --}}</div>
                    <div class="m-2 lg:mt-0">{{ __('Desarrollado por') }}: <a href="www.facebook.com" class="hover:text-red-700 underline">Ing. Smith Aviles</a></div>
                </div>

            </div>
    </footer>
</div>