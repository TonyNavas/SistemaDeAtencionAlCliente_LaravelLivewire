@if ($image)
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-2 rounded">
                    <img class="img-fluid rounded" src="{{ $image->temporaryUrl() }}" alt="image">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card bg-info">
                    <div class="card-body">
                        La imagen esta lista para subirse <i class="fas fa-check bg-success p-1 rounded-circle"></i>
                    </div>
                </div>

                <div class="mt-2">
                    <button wire:click="clearImage" class="btn btn-danger">Eliminar imagen</button>
                </div>
            </div>
        </div>
            @else
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card mb-2">
                    <div class="card-body fw-bold">
                        Aqui se cargarán las imagenes <i class="fas fa-image"></i>

                        <div wire:loading wire:target="image" class="text-warning">
                            La imagen se esta procesando, por favor espere...
                        </div>
                    </div>
                </div>
            </div>
        @endif
