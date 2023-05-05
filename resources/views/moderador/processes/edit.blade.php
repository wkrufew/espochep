<x-moderador-layout :process="$process">
    
   {{--  <x-slot name="process">
        {{ $process->slug }}
    </x-slot> --}}

    <div class=" text-gray-600">
        {!! Form::model($process, ['route' => ['moderador.processes.update', $process], 'method' => 'put', 'files' => true, ]) !!}
            
            @include('moderador.processes.partials.form')

            @if ($process->status == 2 || $process->status == 4 || $process->status == 3)
                <div class="flex flex-col w-40 mx-auto my-6">
                    <h1 class="pb-2 font-semibold">Estado del proceso</h1>
                    <div class="border border-black rounded-lg pl-3 py-2">
                        <div>
                            {!! Form::radio('status', 2); !!}
                            {!! Form::label('status', 'Ejecucion' , ['class' => 'pl-2']) !!}
                        </div>
                        <div>
                            {!! Form::radio('status', 4); !!}
                            {!! Form::label('status', 'Desierto' , ['class' => 'pl-2']) !!}
                        </div>
                        <div>
                            {!! Form::radio('status', 3); !!}
                            {!! Form::label('status', 'Adjudicado' , ['class' => 'pl-2']) !!}
                        </div>
                    </div>
                </div>
            @endif

            {{-- <div class="text-right py-4">
                @if ($process->url_file)
                    <span class="text-sm font-semibold"><i class="fa-solid fa-file-pdf text-red-700 text-2xl"></i> 
                        @php
                            $prueba = explode("/", $process->url_file);
                        @endphp
                        {{$prueba[1]}}
                    </span>
                @else
                <span class="text-sm font-semibold"><i class="fa-solid fa-file-pdf text-2xl"></i> Sin Documento</span>
                @endif
            </div> --}}
            
            <div class="flex justify-center mt-6 mb-4">
                {!! Form::submit('Actualizar Procesos', [
                    'class' => 'bg-blue-600 px-4 py-2 rounded-full cursor-pointer text-white text-sm hover:bg-blue-800',
                ]) !!}
            </div>
        {!! Form::close() !!}
    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/moderador/processes/form.js')}}"></script>
    </x-slot>
</x-moderador-layout>
