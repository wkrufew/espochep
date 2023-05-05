<x-app-layout>
    <div class="max-w-3xl mx-auto py-4 mt-4 bg-white rounded-lg px-4">
        <h1 class="text-center py-4 font-semibold">ACTUALIZAR DATOS DE LA NOTICIA</h1>
        <div class="bg-white px-8 py-4 rounded-lg">
            <div class=" text-gray-600">
                {!! Form::model($notice, [
                    'route' => ['moderador.notices.update', $notice],
                    'method' => 'put',
                    'files' => true,
                ]) !!}

                @include('moderador.notices.partials.form')

                <div class="flex flex-col w-40 mx-auto my-6">
                    <h1 class="pb-2 font-semibold">Estado de la Noticia</h1>
                    <div class="border border-black rounded-lg pl-3 py-2">
                        <div>
                            {!! Form::radio('status', 1); !!}
                            {!! Form::label('status', 'Borrador' , ['class' => 'pl-2']) !!}
                        </div>
                        <div>
                            {!! Form::radio('status', 2); !!}
                            {!! Form::label('status', 'Publicado' , ['class' => 'pl-2']) !!}
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-center mb-4 space-x-5">
                    <a class="bg-neutral-800 px-3 py-1 rounded-full cursor-pointer text-white text-sm" href="{{ route('moderador.notices.index') }}">Regresar</a>
                    {!! Form::submit('Actualizar Noticia', [
                        'class' => 'bg-blue-700 px-3 py-1 rounded-full cursor-pointer text-white text-sm',
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
