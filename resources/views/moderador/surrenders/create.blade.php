<x-app-layout>
    <div class="max-w-3xl mx-auto my-4 bg-white rounded-lg px-4">
        <div class="bg-white px-8 py-4 rounded-lg">
            <h1 class="py-4 text-center">Crear Rendicion de Cuentas de la Empresa</h1>
            <div class=" text-gray-600">
                {!! Form::open(['route' => ['moderador.surrenders.store']]) !!}
                    
                    {!! Form::hidden('user_id',auth()->user()->id) !!}
                    @include('moderador.surrenders.partials.form')
                    
                    <div class="flex justify-center mt-6 mb-4 space-x-5">
                        <a class="bg-neutral-800 px-3 py-1 rounded-full cursor-pointer text-white" href="{{ route('moderador.surrenders.index') }}">Regresar</a>
                        {!! Form::submit('Guardar', [
                            'class' => 'bg-blue-700 px-3 py-1 rounded-full cursor-pointer text-white',
                        ]) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>