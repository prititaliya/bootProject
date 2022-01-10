<?php
session_start();
//echo $_SESSION['username'];
unset($_SESSION["username"]);
unset($_SESSION["role"]);
header("Location:/bootproject/index.php");
?>