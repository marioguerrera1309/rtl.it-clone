function apriMenu() {
    let menu=document.querySelector('.navMenu');
    if(menu.classList.contains('menuAttivo')) {
        menu.classList.remove('menuAttivo');
    } else {
        menu.classList.add('menuAttivo');
    }
}
let menu=document.querySelector('#menu');
menu.addEventListener('click', apriMenu);