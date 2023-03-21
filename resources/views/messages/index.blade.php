@extends('layouts.template.main')

@section('content')
    <div class="row" >
        <div class="col-lg-7 col-md-6 col-sm-12 mb-4" style="max-height: 500px; overflow-y:auto;">

            @if (Session::has('success'))
            <div class="alert bg-primary text-white" role="alert">
                {{ Session::get('success') }}
            </div>
        @elseif (Session::has('warning'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('warning') }}
            </div>
        @endif

            @foreach ($messages as $message)
                <div class="card mb-2">
                    <div class="card-body">
                        <div style="justify-content: space-between;">
                            <div style="float: left;">
                                <h6>De:{{ $message->users->name }} Para: {{ $message->usersTo->name }}</h6>
                                <p><span class="badge badge-light-primary">{{ $message->created_at->diffForHumans() }}</span>
                                </p>
                                <b>{{ $message->subject }}</b>
                                <p>{{ $message->body }}</p>
                            </div>

                            <div style="float: right;">
                                <a href="{{ route('messages.destroy', $message->id) }}" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('messages.send') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label>Asunto</label>
                            <input type="text" name="subject" class="form-control" placeholder="Ingrese el asunto">
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
                                    <option {{ old('to_user_id') == $user->id ? 'selected' : '' }} value="{{ $user->id }}">
                                        {{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('to_user_id')
                                <small class="text-danger rounded">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Enviar
                            </button>
                        </div>

                </div>
            </div>
            </form>
                </div>
            </div>
    </div>

    </div>
@endsection
