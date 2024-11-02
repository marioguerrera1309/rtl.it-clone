
<?php $__env->startSection('title', 'Radio RTL 102.5 - RTL 102.5'); ?>
<?php $__env->startSection('head'); ?>
    <link href='<?php echo e(URL::to("css/login.css")); ?>' rel="stylesheet" type="text/css">
    <script src='<?php echo e(URL::to("js/login.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/function/apiHome.js")); ?>' defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('accedi'); ?>
    <div id="rtlnav1">
        <a href="/registration" target="_blank">Registrati a <em>MyPlay</em></a>
    </div>
    <button id="rtlnav2">Accedi</button>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('article'); ?>
    <?php echo $__env->make('layouts/article_home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('accesso'); ?>
    <form method="post" name="login">
        <?php echo csrf_field(); ?>
        <section class="login">
            <div>
                <div id="rtlc21">
                    <h1>ACCEDI AL TUO PROFILO MYPLAY</h1>
                    <button>X</button>
                </div>
                <div>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class='error'><?php echo e($e); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('accedi2'); ?>
    <button>ACCEDI</button>
    <a href="/registration">REGISTRATI</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('home_rtlnav3'); ?>
    <a class="rtlnav3" href="/">HOME</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('home'); ?>
    <a href="/">Home</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rtl1025'); ?>
    <a class="flex-item" href="/">RTL 102.5</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base_home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aguer\OneDrive - Università degli Studi di Catania\Desktop\Ingegneria Informatica\Superate\Database and Web Programming\Web programming\Rtl.it\hw2\resources\views/login.blade.php ENDPATH**/ ?>