<?php
// Hier worden de belangrijke constanten gedefinieert voor het maken van een verbinding
  define("HOSTNAME", "localhost");
  define("USERNAME", "root");
  define("PASSWORD", "");
  define("DBNAME", "am1a-loginregistration-2018");

  // Maak verbinding met de database.
  $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
?>