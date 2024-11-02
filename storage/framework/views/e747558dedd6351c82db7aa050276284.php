
<?php $__env->startSection('title', 'Cerca - RTL 102.5'); ?>
<?php $__env->startSection('head'); ?>
    <link href='<?php echo e(URL::to("css/login.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/home.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/cerca.css")); ?>' rel="stylesheet" type="text/css">
    <script src='<?php echo e(URL::to("js/function/chatbot.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/function/infoUtente.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/function/accesso.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/cerca.js")); ?>' defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('article'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aguer\OneDrive - Università degli Studi di Catania\Desktop\Ingegneria Informatica\Superate\Database and Web Programming\Web programming\Rtl.it\hw2\resources\views/cerca.blade.php ENDPATH**/ ?>