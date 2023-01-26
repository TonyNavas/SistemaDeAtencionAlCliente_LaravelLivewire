@extends('layouts.app')

@section('content')
    <div style="padding-top: 5rem;" class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div style="border: 0;" class="card p-3 rounded shadow">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>Por favor revise los campos! </strong>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif

                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label>
                                    Nombre
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control bg-white" placeholder="Ingrese el nombre del contacto">
                                @error('name')
                                <small class="text-danger rounded">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label>
                                    Correo
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control bg-white" placeholder="Ingrese el correo del contacto">
                                @error('email')
                                <small class="text-danger rounded">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label>
                                    Mensaje
                                </label>
                                <textarea name="message" cols="30" rows="4" class="form-control bg-white" placeholder="Ingrese el mensaje">{{ old('message') }}</textarea>
                                @error('message')
                                <small class="text-danger rounded">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="flex float-end">
                                <button class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
