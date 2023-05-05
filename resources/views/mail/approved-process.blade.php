<x-mail::message>

<x-slot:header>
        <x-mail::header :url="config('app.url')">
            {{ config('app.name') }}
        </x-mail::header>
</x-slot:header>

# APROBACION DEL PROCESO
 
Hola, {{$process->moderador->name}}.

El proceso, <strong>{{$process->title_es}}</strong>, ha sido aprobado con exito.
<br>
<strong>Codigo del Proceso: </strong> {{$process->code}}.

El proceso a sido verficado y aprobado por gerencia para ser publico.

<x-mail::button :url="url('/procesos/'.$process->slug)">
    Ver Proceso
</x-mail::button>

Fecha de Aprobacion: {{now()}}

<x-mail::panel>

<strong>Nota: </strong> El proceso publicado esta sujeto a la responsabilidad del autor.

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