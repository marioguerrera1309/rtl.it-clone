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
    h3.textContent="Ciao sono CHATBOT, cosa vorresti chiedermi?";
    div.appendChild(h3);
    let input=document.createElement('textarea');
    input.type="text";
    input.placeholder="Scrivi il tuo messaggio";
    input.classList.add('botInput');
    input.row=20;
    div.appendChild(input);
    let input2=document.createElement('input');
    input2.type="submit";
    input2.value="Invia";
    div.appendChild(input2);
    input2.addEventListener('click', chiudiBot);
    input2.classList.add('botInput');
    let body=document.querySelector('body');
    body.appendChild(menu);
    oscura(1);
}
function chiudiBot() {
    let section=document.querySelector('.bot');
    section.remove();
    oscura(0);
}
let chatbot=document.querySelector('#chatbot');
chatbot.addEventListener('click', apriChatbot);