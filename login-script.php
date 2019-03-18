<?php
  // var_dump($_POST);
  include("./connect_db.php");
  include("./functions.php");

  $email = sanitize($_POST["email"]);
  $password = sanitize($_POST["password"]);

  if (!empty($email) && !empty($password)) {

    $sql = "SELECT * FROM `register` WHERE `email` = '$email'";

    $result = mysqli_query($conn, $sql);

    if ( mysqli_num_rows($result) ==  1 ) {
      // Email bestaat
      $record = mysqli_fetch_assoc($result);

      $blowfish_password =  $record["password"]; 

      if ( password_verify($password, $blowfish_password)) {

        $userrole = $record["userrole"];

        switch ($userrole) {
          case 'customer':
            // Link door naar de customerhomepage
            echo '<div class="alert alert-success" role="alert">U bent succesvol ingelogd als in de gebruikersrol van customer, U wordt doorgestuurd naar de customerhomepage.</div>';
            header("Refresh: 4; url=./index.php?content=customerhome");
          break;
          case 'administrator':


          break;
          case 'root':


          break;
          case 'moderator':


          break;
          default:

          break;
        }
        

      } else {
        // Password bestaat niet
        echo '<div class="alert alert-danger" role="alert">Het opgegeven wachtwoord is niet correct, probeer het nogmaals.</div>';
        header("Refresh: 4; url=./index.php?content=login-form");
      }

    } else {
      // Email bestaat niet
      echo '<div class="alert alert-danger" role="alert">Het opgegeven e-mailadres is niet bekent.</div>';
      header("Refresh: 4; url=./index.php?content=login-form");
    }
  } else {
    echo '<div class="alert alert-danger" role="alert">U heeft geen e-mailadres of wachtwoord ingevoerd, probeer het opnieuw...</div>';
    header("Refresh: 4; url=./index.php?content=login-form");
  }
?>