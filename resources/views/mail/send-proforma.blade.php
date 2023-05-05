<x-mail::message>
<x-slot:header>
        <x-mail::header :url="config('app.url')">
            {{ config('app.name') }}
        </x-mail::header>
</x-slot:header>
# Recepción de Proforma
 
Hola, {{$data['moderador']}}, este es un mensaje de Aplicación a un proceso.

<strong>Datos del Proveedor: </strong><br>
<strong>Nombre: </strong> {{ $data['nombre'] }} <br>
<strong>Correo: </strong> {{ $data['correo'] }} <br>

<strong>Datos del Proceso: </strong><br>

<x-mail::panel>

<strong>Título: </strong> {{ $data['title'] }} <br>
<strong>Código: </strong> {{ $data['code'] }} <br>
<strong>Monto: </strong> ${{ number_format( $data['monto'], 2);}} <br>
@if ($data['url'])
    <strong>Url Archivos: </strong>    
    <x-mail::button :url="$data['url'] ">
        Descargar
    </x-mail::button>
@endif

</x-mail::panel>

Fecha de Solicitud: {{now()}}

Gracias,<br>
ESPOCH EP

{{-- Footer --}}
<x-slot:footer>
    <x-mail::footer>
        © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
    </x-mail::footer>
</x-slot:footer>

</x-mail::message>