@extends('layouts/base_modifiche')
@section('title', 'Password - MyPlay')
@section('head')
    <link href='{{URL::to("css/login.css")}}' rel="stylesheet" type="text/css">
    <link href='{{URL::to("css/home.css")}}' rel="stylesheet" type="text/css">
    <link href='{{URL::to("css/modifiche.css")}}' rel="stylesheet" type="text/css">
    <link href='{{URL::to("css/password.css")}}' rel="stylesheet" type="text/css">
    <script src='{{URL::to("js/function/infoUtente.js")}}' defer></script>
    <script src='{{URL::to("js/password.js")}}' defer></script>
@endsection
@section('contenuto')
    <article>
        @include('layouts/navModifiche')
        <section class="title">
            <h2>MODIFICA PASSWORD</h2>
            <p>Modifica la password del tuo account su MyPlay</p>
        </section>
        <section class="pwd">
            <div>
                <h3>Crea una password efficace</h3>
                <form method="post">
                    <p>Password attuale</p>
                    <input type="password" name="password_a">
                    <button type="button" id="mostra_a"><img src="img/visibility.png"></button>
                    <p>Nuova password</p>
                    <input type="password" name="password_n">
                    <button type="button" id="mostra_n"><img src="img/visibility.png"></button>
                    <div class="info">
                        <div>
                            <span id="info1" class="red">X</span>
                            Sicurezza della password debole
                        </div>
                        <div>
                            <span id="info2" class="green">V</span> 
                            Non può contenere il tuo nome o il tuo indirizzo e-mail
                        </div>
                        <div>
                            <span id="info3" class="red">X</span>
                            Almeno 8 caratteri
                        </div>
                        <div>
                            <span id="info4" class="red">X</span>
                            Deve contenere un numero e un simbolo (@, $, !, %, *, #, ?, &)
                        </div>
                    </div>
                    <input type="submit" value="Salva modifiche">
                </form>
            </div>
        </section>
    </article>
@endsection