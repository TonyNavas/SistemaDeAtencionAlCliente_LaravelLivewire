
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">

        @can('crear-productos')
        <div class="card">
            <div class="card-body">
                @include('livewire.products.form')
            </div>
        </div>
        @endcan

        @can('ver-productos')
        @include('livewire.products.card-count')
        @endcan
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12">

        @can('ver-productos')
        @include('livewire.products.image-load')
        @endcan

        @can('ver-productos')
        <div class="card shadow">
            <div class="card-body">
                @if ($selected_id >= 1)
                    <button type="button" wire:click="resetUI" class="btn btn-primary mb-2">
                        <span><i class="fas fa-sync-alt"></i> Cambiar a guardar</span>
                    </button>
                @endif

                @include('common.search')
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio</th>
                                <th class="text-center" scope="col">Acciones</th>
                            </tr>
                            <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><img width="80px" height="70px" class="rounded" src="{{ asset('storage/products/' . $product->image) }}" alt="Image">
                                    </td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ Str::limit($product->name, 10, '...') }}</td>
                                    <td>{{ Str::limit($product->description, 20, '...') }}</td>
                                    <td>
                                        <span class="badge badge-success">
                                            C$:{{ number_format($product->price, 2) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" wire:click="edit({{ $product->id }})"
                                            class="btn btn-primary shadow" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="javascript:void(0)" onclick="Confirm('{{ $product->id }}')"
                                            class="btn shadow btn-danger" title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        @endcan
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('category-deleted', msg => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                background: '#191E3A',
                color: '#fff',
                title: 'Eliminado correctamente!',
                showConfirmButton: false,
                timer: 1500
            })
        });
    });

    function Confirm(id) {
        swal.fire({
            title: 'Estas seguro?',
            text: "No podras revertir esta acción!",
            icon: 'warning',
            background: '#191E3A',
            color: '#fff',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
        }).then(function(result) {
            if (result.value) {
                window.livewire.emit('destroy', id)
                swal.close()
            }
        });
    }
</script>
