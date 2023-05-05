<div class="form-group">
    {!! Form::label('name', 'Nombre de Rol: ') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
        'placeholder' => 'Escriba el nombre de un Rol ...',
    ]) !!}
    @error('name')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


</div>
<strong>Permisos</strong>
@error('permissions')
    <br>
    <small class="text-danger">
        <strong> {{ $message }} </strong>
    </small>
    <br>
@enderror

@forelse ($permissions as $permission)
<div>
    <label>
        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
        {{ $permission->name }}
    </label>
</div>
@empty
    <div>
        No se encuentran permisos
    </div>
@endforelse