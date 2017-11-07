<?php
function connect()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "123";
    $dbname = "hall_management_db";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


    mysqli_set_charset($con, 'utf8');
     $mnn = 'sssssss';


    $dg = mysqli_query($con,'select * from user_details');
    while($row = mysqli_fetch_array($dg)){
        echo $row;
        echo $mnn;
    }

}