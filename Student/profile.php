<?php
/**
 * Created by PhpStorm.
 * User: shirmi
 * Date: 11/7/2017
 * Time: 11:20 PM
 */
include '../connection.php';
$con = connect();
//$ui='St170006';
$query = "select * from student left join user_details on student.user_id = user_details.user_id where student.user_id='$ui'";
mysqli_set_charset($con, 'utf8');
$data =mysqli_query($con,$query);
$array=mysqli_fetch_array($data);
$uid= "$array[user_id]". "<br>";
$deptname= "$array[dept_name]". "<br>";
$fct= "$array[faculty]". "<br>";
$acdmic= "$array[academic_year]". "<br>";
$year_b= "$array[year_balance]". "<br>";
$fname= "$array[first_name]";
$lname= "$array[last_name]". "<br>";
$street= "$array[street]". "<br>";
$town= "$array[town]". "<br>";
$city= "$array[city]". "<br>";
$currentY= "$array[current_year]". "<br>";
?>