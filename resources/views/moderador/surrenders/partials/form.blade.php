<div class="mb-4">
    {!! Form::label('anio', 'Ingrese el Año') !!}
    {!! Form::text('anio', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('anio') ? '  border-red-600' : ''),
    ]) !!}
    @error('anio')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>


