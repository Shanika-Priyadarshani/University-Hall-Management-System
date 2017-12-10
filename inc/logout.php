<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
unset($_SESSION['id']);
//unset($_SESSION[page]);
//session_unset();
session_destroy();
header("Location: ../index.html");
exit;

?>