@extends('layouts\main')

@section('title', 'Admin')

@section('dashboard', 'Ver as pizzas')

@section('denouce', 'Denunciar')

@section('content')

<section>
    <h2>Lista de devedores</h2>
    <ul>
        @foreach ($debtors as $debtor)
            <li id={{ $debtor->id }}>
                <a href="/admin/debtor/{{ $debtor->id }}">
                    <div class="user-card">
                        <h3>{{ $debtor->name }}</h3>
                        <p>{{ $debtor->email }}</p>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</section>

@endsection