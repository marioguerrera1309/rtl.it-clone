@extends('home')
@section('title', 'Cerca - RTL 102.5')
@section('head')
    <link href='{{URL::to("css/login.css")}}' rel="stylesheet" type="text/css">
    <link href='{{URL::to("css/home.css")}}' rel="stylesheet" type="text/css">
    <link href='{{URL::to("css/cerca.css")}}' rel="stylesheet" type="text/css">
    <script src='{{URL::to("js/function/chatbot.js")}}' defer></script>
    <script src='{{URL::to("js/function/infoUtente.js")}}' defer></script>
    <script src='{{URL::to("js/function/accesso.js")}}' defer></script>
    <script src='{{URL::to("js/cerca.js")}}' defer></script>
@endsection
@section('article')
    <article>
        <nav>
            <a href="/home"><img src="img/home.png"></a>
            <img src="img/slash.png">
            <span>Cerca</span>
        </nav>
        <section>
            <h1>Cerca</h1>
            <h2>Effettua una ricerca sul sito di Spotify</h2>
            <form>
                <input type='text' id='ricerca'>
                <input type='submit' id='submit' value='Cerca'>
            </form>
        </section>
        <section id="result">
        </section>
    </article>
@endsection