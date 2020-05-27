//Lettering

const titulo = $('.nombre-sitio');

titulo.lettering();


//scrolling

const documentWindow = $(window);
const windowHeight = documentWindow.height();

documentWindow.scroll(() => {
    const navHeight = $('.barra').innerHeight();
    let scroll = documentWindow.scrollTop();

    if (scroll > windowHeight) {
        $('.barra').addClass('fixed');
        $('body').css('margin-top', `${navHeight}px`);
    } else {
        $('.barra').removeClass('fixed');
        $('body').css('margin-top', '0px');
    }
});

//menu hamburguesa

const botonMenu = $('.menu-movil');

botonMenu.click(() => {
    $('.navegacion-principal').slideToggle();
})

//Talleres, Seminarios y Conferencias

const elementosNav = $('.menu-programa a');

$('.programa-evento .ocultar').hide();
$('.programa-evento .info-curso:first').show();
$('.menu-programa a:first').addClass('activo');

elementosNav.click(showElements);

function showElements() {

    if ($(this).hasClass('activo')) return false;

    $('.menu-programa a').removeClass('activo');
    $(this).addClass('activo');

    const targetId = $(this).attr('href');
    $('.programa-evento .ocultar').hide();

    $(targetId).fadeIn(800);
    //console.log(id);

    return false;
}

//Numeros

const numDias = $('#num_dias');
const numTalleres = $('#num_talleres');
const numInvitados = $('#num_invitados');
const numConferencias = $('#num_conferencias');

numTalleres.animateNumber({ number: 15 }, 2000);
numDias.animateNumber({ number: 3 }, 2000);
numInvitados.animateNumber({ number: 6 }, 2000);
numConferencias.animateNumber({ number: 10 }, 2000);

//Cuenta regresiva
const diasRestantes = $('#faltan_dias');
const horasRestantes = $('#faltan_horas');
const minutosRestantes = $('#faltan_minutos');
const segundosRestantes = $('#faltan_segundos');
const cuentaRegresiva = $('.cuenta-regresiva');
const date = '2020/12/20 10:00:00';

cuentaRegresiva.countdown(date, (event) => {
    diasRestantes.html(event.strftime('%D'));
    minutosRestantes.html(event.strftime('%M'));
    segundosRestantes.html(event.strftime('%S'));
    horasRestantes.html(event.strftime('%H'));
});


//Mapa


const map = L.map('mapa').setView([20.6736, -103.344], 20);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([20.6736, -103.344]).addTo(map)
    .bindPopup('Ubicacion de WebCamp!')
    .openPopup();