<?php
  @$db = new mysqli('localhost', 'f36im', 'f36im', 'f36im');
  if ($db->connect_error) {
    console.log("Error connecting to database");
    exit;
  }
?>
