function oscura(x) {
    let header=document.querySelector('header');
    let navList=document.querySelectorAll('nav');
    let article=document.querySelector('article');
    let footer=document.querySelector('footer');
    if(x===1) {
        document.body.classList.add('no-scroll');
        header.classList.add('filtro');
        for(let i=0; i<navList.length; i++) {
            navList[i].classList.add('filtro');
        }
        article.classList.add('filtro');
        footer.classList.add('filtro');
    } else {
        document.body.classList.remove('no-scroll');
        header.classList.remove('filtro');
        for(let i=0; i<navList.length; i++) {
            navList[i].classList.remove('filtro');
        }
        article.classList.remove('filtro');
        footer.classList.remove('filtro');
    }
}