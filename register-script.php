<?php
  include("./connect_db.php");
  include("./functions.php");

  $email = sanitize($_POST["email"]);

  if (!empty($email)) {

  // Maak een select-query om te controleren of het e-mailadres al bestaat.
  $sql = "SELECT * FROM `register` WHERE `email` = '$email'";

  // Stuur de query af op de database
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result)) {
    // Email is al in gebruik
    echo '<div class="alert alert-info" role="alert">Het door u ingevoerde e-mailadres is al in gebruik, kies een ander e-mailadres</div>';
    header("Refresh: 4; url=./index.php?content=register");
  } else {
    $password = 'geheim';
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO `register` (`id`,
                                  `email`,
                                  `password`,
                                  `userrole`)
                          VALUES (NULL,
                                  '$email',
                                  '$password',
                                  'customer')";
  
    $result = mysqli_query($conn, $sql);

    // Hiermee vraag je de door autonummering gemaakt id op
    $id = mysqli_insert_id($conn);

    if ($result) {
      // Verstuur de email met activatielink naar de persoon die zich registreert.
      $to = $email;
      $subject = "Activatielink voor account loginregistration";
      $message = "<!DOCTYPE html>
                  <html>
                    <head>
                    <title>Page Title</title>
                    <style>
                      h1 {
                        background-color: rgb(200, 120, 23);
                        padding: 1em;
                        width: 50%;
                      }
                    </style>
                    </head>
                  <body>                  
                    <h1>Beste gebruiker,</h1>
                    <p>U heeft zich onlangs geregistreerd voor de site www.loginregistration.am1a.org. Om het actvatieproces te voltooien moet u op de onderstaande activatielink klikken.</p>
                    <p>
                      <a href='http://www.loginregistration.am1a.org/index.php?content=choosepassword&id=" . $id . "&pw=" . $password_hash . "'>
                      klik hier voor activatie
                      </a>
                    </p>
                    <p>Bedankt voor het registreren</p>
                    <p>Met vriendelijke groet,</p>
                    <p>A. de Ruijter</p>
                    <p>CEO loginregistration.am1a.org</p>                  
                  </body>
                  </html>";

      $headers = "MIME-Version: 1.0". "\r\n";
      $headers .= "Content-type: text/html;charset=UTF-8"."\r\n";
      $headers .= "From: adruijter@loginregistration.am1a.org"."\r\n";
      $headers .= "Cc: rra@mboutrecht.nl; dswe@mboutrecht.nl"."\r\n";
      $headers .= "Bcc: vld@mboutrecht.nl; gft@mboutrecht.nl";
      
      mail($to, $subject, $message, $headers);



      echo '<div class="alert alert-success" role="alert">Uw emailadres is verwerkt</div>';
      header("Refresh: 4; url=./index.php?content=register");
    } else {
      echo '<div class="alert alert-danger" role="alert">Uw gegevens zijn niet verwerkt probeer het nog een keer op een ander moment, dat is alles wat we weten</div>';
      header("Refresh: 4; url=./index.php?content=register");
    }
  }

} else {
  echo '<div class="alert alert-danger" role="alert">U heeft geen e-mailadres ingevoerd, vul een e-mailadres in.</div>';
  header("Refresh: 4; url=./index.php?content=register");
}
?>