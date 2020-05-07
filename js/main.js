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
            let resultado = document.getElementById('lista-productos');


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

                let boletoDia = paseDia.value,
                    boleto2Dias = pase2Dias.value,
                    boletoCompleto = paseCompleto.value,
                    cantCamisas = camiseta.value,
                    cantEtiquetas = etiqueta.value;

                let total = (boletoDia * 30) + (boleto2Dias * 45) + (boletoCompleto * 50) +
                    ((cantCamisas * 10) * 0.93) + (cantEtiquetas * 10);

                console.log(total);


            }


        }) //se cargo el DOM
})();
