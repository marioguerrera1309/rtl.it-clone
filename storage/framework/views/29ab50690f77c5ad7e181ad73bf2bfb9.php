
<?php $__env->startSection('title', 'Eventi & Contest - RTL 102.5'); ?>
<?php $__env->startSection('head'); ?>
    <link href='<?php echo e(URL::to("css/login.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/home.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/eventi_contest.css")); ?>' rel="stylesheet" type="text/css">
    <script src='<?php echo e(URL::to("js/function/chatbot.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/function/infoUtente.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/function/accesso.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/eventi_contest.js")); ?>' defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('article'); ?>
    <article>
        <nav>
            <a href="/home"><img src="img/home.png"></a>
            <img src="img/slash.png">
            <span>Eventi & Contest</span>
        </nav>
        <h1>EVENTI & CONTEST</h1>
        <span>Gli eventi e i contest di RTL 102.5</span>
        <section id="e_c">
            <h2>EVENTI</h2>
            <div id="eventi">
            </div>
            <h2>CONTEST</h2>
            <div id="contest">
            </div>
            <button class="button">Eventi & contest a cui partecipi</button>
        </section>
        <section id="e_c_2" class="nascondi">
            <button id="indietro">Torna indietro<img src="img/arrow_back.png"></button>
        </section>
        <section id="partecipazioni" class="nascondi">
            <button id="indietro_p" class="button">Torna indietro<img src="img/arrow_back.png"></button>
            <h2>EVENTI</h2>
            <div id="eventi_p">
            </div>
            <h2>CONTEST</h2>
            <div id="contest_p">
            </div>
        </section>
    </article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aguer\OneDrive - Università degli Studi di Catania\Desktop\Ingegneria Informatica\Database and Web Programming\Web programming\Rtl.it\hw2\resources\views/eventi_contest.blade.php ENDPATH**/ ?>