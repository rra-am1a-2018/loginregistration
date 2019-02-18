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
    $sql = "INSERT INTO `register` (`id`,
                                  `email`,
                                  `password`)
                          VALUES (NULL,
                                  '$email',
                                  'geheim')";
  
    $result = mysqli_query($conn, $sql);

    if ($result) {
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