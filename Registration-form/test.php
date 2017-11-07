<?php
/**
 * Created by PhpStorm.
 * User: Supimi Gamage
 * Date: 11/7/2017
 * Time: 9:17 PM
 */

function register(){
    include '../connection.php';
    $con = connect();

}
echo "hello";
echo'<br>';

echo print_r($_POST);

foreach ($_POST as $key=>$value){
echo $key;
echo $value;

}

?>