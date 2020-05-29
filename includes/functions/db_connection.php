<?php
  
  $db_conn = new mysqli('localhost','root','root','gdlwebcamp');

  if ($db_conn -> connect_error) {
      echo $error -> $db_conn->connect_error;
  }

?>