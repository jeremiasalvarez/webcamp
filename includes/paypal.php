<?php 

//url aquispe
define('URL_SITIO', 'http://localhost/webcamp');

require 'paypal/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AdnZFct6iOHkJ8LuN-ZVLFeKZ7UrfT66F2JWO9de7qoQd2UCPUmHeaT-3ypCZ3-DcZIkaYl95EzyWE-n',     // ClientID
        'EEAWy1A2h3XWzmsrsOvi8F2aYHZpzvUdUOONvRgCaRWfBzTJFchPC0R2VGjbXoVsv2PfFpHVMTdMLoXb'      // ClientSecret
   )
);

?>

