@extends('adminlte::master')

@section('body')
<style>
    .logo-icon {
        width: 40x;
        height: 40px;
    }
</style>
    <div class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="{{ asset('favicon 1.png') }}" alt="Logo" class="logo-icon">
                    <span class="logo-text">AUTOVEX</span>
                </a>
            </div>

            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg text-center">Inicia sesión para comenzar tu sesión</p>


                    <form action="{{ route('login') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Correo electrónico"
                                required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesión</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-4">
                        <div class="col-12">
                            <p class="mb-1 text-center">
                                <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                            </p>
                            <p class="mb-0 text-center">
                                <a href="{{ route('register') }}">Registrarse</a>
                            </p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <p class="mb-0 text-center">
                                <a href="{{ url('/') }}">Ir al sitio web</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop