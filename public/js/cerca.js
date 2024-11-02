function onJson(json) {
    console.log("Json ricevuto");
    let result=document.querySelector('#result');
    result.innerHTML="";
    let h1;
    h1=document.createElement('h1');
    h1.textContent="Risultati della ricerca";
    result.appendChild(h1);
    let div=document.createElement('div');
    div.id="risultati";
    div.classList.add('result');
    result.appendChild(div);
    for(let i=0; i<json.tracks.items.length; i++) {
        let div2=document.createElement('div');
        div.appendChild(div2);
        let h1=document.createElement('h1');
        h1.textContent=json.tracks.items[i].name+" - "+json.tracks.items[i].artists[0].name;
        div2.appendChild(h1);
        let img=document.createElement('img');
        img.src=json.tracks.items[i].album.images[1].url;
        div2.appendChild(img);
        let a=document.createElement('a');
        a.href=json.tracks.items[i].external_urls.spotify;
        a.textContent="Apri su Spotify";
        div2.appendChild(a);
    }
}
function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }
function search(event) {
    event.preventDefault();
    const search_input = document.querySelector('#ricerca');
    const search_value = encodeURIComponent(search_input.value);
    console.log('Eseguo ricerca: ' + search_value);
    fetch("https://api.spotify.com/v1/search?type=track&q=" + search_value, {
        headers: { 'Authorization': 'Bearer ' + token }
    }
    ).then(onResponse).then(onJson);
}
function onTokenJson(json) {
  token = json.access_token;
}
function onTokenResponse(response) {
  return response.json();
}
const client_id = ENV['SPOTIFY_CLIENT_ID'];
const client_secret = ENV['SPOTIFY_CLIENT_SECRET'];
let token;
fetch("https://accounts.spotify.com/api/token",
    {
        method: "post",
        body: 'grant_type=client_credentials',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': 'Basic ' + btoa(client_id + ':' + client_secret)
        }
    }
).then(onTokenResponse).then(onTokenJson);
let form = document.querySelector('form');
form.addEventListener('submit', search);
