function onJSONcompila(json) {
    let prefissi=document.querySelector('select[name="prefisso"]');
    let prefisso=prefissi.querySelector("option[value='"+json.prefisso+"']");
    prefisso.selected=true;
    let nazioni=document.querySelector('select[name="nazioni"]');
    let nazione=nazioni.querySelector("option[value='"+json.nazione+"']");
    nazione.selected=true;
    let stringa="";
    let ricarica=false;
    for(let i=0; i<json.messaggi.length; i++) {
        stringa+=json.messaggi[i]+"\n";
        if(json.messaggi[i]=="Email modificata con successo") {
            ricarica=true;
        }
    }
    if(json.messaggi.length>0)
        alert(stringa);
    if(ricarica) {
        window.location.href = '/contatti';
    }
}
function invia(event) {
    event.preventDefault();
    let form=document.querySelector('form');
    let formData=new FormData(form);
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch("/contattiUtente", {
        method: 'post',
        body: formData,
        headers: {'X-CSRF-Token': token}
    }).then(ResponseUtente).then(onJSONcompila);
}
let nav=document.querySelector('a[href="/contatti"]');
nav.classList.add('selected');
let prefissi=document.querySelector('select[name="prefisso"]');
let italia=prefissi.querySelector('option[value="39"]');
italia.selected=false;
let nazioni=document.querySelector('select[name="nazioni"]');
italia=nazioni.querySelector('option[value="109"]');
italia.selected=false;
fetch("/compila").then(ResponseUtente).then(onJSONcompila);
let form=document.querySelector('form');
form.addEventListener('submit', invia);