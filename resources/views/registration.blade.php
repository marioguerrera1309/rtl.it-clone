<html>
    <head>
        <title>Crea il tuo profilo - MyPlay</title>
        <link rel="icon" href="img/myplay-logo.0b8eed03.svg"> 
        <link href='{{URL::to("css/registration.css")}}' rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='{{URL::to("js/registration.js")}}' defer></script>
    </head>
    <body>
        <section>
            <img src="img/myplay-logo.0b8eed03.svg">
            <h1>My play</h1>
        </section>
        <article>
            <div id="titolo">
                <h1>Crea il tuo profilo MyPlay</h1>
            </div>
            <div id="er1">
                @if(isset($error)) 
                    @foreach ($error as $value) 
                        <p>{{$value}}</p>
                    @endforeach
                @endif
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            <div>
                <p class="er2"></p>
            </div>
            <form method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
                <div class="form">
                    <h3>Nome</h3>
                    <input type="text" id="nome" placeholder="Il tuo nome" name="nome" required>
                </div>
                <div class="form">
                    <h3>Cognome</h3>
                    <input type="text" id="cognome" placeholder="Il tuo cognome" name="cognome" required> 
                </div>
                <div class="form">
                    <h3>E-mail</h3>
                    <input type="text" id="email" placeholder="Il tuo indirizzo e-mail" name="email" required>    
                </div>
                <div class="telefono">
                    <div id="prex">
                        <h3>Prefisso</h3>
                        <select id="prefisso" name="prefisso">
                        @include('layouts/prefissi')
                        </select>
                    </div>
                    <div>  
                        <h3>Telefono</h3>
                        <input type="text" id="telefono" placeholder="Il tuo numero di cellulare" name="telefono" required>
                    </div>
                </div>
                <div class="form">
                    <h3>Data di nascita</h3>
                    <input type="date" id="date" name="date" required> 
                </div>
                <div class="form">
                    <h3>Genere</h3>
                    <div> 
                        <div>
                            Maschio <input type="radio" value="maschio" name="genere"/>
                        </div>
                        <div>
                            Femmina <input type="radio" value="femmina" name="genere"/>
                        </div>
                        <div> Preferisco non specificare <input type="radio" name="genere" value="x"/>
                        </div>
                    </div>
                </div>
                <div class="form">
                    <h3>Comune</h3>
                    <input type="text" id="comune" placeholder="Il tuo comune di residenza" name="comune"> 
                </div>
                <div class="form">
                    <h3>Nazione</h3>
                    <select id="nazione" name="nazione">
                        @include('layouts/nazioni')
                    </select> 
                </div>
                <div class="psw">
                    <h3>Password</h3>
                    <div>
                        <input type="password" id="password" placeholder="La tua password" name="password" required> 
                        <button type="button" id="mostra"><img src="img/visibility.png">
                        </button>
                    </div>
                </div>
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
                <br>
                <div class="newsletter">
                    <span>MyPlay ti invierà una newsletter con comunicazioni riservate agli iscritti. Puoi decidere in qualunque momento di disiscriverti dal servizio.</span>
                    <div>
                        <input type="checkbox" id="newsletter" name="newsletter" value="no">
                        <label for="newsletter">Non voglio ricevere la newsletter</label>
                    </div>
                </div>
                <br>
                <div class="newsletter">
                    <span>Presto il consenso al trattamento dei dati personali per finalità di profilazione commerciale e/o di marketing</span>
                    <div>
                        <input type="radio" name="consenso" value="accetto">
                        <label for="consenso">Accetto</label>
                        <br>
                        <input type="radio" name="consenso" value="non_accetto">
                        <label for="consenso">Non accetto</label>
                    </div>
                </div>
                <br>
                <div class="testo">
                    <textarea>Informativa privacy
                        In osservanza della disciplina dettata dal D.lgs 196/2003, così come modificato dal D.Lgs. 101/2018, nonché armonizzato dal Regolamento UE 679/2016, il trattamento dei Suoi dati personali sarà improntato ai principi di correttezza, liceità, adeguatezza e trasparenza di tutela della Sua riservatezza e dei suoi diritti.
                        
                        Pertanto, La informiamo che, al fine di renderLe un miglior servizio, in sede di registrazione e di accesso alla nostra community Le verranno richiesti i seguenti dati:
                        
                        Nome
                        Cognome
                        E-mail
                        Numero di telefono
                        Data di nascita
                        Sesso
                        Comune di residenza
                        Password
                        I dati personali ottenuti verranno trattati solo ed esclusivamente per le seguenti finalità:
                        
                        Finalità direttamente connesse e strumentali all’erogazione del servizio, quali la navigazione presso il nostro sito web o l’uso efficiente dell’App collegata;
                        Trattamento di contenuti multimediali inviati attraverso il sito web, l’App “RTL 102.5 Play”, gli account di “RTL 102.5” presenti sui social network ecc. ecc;
                        Comunicazione di informazioni pubblicitarie e promozionali relative a prodotti e servizi di RTL 102.5;
                        Visualizzazione personalizzata dei contenuti presenti nella nostra community;
                        Finalità indirettamente connesse e strumentali all’erogazione del servizio, quali la partecipazione a concorsi a premi;
                        Analisi statistiche
                        Invio di newsletter, previo consenso da Lei prestato;
                        Il trattamento sarà effettuato dal Titolare (o eventualmente da un Responsabile incaricato) tramite supporti cartacei ed informatici, con l’osservanza di ogni misura cautelativa che ne garantisca la sicurezza e la riservatezza.
                        
                        Fatti salvi eventuali obblighi di legge, i dati da Lei conferiti verranno trattati per il tempo strettamente necessario alle finalità suindicate.
                        
                        Il conferimento dei Suoi dati personali ci permette di fornirLe un migliore servizio, fatti salvi i diritti a Lei riservati e di cui di seguito. Le ricordiamo che eventuali dati appartenenti a particolari categorie (quali ad esempio orientamento sessuale, posizioni politiche, giudizi pendenti ecc. ecc.) non verranno da noi richiesti e quindi non saranno soggetti ad alcun trattamento.
                        
                        In ogni momento potrà esercitare i suoi diritti nei confronti del Titolare ai sensi della vigente normativa; nello specifico potrà ottenere:
                        
                        la conferma che sia o meno in corso un trattamento di dati personali che lo riguardano ed in tal caso, di ottenere l’accesso ai dati personali;
                        la rettifica dei dati personali inesatti che ti riguardano senza ingiustificato ritardo;
                        la cancellazione dei dati personali che ti riguardano senza ingiustificato ritardo;
                        la limitazione del trattamento;
                        ricevere in un formato strutturato, di uso comune e leggibile da dispositivo automatico i dati personali che lo riguardano forniti ad un titolare del trattamento ed ha il diritto di trasmettere tali dati ad un altro titolare del trattamento senza impedimenti da parte del titolare del trattamento cui li ha forniti;
                        opporsi in qualsiasi momento al trattamento dei dati personali che lo riguardano;
                        Proporre eventuali reclami all’Autorità Garante per la Tutela della Privacy con sede a Roma.
                        Il Titolare del trattamento è RTL 102,500 HIT RADIO S.R.L., sede legale via Clara Maffei, 14/A, 24121 Bergamo; sede operativa Viale Piemonte 61/63, 20093 Cologno Monzese. RTL 102,500 HIT RADIO S.R.L. si riserva la facoltà di effettuare controlli a campione dell’effettiva validità dell’account, poiché per la valida partecipazione alla ns. Community è essenziale che ad ogni persona fisica corrisponda un solo account. RTL 102,500 HIT RADIO S.R.L. non si riterrà responsabile della veridicità dati dichiarati dagli utenti sia essi maggiorenni o di minore età. RTL 102,500 HIT RADIO S.R.L. si riserva, a proprio ed insindacabile giudizio, la facoltà di sospendere o eliminare tutti gli account sospetti di abuso, utilizzo improprio o che vadano a ledere la fede pubblica.
                        
                        Per ogni comunicazione e/o richiesta in relazione al trattamento dei suoi dati personali, La preghiamo di contattare il D.P.O. incaricato scrivendo a: <a href="info.privacy@rtl.it">info.privacy@rtl.it</a> .</textarea>
                </div>
                <br>
                <div id="img">
                    <span>Carica Immagine profilo</span>
                    <input type="file" name="image" id="immagine">
                    <br>
                </div>
                <div class="form">
                    Selezionando Accetta e continua confermo che i dati utilizzati nella compilazione del modulo di iscrizione alla Vostra community corrispondono al vero e acconsento all'utilizzo dei miei dati personali, come previsto nella nota informativa sulla privacy.
                </div>
                <br>
                <input type="submit" name="submit" id="submit" value="Accetta e continua">
            </form>
        </article>
    </body>
</html>