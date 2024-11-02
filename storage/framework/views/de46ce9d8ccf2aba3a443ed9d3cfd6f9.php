
<?php $__env->startSection('title', 'Informazioni personali - MyPlay'); ?>
<?php $__env->startSection('head'); ?>
    <link href='<?php echo e(URL::to("css/login.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/home.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/modifiche.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/informazioni_personali.css")); ?>' rel="stylesheet" type="text/css">
    <script src='<?php echo e(URL::to("js/informazioni_personali.js")); ?>' defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenuto'); ?>
    <article>
        <?php echo $__env->make('layouts/navModifiche', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <section>
            <div>
                <div class="title">
                    <h1>INFORMAZIONI PERSONALI</h1>
                    <p>Gestisci, modifica o elimina i dati relativi al tuo account su MyPlay</p>
                </div>
                <div>
                    <div class="immagine">
                        <img> 
                        <div>
                            <p></p>
                            <a id="change">Cambia immagine profilo</a>
                        </div>
                    </div>
                </div>
                <div>
                    <form method="post">
                    <?php echo csrf_field(); ?>
                        <div id="dati">
                            <h1>I tuoi dati</h1>
                            <h1>Nome</h1>
                            <input type="text" value="" name="nome">
                            <h1>Cognome</h1>
                            <input type="text" value="" name="cognome">
                            <h1>Data di Nascita</h1>
                            <input type="date" value="" name="data">
                            <h1>Il tuo genere</h1>
                            <div>
                                <input type="radio" name="genere" value="maschio">
                                <label>Maschio</label>
                                <input type="radio" name="genere" value="femmina">
                                <label>Femmina</label>
                                <input type="radio" name="genere" value="x">
                                <label>Preferisco Non Specificare</label>
                            </div>
                            <div class="newsletter">
                                <p>MyPlay ti inviera una newsletter con comunicazioni riservate agli iscritti. Puoi decidere in qualunque momento di disiscriverti dal servizio.</p>
                                <div>
                                    <input type="checkbox" id="newsletter" name="newsletter" value="no">
                                    <label for="newsletter">Non voglio ricevere la newsletter</label>
                                </div>
                            </div>
                            <div class="newsletter">
                                <p>Presto il consenso al trattamento dei dati personali per finalita di profilazione commerciale e/o di marketing</p>
                                <div>
                                    <input type="radio" name="consenso" value="accetto">
                                    <label for="consenso">Accetto</label>
                                    <br>
                                    <input type="radio" name="consenso" value="non_accetto">
                                    <label for="consenso">Non accetto</label>
                                </div>
                            </div>
                            <input type="submit" name="submit" id="submit">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </article>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('section'); ?>
    <section class="change">
        <div>
            <div id="x">
                <h1>CAMBIA L'IMMAGINE DEL PROFILO</h1>
                <button>X</button>
            </div>
            <div>
                <img>
                <form method="post" enctype="multipart/form-data">
                    <div class="carica">
                        <input type="file" name="image" id="immagine">
                        <input type="submit" value="Carica immagine" id="img_submit">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="delete">
        <button>
            <h1>ELIMINA ACCOUNT</h1>
        </button>
    </section>
    <section class="confirm_delete">
        <div>
            <div id="delete_x">
                <h1>ELIMINA ACCOUNT</h1>
                <button>X</button>
            </div>
            <div>
                <p>Sei sicuro di voler eliminare il tuo account?</p>
            </div>
            <div>
                    <button id="conferma">Conferma</button>
                    <button id="annulla">Annulla</button>
            </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base_modifiche', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aguer\OneDrive - Università degli Studi di Catania\Desktop\Ingegneria Informatica\Database and Web Programming\Web programming\Rtl.it\hw2\resources\views/informazioni_personali.blade.php ENDPATH**/ ?>