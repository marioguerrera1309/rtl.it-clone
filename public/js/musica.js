function onJSONpreferiti(json) {
    if(json.esito=="preferito aggiunto!") {
        let a=document.getElementById(json.id);
        a.textContent="Aggiunto ai preferiti";
        a.removeEventListener('click', aggiungiPreferiti);
        a.classList.add('blue');
        alert("Album aggiunto ai preferiti!");
    } else {
        alert("Album già presente nei preferiti!");
    }
}
function ModificaPreferiti(json) {
    for(let i=0; i<json.length; i++) {
        let a=document.getElementById(json[i].id);
        if(a!==null) {
            a.textContent="Aggiunto ai preferiti";
            a.classList.add('blue');
            a.removeEventListener('click', aggiungiPreferiti);
        }
    }
}
function aggiungiPreferiti(formData) {
    const token = document.head.querySelector('meta[name="csrf-token"]').content;
    fetch("/aggiungiPreferiti", {
        method: 'post',
        body: formData, 
        headers: {'X-CSRF-TOKEN': token}
    }).then(ResponseUtente).then(onJSONpreferiti);
}
function ResponseUtente2(response) {
    return response.text();
}
function onJsonMusica(json) {
    let section=document.querySelector('#galleria');
    section.innerHTML="";
    for(let i=0; i<json.albums.items.length; i++) {
        /*
        <div class="elemento">
            <p>json.albums.items[i].name</p>
            <img src="json.albums.items[i].images[2]">
            <p>json.albums.items[i].artists[0].name</p>
        </div>
        */
        let div=document.createElement('div');
        div.classList.add('elemento');
        let p=document.createElement('p');
        p.textContent=json.albums.items[i].name;
        div.appendChild(p);
        let img=document.createElement('img');
        img.src=json.albums.items[i].images[0].url;
        div.appendChild(img);
        for(let j=0; j<json.albums.items[i].artists.length; j++) { 
            let p2=document.createElement('p');
            p2.textContent=json.albums.items[i].artists[j].name;
            div.appendChild(p2);
        }
        let a=document.createElement('a');
        a.textContent="Aggiungi ai preferiti";
        a.id=json.albums.items[i].id;
        let formData=new FormData();
        formData.append('id', json.albums.items[i].id);
        formData.append('nome', json.albums.items[i].name);
        formData.append('immagine', json.albums.items[i].images[0].url);
        for(let j=0; j<json.albums.items[i].artists.length; j++) {
            formData.append('artista_'+j, json.albums.items[i].artists[j].name);
        }
        formData.append('release_date', json.albums.items[i].release_date);
        formData.append('tracce', json.albums.items[i].total_tracks);
        a.addEventListener('click', function() {
            aggiungiPreferiti(formData);
        });
        div.appendChild(a);
        section.appendChild(div);
    }
    fetch("/preferiti").then(ResponseUtente).then(ModificaPreferiti);
}
function musica() {
    fetch("/musica_php").then(ResponseUtente).then(onJsonMusica);
}
function RitornaMusica() {
    let section=document.querySelector('#galleria');
    section.innerHTML="";
    let button=document.querySelector('#preferiti');
    button.textContent="Visualizza i tuoi album preferiti";
    button.removeEventListener('click', RitornaMusica);
    button.addEventListener('click', visualizzaPreferiti);
    musica();
}
function rimuoviPreferiti(event) {
    let formData=new FormData();
    const token = document.head.querySelector('meta[name="csrf-token"]').content;
    formData.append('id', event.currentTarget.id);
    alert("Album rimosso dai preferiti!");
    fetch("/rimuoviPreferiti", {
        method: 'post',
        body: formData, 
        headers: {'X-CSRF-TOKEN': token}
    }).then(ResponseUtente).then(visualizzaPreferiti);
}
function onJsonVisualizzaPreferiti(json) {
    console.log();
    let section=document.querySelector('#galleria');
    section.innerHTML="";
    let button=document.querySelector('#preferiti');
    button.textContent="Torna alla musica";
    button.removeEventListener('click', visualizzaPreferiti);
    button.addEventListener('click', RitornaMusica);
    if(json.length==0) {
        let p=document.createElement('p');
        p.textContent="Non hai album preferiti!";
        section.appendChild(p);
    } else {
        for(let i=0; i<json.length; i++) {
            let div=document.createElement('div');
            div.classList.add('elemento');
            let p=document.createElement('p');
            p.textContent=json[i].content.nome;
            div.appendChild(p);
            let img=document.createElement('img');
            img.src=json[i].content.immagine;
            div.appendChild(img);
            for(let j=0; j<json[i].content.artisti.length; j++) { 
                let p2=document.createElement('p');
                p2.textContent=json[i].content.artisti[j];
                div.appendChild(p2);
            }
            let a=document.createElement('a');
            a.textContent="Rimuovi dai preferiti";
            a.id=json[i].id;
            a.addEventListener('click', rimuoviPreferiti);
            div.appendChild(a);
            section.appendChild(div);
        }
    }
}
function visualizzaPreferiti() {
    fetch("/preferiti").then(ResponseUtente).then(onJsonVisualizzaPreferiti);
}
musica();
let pref=document.querySelector('#preferiti');
pref.addEventListener('click', visualizzaPreferiti);