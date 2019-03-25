<?php
  // Maak de laadjes leeg en vernietig het laadje voorbeeld session_unset("id").
  // Dit maakt het id laadje leeg en stuk. Je kunt ook alle laadjes stuk maken en leeg met
  // session_unset();
  session_unset();

  // session_destroy maakt de kast stuk met alle laden.
  session_destroy();

  echo '<div class="alert alert-success" role="alert">U bent succesvol uitgelogd. U wordt doorgestuurd naar de standaardhomepage.</div>';
  header("Refresh: 3; url=./index.php?content=homepage");

?>