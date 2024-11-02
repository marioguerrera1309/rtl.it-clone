
<?php $__env->startSection('title', 'MUSICA - RTL 102.5'); ?>
<?php $__env->startSection('head'); ?>
    <link href='<?php echo e(URL::to("css/login.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/home.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/musica.css")); ?>' rel="stylesheet" type="text/css">
    <script src='<?php echo e(URL::to("js/function/chatbot.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/function/infoUtente.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/function/accesso.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/musica.js")); ?>' defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('article'); ?>
    <article>
        <button id="preferiti">Visualizza i tuoi album preferiti</button>
        <section id="galleria">
        </section>
    </article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aguer\OneDrive - Università degli Studi di Catania\Desktop\Ingegneria Informatica\Database and Web Programming\Web programming\Rtl.it\hw2\resources\views/musica.blade.php ENDPATH**/ ?>