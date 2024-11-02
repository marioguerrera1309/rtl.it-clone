<html>
    <head>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <link rel="icon" href="img/myplay-logo.0b8eed03.svg"> 
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='<?php echo e(URL::to("js/function/chatBot.js")); ?>' defer></script>
        <script src='<?php echo e(URL::to("js/function/apriMenu.js")); ?>' defer></script>
        <script src='<?php echo e(URL::to("js/function/oscura.js")); ?>' defer></script>
        <script src='<?php echo e(URL::to("js/function/accesso.js")); ?>' defer></script>
        <?php echo $__env->yieldContent('head'); ?>
    </head>
    <body>
        <header id="index">
            <nav id="flexnav">
                <div>
                    <span class="flex-item"><img src="img/logoNav.png">Vai al sito di:</span>
                </div>
                <div><a class="flex-item" href="/home">RTL 102.5</a></div>
                <div><a class="flex-item" href="">RADIO ZETA</a></div>
                <div><a class="flex-item" href="">RADIOFRECCIA</a></div>
                <div><a class="flex-item" href="">RTL 102.5 PLAY</a></div>
                <div><a id="rtlnav" href=""><img src="img/rtl-play-logo.55efbdbd.svg"></a></div>
                <button id="CHATBOT">CHATBOT<img src="img/chatbot.png"></button>
                <button id="rtlnav2">
                </button>
            </nav>
        </header>
        <nav id="scomparsa">
            <div id="flexnav1_2">
                <a href="/home"><img src="img/rtl-logo.png"></a>
                <a class="rtlnav3" href="/home">HOME</a>
                <a class="rtlnav4" href="">RADIO</a>
                <a class="rtlnav4" href="">NEWS</a>
                <a class="rtlnavM" href="/musica">MUSICA</a>
                <a class="rtlnav4" href="">SPECIAL</a>
                <a class="rtlnav5" href="/eventi_contest">EVENTI & CONTEST</a>
                <a class="rtlnav6" href="/cerca"><img class="rtlnav7" src="img/cerca.png"></a>
            </div>
            <div id="rtlc16">
                <button id="menu"><img src="img/menu.png"></button>
                <img id="rtlc17" src="img/matteocampese.png">
                <div class="rtlc5">
                    <span class="rtlc6">ON AIR</span>
                    <span id="rtlc18"> THE FLIGHT</span>
                </div>
                <a href=""><img src="img/play.png"></a>
            </div>
        </nav>
        <nav class="navMenu">
            <button>
            </button>
            <a href="/home">HOME</a>
            <a href="">RADIO</a>
            <a href="">NEWS</a>
            <a href="/musica">MUSICA</a>
            <a href="">SPECIAL</a>
            <a id="rtlc22" href="/eventi_contest">EVENTI  & CONTEST</a>
            <a href="/cerca"><img src="img/cerca.png"></a>
        </nav>
        <?php echo $__env->yieldContent('contenuto'); ?>
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
                        <a href="/modifiche"><button><img src="img/settings.png">Gestisci Account</button></a>
                        <a href="/logout"><button class="black">Disconnetti</button></a>
                    </div>
                </div>
            </div>
        </section>
        <?php echo $__env->yieldContent('section'); ?>
        <footer></footer>
    </body>
</html><?php /**PATH C:\Users\Aguer\OneDrive - Università degli Studi di Catania\Desktop\Ingegneria Informatica\Database and Web Programming\Web programming\Rtl.it\hw2\resources\views/layouts/base_modifiche.blade.php ENDPATH**/ ?>