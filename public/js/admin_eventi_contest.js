function onJsonEliminaContest(json) {
    if(json.esito=="Contest eliminato correttamente") {
        alert("Contest eliminato correttamente");
        eventi_contest();
    } else {
        alert("Errore nell'eliminazione del contest");
    }
}
function eliminaContest(event) {
    let id=event.currentTarget.id;
    let formData=new FormData();
    formData.append('id', id);
    const token = document.head.querySelector('meta[name="csrf-token"]').content;
    fetch("/eliminaContest", {
        method: 'post',
        body: formData,
        headers: {'X-CSRF-TOKEN': token}
    }).then(ResponseUtente).then(onJsonEliminaContest);
}
function onJsonEliminaEvento(json) {
    if(json.esito=="Evento eliminato correttamente") {
        alert("Evento eliminato correttamente");
        eventi_contest();
    } else {
        alert("Errore nell'eliminazione dell'evento");
    }
}
function eliminaEvento(event) {
    let id=event.currentTarget.id;
    let formData=new FormData();
    formData.append('id', id);
    const token = document.head.querySelector('meta[name="csrf-token"]').content;
    fetch("/eliminaEvento", {
        method: 'post',
        body: formData,
        headers: {'X-CSRF-TOKEN': token}
    }).then(ResponseUtente).then(onJsonEliminaEvento);
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
        let elimina=document.createElement('button');
        elimina.textContent="Elimina";
        elimina.id=json.eventi[i].id;
        elimina.classList.add('elimina');
        elimina.addEventListener('click', eliminaEvento);
        a.appendChild(elimina);
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
        let elimina=document.createElement('button');
        elimina.textContent="Elimina";
        elimina.id=json.contest[i].id;
        elimina.classList.add('elimina');
        elimina.addEventListener('click', eliminaContest);
        a.appendChild(elimina);
        div.appendChild(a);
        contest.appendChild(div);
    }
}
function eventi_contest() {
    fetch("/eventi_contest_php").then(ResponseUtente).then(onJSONeventi_contestutente);
}
function date_evento() {
    let n_date=document.querySelector('.eventi form select');
    let n=n_date.value;
    let data=document.querySelector('.eventi form .data');
    data.innerHTML="";
    for(let i=1; i<=n; i++) {
        let input=document.createElement('input');
        input.type="date";
        let string="data_"+i+"_evento";
        input.name=string;
        data.appendChild(input);
    }
}
function date_contest() {
    let n_date=document.querySelector('.contest form select');
    let n=n_date.value;
    let data=document.querySelector('.contest form .data');
    data.innerHTML="";
    for(let i=1; i<=n; i++) {
        let input=document.createElement('input');
        input.type="date";
        let string="data_"+i+"_contest";
        input.name=string;
        data.appendChild(input);
    }
}
function onJsonEvento(json) {
    if(json.esito=="Evento aggiunto correttamente") {
        alert("Evento aggiunto correttamente");
        let eventi=document.querySelector('.eventi form');
        eventi.reset();
        eventi_contest();
    } else {
        alert("Errore nell'aggiunta dell'evento");
    }
}
function aggiungiEventoDb(event) {
    event.preventDefault();
    let form=document.querySelector('.eventi form');
    let formData=new FormData(form);
    let flag=false;
    if(formData.get('titolo')=="" || formData.get('artista')=="") {
        flag=true;
    }
    for(let i=0; i<formData.get('n_date'); i++) {
        let string="data_"+(i+1)+"_evento";
        if(formData.get(string)=="") {
            flag=true;
        }
    }
    if(flag) {
        alert("Compilare tutti i campi");
    } else {
        const token = document.head.querySelector('meta[name="csrf-token"]').content;
        fetch("/aggiungiEventoDb", {
            method: 'post',
            body: formData,
            headers: {'X-CSRF-TOKEN': token}
        }).then(ResponseUtente).then(onJsonEvento);
    }
}
function onJsonContest(json) {
    if(json.esito=="Contest aggiunto correttamente") {
        alert("Contest aggiunto correttamente");
        let contest=document.querySelector('.contest form');
        contest.reset();
        eventi_contest();
    } else {
        alert("Errore nell'aggiunta dell'evento");
    }
}
function aggiungiContestDb(event) {
    event.preventDefault();
    let form=document.querySelector('.contest form');
    let formData=new FormData(form);
    let flag=false;
    if(formData.get('titolo')=="" || formData.get('artista')=="") {
        flag=true;
    }
    for(let i=0; i<formData.get('n_date'); i++) {
        let string="data_"+(i+1)+"_evento";
        if(formData.get(string)=="") {
            flag=true;
        }
    }
    for(let i=1; i<=9; i++) {
        if(formData.get('risposta'+i)=="") {
            flag=true;
        }
    }
    for(let i=1; i<=3; i++) {
        if(formData.get('domanda'+i)=="") {
            flag=true;
        }
    }
    if(flag) {
        alert("Compilare tutti i campi");
    } else {
        const token = document.head.querySelector('meta[name="csrf-token"]').content;
        fetch("/aggiungiContestDb", {
            method: 'post',
            body: formData,
            headers: {'X-CSRF-TOKEN': token}
        }).then(ResponseUtente).then(onJsonContest);
    }
}
eventi_contest();
let n_date_e=document.querySelector('.eventi form select');
n_date_e.addEventListener('change', date_evento);
let n_date_c=document.querySelector('.contest form select');
n_date_c.addEventListener('change', date_contest);
let evento=document.querySelector('.eventi form input[type="submit"]');
evento.addEventListener('click', aggiungiEventoDb);
let contest=document.querySelector('.contest form input[type="submit"]');
contest.addEventListener('click', aggiungiContestDb);