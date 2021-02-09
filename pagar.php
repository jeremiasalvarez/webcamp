<?php 
ini_set("display_errors", "1");
error_reporting(E_ALL);


 if(!isset($_POST['submit'])) {
   exit("hubo un error");
 }
 
header("Location: index.php?pago=1");
 
require 'includes/paypal.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
       
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$regalo = $_POST['regalo'];
$total = $_POST['total_pedido'];
$fecha = date('Y-m-d H:i:s');
//pedidos
$camisas = $_POST['pedido_extra']['camisa']['cantidad'];
$precio_camisas = $_POST['pedido_extra']['camisa']['precio'];

$etiquetas = $_POST['pedido_extra']['etiqueta']['cantidad'];
$precio_etiquetas = $_POST['pedido_extra']['etiqueta']['precio'];

$boletos = $_POST['boletos'];

$num_boletos = $boletos;

$pedido_extra = $_POST['pedido_extra'];

include_once 'includes/functions/funciones.php';
$pedido = productos_json($boletos, $etiquetas, $camisas);
//eventos
$eventos = $_POST['registro'];
$eventos_json = eventos_json($eventos);
;
try {
    require_once('includes/functions/db_connection.php');
    //prepared statements que sirven para evitar ataques
    $stmt = $db_conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $eventos_json, $regalo, $total);
    $stmt->execute();
    $id_registro = $stmt->insert_id;
    $stmt->close();
    $db_conn->close();
} catch (\Exception $error) {
    echo $error -> getMessage();
}
  


$compra = new Payer();

$compra->setPaymentMethod('paypal');

$i = 0;
$array_articulos = array();

foreach($num_boletos as $key => $value) {

  if ((int)$value['cantidad'] > 0) {

    ${"articulo$i"} = new Item();
    $array_articulos[] = ${"articulo$i"};
    ${"articulo$i"}->setName('Pase: '. $key);
    ${"articulo$i"}->setCurrency('USD');
    ${"articulo$i"}->setQuantity((int) $value['cantidad']);
    ${"articulo$i"}->setPrice((int) $value['precio']);

    $i++;
  }

}

foreach($pedido_extra as $key => $value) {

  if ((int)$value['cantidad'] > 0) {

    if ($key === 'camisa') {
      $precio = (float)$value['precio'] * 0.93;
    } else {
      $precio = (float)$value['precio'];
    }
    ${"articulo$i"} = new Item();
    $array_articulos[] = ${"articulo$i"};
    ${"articulo$i"}->setName('Extra: '. $key);
    ${"articulo$i"}->setCurrency('USD');
    ${"articulo$i"}->setQuantity((int) $value['cantidad']);
    ${"articulo$i"}->setPrice($precio);

    $i++;
  }

}

$lista_articulos = new ItemList();

$lista_articulos->setItems($array_articulos);

$cantidad = new Amount();

$cantidad->setCurrency('USD');
$cantidad->setTotal($total);

$transaccion = new Transaction();

$transaccion->setAmount($cantidad);
$transaccion->setItemList($lista_articulos);
$transaccion->setDescription('Pago Webcamp ');
$transaccion->setInvoiceNumber($id_registro);


$redirect = new RedirectUrls();

$redirect->setReturnUrl(URL_SITIO . "/pago_finalizado.php?id_pago=$id_registro");
$redirect->setCancelUrl(URL_SITIO . "/pago_finalizado.php?id_pago=$id_registro");

$pago = new Payment();

$pago->setIntent('sale');
$pago->setPayer($compra);
$pago->setRedirectUrls($redirect);
$pago->setTransactions(array($transaccion));


try {

  $pago->create($apiContext);

} catch (PayPal\Exception\PayPalConnectionException $e) {
  echo '<pre>';
   print_r(json_decode($e)); 
  echo '</pre>';
  exit;
}

$aprobado = $pago->getApprovalLink();

header("Location: $aprobado");

?>
