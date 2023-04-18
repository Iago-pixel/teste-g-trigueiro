@extends('layouts\main')

@section('title', 'Denunciar')

@section('dashboard', 'Ver as pizzas')

@section('denouce', 'Denunciar')

@section('content')

<section>
    <h1>Denunciar - {{ $user->name }}</h1>
    <form action="/complaint/{{ $user->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="field">
            <label for="image">Imagem:</label>
            <label for="image" id="image-button">Enviar imagem</label>
            <input type="file" id="image" name="image">
        </div>
        <div class="field obs-field">
            <label for="observation">Observação:</label>
            <textarea id="observation" name="observation" placeholder="notas sobre a denuncia..." cols="50" rows="8" required></textarea>
        </div>
        <button type="submit">Denunciar</button>
    </form>
</section>
    
@endsection