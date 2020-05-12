//hola desde github
(() => {
    "use strict"
    document.addEventListener('DOMContentLoaded', () => {

            //Campos datos de usuario

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


        }) //se cargo el DOM
})();