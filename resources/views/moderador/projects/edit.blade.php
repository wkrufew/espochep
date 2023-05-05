<x-project-layout :project="$project">

     <div class=" text-gray-600">
         {!! Form::model($project, ['route' => ['moderador.projects.update', $project], 'method' => 'put', 'files' => true, ]) !!}
             
             @include('moderador.projects.partials.form')
             
            <div class="flex flex-col w-40 mx-auto my-6">
                <h1 class="pb-2 font-semibold">Estado del Proyecto</h1>
                <div class="border border-black rounded-lg pl-3 py-2">
                    <div>
                        {!! Form::radio('status', 1); !!}
                        {!! Form::label('status', 'Borrador' , ['class' => 'pl-2']) !!}
                    </div>
                    <div>
                        {!! Form::radio('status', 2); !!}
                        {!! Form::label('status', 'Ejecucion' , ['class' => 'pl-2']) !!}
                    </div>
                    <div>
                        {!! Form::radio('status', 3); !!}
                        {!! Form::label('status', 'Terminado' , ['class' => 'pl-2']) !!}
                    </div>
                </div>
            </div>

             <div class="flex justify-center mt-6 mb-4">
                 {!! Form::submit('Actualizar', [
                     'class' => 'bg-blue-700 px-3 py-1 rounded-full cursor-pointer text-white',
                 ]) !!}
             </div>
         {!! Form::close() !!}
     </div>
 
     <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/otros/form.js')}}"></script>
    </x-slot>
 </x-project-layout>
 