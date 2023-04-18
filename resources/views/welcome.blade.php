@extends('layouts\main')

@section('title', 'Teste tecnico G Trigueiro')

@section('denouce', 'Denunciar')

@section('content')

<section class="debtors-section">
    @if ($seeList == "see")
        <div>
            @if (count($debtors) == 0)
                <p id="no-pizzas">Sem pizzar hoje!</p>
            @else
                <h2>Devedores</h2>
            @endif
            <ul id="debtors-list">
                @foreach ($debtors as $debtor => $debts)
                    <li id={{ $debts[0]['denouncedId'] }}>
                        <h3>{{ $debtor }}</h3>
                        <p class="card-description">
                            Deve {{ count($debts) }} pizza(s)
                            @if(array_key_exists($debtor,$debtorsWithSoda))
                                <span>e {{ count($debtorsWithSoda[$debtor]) }} refrigerante(s)</span>
                            @endif
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>     
    @else
        <div class="welcome-button-box">
            <p id="welcome-text">Este site foi desenvolvido com o objetivo de proporcionar segurança digital, pois a G Trigueiro é uma 
                empresa que preza pela segurança de nossos servidores</p>
            <form action="/" method="GET" id="seeList-form">
            @csrf
                <input type="hidden" name="seeList" value="see">
                <button type="submit" class="button-large seeList-button">Ver devedores</button>
                <p>{{ $seeList }}</p>
            </form>
        </div>
    @endif
</section>
<section class="img-section">
    <img src="/img/undraw_security.svg" alt="" class="img-security">
</section>
    
@endsection