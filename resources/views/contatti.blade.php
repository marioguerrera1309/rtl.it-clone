@extends('layouts/base_modifiche')
@section('title', 'Contatti - MyPlay')
@section('head')
    <link href='{{URL::to("css/login.css")}}' rel="stylesheet" type="text/css">
    <link href='{{URL::to("css/home.css")}}' rel="stylesheet" type="text/css">
    <link href='{{URL::to("css/modifiche.css")}}' rel="stylesheet" type="text/css">
    <link href='{{URL::to("css/contatti.css")}}' rel="stylesheet" type="text/css">
    <script src='{{URL::to("js/function/infoUtente.js")}}' defer></script>
    <script src='{{URL::to("js/contatti.js")}}' defer></script>
@endsection
@section('contenuto')
    <article>
        @include('layouts/navModifiche')
        <section class="title">
        <h2>CONTATTI E INDIRIZZO</h2>
        <p>Gestisci o modifica i dati relativi ai tuoi contatti e indirizzo su MyPlay</p>    
        </section>
        <section class="contatti">
            <div>
                <form method="post">
                @csrf   
                <h3>I tuoi contatti</h3>
                <div>
                    <div>
                        <p>Prefisso</p>
                        <select name="prefisso">
                            @include('layouts/prefissi')
                        </select>
                    </div>
                    <div>
                        <p>Telefono</p>
                        <input type="text" name="telefono" value="{{$account->telefono}}">
                    </div>
                </div>
                <h3>Email</h3>
                <input type="text" name="email" value="{{$account->email}}">
                <h3>Comune</h3>
                <input type="text" name="comune" value="{{$account->comune}}">
                <div>
                    <div>
                        <h3>Nazione</h3>
                        <select name="nazioni">
                            @include('layouts/nazioni')
                        </select>
                    </div>
                </div>
                <input type="submit" value="Salva modifiche">
                </form>
            </div>
        </section>
    </article>
@endsection