@extends('layouts.layout_authentication')

@section('content')

<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="#" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/academia-logo.png" alt="">
                <span class="d-none d-lg-block" style="color: #005cff !important">ACADEMIA</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">LOGIN</h5>
                  <p class="text-center small">Entre com seu usuário e senha</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
                    @csrf

                  <div class="col-12">
                    <label for="email" class="form-label">E-mail</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="email" name="email" autocomplete="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required>

                      @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                 </div>

                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Lembrar senha') }}
                                </label>
                            </div>
                        </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Entrar</button>
                  </div>
                  {{-- <div class="col-12 text-center">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                     @endif
                  </div> --}}
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

  </div>
@endsection
