@extends('layouts.template.main')

@section('content')
<div>
    <div class="card shadow">
        <div class="card-body">
            <a class="btn btn-primary mb-3" href="{{ route('usuarios.create') }}">
                <span>
                    <i class="fas fa-plus"></i>
                    Agregar nuevo usuario
                </span>
            </a>
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rol</th>
                            <th class="text-center" scope="col">Acciones</th>
                        </tr>
                        <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td class="text-center">
                                @if (!empty($usuario->getRoleNames()))
                                    @foreach ($usuario->getRoleNames() as $rolName)
                                    <span class="badge badge-light-success">{{ $rolName }}</span>
                                    @endforeach
                                @endif

                            </td>
                            <td class="text-center">
                                <div class="action-btns">
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm btn-rounded" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="fa fa-user-edit"></i>
                                    </a>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $usuario->id],'class' =>'formulario-eliminar', 'style'=>'display:inline']) !!}
                                    {!! Form::button('<i class="fa fa-user-times"></i>', ['class' => 'btn btn-sm btn-danger btn-rounded', 'type'=> 'submit']) !!}
                                {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $usuarios->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
