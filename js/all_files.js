let navLinks = $('.navegacion-principal a');
let bodyClass = $('body').attr('class');


console.log(`Current page: ${bodyClass}`);

navLinks.each((i, link) => {
    let j = $(link).attr('href');

    if (j === `${bodyClass}.php`) {
        $(link).addClass('seleccionado');
    }
});