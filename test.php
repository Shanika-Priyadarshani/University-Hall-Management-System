<?php

include 'connection.php';
$con = connect();
$query = "select * from user_details";
mysqli_set_charset($con, 'utf8');
$data =mysqli_query($con,$query);
$array=mysqli_fetch_array($data);

while($row = $data->fetch_assoc()) {

    echo $row["first_name"] . "<br>";


}


session_start();
$_SESSION['id']='123';
?>

<a href="test2.php">Click me</a>
