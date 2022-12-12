@extends('layouts.template.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())

                    <div class="alert bg-warning alert-dismissible fade show" role="alert">
                        <strong>Revise los campos!</strong> .
                        @foreach ($errors->all() as $error)
                            <span class="badge badge-light-danger">{{ $error }}</span>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                    @endif

                    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name" class="form-label">Nombre del rol:</label>
                                <input type="text" name="name" value="{{ $role->name }}" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Permisos para este rol:</label>
                                <br>
                                @foreach ($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermission), array('class' => 'form-check-input inbox-chkbox'))}}
                                    {{$value->name}}
                                </label>
                            <br>
                            @endforeach
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar los datos</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
