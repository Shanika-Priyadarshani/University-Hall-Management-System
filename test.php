<?php

include 'connection.php';
$con = connect();
mysqli_set_charset($con, 'utf8');
$result = mysqli_query($con, 'SELECT first_name FROM user_details');

while ($row = mysqli_fetch_array($result)) {
    echo $row;
}
?>