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
                <div class="">

                    <div class="">
                        @can('ver-timbre')
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4 visually-hidden">
                                <label>Asunto</label>
                                <input type="text" value="Que nota mi pana como estas" name="subject" class="form-control"
                                    placeholder="Ingrese el asunto">
                                @error('subject')
                                    <small class="text-danger rounded">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-4 visually-hidden">
                                <label>Asunto</label>
                                <input type="text" value="Que nota mi pana como estas 2" name="body" class="form-control"
                                    placeholder="Ingrese el asunto">
                                @error('body')
                                    <small class="text-danger rounded">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-4 visually-hidden">
                                <label>Destinatario</label>
                                <select class="form-control" name="to_user_id">
                                    {{-- <option value="" {{ old('to_user_id') ? '' : 'selected' }} disabled>Seleccione un
                                        usuario</option> --}}
                                    @foreach ($users as $user)
                                        <option {{ old('to_user_id') == $user->id ? 'selected' : '' }}
                                            value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('to_user_id')
                                    <small class="text-danger rounded">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="card style-5  mb-md-0 mb-4">
                                <div class="card-top-content">
                                    <div class="avatar avatar-md">
                                        <i style="font-size: 45px;" class="fas fa-info-circle text-info"></i>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <h5 class="card-title mb-2">¡Bienvenido!</h5>
                                        <p class="card-text">Preciona el timbre para solicitar atención</p>
                                    </div>
                                </div>
                            </div>
                                <div class="row justify-content-center align-items-center mt-5">
                                    <div class="col-auto text-center">
                                        <button type="submit"
                                                class="button shadow"
                                                style="background: rgb(223, 223, 27);">
                                                <i class="fas fa-bell"></i>
                                        </button>
                                    </div>
                                </div>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
