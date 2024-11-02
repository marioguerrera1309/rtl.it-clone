@extends('layouts.base_home')
@section('title', 'Radio RTL 102.5 - RTL 102.5')
@section('head')
    <link href='{{URL::to("css/login.css")}}' rel="stylesheet" type="text/css">
    <script src='{{URL::to("js/login.js")}}' defer></script>
    <script src='{{URL::to("js/function/apiHome.js")}}' defer></script>
@endsection
@section('accedi')
    <div id="rtlnav1">
        <a href="/registration" target="_blank">Registrati a <em>MyPlay</em></a>
    </div>
    <button id="rtlnav2">Accedi</button>
@endsection
@section('article')
    @include('layouts/article_home')
@endsection
@section('accesso')
    <form method="post" name="login">
        @csrf
        <section class="login">
            <div>
                <div id="rtlc21">
                    <h1>ACCEDI AL TUO PROFILO MYPLAY</h1>
                    <button>X</button>
                </div>
                <div>
                    @foreach($errors->all() as $e)
                        <p class='error'>{{ $e }}</p>
                    @endforeach
                    <p>Email</p>
                    <input type="text" name='email'>
                    <p>Password</p>
                    <div>
                        <input type="password" name='password' id="psw"> <button id="mostra">Mostra</button>
                    </div>
                </div>
                <div class="pulsanti">
                    <input id="continua" type="submit" value="CONTINUA">
                    <a href="/passwordDimenticata">Password dimenticata</a>
                    <a href="">Account non attivo?</a>
                    <p>oppure</p>
                    <button id="Google"><img src="img/google.png"><p>Continua con Google</p></button>
                    <button id="Facebook"><img src="img/facebook.png"><p>Continua con Facebook</p></button>
                    <button id="Apple"><img src="img/apple.png"><p>Continua con Apple</p></button>
                    <p>Non hai un account? <a href="/registration">Registrati</a></p>
                </div>
            </div>
        </section>
    </form>
@endsection
@section('accedi2')
    <button>ACCEDI</button>
    <a href="/registration">REGISTRATI</a>
@endsection
@section('home_rtlnav3')
    <a class="rtlnav3" href="/">HOME</a>
@endsection
@section('home')
    <a href="/">Home</a>
@endsection
@section('rtl1025')
    <a class="flex-item" href="/">RTL 102.5</a>
@endsection