<x-moderador-layout :process="$process">
        <h1 class="text-sm font-semibold">OBSERVACIONES DEL PROCESO</h1>
        <hr>

        <div class="text-sm px-4 py-6">
            {!! $process->observation->body !!}
        </div>

</x-moderador-layout>
