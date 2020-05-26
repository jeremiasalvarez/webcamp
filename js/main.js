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

numTalleres.animateNumber()



//Mapa


const map = L.map('mapa').setView([20.6736, -103.344], 20);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([20.6736, -103.344]).addTo(map)
    .bindPopup('Ubicacion de WebCamp!')
    .openPopup();