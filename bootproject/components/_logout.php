<?php
// session_start();
if( session_status() == 1 )
   session_start();
//echo $_SESSION['username'];
unset($_SESSION["username"]);
unset($_SESSION["role"]);
session_destroy();
session_write_close();
header("Location:/bootproject/index.php");