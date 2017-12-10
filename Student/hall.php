<?php
/**
 * Created by PhpStorm.
 * User: shirmi
 * Date: 11/8/2017
 * Time: 8:15 PM
 */

$con = connect();
mysqli_set_charset($con, 'utf8');
//$ui='St170006';
//$view="create view accomadateH as select accommodate.hall_id,hall.hall_name,hall.room_no ,hall.capacity from accommodate inner join hall on accommodate.hall_id =hall.hall_id where accommodate.user_id ='St170001'";
$view1="CREATE VIEW accomadatt AS SELECT accommodate.hall_id,hall.hall_name ,hall.capacity FROM accommodate , hall WHERE accommodate.hall_id=hall.hall_id and accommodate.user_id='$ui'";
$result = mysqli_query($con,$view1);
//$row = mysqli_fetch_array($result);
$query = "SELECT * FROM accommodate , hall,facility WHERE hall.facility_id= facility.facility_id and accommodate.hall_id=hall.hall_id and accommodate.user_id='$ui'";
$result = mysqli_query($con,$query);
$output='';

if($result===FALSE){
    echo("error");
}else{
    while($row = mysqli_fetch_array($result)) {
        $hllName=$row["hall_name"];
        $capacity=$row["capacity"];
        $noOfWashrooms=$row["no_of_washrooms"];
        $noOfToilets=$row["no_of_toilets"];
        $hallType=$row["hall_type"];
        $street=$row["street"];
        $town=$row["town"];
    }
}
//echo ($output.= "</tbody></table><br></form>");

?>