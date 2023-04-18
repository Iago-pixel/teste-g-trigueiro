@extends('layouts\main')

@section('title', $debtor->name)

@section('dashboard', 'Ver as pizzas')

@section('denouce', 'Denunciar')

@section('content')

<section>
    <h2 class="debtor-title">{{ $debtor->name }}</h2>
    <p class="debtor-email">{{ $debtor->email }}</p>
    <ul>
        @foreach ($debts as $debt)
            <li>
                <div class="debtor-card">
                    <div class="img-box">
                        <img src="/img/complaint/{{ $debt["image"] }}" alt="imagem enviada por usuario">
                    </div>
                    <div class="debtor-infos">
                        @if($debt["soda"])
                            <h3>Pizza com refrigerante</h3>
                        @else
                            <h3>Pizza</h3>
                        @endif
                        <p>{{ $debt["observation"] }}</p>
                        <p class="created_at">Criando em <time datetime="{{ date("Y-m-d H:i", strtotime($debt["created_at"])) }}">{{ date("d/m/Y H:i:s", strtotime($debt["created_at"])) }}</time></p>
                    </div>
                    <div>
                        @if (!($debt["paidOut"]))
                            <form class="patch-form" action="/admin/debt/{{ $debt["id"] }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button>Quitado</button>
                            </form>
                        @else
                            <p>Quitado</p>
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</section>

@endsection