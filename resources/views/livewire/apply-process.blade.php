<div>
    <h1 class="text-red-700 font-semibold text-base text-center pb-6">DATOS DE LA OFERTA</h1>
    <form wire:submit.prevent = "save" {{-- action="{{ Route('process.enrolled', $process) }}"  method="post" enctype="multipart/form-data"--}}>
        @csrf
        <div class="space-y-3">
            <div class="flex">
                <label class="text-sm font-semibold text-left w-44 mx-auto my-auto" for="">
                    <i class="fa-solid fa-sack-dollar"></i> 
                        Valor de la Oferta
                </label>
                <input wire:model="monto" value="{{ old('monto') }}" 
                    class="rounded-full flex-1 h-8 block text-center w-full mx-auto border border-neutral-500"
                    placeholder="$ 0.00" name="monto" id="" type="text">

            </div>
            @error('monto')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 text-xs rounded relative mt-1" role="alert">
                    <strong class="font-bold">Ups!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror
            @if ($multiple)
                <div class="flex">
                    <label class="text-sm font-semibold text-left w-24 mx-auto my-auto" for=""><i
                            class="fa-solid fa-arrow-right-arrow-left"></i> WeTranfer</label>
                    <input wire:model="url" value="{{ old('url') }}"
                        class="rounded-full flex-1 h-8 block text-center w-32 mx-auto border border-neutral-500"
                        placeholder="https://wetransfer.com/" name="url" id="">

                </div>
                @error('url')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 text-xs rounded relative mt-1" role="alert">
                        <strong class="font-bold">Ups!</strong>
                        <span class="block sm:inline">{{ $message }}</span>
                    </div>
                @enderror
                <div class="text-xs">
                    <span class="font-semibold">Nota: </span>Para ir a WeTranfer y subir sus archivos &nbsp;<a href="https://wetransfer.com/" class="underline" target="_blank" rel="noopener noreferrer">{{ __('Click Aquí') }}</a>
                </div>  
            @else
                <div class="flex justify-center">
                    <label class="block">
                        <span class="sr-only">Elegir un Archivo</span>
                        <input type="file" wire:model="file"
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
            @endif

            <div class="pt-2 flex justify-center space-x-2">
                <div class="flex">
                    <span class="text-xs pr-1">{{ __('Un solo Archivo') }}</span>
                    <input class="rounded-full checked:bg-red-700 checked:text-red-700" type="radio" wire:model="multiple" name="multiple" id="" value="0">
                </div>
                <div class="flex">
                    <span class="text-xs pr-1">{{ __('Multiples') }}</span>
                    <input class="rounded-full checked:bg-red-700 checked:text-red-700" type="radio" wire:model="multiple" name="multiple" id="" value="1">
                </div>
           </div>
            <div class="pt-2 flex justify-center">
                <div wire:loading wire:target="save">
                    <label class="text-neutral-800  text-base flex items-center">Procesando datos ...
                        <svg class="animate-spin flex items-center ml-2 mr-3 h-5 w-5 text-neutral-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </label>
                </div>
                {{-- <button wire:click="save" wire:target="save"  
                        wire:loading.remove class="border-0  mx-auto focus:outline-none focus:ring ease-linear transition-all duration-150 lg:mx-0 hover:bg-blue-700  bg-blue-900 text-white font-bold rounded-full my-2 py-2 px-8 shadow-2xl">
                        SEND
                </button>  --}}
                <button wire:target="save" wire:loading.remove class="px-4 py-1 bg-neutral-900 hover:bg-neutral-700 transition-all rounded-full text-sm text-white" type="submit">
                    Enviar
                </button>
            </div>
        </div>
    </form>
</div>
