<div class="mb-4">
    {!! Form::label('title_es', 'Titulo del Proyecto (Es)') !!}
    {!! Form::text('title_es', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('title_es') ? '  border-red-600' : ''),
    ]) !!}
    @error('title_es')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror

</div>
<div class="mb-4">
    {!! Form::label('title_en', 'Titulo del Proyecto (En)') !!}
    {!! Form::text('title_en', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('title_en') ? '  border-red-600' : ''),
    ]) !!}
    @error('title_en')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del Proyecto') !!}
    {!! Form::text('slug', null, [
        'readonly' => 'readonly',
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('slug') ? '  border-red-600' : ''),
    ]) !!}
    @error('slug')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>


<div class="mb-4">
    {!! Form::label('description_es', 'Descripcion del Proyecto (Es)') !!}
    {!! Form::textarea('description_es', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('description_es') ? '  border-red-600' : ''),
    ]) !!}
    @error('description_es')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('description_en', 'Descripcion del Proyecto (En)') !!}
    {!! Form::textarea('description_en', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('description_en') ? '  border-red-600' : ''),
    ]) !!}
    @error('description_en')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('fecha_inicio', 'Fecha de Inicio') !!}
    {!! Form::date('fecha_inicio', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('fecha_inicio') ? '  border-red-600' : ''),
    ]) !!}
    @error('fecha_inicio')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
    <div class="my-auto">
        <p class="mb-2 text-sm"><b>Nota:</b> Selecciona una imagen para el Proyecto</p>
        {!! Form::file('file', ['class' => 'form-input w-full rounded-lg' . ($errors->has('file') ? '  border-red-600' : ''), 'accept' => 'image/webp, .png, .jpg', 'id' => 'file']) !!}
        @error('file')   
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                <strong class="font-bold">Ups!</strong>
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @enderror
    </div>
    <figure>
        <h1 class="text-lg font-bold mb-2 mt-8">Portada del Proyecto</h1>
        @isset($project->image)
            <img id="picture" class="w-full h-48 object-cover object-center rounded-lg" src="{{Storage::url($project->image->url)}}" alt="{{$project->image}}">
        @else 
            <img id="picture" class="w-full h-48 object-cover object-center rounded-lg" src="https://images.pexels.com/photos/4325451/pexels-photo-4325451.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
        @endisset
    </figure>
</div>


