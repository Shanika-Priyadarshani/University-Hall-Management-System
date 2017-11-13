<?php
function showAdminDetails($con,$user_id){

    $query1 = "select first_name,last_name,designation from admin natural join  user_details where user_id = '$user_id'";
    $result1 = mysqli_query($con,$query1);
    $output='';
    while ($row1=mysqli_fetch_array($result1)){
        $output .= '<h4>'. $row1["first_name"].' '.$row1["last_name"].'</h4><h5>'.$row1["designation"].'</h5>';
    }
    echo $output;
}

