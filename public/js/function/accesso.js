function accesso() {
    let login_sec=document.querySelector('.login');
    oscura(1);
    login_sec.classList.add('login2');
}
function esci() {
    let login_sec=document.querySelector('.login');
    login_sec.classList.remove('login2');
    oscura(0);
}
let accedi=document.querySelector('#rtlnav2');
accedi.addEventListener('click',accesso);
let button=document.querySelector('#rtlc21 button');
button.addEventListener('click', esci);
let navMenu=document.querySelector('.navMenu button');
navMenu.addEventListener('click', accesso);