@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card mt-5 shadow" style="border: 0px;">
                <div class="card-header py-2" style="background: #fff;">
                    <div class="fs-4 text-center text-muted">
                        {{ __('Iniciar sesión') }}
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="email" class="mb-2 badge bg-warning">{{ __('Usuario') }}</label>

                            <div class="input-group">
                                <span class="input-group-text bg-info text-white">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Ingrese el correo electronico." style="height: 3rem;">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>


                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="mb-2 badge bg-success">{{ __('Contraseña') }}</label>

                            <div class="input-group">
                                <span class="input-group-text bg-info text-white">
                                    <i class="fa-solid fa-key"></i>
                                </span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                placeholder="Ingrese su contraseña" style="height: 3rem;">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                        </div>

                        <div class="form-group mb-4 mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                        </div>

                        <div class="row">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Acceder') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
