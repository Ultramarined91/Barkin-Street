<?php
  session_start();

  session_unset();
  session_destroy();

  // redirect back to index page after logging out
  echo "<script> location.href='index.php'; </script>";
  exit;
?>
