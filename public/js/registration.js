function mostraNavPassword(event) {
    event.preventDefault();
    let password=document.querySelector('#password')
    if(password.type=="password") {
        password.type="text";
    } else {
        password.type="password";
    }
}
function aggiornaStringa() {
    let passwordInput = document.getElementById('password');
    let passwordValue = passwordInput.value;
    let nome=document.getElementById('nome');
    let nomeValue=nome.value;
    let email=document.getElementById('email');
    let emailValue=email.value;
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
    if((passwordValue.includes(nomeValue) || passwordValue.includes(emailValue)) && nomeValue.length>0 && emailValue.length>0) {
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
function convalida(event) {
    let passwordInput = document.getElementById('password');
    let passwordValue = passwordInput.value;
    let nome=document.getElementById('nome');
    let nomeValue=nome.value;
    let email=document.getElementById('email');
    let emailValue=email.value;
    let cognome=document.getElementById('cognome');
    let cognomeValue=cognome.value;
    let telefono=document.getElementById('telefono');
    let telefonoValue=telefono.value;
    let date=document.getElementById('date');
    let dateValue=date.value;
    let genere=document.querySelectorAll('input[name="genere"]');
    let genereValue=null;
    genere.forEach((radio) => { 
        if(radio.checked) { 
            genereValue=radio.value; 
        } 
    });
    let consenso=document.querySelectorAll('input[name="consenso"]');
    let consensoValue=null;
    consenso.forEach((radio) => {
        if(radio.checked) {
            consensoValue=radio.value;
        }
    });
    let comune=document.getElementById('comune');
    let comuneValue=comune.value;
    let p=document.querySelector('.er2');
    let i=1;
    if((passwordValue.includes(nomeValue) || passwordValue.includes(emailValue)) && nomeValue.length>0 && emailValue.length>0) {
        i=i-1;
    }
    if(passwordValue.length>=8) {
        i=i+1;
    }
    if(passwordValue.match(/^(?=.*[0-9])(?=.*[@$!%*#?&]).*$/)) {
        i=i+1;
    }
    if(!(nomeValue.length>0 && emailValue.length>0 && cognomeValue.length>0 && telefonoValue.length>0 && dateValue.length>0 && genereValue!=null && comuneValue.length>0 && consensoValue!=null)) {
        p.textContent="Compilare tutti i campi";
        p.classList.add('error');
        event.preventDefault();
    } else if(i!=3) {
        p.textContent="La password non rispetta i criteri di sicurezza";
        p.classList.add('error');
        event.preventDefault();
    }
}
let mostra=document.querySelector('#mostra');
mostra.addEventListener('click', mostraNavPassword);
let password=document.querySelector('#password');
password.addEventListener('input', aggiornaStringa);
let submit=document.querySelector('#submit');
submit.addEventListener('click', convalida);