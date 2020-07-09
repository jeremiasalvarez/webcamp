<?php 

//url aquispe
define('URL_SITIO', 'http://localhost:81/webcamp');

require 'paypal/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AfNQLdPxd8_tvjrwthHNA3yZhPLQAHen3DOO3elp0plEeR1v0o4C6lD7CrZ0griqVgmXCagkQHCJI1Uo',     // ClientID
        'EOzWdTTQ0wd_6fkGiQ63O3GLLnvYbNWRXMpbA1WPoNNg7Rrn7KtbchvepIKbpcY8IUSa2TuB0fxj4agl'      // ClientSecret
   )
);

?>

