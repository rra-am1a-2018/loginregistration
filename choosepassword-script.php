<?php
  var_dump($_POST);
  include("./connect_db.php");
  include("./functions.php");

  $password =  sanitize($_POST["password1"]);
  $id =  sanitize($_POST["id"]);

  $sql = "UPDATE `register` 
          SET `password` = '$password'
          WHERE `id` = $id";

  $result = mysqli_query($conn, $sql);

  if ( $result ) {
    echo '<div class="alert alert-success" role="alert">U password is ingesteld</div>';
    header("Refresh: 4; url=./index.php?content=homepage");
  } else {
    echo '<div class="alert alert-danger" role="alert">Uw wachtwoord is niet ingesteld. Probeer het nogmaals...</div>';
      header("Refresh: 4; url=./index.php?content=choosepassword&id=$id");
  }



  
?>