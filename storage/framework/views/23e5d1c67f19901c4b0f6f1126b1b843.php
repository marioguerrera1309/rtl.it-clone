<html>
    <head>
    <head>
        <title>Password Dimenticata</title>
        <link rel="icon" href="img/myplay-logo.0b8eed03.svg"> 
        <link href='<?php echo e(URL::to("css/login.css")); ?>' rel="stylesheet" type="text/css">
        <link href='<?php echo e(URL::to("css/home.css")); ?>' rel="stylesheet" type="text/css">
        <link href='<?php echo e(URL::to("css/modifiche.css")); ?>' rel="stylesheet" type="text/css">
        <link href='<?php echo e(URL::to("css/passwordDimenticata.css")); ?>' rel="stylesheet" type="text/css">
    </head>
    <body>
        <nav>
            <a href="/home">&lt; Torna indietro</a>
            <img src="img/myplay-logo.0b8eed03.svg">
        </nav>
        <section>
            <div>
                <h1>Password dimenticata</h1>
                <p>Inserisci la tua email e ti invieremo un link per reimpostare la tua password.</p>
                <form name='passwordDimenticata' method='post'>
                    <div>
                        <label>Email</label>
                        <input type='text' name='email'>
                    </div>
                    <div>
                        <input type='submit' value='Invia'>
                    </div>
                </form> 
            </div>   
    </body>
</html><?php /**PATH C:\Users\Aguer\OneDrive - Università degli Studi di Catania\Desktop\Ingegneria Informatica\Database and Web Programming\Web programming\Rtl.it\hw2\resources\views/passwordDimenticata.blade.php ENDPATH**/ ?>