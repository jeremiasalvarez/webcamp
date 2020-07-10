<?php include_once 'includes/templates/header.php';

      use PayPal\Api\PaymentExecution;
      use PayPal\Api\Payment;
      use PayPal\Rest\ApiContext;
      require 'includes/paypal.php';
?>  
      <div class="formulario">
            <h2>Pagos con Paypal</h2>
            <?php

                $id = (int)$_GET['id_pago'];
                $pid = $_GET['paymentId'];
                $pago = Payment::get($pid, $apiContext);
                $exec = new PaymentExecution();
                $exec->setPayerId($_GET['PayerID']);

                $resultado = $pago->execute($exec, $apiContext);

                $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;

                $correcto = $respuesta === 'completed';

                if($correcto) {
                      echo "<h3 style='text-align: center;'>El pago se realizo correctamente! ";
                      echo "El id es {$id}</h2>";

                      include_once 'includes/functions/db_connection.php';

                      $stmt = $db_conn->prepare("UPDATE registrados SET pagado = ? WHERE id_registrado = ?");
                      $pagado = 1;
                      $stmt->bind_param("ii",$pagado,$id );
                      $stmt->execute();
                      $stmt->close();
                      $db_conn->close();

                } else {
                      echo "<h3 style='text-align: center;'>Ocurrio un error al realizar el pago </h3>";
                }
            
             ?>
        </div>
<?php include_once 'includes/templates/footer.php' ?>