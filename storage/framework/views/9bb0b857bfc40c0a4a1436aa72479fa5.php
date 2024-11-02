<?php $__env->startSection('title', 'Radio RTL 102.5 - RTL 102.5'); ?>
<?php $__env->startSection('head'); ?>
    <link href='<?php echo e(URL::to("css/login.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/home.css")); ?>' rel="stylesheet" type="text/css">
    <script src='<?php echo e(URL::to("js/function/chatbot.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/function/infoUtente.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/function/accesso.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/function/apiHome.js")); ?>' defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('accedi'); ?>
    <button id="rtlnav2"></button>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('accesso'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('article'); ?>
    <?php echo $__env->make('layouts/article_home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('accedi2'); ?>
<button></button>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('home_rtlnav3'); ?>
    <a class="rtlnav3" href="/home">HOME</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('home'); ?>
    <a href="/home">Home</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rtl1025'); ?>
    <a class="flex-item" href="/home">RTL 102.5</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base_home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aguer\OneDrive - Università degli Studi di Catania\Desktop\Ingegneria Informatica\Database and Web Programming\Web programming\Rtl.it\hw2\resources\views/home.blade.php ENDPATH**/ ?>