function accesso() {
    let login_sec=document.querySelector('.login');
    oscura(1);
    login_sec.classList.add('login2');
}
function esci(event) {
    let login_sec=document.querySelector('.login');
    login_sec.classList.remove('login2');
    oscura(0);
    event.stopPropagation();
    event.preventDefault();
}
function mostraPassword(event) {
    let password=document.querySelector('.login div div div input')
    if(password.type=="password") {
        password.type="text";
    } else {
        password.type="password";
    }
    event.stopPropagation();
    event.preventDefault();
}
function accessoDaBot() {
    let bot=document.querySelector('.bot');
    bot.remove();
    let login=document.querySelector('.login');
    login.classList.add('login2');
    oscura(1);
}
function apriChatbot() {
    let menu=document.createElement('section');
    menu.classList.add('bot');
    let div=document.createElement('div');
    menu.appendChild(div);
    let div2=document.createElement('div');
    div.appendChild(div2);
    div2.classList.add('rtlc24');
    let h1=document.createElement('h1');
    h1.textContent="IL TUO MESSAGGIO A CHATBOT";
    div2.appendChild(h1);
    let button=document.createElement('button');
    button.textContent="X";
    button.id="chiudiBot";
    div2.appendChild(button);
    button.addEventListener('click', chiudiBot);
    let img=document.createElement('img');
    img.src="img/logochatbot.png";
    div.appendChild(img);
    let h3=document.createElement('h3');
    h3.textContent="Per inviare il tuo messaggio a CHATBOT devi aver effettuato l' accesso alla community di MyPlay";
    div.appendChild(h3);
    let button2=document.createElement('button');
    button2.textContent="ACCEDI A MY PLAY";
    button2.id="accessoChatBot";
    div.appendChild(button2);
    button2.classList.add('accessoChatBot');
    button2.addEventListener('click', accessoDaBot);
    let body=document.querySelector('body');
    body.appendChild(menu);
    oscura(1);
}
function chiudiBot() {
    let section=document.querySelector('.bot');
    section.remove();
    oscura(0);
}
function validazione(event) {   
    let form = document.querySelector('form'); 
    if(form.email.value.length == 0 || form.password.value.length == 0) {
        alert("Compilare tutti i campi.");
        event.preventDefault();
    }
}
function invio(event) {
    let login=document.querySelector('form');
    if (event.key === "Enter") {
        event.preventDefault();
        login.submit();
    }
}
function allerta(event) {
    alert("Devi effettuare l'accesso per accedere a questa sezione.");
    event.stopPropagation();
    event.preventDefault();
}
let accedi=document.querySelector('#rtlnav2');
accedi.addEventListener('click',accesso);
let button=document.querySelector('#rtlc21 button');
button.addEventListener('click', esci);
let mostra=document.querySelector('.login div div div button');
mostra.addEventListener('click', mostraPassword);
let navMenu=document.querySelector('.navMenu button');
navMenu.addEventListener('click', accesso);
let chatbot=document.querySelector('#chatbot');
chatbot.addEventListener('click', apriChatbot);
let login=document.querySelector('form');
login.addEventListener('submit', validazione);
let password=document.querySelector('#psw');
password.addEventListener("keydown", invio);
let nav=document.querySelector('.navMenu');
let navMenuElements = nav.querySelectorAll('*');
for(let i=2; i<navMenuElements.length; i++) {
    navMenuElements[i].addEventListener('click', allerta);
}
let nav2=document.querySelector('#flexnav1');
let nav2Elements = nav2.querySelectorAll('*');
for(let i=1; i<nav2Elements.length; i++) {
    nav2Elements[i].addEventListener('click', allerta);
}
let nav3=document.querySelector('#flexnav1_2');
let nav3Elements = nav3.querySelectorAll('*');
for(let i=1; i<nav3Elements.length; i++) {
    nav3Elements[i].addEventListener('click', allerta);
}
let nav4=document.querySelectorAll('footer div div a[attr="x"]');
for(let i=0; i<nav4.length; i++) {
    nav4[i].addEventListener('click', allerta);
}