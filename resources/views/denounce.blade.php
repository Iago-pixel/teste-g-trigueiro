@extends('layouts\main')

@section('title', 'Denunciar')

@section('dashboard', 'Ver as pizzas')

@section('content')

<section id="denouce-section">
    <h2>Denunciar</h2>
    <div>
        <ul id="denouce-list">
            @foreach ($users as $user)
                <li id={{ $user->id }}>
                    <a href="/complaint/create/{{ $user->id }}">
                        <div class="user-card">
                            <h3>{{ $user->name }}</h3>
                            <p>{{ $user->email }}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
    
@endsection
