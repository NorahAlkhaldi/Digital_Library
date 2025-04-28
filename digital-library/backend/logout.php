<?php
//kill session
session_start();
$_SESSION["login"] = '';
$_SESSION["user"] = '';
header("Location: ../login.php");
?>