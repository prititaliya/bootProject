<?php
// session_start();
if (session_status() == 1 && !headers_sent())
      session_start();
//echo $_SESSION['username'];
unset($_SESSION["username"]);
unset($_SESSION["role"]);
session_destroy();
session_write_close();

if(!headers_sent())
header("Location:/bootproject/index.php");