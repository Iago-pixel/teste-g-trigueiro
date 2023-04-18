@extends('layouts\main')

@section('title', 'Cadastro')

@section('content')

<section class="full-section">
    <form method="POST" action="{{ route('register') }}" class="register-form">
        @csrf

        <h2 class="register-title">Cadastrar-se</h2>

        <div class="register-field">
            <label for="name">Nome</label>
            <input id="name" type="text" name="name" required placeholder="Nome"/>
        </div>

        <div class="register-field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required placeholder="Email"/>
        </div>

        <div class="register-field">
            <label for="password">Senha</label>
            <input id="password" type="password" name="password" required placeholder="Senha"/>
        </div>

        <div class="register-field">
            <label for="password_confirmation">Comfirmar senha</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Cofirmar senha"/>
        </div>

        <div>
            <button>
                Cadastrar
            </button>
        </div>
    </form>
</section>

@endsection