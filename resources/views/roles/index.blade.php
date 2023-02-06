@extends('layouts.template.main')

@section('content')
<div class="card shadow">
    <div class="card-body">

        @can('crar-rol')
        <a class="btn btn-primary mb-3" href="{{ route('roles.create') }}">
            <span>
                <i class="fas fa-plus"></i>
                Agregar nuevo rol
            </span>
        </a>
        @endcan


        {{-- Condicion para cuando se guarde un nuevo usuario --}}
        @if(Session::get('role_saved'))
        <div class="alert bg-primary alert-dismissible fade show" role="alert">
            <strong>Guardado!</strong> Rol guardado correctamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        {{-- Condicion para cuando se edite un usuario --}}
    @elseif (Session::get('role_updated'))
    <div class="alert bg-warning alert-dismissible fade show" role="alert">
        <strong>Actualizado!</strong> Rol modificado correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      @elseif (Session::get('role_deleted'))
      <div class="alert bg-danger alert-dismissible fade show" role="alert">
          <strong>Eliminado!</strong> Rol eliminado correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th class="text-center" scope="col">Acciones</th>
                    </tr>
                    <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>

                        <td class="text-center">
                            <div class="action-btns">
                                @can('editar-rol')
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm btn-rounded" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fa fa-user-edit"></i>
                                </a>
                                @endcan

                                @can('borrar-rol')
                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id],'class' =>'formulario-eliminar', 'style'=>'display:inline']) !!}
                                {!! Form::button('<i class="fa fa-user-times"></i>', ['class' => 'btn btn-sm btn-danger btn-rounded', 'type'=> 'submit']) !!}
                            {!! Form::close() !!}
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $roles->links() }}
        </div>
    </div>
</div>

@endsection



