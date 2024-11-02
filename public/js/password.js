function aggiornaStringa(json) {
    let passwordInput = document.querySelector('input[name="password_n"]');
    let passwordValue = passwordInput.value;
    let nome=json[0].nome;
    let email=json[0].email;
    let i=1;
    let info1=document.getElementById('info1');
    info1.textContent="X";
    info1.classList.remove('green');
    info1.classList.add('red');
    let info2=document.getElementById('info2');
    info2.textContent="V";
    info2.classList.remove('red');
    info2.classList.add('green');
    let info3=document.getElementById('info3');
    info3.textContent="X";
    info3.classList.remove('green');
    info3.classList.add('red');
    let info4=document.getElementById('info4');
    info4.textContent="X";
    info4.classList.remove('green');
    info4.classList.add('red');
    if((passwordValue.includes(nome) || passwordValue.includes(email)) && nome.length>0 && email.length>0) {
        info2.textContent="X";
        info2.classList.remove('green');
        info2.classList.add('red');
        i=i-1;
    }
    if(passwordValue.length>=8) {
        info3.textContent="V";
        info3.classList.remove('red');
        info3.classList.add('green');
        i=i+1;
    }
    if(passwordValue.match(/^(?=.*[0-9])(?=.*[@$!%*#?&]).*$/)) {
        info4.textContent="V";
        info4.classList.remove('red');
        info4.classList.add('green');
        i=i+1;
    }
    if(i==3) {
        info1.textContent="V";
        info1.classList.remove('red');
        info1.classList.add('green');
    }
}
function aggiorna() {
    fetch("/profilo").then(ResponseUtente).then(aggiornaStringa);
}
function mostraNavPassword(event) {
    event.preventDefault();
    let p;
    if(event.currentTarget.id=="mostra_a") {
        p=document.querySelector('input[name="password_a"]');
        if(p.type=="password") {
            p.type="text";
        } else {
            p.type="password";
        }
    } else {
        p=document.querySelector('input[name="password_n"]');
        if(p.type=="password") {
            p.type="text";
        } else {
            p.type="password";
        }
    }
}
function onJSONpassword(json) {
    alert(json);
    let form=document.querySelector('form');
    form.reset();
    aggiorna();
}
function aggiornaPassword(event) {
    event.preventDefault();
    let form=document.querySelector('form');
    let form_data=new FormData(form);
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch("/aggiornaPassword", {
        method: 'post', 
        body: form_data,
        headers: {'X-CSRF-Token': token}
    }).then(ResponseUtente).then(onJSONpassword);
}
let nav=document.querySelector('a[href="/password"]');
nav.classList.add('selected');
let password=document.querySelector('input[name="password_n"]');
password.addEventListener('input', aggiorna);
let mostra_a=document.querySelector('#mostra_a');
mostra_a.addEventListener('click', mostraNavPassword);
let mostra_n=document.querySelector('#mostra_n');
mostra_n.addEventListener('click', mostraNavPassword);
let form=document.querySelector('form');
form.addEventListener('submit', aggiornaPassword);