<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/styles.css">

        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            <div id="right-header">
                <img src="/img/gtroigueiro-150x150.png" alt="" id="logo">
                <h1 id="main-title">Sistema de denúncia</h1>
            </div>
            <div id="left-header">
                <nav>
                    <ul>
                        @guest
                            <li><a href="/login">Entrar</a></li>
                            <li><a href="/register">Cadastrar</a></li>
                        @endguest
                        @auth
                            <li><a href="/">@yield('dashboard')</a></li>
                            <li><a href="/denounce">@yield('denouce')</a></li>
                            <li>
                                <form action="/logout" method="POST" class="logout-form">
                                    @csrf
                                    <a href="/logout" 
                                      onclick="event.preventDefault();
                                      this.closest('form').submit();">
                                      Sair
                                    </a>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <p>G Trigueiro &copy; 2022</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>