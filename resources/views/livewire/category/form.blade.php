<form>
    @if ($selected_id > 1)
    <div class="bg-info p-2 mb-4 rounded">
        Datos cargados <i class="fas fa-check bg-success rounded-circle p-1"></i>
    </div>
    @else
    <div class="bg-primary p-2 mb-4 rounded">
        Agregar nueva categoria <i class="fas fa-folder-plus"></i>
    </div>
    @endif

    <div class="form-group">
      <label for="name">Nombre de la categoria:</label>
      <input type="text" wire:model.lazy="name" class="form-control" placeholder="Ejemplo: Desayuno">
    </div>
    @error('name')<span class="text-danger er">{{ $message }}</span>@enderror
    <div class="form-group mb-2">
      <label for="description">Descripción:</label>
      <input type="text" wire:model.lazy="description" class="form-control" placeholder="Ingrese una descripción">
    </div>
    @error('description')<span class="text-danger er">{{ $message }}</span>@enderror
    <div class="form-group mb-2">
    <label for="image">Image</label>
    <input type="file" wire:model.lazy="image" id="{{ $identificador }}" class="form-control">
  </div>
  @error('image')<span class="text-danger er">{{ $message }}</span>@enderror

    @if ($selected_id < 1)
        <button type="button" wire:click.prevent="store()" class="btn btn-primary">
            <span><i class="fas fa-plus"></i> Guardar
            </span>
        </button>

        <button type="button" wire:click.prevent="resetUI()" class="btn btn-success">
            <span><i class="fas fa-broom"></i> Limpiar
            </span>
        </button>
        @else
        <button type="button" wire:click.prevent="update()" class="btn btn-warning">
            <span><i class="fas fa-pencil-alt"></i> Editar</span>
        </button>
    @endif
  </form>

