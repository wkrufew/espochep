<x-app-layout>
    <div class="max-w-3xl mx-auto my-4 bg-white rounded-lg px-4">
        <div class="bg-white px-8 py-4 rounded-lg">
            <h1 class="py-4 text-center">Crear Transparencia de la Empresa</h1>
            <div class=" text-gray-600">
                {!! Form::open(['route' => ['moderador.transparencies.store']]) !!}
                    
                    {!! Form::hidden('user_id',auth()->user()->id) !!}
                    @include('moderador.transparencies.partials.form')
                    
                    <div class="flex justify-center mt-6 mb-4 space-x-5">
                        <a class="bg-neutral-800 px-3 py-1 rounded-full cursor-pointer text-white" href="{{ route('moderador.transparencies.index') }}">Regresar</a>
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