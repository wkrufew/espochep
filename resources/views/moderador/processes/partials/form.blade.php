<div class="mb-4">
    {!! Form::label('title_es', 'Título del Proceso (Es)') !!}
    {!! Form::text('title_es', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('title_es') ? '  border-red-600' : ''),
    ]) !!}
    @error('title_es')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror

</div>
<div class="mb-4">
    {!! Form::label('title_en', 'Título del Proceso (En)') !!}
    {!! Form::text('title_en', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('title_en') ? '  border-red-600' : ''),
    ]) !!}
    @error('title_en')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('code', 'Código del Proceso') !!}
    {!! Form::text('code', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('code') ? '  border-red-600' : ''),
    ]) !!}
    @error('code')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('slug', 'Slug del proceso') !!}
    {!! Form::text('slug', null, [
        'readonly' => 'readonly',
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('slug') ? '  border-red-600' : ''),
    ]) !!}
    @error('slug')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('object_es', 'Objeto del Proceso (Es)') !!}
    {!! Form::text('object_es', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('object_es') ? '  border-red-600' : ''),
    ]) !!}
    @error('object_es')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('object_en', 'Objeto del Proceso (En)') !!}
    {!! Form::text('object_en', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('object_en') ? '  border-red-600' : ''),
    ]) !!}
    @error('object_en')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('description_es', 'Descripción del plan (Es)') !!}
    {!! Form::textarea('description_es', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('description_es') ? '  border-red-600' : ''),
    ]) !!}
    @error('description_es')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('description_en', 'Descripción del plan (En)') !!}
    {!! Form::textarea('description_en', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('description_en') ? '  border-red-600' : ''),
    ]) !!}
    @error('description_en')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('forma_pago_es', 'Forma de Pago (Es)') !!}
    {!! Form::text('forma_pago_es', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('forma_pago_es') ? '  border-red-600' : ''),
    ]) !!}
    @error('forma_pago_es')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('forma_pago_en', 'Forma de Pago (En)') !!}
    {!! Form::text('forma_pago_en', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('forma_pago_en') ? '  border-red-600' : ''),
    ]) !!}
    @error('forma_pago_en')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('url_file', 'Link de Archivos Adjuntos') !!}
    {!! Form::text('url_file', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('url_file') ? '  border-red-600' : ''),
    ]) !!}
    @error('url_file')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('link', 'Redireccion al Sercop (Opcional si no es Licitación Internacional)') !!}
    {!! Form::text('link', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('link') ? '  border-red-600' : ''),
    ]) !!}
    @error('link')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>
<div class="flex justify-between ">
    <div class="w-full pr-4">
        {!! Form::label('date_end', 'Fecha de Finalización') !!}
        {!! Form::date('date_end', null, [
            'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('date_end') ? '  border-red-600' : ''),
        ]) !!}
        @error('date_end')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
                <strong class="font-bold">Ups!</strong>
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @enderror
    </div>
    <div class="w-full">
        {!! Form::label('purchase_id', 'Tipo de Proceso') !!}
        {!! Form::select('purchase_id', $categories, null, [
            'class' => 'form-input block w-full mt-1 rounded-lg mr-2' . ($errors->has('purchase_id') ? '  border-red-600' : ''),
            'placeholder' => 'Seleccione un proceso',
        ]) !!}
        @error('purchase_id')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
                <strong class="font-bold">Ups!</strong>
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @enderror
    </div>
    {{-- <div>
        <p class="hidden md:block"><b>Nota:</b> Selecciona un TDR en PDF</p>
        <p class="block md:hidden"><b>Nota:</b> Selecciona un PDF</p>
        {!! Form::file('url_file', [
            'class' => 'form-input w-full rounded-lg  ml-2' . ($errors->has('url_file') ? '  border-red-600' : ''),
            'accept' => 'application/pdf',
            'id' => 'url_file',
        ]) !!}
        @error('url_file')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                <strong class="font-bold">Ups!</strong>
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @enderror
    </div> --}}
</div>
