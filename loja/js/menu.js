const nav = document.getElementById('navbar');
const sanduiche = document.getElementById('sanduiche');
const icone = document.getElementById('icone');

sanduiche.addEventListener('click', () => {
    nav.classList.toggle('menu');
    icone.classList.toggle('icofont-navigation-menu');
    icone.classList.toggle('icofont-close-line');
});

const topo = document.getElementById('abresub');
const navHeader = document.getElementById('navHeader');
const botton = document.getElementById('abresubx');
const navFoot = document.getElementById('navFoot');
topo.addEventListener('click', (e)=>{
    e.preventDefault();
    navHeader.classList.toggle('toggle');
});
    