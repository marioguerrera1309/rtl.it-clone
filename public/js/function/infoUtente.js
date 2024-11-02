function ResponseUtente(response) {
    return response.json();
}
function onJSONutente(json) {
    if(json=="Errore: sessione non attiva"){
        window.location.href = '/login';
    } else {
        console.log("Json da utente ricevuto");
        let button=document.querySelector('#rtlnav2');
        button.innerHTML="";
        let button2=document.querySelector('.navMenu button');
        button2.innerHTML="";
        let foto=document.getElementById('foto_profilo');
        let img=document.createElement('img');
        if(json[0].image=="") {
            img.src="img/default.jpg";
        } else {
            img.src="data:image/jpg;base64,"+json[0].image;
        }
        button2.appendChild(img);
        button.appendChild(img.cloneNode(true));
        foto.appendChild(img.cloneNode(true));
        let h2=document.querySelector('.login div div h2');
        h2.textContent=json[0].nome+" "+json[0].cognome;
    }
}
function infoUtente() {
    fetch("/profilo").then(ResponseUtente).then(onJSONutente);
}
infoUtente();