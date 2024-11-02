function cambiaLive() {
    let img=document.querySelector('#rtlc4');
    let img2=document.querySelector('#rtlc17');
    let data=new Date();
    if(data.getHours()>21 || data.getHours()<6) {
        img.src="img/sera.png"; 
        img2.src="img/sera.png";
    }
    let testo=document.querySelectorAll('.rtlc7');
    let testo2=document.querySelector('#rtlc18');
    if(data.getHours()>21 || data.getHours()<6) {
        testo[0].textContent="I NOTTAMBULI";
        testo[1].textContent="Con Andrea De Sabato e Andrea Piscina";
        testo2.textContent="I NOTTAMBULI";
    }
}
cambiaLive();