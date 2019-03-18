<?php
  session_start();
  if ( !isset($_SESSION["id"])) {
    echo '<div class="alert alert-danger" role="alert">U bent niet ingelogd, U wordt doorgestuurd naar de standaard homepage.</div>';
    header("Refresh: 4; url=./index.php?content=homepage");
    exit();
  }
?>