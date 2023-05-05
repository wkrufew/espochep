<x-app-layout>
    <div class="max-w-3xl mx-auto my-4 bg-white rounded-lg px-4">
        <div class="bg-white px-8 py-4 rounded-lg">
            <h1 class="py-4 text-center font-semibold">Crear un nuevo Proyecto</h1>
            <div class=" text-gray-600">
                {!! Form::open(['route' => ['moderador.projects.store'], 'files' => true, ]) !!}
                    
                    {!! Form::hidden('user_id',auth()->user()->id) !!}
                    @include('moderador.projects.partials.form')
                    
                    <div class="flex justify-center mt-6 mb-4 space-x-5">
                        <a class="bg-neutral-800 px-3 py-1 rounded-full cursor-pointer text-white" href="{{ route('moderador.projects.index') }}">Regresar</a>
                        {!! Form::submit('Guardar', [
                            'class' => 'bg-blue-700 px-3 py-1 rounded-full cursor-pointer text-white',
                        ]) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/otros/form.js')}}"></script>
    </x-slot>
</x-app-layout>