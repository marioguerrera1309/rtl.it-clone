
<?php $__env->startSection('title', 'admin Eventi & Contest - RTL 102.5'); ?>
<?php $__env->startSection('head'); ?>
    <link href='<?php echo e(URL::to("css/login.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/home.css")); ?>' rel="stylesheet" type="text/css">
    <link href='<?php echo e(URL::to("css/admin_eventi_contest.css")); ?>' rel="stylesheet" type="text/css">
    <script src='<?php echo e(URL::to("js/function/chatbot.js")); ?>' defer></script>
    <link href='<?php echo e(URL::to("css/eventi_contest.css")); ?>' rel="stylesheet" type="text/css">
    <script src='<?php echo e(URL::to("js/function/infoUtente.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/function/accesso.js")); ?>' defer></script>
    <script src='<?php echo e(URL::to("js/admin_eventi_contest.js")); ?>' defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('article'); ?>
    <article>
        <section id="e_c">
            <h2>EVENTI</h2>
            <div id="eventi">
            </div>
            <h2>CONTEST</h2>
            <div id="contest">
            </div>
        </section>
        <section class="eventi">
            <h2>Aggiungi Evento</h2>
            <form name="add_evento" method="post">
                <?php echo csrf_field(); ?>
                <label for="titolo">Titolo</label>
                <input type="text" name="titolo" required>
                <label for="artista">Artista</label>
                <input type="text" name="artista" required>
                <label>Date Evento : quante date vuoi aggiungere</label>
                <select name="n_date">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <div class="data">
                    <input type="date" name="data_1_evento">
                </div>
                <input type="file" name="image">
                <input type="submit" value="Aggiungi">
            </form>
        </section>
        <section class="contest">
            <h2>Aggiungi Contest</h2>
            <form name="add_contest" method="post">
                <?php echo csrf_field(); ?>
                <label for="titolo">Titolo</label>
                <input type="text" name="titolo" required>
                <label for="artista">Artista</label>
                <input type="text" name="artista" required>
                <label>Date Contest : quante date vuoi aggiungere</label>
                <select name="n_date">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <div class="data">
                    <input type="date" name="data_1_contest">
                </div>
                <input type="file" name="image">
                <label for="domanda1">Domanda 1</label>
                <input type="text" name="domanda1" required>
                <label for="risposta11">Risposta 1 - Domanda 1</label>
                <input type="text" name="risposta11" required>
                <label for="risposta21">Risposta 2 - Domanda 1</label>
                <input type="text" name="risposta21" required>
                <label for="risposta31">Risposta 3 - Domanda 1</label>
                <input type="text" name="risposta31" required>
                <label for="domanda2">Domanda 2</label>
                <input type="text" name="domanda2" required>
                <label for="risposta12">Risposta 1 - Domanda 2</label>
                <input type="text" name="risposta12" required>
                <label for="risposta22">Risposta 2 - Domanda 2</label>
                <input type="text" name="risposta22" required>
                <label for="risposta32">Risposta 3 - Domanda 2</label>
                <input type="text" name="risposta32" required>
                <label for="domanda3">Domanda 3</label>
                <input type="text" name="domanda3" required>
                <label for="risposta13">Risposta 1 - Domanda 3</label>
                <input type="text" name="risposta13" required>
                <label for="risposta23">Risposta 2 - Domanda 3</label>
                <input type="text" name="risposta23" required>
                <label for="risposta33">Risposta 3 - Domanda 3</label>
                <input type="text" name="risposta33" required>
                <input type="submit" value="Aggiungi">
            </form>
        </section>
    </article>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Aguer\OneDrive - Università degli Studi di Catania\Desktop\Ingegneria Informatica\Database and Web Programming\Web programming\Rtl.it\hw2\resources\views/admin_eventi_contest.blade.php ENDPATH**/ ?>