<?php
  
  $db_conn = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PW'), getenv('DB_NAME'));

  if ($db_conn -> connect_error) {
      echo $error -> $db_conn->connect_error;
  }


  
?>