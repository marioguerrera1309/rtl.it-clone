
<?php $__env->startSection('title', 'Contatti - MyPlay'); ?>
<?php $__env->startSection('head'); ?>
    <link href='<?php echo e(URL::to("css/login.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/home.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/modifiche.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/contatti.css")); ?>' rel="stylesheet" type="text/css">
    <script src='<?php echo e(URL::to("js/function/infoUtente.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/contatti.js")); ?>' defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenuto'); ?>
    <article>
        <?php echo $__env->make('layouts/navModifiche', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <section class="title">
        <h2>CONTATTI E INDIRIZZO</h2>
        <p>Gestisci o modifica i dati relativi ai tuoi contatti e indirizzo su MyPlay</p>    
        </section>
        <section class="contatti">
            <div>
                <form method="post">
                <?php echo csrf_field(); ?>   
                <h3>I tuoi contatti</h3>
                <div>
                    <div>
                        <p>Prefisso</p>
                        <select name="prefisso">
                            <?php echo $__env->make('layouts/prefissi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </select>
                    </div>
                    <div>
                        <p>Telefono</p>
                        <input type="text" name="telefono" value="<?php echo e($account->telefono); ?>">
                    </div>
                </div>
                <h3>Email</h3>
                <input type="text" name="email" value="<?php echo e($account->email); ?>">
                <h3>Comune</h3>
                <input type="text" name="comune" value="<?php echo e($account->comune); ?>">
                <div>
                    <div>
                        <h3>Nazione</h3>
                        <select name="nazioni">
                            <?php echo $__env->make('layouts/nazioni', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Salva modifiche">
                </form>
            </div>
        </section>
    </article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/base_modifiche', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aguer\OneDrive - Università degli Studi di Catania\Desktop\Ingegneria Informatica\Database and Web Programming\Web programming\Rtl.it\hw2\resources\views/contatti.blade.php ENDPATH**/ ?>