<?php
  var_dump($_POST);
  include("./connect_db.php");
  include("./functions.php");

  $password =  sanitize($_POST["password1"]);
  $id =  sanitize($_POST["id"]);

  $sql = "UPDATE `register` 
          SET `password` = $password
          WHERE `id` = $id";
?>