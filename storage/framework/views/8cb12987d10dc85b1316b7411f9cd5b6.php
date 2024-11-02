
<?php $__env->startSection('title', 'Home - MyPlay'); ?>
<?php $__env->startSection('head'); ?>
    <link href='<?php echo e(URL::to("css/login.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/home.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/modifiche.css")); ?>' rel="stylesheet" type="text/css">
    <script src='<?php echo e(URL::to("js/function/infoUtente.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/modifiche.js")); ?>' defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenuto'); ?>
    <article>
        <?php echo $__env->make('layouts/navModifiche', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <section>
            <h1></h1>
            <p>Gestisci le tue informazioni, i tuoi contatti e la sicurezza del tuo account.</p>
            <div>
                <div>
                    <div>
                        <span>
                            <img src="img/informazioni_personali.png">
                            <h2>GESTISCI LE TUE INFORMAZIONI PERSONALI</h2>
                        </span>
                        <p>Tienile sempre aggiornate: ti permetteranno di ricevere contenuti sempre freschi e adatti alle tue aspettative.</p>
                        <a href="/informazioni_personali"><button>Gestisci informazioni personali</button></a>
                    </div>
                    <div>
                        <span>
                            <img src="img/contatti.png">
                            <h2>CONTATTI E INDIRIZZO</h2>
                        </span>
                        <p>Ricevi le comunicazioni del mondo MyPlay dove vuoi, quando vuoi.</p>
                        <a href="/contatti"><button>Gestisci Contatti e Indirizzo</button></a>
                    </div>
                </div>
                <div>
                    <div>
                        <span>
                            <img src="img/password.png">
                            <h2>GESTIONE PASSWORD</h2>
                        </span>
                        <p>Modificare la tua password ogni 30 giorni ti aiuta a tenere il tuo account sicuro!</p>
                        <a href="/password"><button>Modifica la tua password</button></a>
                    </div>
                    <div>
                        <span>
                            <img src="img/dispositivi.png">
                            <h2>I TUOI DISPOSITIVI</h2>
                        </span>
                        <p>Associa o rimuovi un dispositivo collegato al tuo account.</p>
                        <a href=""><button>Gestisci i tuoi dispositivi</button></a>
                    </div>
                </div>
            </div>
        </section>
    </article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base_modifiche', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aguer\OneDrive - Università degli Studi di Catania\Desktop\Ingegneria Informatica\Database and Web Programming\Web programming\Rtl.it\hw2\resources\views/modifiche.blade.php ENDPATH**/ ?>