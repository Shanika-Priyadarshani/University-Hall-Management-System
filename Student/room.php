<?php
/**
 * Created by PhpStorm.
 * User: shirmi
 * Date: 11/7/2017
 * Time: 11:20 PM
 */

$con = connect();
//$ui='St170006';
$query = "select * from accommodate,room,hall where accommodate.hall_id= room.hall_id  and hall.hall_id =room.hall_id and accommodate.room_no=room.room_no and accommodate.user_id='$ui' ";

mysqli_set_charset($con, 'utf8');
$data =mysqli_query($con,$query);
$array=mysqli_fetch_array($data);
$room_no= $array["room_no"]. "<br>";
$cost= $array["cost"]. "<br>";
$room_type= $array["room_type"]. "<br>";
$hname= $array["hall_name"]. "<br>";
$roommate="-";


//$year_b= "$array[year_balance]". "<br>";
?>