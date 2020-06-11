<?php
  
  $db_conn = new mysqli('sql10.freemysqlhosting.net','sql10347626','hennQ6zsQ7','sql10347626',3306);

  if ($db_conn -> connect_error) {
      echo $error -> $db_conn->connect_error;
  }

?>