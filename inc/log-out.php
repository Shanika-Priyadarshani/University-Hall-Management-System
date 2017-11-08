<?php
/**
 * Created by PhpStorm.
 * User: Supimi Gamage
 * Date: 11/8/2017
 * Time: 10:47 PM
 */


error_reporting(E_ALL ^ E_NOTICE);
session_start();
unset($_SESSION[page]);
session_destroy();
header("Location: ../index.html");
?>