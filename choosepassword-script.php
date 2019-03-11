<?php
  var_dump($_POST);
  include("./connect_db.php");
  include("./functions.php");

  $password =  sanitize($_POST["password"]);
  $checkpassword = sanitize($_POST["checkpassword"]);
  $id =  sanitize($_POST["id"]);


  

  if ( !strcmp($password, $checkpassword)) {
    $blowfish_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "UPDATE `register` 
            SET `password` = '$blowfish_password'
            WHERE `id` = $id";
    
    // echo $sql; exit();
    // $2y$10$sXSrumjJMU0HO/3ckIv1FO0tFU0wb3aoG6qDMRN5opGrpupTwx1nG   =>  geheim
    // $2y$10$PosHguK8ZLOeLnmuOfGJiO3YdPM46eDmGUyU4i8OpPr6VxjXDXMrm   =>  geheim

    $result = mysqli_query($conn, $sql);

    if ( $result ) {
      echo '<div class="alert alert-success" role="alert">U password is ingesteld</div>';
      header("Refresh: 4; url=./index.php?content=homepage");
    } else {
      echo '<div class="alert alert-danger" role="alert">Uw wachtwoord is niet ingesteld. Probeer het nogmaals...</div>';
      header("Refresh: 4; url=./index.php?content=choosepassword&id=$id");
    }
  } else {
    echo '<div class="alert alert-danger" role="alert">Uw ingevoerde wachtwoorden zijn niet gelijk, probeer het nogmaals...</div>';
    header("Refresh: 4; url=./index.php?content=choosepassword&id=$id");
  }

  


  
?>