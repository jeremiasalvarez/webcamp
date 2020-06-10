
<?php if(isset($_POST['submit'])):        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $regalo = $_POST['regalo'];
        $total = $_POST['total_pedido'];
        $fecha = date('Y-m-d H:i:s');
        //pedidos
        $camisas = $_POST['pedido_camisas'];
        $etiquetas = $_POST['pedido_etiquetas'];
        $boletos = $_POST['boletos'];
        include_once 'includes/functions/funciones.php';
        $pedido = productos_json($boletos, $etiquetas, $camisas);
        //eventos
        $eventos = $_POST['registro'];
        $eventos_json = eventos_json($eventos);
        try {
            require_once('includes/functions/db_connection.php');
            //prepared statements que sirven para evitar ataques
            $stmt = $db_conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $eventos_json, $regalo, $total);
            $stmt->execute();
            $stmt->close();
            $db_conn->close();
            header('Location: validar_registro.php?success=1'); //para evitar que se pueda recargar la pagina y insertar cosas extra a la base de datos
        } catch (\Exception $error) {
            echo $error -> getMessage();
        }
    ?>
<?php endif; ?>



<?php
  include_once 'includes/templates/header.php';
?>
    <section class="seccion contenedor">
        <h2>Resumen del Registro</h2>

        <?php if(isset($_GET['success'])):

                if ($_GET['success'] == 1) {
                    echo "<h3> Registro Exitoso!</h3>";
                }



             endif;    
        ?>


    </section>    
<?php
  include_once 'includes/templates/footer.php';
?>    