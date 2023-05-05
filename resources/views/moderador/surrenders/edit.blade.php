<x-surrender-layout :surrender="$surrender">
    
    <div class=" text-gray-600">
        {!! Form::model($surrender, ['route' => ['moderador.surrenders.update', $surrender], 'method' => 'put']) !!}
            
           @include('moderador.surrenders.partials.form')

           <div class="flex flex-col w-40 mx-auto my-6">
               <h1 class="pb-2 font-semibold">Estado</h1>
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
            
           <div class="flex justify-center mt-6 mb-4">
               {!! Form::submit('Actualizar', [
                   'class' => 'bg-blue-700 px-3 py-1 rounded-full cursor-pointer text-white',
               ]) !!}
           </div>
        {!! Form::close() !!}
    </div>

</x-surrender-layout>
