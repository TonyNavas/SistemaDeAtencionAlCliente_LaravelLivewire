@extends('layouts.template.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Session::get('mensaje_send'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Exito!</strong> Tu mensaje ha sido enviado correctamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Enviar un mensaje al administrador') }}</div>
                    <div class="card-body">
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label>Asunto</label>
                                <input type="text" value="{{ old('subject') }}" name="subject" class="form-control"
                                    placeholder="Ingrese el asunto">
                                @error('subject')
                                    <small class="text-danger rounded">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label>Mensaje</label>
                                <textarea class="form-control" name="body" rows="4" placeholder="Escriba su mensaje">{{ old('body') }}</textarea>
                                @error('body')
                                    <small class="text-danger rounded">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label>Destinatario</label>
                                <select class="form-control" name="to_user_id">
                                    <option value="" {{ old('to_user_id') ? '' : 'selected' }} disabled>Seleccione un
                                        usuario</option>
                                    @foreach ($users as $user)
                                        <option {{ old('to_user_id') == $user->id ? 'selected' : '' }}
                                            value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('to_user_id')
                                    <small class="text-danger rounded">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn bg-dark text-white">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
