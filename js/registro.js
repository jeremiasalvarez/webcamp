//Campos datos de usuario

const c = $('.menu');
c.addClass('hola hola2');
console.log(c);

let nombre = document.getElementById('nombre');

let apellido = document.getElementById('apellido');

let email = document.getElementById('email');

//Campos pases

let paseDia = document.getElementById('pase_dia');

let pase2Dias = document.getElementById('pase_2_dias');

let paseCompleto = document.getElementById('pase_completo');

let regalo = document.getElementById('regalo');


let calcular = document.getElementById('calcular');
let errorDiv = document.getElementById('error');
let registro = document.getElementById('btnRegistro');
let listaProductosElement = document.getElementById('lista-productos');
let totalElement = document.getElementById('suma-total');

//extras

let camiseta = document.getElementById('camisa_evento');
let etiqueta = document.getElementById('etiquetas');

calcular.addEventListener('click', calcularMonto);


//campos obligatorios 

nombre.addEventListener('blur', controlarCampos);
apellido.addEventListener('blur', controlarCampos);
email.addEventListener('blur', controlarCampos);
email.addEventListener('blur', controlarEmail);
let errorEnCampo = false;

function controlarCampos() {

    errorDiv.style.display = 'none';
    errorDiv.innerHTML = '';

    let errores = [];

    if (isEmpty(nombre.value)) {
        let error = document.createElement('p');
        error.style.color = 'rgb(190, 20, 20)';
        error.innerText = "Se debe rellenar el campo 'Nombre'"
        errores.push(error);
    }
    if (isEmpty(apellido.value)) {
        let error = document.createElement('p');
        error.style.color = 'rgb(190, 20, 20)';
        error.innerText = "Se debe rellenar el campo 'Apellido'"
        errores.push(error);
    }
    if (isEmpty(email.value)) {
        let error = document.createElement('p');
        error.style.color = 'rgb(190, 20, 20)';
        error.innerText = "Se debe rellenar el campo 'Email'"
        errores.push(error);
    }

    errorEnCampo = false;

    if (errores.length > 0) {
        errorDiv.style.display = 'block';
        errorEnCampo = true;
        errores.forEach(err => {
            errorDiv.appendChild(err);
        });
    }

    return errorEnCampo;
}

function controlarEmail() {
    if (this.value.indexOf('@') == -1) {
        console.log("No tiene arroba");
        let error = document.createElement('p');
        error.style.color = 'rgb(190, 20, 20)';
        error.innerText = "El campo 'Email' no es valido";
        errorDiv.appendChild(error);
    }
}


function isEmpty(str) {
    return (!str || 0 === str.length);
}


// registro.addEventListener('click', () => {
//     if (controlarCampos) {
//         let datosUsuario = document.getElementById('datos_usuario');
//         alert("Hay errores en los campos!");
//         datosUsuario.focus();
//         return;
//     }
// })


//control de dias
paseDia.addEventListener("blur", mostrarDias);
pase2Dias.addEventListener("blur", mostrarDias);
paseCompleto.addEventListener("blur", mostrarDias);

let evento = document.getElementById('eventos');
let viernes = document.getElementById('viernes');
let sabado = document.getElementById('sabado');
let domingo = document.getElementById('domingo');

function mostrarDias() {

    if (paseDia.value == 0 && pase2Dias.value == 0 && paseCompleto.value == 0) {
        evento.style.display = 'none';
        return;
    }


    evento.style.display = 'block';

    let boletoDia = parseInt(paseDia.value, 10) || 0,
        boleto2Dias = parseInt(pase2Dias.value, 10) || 0,
        boletoCompleto = parseInt(paseCompleto.value, 10) || 0;


    if (boletoCompleto == 0) {
        domingo.style.display = 'none';
    }
    if (boleto2Dias == 0) {
        sabado.style.display = 'none';
    }
    if (boletoDia == 0) {
        viernes.style.display = 'none';
    }



    let pasesElegidos = [];

    if (boletoCompleto > 0) {
        pasesElegidos.push('viernes', 'sabado', 'domingo');
    } else if (boleto2Dias > 0) {
        pasesElegidos.push('viernes', 'sabado');
    } else if (boletoDia > 0) {
        pasesElegidos.push('viernes');
    }


    pasesElegidos.forEach(pase => {
        const dia = document.getElementById(`${pase}`);
        dia.style.display = 'block';

    });


}


function calcularMonto(event) {
    event.preventDefault();

    if (regalo.value == null || regalo.value === "") {
        alert("Debe seleccionar un regalo antes!");
        regalo.focus();

        return;
    }

    let boletoDia = parseInt(paseDia.value, 10) || 0,
        boleto2Dias = parseInt(pase2Dias.value, 10) || 0,
        boletoCompleto = parseInt(paseCompleto.value, 10) || 0,
        cantCamisas = parseInt(camiseta.value, 10) || 0,
        cantEtiquetas = parseInt(etiqueta.value, 10) || 0;

    let total = (boletoDia * 30) + (boleto2Dias * 45) + (boletoCompleto * 50) +
        ((cantCamisas * 10) * 0.93) + (cantEtiquetas * 10);

    let listaProducto = [];


    if (boletoDia >= 1)
        listaProducto.push(`${boletoDia} pases para 1 dia`);

    if (boleto2Dias >= 1)
        listaProducto.push(`${boleto2Dias} pases para 2 dias`);

    if (boletoCompleto >= 1)
        listaProducto.push(`${boletoCompleto} pases completos`);

    if (cantCamisas >= 1)
        listaProducto.push(`${cantCamisas} camisetas`);

    if (cantEtiquetas >= 1)
        listaProducto.push(`${cantEtiquetas} etiquetas`);


    listaProductosElement.style.display = 'block';
    listaProductosElement.innerHTML = '';

    listaProducto.forEach(producto => {
        let nuevoElemento = createProductParagraph(producto);
        listaProductosElement.appendChild(nuevoElemento);
    })


    totalElement.innerHTML = '';
    total = total.toFixed(2);
    let precio = document.createElement('h5');
    precio.innerText = `$${total}`;

    totalElement.appendChild(precio);
}


function createProductParagraph(element) {
    let p = document.createElement('h5');
    p.innerText = element;
    return p;
}