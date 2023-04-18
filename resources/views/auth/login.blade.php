@extends('layouts\main')

@section('title', 'Entrar')

@section('content')

<section class="full-section">
    <form method="POST" action="{{ route('login') }}" class="register-form">
        @csrf

        <h2 class="register-title">Entrar</h2>

        <div class="register-field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required placeholder="Email"/>
        </div>

        <div class="register-field">
            <label for="password">Senha</label>
            <input id="password" type="password" name="password" required placeholder="Senha" />
        </div>

        <div>
            <button>
                Entrar
            </button>
        </div>
    </form>
</section>

@endsection
