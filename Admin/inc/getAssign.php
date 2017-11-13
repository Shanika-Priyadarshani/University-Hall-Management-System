<?php

function getCurrentAssignings($con){
    $timezone = date_default_timezone_get();
    date_default_timezone_set($timezone);
    $current_date = date('Y-m-d', time());
    $current_date1 = '2017-11-09';
    $query = "select user_id,first_name,last_name,hall_name,start_time,end_time from assign natural join user_details,hall where assign.hall_id = hall.hall_id and date_of_assignment='$current_date1'";
    $result = mysqli_query($con,$query);
    $output='';
    $output = "<form action='' method=\"get\" id=\"form1\" name = \"form1\"> <table name = \"assigns\">
                                              <thead>
                                          <caption></caption>
                                            </thead><tbody><tr>
                                                  <th >User Id</th>
                                                  <th>First Name</th>
                                                  <th>Last Name</th>
                                                  <th >Hall Name</th>
                                                  <th >Start Time</th>
                                                  <th >End Time</th>
                                                   </tr>";
    if($result===FALSE){
        echo("eroooooo");
    }else{
        while($row = mysqli_fetch_array($result)) {
            $output .=  '<tr><td >'. $row["user_id"].'</td> <td>' . $row["first_name"].'</td> <td>'. $row["last_name"].'</td> <td>'. $row["hall_name"].'</td> <td>' .$row["start_time"] .
                '</td> <td>' .$row["end_time"] .'</td>';

        }
    }
    echo ($output.= "</tbody></table><br></form>");
}


?>