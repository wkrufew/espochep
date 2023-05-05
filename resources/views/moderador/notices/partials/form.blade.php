<div class="mb-4">
    {!! Form::label('title_es', 'Titulo de la Noticia (Es)') !!}
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
    {!! Form::label('title_en', 'Titulo de la Noticia (En)') !!}
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
    {!! Form::label('subtitle_es', 'Subtitulo de la Noticia (Es)') !!}
    {!! Form::text('subtitle_es', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('subtitle_es') ? '  border-red-600' : ''),
    ]) !!}
    @error('subtitle_es')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror

</div>
<div class="mb-4">
    {!! Form::label('subtitle_en', 'Subtitulo de la Noticia (En)') !!}
    {!! Form::text('subtitle_en', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('subtitle_en') ? '  border-red-600' : ''),
    ]) !!}
    @error('subtitle_en')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug de la Noticia') !!}
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
    {!! Form::label('description_es', 'Descripcion de la Noticia (Es)') !!}
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
    {!! Form::label('description_en', 'Descripcion de la Noticia (En)') !!}
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
    {!! Form::label('url_file', 'URL') !!}
    {!! Form::text('url_file', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('url_file') ? '  border-red-600' : ''),
    ]) !!}
    @error('url_file')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
</div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
    <div>
        {!! Form::label('category_id', 'Categoria') !!}
        {!! Form::select('category_id', $categories, null, [
            'class' => 'form-input block w-full mt-1 rounded-lg mr-2' . ($errors->has('category_id') ? '  border-red-600' : ''),
            'placeholder' => 'Seleccione una categoria',
        ]) !!}
        @error('category_id')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                <strong class="font-bold">Ups!</strong>
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @enderror
    </div>
    <div class="my-auto">
        <p class="mb-2 text-sm"><b>Nota:</b> Selecciona una imagen para la Noticia</p>
        {!! Form::file('file', ['class' => 'form-input w-full rounded-lg' . ($errors->has('file') ? '  border-red-600' : ''), 'accept' => 'image/webp', 'id' => 'file']) !!}
        @error('file')   
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                <strong class="font-bold">Ups!</strong>
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @enderror
    </div>
</div>
<h1 class="text-lg font-bold mb-2 mt-8">Portada de la Noticia</h1>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
    <figure>
        @isset($notice->image)
            <img id="picture" class="w-full h-64 object-cover object-center rounded-lg" src="{{Storage::url($notice->image->url)}}" alt="{{$notice->title_es}}">
        @else 
            <img id="picture" class="w-full h-64 object-cover object-center rounded-lg" src="https://images.pexels.com/photos/4325451/pexels-photo-4325451.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
        @endisset
    </figure>
</div>

