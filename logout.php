<?php
  session_start();

  foreach ($_SESSION as $key=>$value)
  {
    if (isset($_SESSION[$key]))
        unset($_SESSION[$key]);
  }
  header('Location: index.php');
?>
