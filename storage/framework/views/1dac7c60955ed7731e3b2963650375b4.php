<html>
    <head>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <link rel="icon" href="https://cloud.rtl.it/web-components/universal-navigation-bar/0.1.10/img/rtl-1025-logo.5759f5b8.svg">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='<?php echo e(URL::to("js/function/oscura.js")); ?>' defer></script>
        <script src='<?php echo e(URL::to("js/function/apriMenu.js")); ?>' defer></script>
        <script src='<?php echo e(URL::to("js/function/cambiaLive.js")); ?>' defer></script>
        <?php echo $__env->yieldContent('head'); ?>
    </head>
    <body>
        <header id="index">
            <nav id="flexnav">
                <div>
                    <span class="flex-item"><img src="img/logoNav.png">Vai al sito di:</span>
                </div>
                <div><?php echo $__env->yieldContent('rtl1025'); ?></div>
                <div><a class="flex-item" href="">RADIO ZETA</a></div>
                <div><a class="flex-item" href="">RADIOFRECCIA</a></div>
                <div><a class="flex-item" href="">RTL 102.5 PLAY</a></div>
                <div><a id="rtlnav" href=""><img src="img/rtl-play-logo.55efbdbd.svg"></a></div>
                <button id="CHATBOT">CHATBOT<img src="img/chatbot.png"></button>
                <?php echo $__env->yieldContent('accedi'); ?>
            </nav>
            <div id="container1">
                <div>
                    <span id="rtlc2">Interagisci in diretta</span>
                    <div id="rtlcontainer1">
                        <a href="https://wa.me/393783781025?text=Ciao%20RTL%20102.5%20">
                            <img class="rtlc1" src="img/whatsapp.png">
                        </a>
                        <a href="https://twitter.com/rtl1025">
                            <img class="rtlc1" src="img/x.png">
                        </a>
                        <a href="https://m.me/rtl102.5">
                            <img class="rtlc1" src="img/f.png">
                        </a>
                        <a href="https://instagram.com/rtl1025">
                            <img class="rtlc1" src="img/insta.png">
                        </a>
                        <a href="https://t.me/rtl1025">
                            <img class="rtlc1" src="img/telegram.png">
                        </a>
                    </div>
                </div>
                <a href="/"><img src="img/verynormalpeople.png"></a>
                <div id="rtlc3">
                    <img id="rtlc4" src="img/matteocampese.png">
                    <div class="rtlc5">
                        <span class="rtlc6">ON AIR</span>
                        <span class="rtlc7"> THE FLIGHT</span>
                        <span class="rtlc7"> Con Matteo Campese e la Zac</span>
                    </div>
                    <a href=""><img src="img/play.png"></a>
                </div>
            </div>
        </header>
        <nav id="flexnav1">
            <?php echo $__env->yieldContent('home_rtlnav3'); ?>
            <a class="rtlnav4" href="">RADIO</a>
            <a class="rtlnav4" href="">NEWS</a>
            <a class="rtlnavM" href="/musica">MUSICA</a>
            <a class="rtlnav4" href="">SPECIAL</a>
            <a class="rtlnav5" href="/eventi_contest">EVENTI & CONTEST</a>
            <a class="rtlnav6" href="/cerca"><img class="rtlnav7" src="img/cerca.png"></a>
        </nav>
        <nav id="scomparsa">
            <div id="flexnav1_2">
                <a href="/"><img src="img/rtl-logo.png"></a>
                <?php echo $__env->yieldContent('home_rtlnav3'); ?>
                <a class="rtlnav4" href="">RADIO</a>
                <a class="rtlnav4" href="">NEWS</a>
                <a class="rtlnav4" href="/musica">MUSICA</a>
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
        <?php echo $__env->yieldContent('article'); ?>
        <footer>
            <div>
                <div>
                    <h5>RTL.IT</h5>
                    <?php echo $__env->yieldContent('home'); ?>
                    <a attr="x" href="">Radio</a>
                    <a attr="x" href="">News</a>
                    <a attr="x" href="/musica">Musica</a>
                    <a attr="x" href="">Special</a>
                    <a attr="x" href="/eventi_contest">Eventi & Contest</a>
                </div>
                <div>
                    <h5>LINK UTILI</h5>
                    <a href="">Chi siamo</a>
                    <a href="">Come ascoltarci</a>
                    <a href="">I nostri autori</a>
                    <a href=""><img src="img/rss.png">RSS Feed</a>
                </div>
                <div id="contatti">
                    <h5>CONTATTACI</h5>
                    <a href="info@rtl.it">Richiedi maggiori info</a>
                    <a href="support@rtl.it">Bisogno di supporto</a>
                    <a href="openspace@rtl.it">Info su spazi pubblicitari</a>
                </div>
                <div>
                    <h5>Seguici anche su</h5>
                    <a href="https://www.facebook.com/RTL102.5">Facebook</a>
                    <a href="https://instagram.com/rtl1025">Instagram</a>
                    <a href="https://twitter.com/rtl1025">Twitter</a>
                    <a href="https://www.tiktok.com/@rtl1025">Tiktok</a>
                    <a href="https://www.youtube.com/user/rtl1025">Youtube</a>
                    <a href="https://www.linkedin.com/company/rtl1025">Linkedin</a>
                </div>
            </div>
            <div id="cookie">
                <div>
                    <p>
                        © 1999-2024 RTL 102,500 HIT RADIO S.R.L. - Tutti i diritti riservati - sede legale: 24121 Bergamo, via Clara Maffei, 14/A
                        C.F./P.IVA e iscrizione Registro Imprese Bergamo n° 01646950160 - (c.c.i.a.a. Bergamo n. r.e.a. 226901)
                        Capitale sociale - € 25.000.000,00 i.v. Licenza SIAE N. 3210/I/3087.
                        Testata giornalistica registrata il 07/01/2010 al n° 1972 Tribunale Monza - Direttrice Responsabile Ivana Faccioli
                    </p>
                </div>
                <div>
                    <a href="">Cookie policy</a>
                    <a href="">Privacy Policy</a>
                </div>
            </div>
        </footer>
        <?php echo $__env->yieldContent('accesso'); ?>
        <nav class="navMenu">
            <?php echo $__env->yieldContent('accedi2'); ?>
            <?php echo $__env->yieldContent('home'); ?>
            <a href="">RADIO</a>
            <a href="">NEWS</a>
            <a href="/musica">MUSICA</a>
            <a href="">SPECIAL</a>
            <a id="rtlc22" href="/eventi_contest">EVENTI  & CONTEST</a>
            <a href="/cerca"><img src="img/cerca.png"></a>
        </nav>
    </body>
</html><?php /**PATH C:\Users\Aguer\OneDrive - Università degli Studi di Catania\Desktop\Ingegneria Informatica\Database and Web Programming\Web programming\Rtl.it\hw2\resources\views/layouts/base_home.blade.php ENDPATH**/ ?>