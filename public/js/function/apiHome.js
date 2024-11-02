function onResponse(response) {
    console.log('Risposta da NyTimes ricevuta');
    return response.json();
}
function onJson(json) {
    console.log("Json da NyTimes ricevuto");
    let container4=document.querySelector('#container4');
    container4.innerHTML="";
    let div, a, img, a2;
    for(let i=0; i<5; i++) {
        div=document.createElement('div');
        container4.appendChild(div);
        div.classList.add('rtlc19');
        a=document.createElement('a');
        a.href=json.results[i].url;
        div.appendChild(a);
        img=document.createElement('img');
        a.appendChild(img);
        img.src=json.results[i].multimedia[2].url;
        a2=document.createElement('a');
        a2.href=json.results[i].url;
        div.appendChild(a2);
        a2.classList.add('rtlc20');
        a2.textContent=json.results[i].title;
    }
}
function news() {
    fetch('/nytimes').then(onResponse).then(onJson);
}
function onResponseMusic(response) {
    console.log('Risposta da Gnews ricevuta');
    return response.json();
}
function onJsonMusic(json) {
    console.log("Json da Gnews ricevuto");
    let container2=document.querySelector('#container2');
    container2.innerHTML="";
    let div, a, img, a2;
    let i=0;
    for(i=0; i<json.articles.length; i++) {
        div=document.createElement('div');
        container2.appendChild(div);
        div.classList.add('rtlc10');
        a=document.createElement('a');
        a.href=json.articles[i].url;
        div.appendChild(a);
        img=document.createElement('img');
        a.appendChild(img);
        img.src=json.articles[i].image;
        a2=document.createElement('a');
        a2.href=json.articles[i].url;
        div.appendChild(a2);
        a2.textContent=json.articles[i].title;
    }
}
function newsmusic() {
    fetch('/gnews').then(onResponseMusic).then(onJsonMusic);
}
news(); 
newsmusic();