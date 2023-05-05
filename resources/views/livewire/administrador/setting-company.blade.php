<div>
    @if (session('exito'))
        <div class="alert alert-success" role="alert">
            <strong>Ok! </strong> {{ session('exito') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <form wire:submit.prevent="control" autocomplete="off">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Teléfono</label>
                    <input type="text" wire:model.defer="phone1" class="form-control"
                        aria-describedby="+593983935029" placeholder="+593983935029">
                    @error('phone1')
                        <div class="alert alert-danger" role="alert">
                            <strong>Error! </strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Teléfono Whatsapp</label>
                    <input type="text" wire:model.defer="phone2" class="form-control"
                        aria-describedby="+593983935029" placeholder="+593983935029">
                    <small id="emailHelp" class="form-text text-muted">Teléfono para el boton de Whatsapp</small>
                    @error('phone2')
                        <div class="alert alert-danger" role="alert">
                            <strong>Error! </strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo 1</label>
                    <input type="email" wire:model.defer="email1" class="form-control"
                        aria-describedby="ejemplo1@espoch.com.ec" placeholder="Enter email">
                    @error('email1')
                        <div class="alert alert-danger" role="alert">
                            <strong>Error! </strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo 2 (Opcional)</label>
                    <input type="email" wire:model.defer="email2" class="form-control"
                        aria-describedby="emailHelp" placeholder="ejemplo2@espoch.com.ec">
                    @error('email2')
                        <div class="alert alert-danger" role="alert">
                            <strong>Error! </strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Dirección de la Empresa</label>
                    <input type="text" wire:model.defer="direction" class="form-control"
                        placeholder="Av. Paris y Celso">
                    @error('direction')
                        <div class="alert alert-danger" role="alert">
                            <strong>Error! </strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <input wire:model.defer="foto" accept="image/webp, .jpeg, .jpg" type="file"
                    class="text-gray-700 border-2 border-gray-100 px-3 py-2 placeholder-blueGray-300  bg-white rounded-xl text-sm shadow-md focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                <div wire:loading wire:target="foto" class="text-blue-900 text-xs md:text-sm">
                    Cargando imagen ...
                </div>
                @if ($this->url_nosotros)
                    <p class="">Portada Nosotros:</p>
                    <div class="mb-2">
                            <img style="border-radius: 10% ; width: 150px;" src="{{ Storage::url($this->url_nosotros) }}" alt="portada-miembros">
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        {{--         <div class="card-header">
            
        </div> --}}
    </div>
</div>
