@extends('layouts.base_home')
@section('title', 'Radio RTL 102.5 - RTL 102.5')
@section('head')
    <link href='{{URL::to("css/login.css")}}' rel="stylesheet" type="text/css">
    <link href='{{URL::to("css/home.css")}}' rel="stylesheet" type="text/css">
    <script src='{{URL::to("js/function/chatbot.js")}}' defer></script>
    <script src='{{URL::to("js/function/infoUtente.js")}}' defer></script>
    <script src='{{URL::to("js/function/accesso.js")}}' defer></script>
    <script src='{{URL::to("js/function/apiHome.js")}}' defer></script>
@endsection
@section('accedi')
    <button id="rtlnav2"></button>
@endsection
@section('accesso')
    <section class="login">
        <div>
            <div id="rtlc21">
                <h1>IL TUO PROFILO MYPLAY</h1>
                <button>X</button>
            </div>
            <div>
                <div id="foto_profilo"></div>
                <h2></h2>
                <div class="pulsanti">
                    <a href="/modifiche" target="_blank"><button><img src="img/settings.png">Gestisci Account</button></a>
                    <a href="/logout"><button class="black">Disconnetti</button></a>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('article')
    @include('layouts/article_home')
@endsection
@section('accedi2')
<button></button>
@endsection
@section('home_rtlnav3')
    <a class="rtlnav3" href="/home">HOME</a>
@endsection
@section('home')
    <a href="/home">Home</a>
@endsection
@section('rtl1025')
    <a class="flex-item" href="/home">RTL 102.5</a>
@endsection