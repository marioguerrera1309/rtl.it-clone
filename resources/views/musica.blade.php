@extends('home')
@section('title', 'MUSICA - RTL 102.5')
@section('head')
    <link href='{{URL::to("css/login.css")}}' rel="stylesheet" type="text/css">
    <link href='{{URL::to("css/home.css")}}' rel="stylesheet" type="text/css">
    <link href='{{URL::to("css/musica.css")}}' rel="stylesheet" type="text/css">
    <script src='{{URL::to("js/function/chatbot.js")}}' defer></script>
    <script src='{{URL::to("js/function/infoUtente.js")}}' defer></script>
    <script src='{{URL::to("js/function/accesso.js")}}' defer></script>
    <script src='{{URL::to("js/musica.js")}}' defer></script>
@endsection
@section('article')
    <article>
        <button id="preferiti">Visualizza i tuoi album preferiti</button>
        <section id="galleria">
        </section>
    </article>
@endsection