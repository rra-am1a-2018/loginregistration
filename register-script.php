<?php
  include("./connect_db.php");

  $email = $_POST["email"];

  $sql = "INSERT INTO `register` (`id`,
                                  `email`,
                                  `password`)
                          VALUES (NULL,
                                  '$email',
                                  'geheim')";
  
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo '<div class="alert alert-success" role="alert">
    Uw emailadres is verwerkt
  </div>';
    header("refresh:2; url=./index.php?content=register");
  } else {
    echo 'Er is iets verschrikkelijks niet in orde met deze code. Zoek een andere programmeur!';
  }

?>