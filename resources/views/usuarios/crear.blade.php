@extends('layouts.template.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        @foreach ($errors as $error)
                        <strong>Revise los campos!</strong> {{ $error }}.
                        @endforeach
                    </div>
                    @endif

                    {!! Form::open(array('route' => 'usuarios.store', 'method' => 'POST')) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="confirm-password" class="form-label">Confirmar contraseña</label>
                                <input type="text" name="confirm-password" class="form-control">
                            </div>
                            {{-- <div class="col-md-6">
                                <label for="inputCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div> --}}
                            <div class="col-md-12 mb-4">
                                <label for="roles">Roles</label>
                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                            </div>
                            {{-- <div class="col-md-2">
                                <label for="inputZip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div> --}}

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar los datos</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
