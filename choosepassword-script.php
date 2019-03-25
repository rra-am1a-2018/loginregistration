<?php
  // var_dump($_POST);
  include("./connect_db.php");
  include("./functions.php");

  $password =  sanitize($_POST["password"]);
  $checkpassword = sanitize($_POST["checkpassword"]);
  $id =  sanitize($_POST["id"]);
  $pw = sanitize($_POST["pw"]);

  if ( !empty($password) && !empty($checkpassword)) {
    if ( !strcmp($password, $checkpassword)) {

      // Check met een select of het id bestaat in de database en of het gehashte password matched met het id
      $sql = "SELECT * FROM `register` WHERE `id` = $id";

      $result = mysqli_query($conn, $sql);

      if ( mysqli_num_rows($result) == 1 ) {
        $record = mysqli_fetch_assoc($result);

        if (password_verify($record["password"], $pw)) {

          $blowfish_password = password_hash($password, PASSWORD_BCRYPT);
  
          $sql = "UPDATE `register` 
                  SET `password` = '$blowfish_password'
                  WHERE `id` = $id";
  
          $result = mysqli_query($conn, $sql);

          if ( $result ) {
            echo '<div class="alert alert-success" role="alert">U password is ingesteld</div>';
            header("Refresh: 4; url=./index.php?content=homepage");
          } else {
            echo '<div class="alert alert-danger" role="alert">Uw wachtwoord is niet ingesteld. Probeer het nogmaals...</div>';
            header("Refresh: 4; url=./index.php?content=choosepassword&id=$id");
          }
  
        } else {
          // het id en password matchen niet
          echo '<div class="alert alert-danger" role="alert">Uw wachtwoord matched niet met het id</div>';
          header("Refresh: 4; url=./index.php?content=homepage");
        }
      } else {
        // Het id is niet bekend
        echo '<div class="alert alert-danger" role="alert">Het opgegeven id is niet bekend</div>';
        header("Refresh: 4; url=./index.php?content=homepage");
      }     
    } else {
      echo '<div class="alert alert-danger" role="alert">Uw ingevoerde wachtwoorden zijn niet gelijk, probeer het nogmaals...</div>';
      header("Refresh: 4; url=./index.php?content=choosepassword&id=$id&pw=$pw");
    } 

  } else {
    echo '<div class="alert alert-danger" role="alert">Uw een van de wachtwoorden niet ingevoerd, probeer het nogmaals...</div>';
    header("Refresh: 4; url=./index.php?content=choosepassword&id=$id&pw=$pw");
  }  
?>