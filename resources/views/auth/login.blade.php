@extends('layouts.app')

@section('content')
    <section>
        <div class="container py-5">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="https://mfiles.alphacoders.com/950/950704.jpg"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                      <form action="{{ route('login') }} " method="POST">
                        @csrf

                        <div class="d-flex align-items-center mb-3 pb-1">
                          <span class="h1 fw-bold mb-0">
                            <img width="200px" src="{{ asset('img/logo.png') }}" alt="">
                          </span>
                        </div>

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia sesión con tu cuenta</h5>

                        <div class="form-outline mb-4">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                          value="{{ old('email') }}" required autocomplete="email" autofocus />

                          @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                          <label class="form-label">Correo electronico</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                          <label class="form-label" for="form2Example27">Contraseña</label>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button class="btn btn-dark" type="submit">ACCEDER</button>
                          </div>
                           {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif --}}

                        <p class="mb-5 pb-lg-2" style="color: #393f81;">No tienes una cuenta? <a href="{{ route('register') }}"
                            style="color: #393f81;">Registrate aquí.</a></p>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
