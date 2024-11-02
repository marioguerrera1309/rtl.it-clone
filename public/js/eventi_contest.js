function Ripristina(json) {
    alert(json.esito);
    if(json.esito=="Partecipazione registrata!") {
        let e_c=document.getElementById('e_c');
        e_c.classList.remove('nascondi');
        let e_c_2=document.getElementById('e_c_2');
        e_c_2.innerHTML="";
        let button=document.createElement('button');
        button.id="indietro";
        let img=document.createElement('img');
        img.src="img/arrow_back.png";
        button.textContent="Torna indietro";
        button.appendChild(img);
        e_c_2.appendChild(button);
        button.addEventListener('click', indietro);
        e_c_2.classList.add('nascondi');
    }
}
function inviaRisposte(event) {
    event.preventDefault();
    let form=document.querySelector('form');
    let dati=new FormData(form);
    const token = document.head.querySelector('meta[name="csrf-token"]').content;
    dati.append('id_contest', form.id);
    fetch("/salvaRisposte", {
        method: 'post',
        body: dati,
        headers: {'X-CSRF-TOKEN': token}
    }).then(ResponseUtente).then(Ripristina);
}
function salvaEvento(event) {
    event.preventDefault();
    let form=document.querySelector('form');
    let dati=new FormData(form);
    const token = document.head.querySelector('meta[name="csrf-token"]').content;
    dati.append('id_evento', form.id);
    fetch("/salvaEvento", {
        method: 'post',
        body: dati, 
        headers: {'X-CSRF-TOKEN': token}
    }).then(ResponseUtente).then(Ripristina);
}
function onJSONevento(json) {
    console.log("Json da db per evento ricevuto");
    let e_c_2=document.getElementById('e_c_2');
    let h1=document.createElement('h1');
    h1.textContent=json.info.artista+"-"+json.info.titolo;
    e_c_2.appendChild(h1);
    let img=document.createElement('img');
    if(json.info.image=="") {
        img.src="img/caliente.jpg";
    } else {
        img.src="data:image/jpg;base64,"+json.info.image;
    }
    e_c_2.appendChild(img);
    let p=document.createElement('p');
    p.textContent="RTL 102.5 TI REGALA "+json.info.artista+"-"+json.info.titolo;
    e_c_2.appendChild(p);
    let p1=document.createElement('p');
    p1.textContent="Giocate con noi! Rispondete alle domande sotto indicate. Tra tutti coloro che avranno risposto correttamente RTL 102.5 estrarrà i vincitori ai quali regalerà 2 biglietti per la data prescelta dei concerti del tour \""+json.info.titolo+"\" di "+json.info.artista+". I vincitori saranno avvisati attraverso l' e-mail e/o telefonicamente, all’indirizzo di posta elettronica/numero telefonico fornito in fase di registrazione nella Community MyPlay. Alla presa visione dell’eventuale e-mail di vincita, proveniente da premi@rtl.it, i vincitori dovranno rispondere alla e-mail entro e non oltre il termine indicato nell’e-mail, confermando l’effettiva partecipazione all’evento e di conseguenza l’accettazione dei 2 biglietti. In seguito all’accettazione del premio, verranno inviate ai vincitori le istruzioni per il ritiro dei biglietti. In caso di mancata risposta all’e-mail entro il limite di tempo stabilito, sarà implicita la NON accettazione dei biglietti che verranno riassegnati. In caso di mancata risposta alla telefonata di notifica della vincita si passerà ad estrarre un nuovo vincitore. RTL 102.5 non si assume nessuna responsabilità in caso di mancato recapito dell’avviso vincita dovuto all’indicazione di indirizzi e-mail e/o dati personali errati o non veritieri da parte dei vincitori, o nel caso la mailbox risulti piena, la mailbox risulti non più attiva, le mail non vengano recepite nei tempi, in quanto finite nello spam ed in qualsiasi ulteriore caso la cui responsabilità non è imputabile a RTL 102.5";
    p1.classList.add('descrizione');
    e_c_2.appendChild(p1);
    let form=document.createElement('form');
    form.id=json.info.id;
    let select=document.createElement('select');
    select.name="data";
    for(let i=0; i<json.date.length; i++) {
        let option=document.createElement('option');
        option.value=json.date[i].data;
        option.textContent=json.date[i].data;
        select.appendChild(option);
    }
    form.appendChild(select);
    let input=document.createElement('input');
    input.type="submit";
    input.value="Invia";
    form.appendChild(input);
    e_c_2.appendChild(form);
    form.addEventListener('submit', salvaEvento);
}
function apriEvento(event) {
    let e_c=document.getElementById('e_c');
    e_c.classList.add('nascondi');
    let e_c_2=document.getElementById('e_c_2');
    e_c_2.classList.remove('nascondi');
    fetch("/evento?id="+event.currentTarget.id).then(ResponseUtente).then(onJSONevento);
}
function onJSONcontest(json) {
    console.log("Json da db per contest ricevuto");
    let e_c_2=document.getElementById('e_c_2');
    let h1=document.createElement('h1');
    h1.textContent=json.info.artista+"-"+json.info.titolo;
    e_c_2.appendChild(h1);
    let img=document.createElement('img');
    if(json.info.image=="") {
        img.src="img/caliente.jpg";
    } else {
        img.src="data:image/jpg;base64,"+json.info.image;
    }
    e_c_2.appendChild(img);
    let p=document.createElement('p');
    p.textContent="RTL 102.5 TI REGALA "+json.info.artista+"-"+json.info.titolo;
    e_c_2.appendChild(p);
    let p1=document.createElement('p');
    p1.textContent="Giocate con noi! Rispondete alle domande sotto indicate. Tra tutti coloro che avranno risposto correttamente RTL 102.5 estrarrà i vincitori ai quali regalerà 2 biglietti per la data prescelta dei concerti del tour \""+json.info.titolo+"\" di "+json.info.artista+". I vincitori saranno avvisati attraverso l' e-mail e/o telefonicamente, all’indirizzo di posta elettronica/numero telefonico fornito in fase di registrazione nella Community MyPlay. Alla presa visione dell’eventuale e-mail di vincita, proveniente da premi@rtl.it, i vincitori dovranno rispondere alla e-mail entro e non oltre il termine indicato nell’e-mail, confermando l’effettiva partecipazione all’evento e di conseguenza l’accettazione dei 2 biglietti. In seguito all’accettazione del premio, verranno inviate ai vincitori le istruzioni per il ritiro dei biglietti. In caso di mancata risposta all’e-mail entro il limite di tempo stabilito, sarà implicita la NON accettazione dei biglietti che verranno riassegnati. In caso di mancata risposta alla telefonata di notifica della vincita si passerà ad estrarre un nuovo vincitore. RTL 102.5 non si assume nessuna responsabilità in caso di mancato recapito dell’avviso vincita dovuto all’indicazione di indirizzi e-mail e/o dati personali errati o non veritieri da parte dei vincitori, o nel caso la mailbox risulti piena, la mailbox risulti non più attiva, le mail non vengano recepite nei tempi, in quanto finite nello spam ed in qualsiasi ulteriore caso la cui responsabilità non è imputabile a RTL 102.5";
    p1.classList.add('descrizione');
    e_c_2.appendChild(p1);
    let form=document.createElement('form');
    form.id=json.info.id;
    let div=document.createElement('div');
    let p2=document.createElement('p');
    p2.textContent="Domande";
    div.appendChild(p2);
    let ol=document.createElement('ol');
    for(let i=0; i<json.domande.length; i++) {
        let li=document.createElement('li');
        li.textContent=json.domande[i].domanda;
        li.id=json.domande[i].id_domanda;
        ol.appendChild(li);
        for(let j=0; j<json.domande[i].risposte.length; j++) {
           let div2=document.createElement('div');
            let input=document.createElement('input');
            input.type="radio";
            input.name=json.domande[i].id_domanda;
            input.value=json.domande[i].risposte[j].id_risposta;
            li.appendChild(input);
            let label=document.createElement('label');
            label.textContent=json.domande[i].risposte[j].risposta;
            li.appendChild(label);
            div2.appendChild(input);
            div2.appendChild(label);
            ol.appendChild(div2);
        }
    }
    div.appendChild(ol);
    form.appendChild(div);
    let select=document.createElement('select');
    select.name="data";
    if(json.date!=null) {
        for(let i=0; i<json.date.length; i++) {
            let option=document.createElement('option');
            option.value=json.date[i].data;
            option.textContent=json.date[i].data;
            select.appendChild(option);
        }
        form.appendChild(select);
        let input=document.createElement('input');
        input.type="submit";
        input.value="Invia";
        form.appendChild(input);
        e_c_2.appendChild(form);
        form.addEventListener('submit', inviaRisposte);
    } else {
        let option=document.createElement('option');
        option.value="Nessuna data disponibile";
        option.textContent="Nessuna data disponibile";
        select.appendChild(option);
        form.appendChild(select);
        e_c_2.appendChild(form);
    }
}
function apriContest(event) {
    let e_c=document.getElementById('e_c');
    e_c.classList.add('nascondi');
    let e_c_2=document.getElementById('e_c_2');
    e_c_2.classList.remove('nascondi');
    fetch("/contest?id="+event.currentTarget.id).then(ResponseUtente).then(onJSONcontest);
}
function onJSONeventi_contestutente(json) {
    console.log("Json da db per eventi e contest ricevuto");
    let eventi=document.querySelector('article section #eventi');
    eventi.innerHTML="";
    for(let i=0; i<json.eventi.length; i++) {
        let div=document.createElement('div');
        div.classList.add('evento');
        let a=document.createElement('a');
        a.classList.add('collegamento');
        a.id=json.eventi[i].id;
        a.addEventListener('click', apriEvento);
        let p=document.createElement('p');
        p.textContent=json.eventi[i].titolo;
        a.appendChild(p);
        let img=document.createElement('img');
        if(json.eventi[i].image=="") {
            img.src="img/caliente.jpg";
        } else {
            img.src="data:image/jpg;base64,"+json.eventi[i].image;
        }
        a.appendChild(img);
        p=document.createElement('p');
        p.textContent=json.eventi[i].artista;
        a.appendChild(p);
        div.appendChild(a);
        eventi.appendChild(div);
    }
    let contest=document.querySelector('article section #contest');
    contest.innerHTML="";
    for(let i=0; i<json.contest.length; i++) {
        let div=document.createElement('div');
        div.classList.add('cont');
        let a=document.createElement('a');
        a.classList.add('collegamento');
        a.id=json.contest[i].id;
        a.addEventListener('click', apriContest);
        let p=document.createElement('p');
        p.textContent=json.contest[i].titolo;
        a.appendChild(p);
        let img=document.createElement('img');
        if(json.contest[i].image=="") {
            img.src="img/caliente.jpg";
        } else {
            img.src="data:image/jpg;base64,"+json.contest[i].image;
        }
        a.appendChild(img);
        p=document.createElement('p');
        p.textContent=json.contest[i].artista;
        a.appendChild(p);
        div.appendChild(a);
        contest.appendChild(div);
    }
}
function eventi_contest() {
    fetch("/eventi_contest_php").then(ResponseUtente).then(onJSONeventi_contestutente);
}
function indietro() {
    let e_c=document.getElementById('e_c');
    e_c.classList.remove('nascondi');
    let e_c_2=document.getElementById('e_c_2');
    e_c_2.innerHTML="";
    /*
    <button id="indietro"><img src="img/arrow_back.png">Torna indietro</button>
    */
    let button=document.createElement('button');
    button.id="indietro";
    let img=document.createElement('img');
    img.src="img/arrow_back.png";
    button.textContent="Torna indietro";
    button.appendChild(img);
    e_c_2.appendChild(button);
    button.addEventListener('click', indietro);
    e_c_2.classList.add('nascondi');
}
function eliminaPartecipazioneContest(event) {
    let id=event.currentTarget.id;
    let form=new FormData();
    form.append('id', id);
    const token = document.head.querySelector('meta[name="csrf-token"]').content;
    alert("Contest eliminato");
    fetch("/eliminaPartecipazioneContest", {
        method: 'post',
        body: form,
        headers: {'X-CSRF-TOKEN': token}
    }).then(ResponseUtente).then(visualizzaPartecipazioni);
}
function eliminaPartecipazioneEvento(event) {
    let id=event.currentTarget.id;
    let form=new FormData();
    form.append('id', id);
    alert("Evento eliminato");
    const token = document.head.querySelector('meta[name="csrf-token"]').content;
    fetch("/eliminaPartecipazioneEvento", {
        method: 'post',
        body: form,
        headers: {'X-CSRF-TOKEN': token}
    }).then(ResponseUtente).then(visualizzaPartecipazioni);
}
function onJSONeventi_contest_partecipazioni(json) {
    console.log("Json da db per eventi e contest ricevuto");
    let eventi_p=document.getElementById('eventi_p');
    eventi_p.innerHTML="";
    if(json.eventi.length==0) {
        let p=document.createElement('p');
        p.textContent="Non hai partecipato a nessun evento";
        eventi_p.appendChild(p);
    }
    else {
        for(let i=0; i<json.eventi.length; i++) {
            let div=document.createElement('div');
            div.classList.add('evento');
            let div2=document.createElement('div');
            let p=document.createElement('p');
            p.textContent=json.eventi[i].titolo;
            div2.appendChild(p);
            let img=document.createElement('img');
            if(json.eventi[i].image=="") {
                img.src="img/caliente.jpg";
            } else {
                img.src="data:image/jpg;base64,"+json.eventi[i].image;
            }
            div2.appendChild(img);
            p=document.createElement('p');
            p.textContent=json.eventi[i].artista;
            div2.appendChild(p);
            let button=document.createElement('button');
            button.textContent="Elimina";
            button.classList.add('button');
            button.id=json.eventi[i].id;
            button.addEventListener('click', eliminaPartecipazioneEvento);
            div2.appendChild(button);
            div.appendChild(div2);
            eventi_p.appendChild(div);
        }
    }
    let contest_p=document.getElementById('contest_p');
    contest_p.innerHTML="";
    if(json.contest.length==0) {
        let p=document.createElement('p');
        p.textContent="Non hai partecipato a nessun contest";
        contest_p.appendChild(p);
    } else {
        for(let i=0; i<json.contest.length; i++) {
            let div=document.createElement('div');
            div.classList.add('cont');
            let div2=document.createElement('div');
            let p=document.createElement('p');
            p.textContent=json.contest[i].titolo;
            div2.appendChild(p);
            let img=document.createElement('img');
            if(json.contest[i].image=="") {
                img.src="img/caliente.jpg";
            } else {
                img.src="data:image/jpg;base64,"+json.contest[i].image;
            }
            div2.appendChild(img);
            p=document.createElement('p');
            p.textContent=json.contest[i].artista;
            div2.appendChild(p);
            let button=document.createElement('button');
            button.textContent="Elimina";
            button.classList.add('button');
            button.id=json.contest[i].id;
            button.addEventListener('click', eliminaPartecipazioneContest);
            div2.appendChild(button);
            div.appendChild(div2);
            contest_p.appendChild(div);
        }
    }
}
function indietroDaPartecipazioni() {
    let e_c=document.getElementById('e_c');
    e_c.classList.remove('nascondi');
    let e_c_2=document.getElementById('e_c_2');
    e_c_2.innerHTML="";
    let button=document.createElement('button');
    button.id="indietro";
    let img=document.createElement('img');
    img.src="img/arrow_back.png";
    button.textContent="Torna indietro";
    button.appendChild(img);
    e_c_2.appendChild(button);
    button.addEventListener('click', indietro);
    let partecipazioni=document.getElementById('partecipazioni');
    partecipazioni.classList.add('nascondi');
}
function visualizzaPartecipazioni() {
    let e_c=document.getElementById('e_c');
    e_c.classList.add('nascondi');
    let e_c_2=document.getElementById('e_c_2');
    e_c_2.innerHTML="";
    e_c_2.classList.add('nascondi');
    let partecipazioni=document.getElementById('partecipazioni');
    partecipazioni.classList.remove('nascondi');
    let indietro_p=document.getElementById('indietro_p');
    indietro_p.addEventListener('click', indietroDaPartecipazioni);
    let eventi_p=document.getElementById('eventi_p');
    eventi_p.innerHTML="";
    let contest_p=document.getElementById('eventi_p');
    contest_p.innerHTML="";  
    fetch("/eventi_contest_partecipazioni").then(ResponseUtente).then(onJSONeventi_contest_partecipazioni);
}
let tasto_indietro=document.querySelector('#indietro');
tasto_indietro.addEventListener('click', indietro);
eventi_contest();
let partecipazioni=document.querySelector('#e_c .button');
partecipazioni.addEventListener('click', visualizzaPartecipazioni);