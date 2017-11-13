<?php
//include '../connection.php';

$con = connect();
//$ui='St170006';
mysqli_set_charset($con, 'utf8');
$view="create view accomadateH as (select * from accommodate_history where user_id ='$ui') union (select * from accommodate where user_id ='$ui') ";
$result = mysqli_query($con,$view);
$query = "select * from accomadateH left join hall on accomadateH.hall_id =hall.hall_id order by date_of_assignment  ";
$result = mysqli_query($con,$query);
$output='';
$output = "<form action='' method=\"get\" id=\"form1\" name = \"form1\"> <table name = \"History\">
                                              <thead>
                                          <caption></caption>
                                            </thead><tbody><tr>
                                                  <th>hall name</th>
                                                  <th>room no</th>
                                                  <th >year</th>                                         
                                                   </tr>";
                            if($result===FALSE){
                                echo("error");
                            }else{
                                while($row = mysqli_fetch_array($result)) {
                                    $output .=  '<tr><td >'. $row["hall_name"].'</td> <td>' . $row["room_no"].'</td> <td>'. $row["date_of_assignment"].'</td>';
                                }
                            }
                            echo ($output.= "</tbody></table><br></form>");
$view="drop view accomadateH ";
$result = mysqli_query($con,$view);

                            ?>