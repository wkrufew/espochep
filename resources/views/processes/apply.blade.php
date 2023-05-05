<x-app-layout>
    <style>
        .fondo {
            background-color: #BD0000;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg stroke='%23000' stroke-width='66.7' stroke-opacity='0.05' %3E%3Ccircle fill='%23BD0000' cx='0' cy='0' r='1800'/%3E%3Ccircle fill='%23b7000e' cx='0' cy='0' r='1700'/%3E%3Ccircle fill='%23b10018' cx='0' cy='0' r='1600'/%3E%3Ccircle fill='%23a9001f' cx='0' cy='0' r='1500'/%3E%3Ccircle fill='%23a10025' cx='0' cy='0' r='1400'/%3E%3Ccircle fill='%23990029' cx='0' cy='0' r='1300'/%3E%3Ccircle fill='%238f002d' cx='0' cy='0' r='1200'/%3E%3Ccircle fill='%23860030' cx='0' cy='0' r='1100'/%3E%3Ccircle fill='%237c0033' cx='0' cy='0' r='1000'/%3E%3Ccircle fill='%23710034' cx='0' cy='0' r='900'/%3E%3Ccircle fill='%23670035' cx='0' cy='0' r='800'/%3E%3Ccircle fill='%235c0035' cx='0' cy='0' r='700'/%3E%3Ccircle fill='%23510034' cx='0' cy='0' r='600'/%3E%3Ccircle fill='%23470032' cx='0' cy='0' r='500'/%3E%3Ccircle fill='%233c0030' cx='0' cy='0' r='400'/%3E%3Ccircle fill='%2332022c' cx='0' cy='0' r='300'/%3E%3Ccircle fill='%23290228' cx='0' cy='0' r='200'/%3E%3Ccircle fill='%23210024' cx='0' cy='0' r='100'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    <div
        class="fondo max-w-6xl mx-4 md:mx-6 lg:mx-auto m-6 py-4 md:py-6 px-2 md:px-4 rounded-lg text-center text-white font-semibold text-xs md:text-base uppercase">
        {{ $process->{'title_' . app()->getLocale()} }}
    </div>
    {{-- <div class="max-w-6xl m-6 md:m-8 lg:mx-auto p-6 bg-white rounded-lg">
        <div class="w-full md:max-w-sm mx-auto">
            <h1 class="text-red-700 font-semibold text-base text-center pb-6">DATOS DE LA PROFORMA</h1>
            <form action="{{ Route('process.enrolled', $process) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="space-y-3">
                    <div class="flex">
                        <label class="text-sm font-semibold text-left w-24 mx-auto my-auto" for=""><i
                                class="fa-solid fa-sack-dollar"></i> Monto</label>
                        <input value="{{ old('monto') }}" inputmode="numeric" pattern="\d*"
                            class="rounded-full flex-1 h-8 block text-center w-32 mx-auto border border-neutral-500"
                            placeholder="$ 0.00" name="monto" id="">

                    </div>
                    @error('monto')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 text-xs rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                    <div class="flex justify-center">
                        <label class="block">
                            <span class="sr-only">Elegir un Archivo</span>
                            <input type="file"
                                class="block w-full text-sm text-neutral-600 rounded-full
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-red-100 file:text-red-700
                               hover:file:bg-red-200 cursor-pointer
                            " accept="application/pdf" name="file" id="file" />
                        </label>
                        
                    </div>
                    @error('file')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 text-xs rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                    <div class="pt-2 flex justify-center">
                        <button class="px-4 py-1 bg-neutral-900 hover:bg-neutral-700 transition-all rounded-full text-sm text-white" type="submit">
                            Enviar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div>
            <iframe width="500" height="300" src="https://www.youtube-nocookie.com/embed/xZHUi3EY1E8?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div> --}}

    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 bg-white rounded-lg p-4 mb-6">
        <div class="w-full md:max-w-sm mx-auto order-1 md:order-2">
                @livewire('apply-process', ['process' => $process], key($process->id))
        </div>
        <div class="rounded-lg overflow-hidden order-2 md:order-1 p-4">
            <h1 class="py-2 text-xs text-center"><span class="font-semibold">Nota:</span> Tutorial sobre como subir multiples archivos </h1>
            {{-- <iframe class="w-full h-72 rounded-lg overflow-hidden" src="https://www.youtube.com/embed/ULlVfUtFkbI" title="☁️ Qué es y Cómo usar WETRANSFER en 2023  【 Tutorial en Español 】 - Subir Archivos OnLine GRATIS" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}
            <iframe class="w-full h-64 rounded-lg overflow-hidden" src="https://www.youtube.com/embed/dtePfb1GrvA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>    
          </div>
    </div>
</x-app-layout>
