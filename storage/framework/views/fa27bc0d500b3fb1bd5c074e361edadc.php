
<?php $__env->startSection('title', 'Password - MyPlay'); ?>
<?php $__env->startSection('head'); ?>
    <link href='<?php echo e(URL::to("css/login.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/home.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/modifiche.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/password.css")); ?>' rel="stylesheet" type="text/css">
    <script src='<?php echo e(URL::to("js/function/infoUtente.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/password.js")); ?>' defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenuto'); ?>
    <article>
        <?php echo $__env->make('layouts/navModifiche', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <section class="title">
            <h2>MODIFICA PASSWORD</h2>
            <p>Modifica la password del tuo account su MyPlay</p>
        </section>
        <section class="pwd">
            <div>
                <h3>Crea una password efficace</h3>
                <form method="post">
                    <p>Password attuale</p>
                    <input type="password" name="password_a">
                    <button type="button" id="mostra_a"><img src="img/visibility.png"></button>
                    <p>Nuova password</p>
                    <input type="password" name="password_n">
                    <button type="button" id="mostra_n"><img src="img/visibility.png"></button>
                    <div class="info">
                        <div>
                            <span id="info1" class="red">X</span>
                            Sicurezza della password debole
                        </div>
                        <div>
                            <span id="info2" class="green">V</span> 
                            Non può contenere il tuo nome o il tuo indirizzo e-mail
                        </div>
                        <div>
                            <span id="info3" class="red">X</span>
                            Almeno 8 caratteri
                        </div>
                        <div>
                            <span id="info4" class="red">X</span>
                            Deve contenere un numero e un simbolo (@, $, !, %, *, #, ?, &)
                        </div>
                    </div>
                    <input type="submit" value="Salva modifiche">
                </form>
            </div>
        </section>
    </article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/base_modifiche', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aguer\OneDrive - Università degli Studi di Catania\Desktop\Ingegneria Informatica\Database and Web Programming\Web programming\Rtl.it\hw2\resources\views/password.blade.php ENDPATH**/ ?>