<x-mail::message>
<x-slot:header>
        <x-mail::header :url="config('app.url')">
            {{ config('app.name') }}
        </x-mail::header>
</x-slot:header>
# NEGACION DE APROBACION DEL PROCESO
 
Hola, {{$process->moderador->name}}.

El proceso, <strong>{{$process->title_es}}</strong>, ha sido rechazo.
<br>
<strong>Código del Proceso: </strong> {{$process->code}}. <br>
<strong>Motivo del Rechazo: </strong> {!! $process->observation->body !!}.


Fecha de Verificación: {{now()}}

<x-mail::panel>

<strong>Nota: </strong> El proceso ha sido verificado y se constato que aun se encuentra imcompleto por lo que no es posible publicarlo.

</x-mail::panel>

Gracias,<br>
ESPOCH EP

{{-- Footer --}}
<x-slot:footer>
    <x-mail::footer>
        © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
    </x-mail::footer>
</x-slot:footer>

</x-mail::message>