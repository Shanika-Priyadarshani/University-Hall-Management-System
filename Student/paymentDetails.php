<?php
/**
 * Created by PhpStorm.
 * User: shirmi
 * Date: 11/8/2017
 * Time: 7:12 PM
 */
$con = connect();
mysqli_set_charset($con, 'utf8');
//$ui='St170006';
$query = "select * from payment where user_id ='$ui'  ";
$result = mysqli_query($con,$query);
$output='';
$output = "<form action='' method=\"get\" id=\"form1\" name = \"form1\"> <table name = \"History\">
                                              <thead>
                                          <caption></caption>
                                            </thead><tbody><tr>
                                                  <th>paid date</th>
                                                  <th >paid amount</th>                                         
                                                   </tr>";
if($result===FALSE){
    echo("error");
}else{
    while($row = mysqli_fetch_array($result)) {
        $output .=  '<tr><td >'. $row["payment_date"].'</td> <td>' . $row["amount"].'</td>';
    }
}
echo ($output.= "</tbody></table><br></form>");
?>