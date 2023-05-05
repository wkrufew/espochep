<x-jet-form-section submit="control">
    <x-slot name="title">
        {{ __('Datos del Proveedor') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Informacion del proveedor ofertante para poder postular a los diferentes procesos.') }}
    </x-slot>

    <x-slot name="form">
        
        <!-- company -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="company" value="{{ __('Compañia') }}/Oferente" />
            <x-jet-input id="company" type="text" class="mt-1 block w-full" wire:model.defer="company" autocomplete="company" />
            <x-jet-input-error for="company" class="mt-2" />
        </div>
        <!-- phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Telefono/Celular') }}" />
            <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="phone" autocomplete="phone" />
            <x-jet-input-error for="phone" class="mt-2" />
        </div>
        <!-- ruc -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="ruc" value="{{ __('CI/RUC') }}" />
            <x-jet-input id="ruc" type="text" class="mt-1 block w-full" wire:model.defer="ruc" autocomplete="ruc" />
            <x-jet-input-error for="ruc" class="mt-2" />
        </div>
        <!-- direccion -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="direction" value="{{ __('Direccion') }}" />
            <x-jet-input id="direction" type="text" class="mt-1 block w-full" wire:model.defer="direction" autocomplete="direction" />
            <x-jet-input-error for="direction" class="mt-2" />
        </div>
        <!-- website -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="website" value="{{ __('Sitio Web') }}" />
            <x-jet-input id="website" type="text" class="mt-1 block w-full" wire:model.defer="website" autocomplete="website" />
            <x-jet-input-error for="website" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="control">
            {{ __('Save') }}
        </x-jet-button>
        
    </x-slot>
</x-jet-form-section>
