function change_img() {
    let change=document.querySelector('.change');
    oscura(1);
    change.classList.add('change2');
}
function chiudi() { 
    let change=document.querySelector('.change');
    change.classList.remove('change2');
    oscura(0);
}
function ResponseUtente(response) {
    return response.json();
}
function onJSONutente(json) {
    if(json=="Errore: sessione non attiva"){
        window.location.href = '/login';
    } else {
        console.log("Json dal db ricevuto");
        let button=document.querySelector('.navMenu button');
        button.innerHTML="";
        let button2=document.querySelector('#rtlnav2');
        button2.innerHTML="";
        let image=document.querySelector('.immagine img');
        image.innerHTML="";
        if(json[0].image=="") {
            image.src="img/default.jpg";
        } else {
            image.src="data:image/jpg;base64,"+json[0].image;
        }
        let img=document.createElement('img');
        if(json[0].image=="") {
            img.src="img/default.jpg";
        } else {
            img.src="data:image/jpg;base64,"+json[0].image;
        }
        button.appendChild(img);
        button2.appendChild(img.cloneNode(true));
        let p=document.querySelector('.immagine div p');
        p.textContent=json[0].nome+" "+json[0].cognome;
        let h2=document.querySelector('.login div div h2');
        h2.textContent=json[0].nome+" "+json[0].cognome;
        let change=document.querySelector('.change div div img');
        if(json[0].image=="") {
            change.src="img/default.jpg";
        } else {
            change.src="data:image/jpg;base64,"+json[0].image;
        }
        let foto=document.getElementById('foto_profilo');
        foto.innerHTML="";
        foto.appendChild(img.cloneNode(true));
    }
}
function infoUtente() {
    fetch("/profilo").then(ResponseUtente).then(onJSONutente);
}
function caricaFoto(event) {
    event.preventDefault();
    let formdata=new FormData();
    let file=document.querySelector('#immagine');
    const token = document.head.querySelector('meta[name="csrf-token"]').content;
    if(file.files.length>0) {
        formdata.append('image', file.files[0]);
        fetch("/upload_img", {
            method: 'post',
            body: formdata,
            headers: {'X-CSRF-TOKEN': token}
        }).then(ResponseUtente).then(onJSONutente);
    }
    chiudi();
}
function onJSONdati(json) {
    console.log("Json dal db per form ricevuto")
    let nome=document.querySelector('form input[name=nome]');
    nome.value=json[0].nome;
    let cognome=document.querySelector('form input[name=cognome]');
    cognome.value=json[0].cognome;
    let data=document.querySelector('form input[name=data]');
    data.value=json[0].data;
    let genere=document.querySelectorAll('form input[name=genere]');
    if(json[0].genere=="maschio") {
        genere[0].checked=true;
    } else if(json[0].genere=="femmina"){
        genere[1].checked=true;
    } else {
        genere[2].checked=true;
    }
    let newsletter=document.querySelector('form input[name=newsletter]');
    if(json[0].newsletter=="no") {
        newsletter.checked=true;
    } else {
        newsletter.checked=false;
    }
    let consenso=document.querySelectorAll('form input[name=consenso]');
    if(json[0].consenso=="accetto") {
        consenso[0].checked=true;
    } else {
        consenso[1].checked=true;
    }
}
function dati() {
    fetch("/dati").then(ResponseUtente).then(onJSONdati);
}
function onJSONdatiutente(json) {
    dati();
    infoUtente();
    let stringa="";
    for(let i=0; i<json.length; i++) {
        stringa+=json[i]+"\n";
    }
    if(json.length!=0) 
        alert(stringa);
}
function datiUtente(event) {
    event.preventDefault();
    let form=document.querySelector('form');
    let formdata=new FormData(form);
    const token = document.head.querySelector('meta[name="csrf-token"]').content;
    fetch("/datiUtente", {
        method: 'post',
        body: formdata,
        headers: {'X-CSRF-TOKEN': token}
    }).then(ResponseUtente).then(onJSONdatiutente); 
}
function apriDelete() {
    let delete_sec=document.querySelector('.confirm_delete');
    oscura(1);
    delete_sec.classList.add('confirm_delete2');
}
function esci_delete(event) {
    let delete_sec=document.querySelector('.confirm_delete');
    delete_sec.classList.remove('confirm_delete2');
    oscura(0);
    event.stopPropagation();
    event.preventDefault();
}
function eliminazione_confermata(json) {
    if(json=="Account eliminato con successo") {
        alert(json);
        window.location.href = '/login';
    }
}
function eliminaAccount() {
    fetch("/delete").then(ResponseUtente).then(eliminazione_confermata);
}
let change=document.querySelector('#change');
change.addEventListener('click', change_img);
let x=document.querySelector('#x');
x.addEventListener('click', chiudi);
infoUtente();
let carica=document.querySelector('#img_submit');
carica.addEventListener('click', caricaFoto);
dati();
let submit=document.querySelector('#submit');
submit.addEventListener('click', datiUtente);
let del=document.querySelector('.delete button');
del.addEventListener('click', apriDelete);
let del_x=document.querySelector('#delete_x button');
del_x.addEventListener('click', esci_delete);
let annulla=document.querySelector('#annulla');
annulla.addEventListener('click', esci_delete);
let conferma_del=document.querySelector('#conferma');
conferma_del.addEventListener('click', eliminaAccount)
let nav=document.querySelector('a[href="/informazioni_personali"]');
nav.classList.add('selected');