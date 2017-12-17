<?php
/**
 * Created by PhpStorm.
 * User: Supimi Gamage
 * Date: 11/7/2017
 * Time: 9:17 PM
 */
include 'accomodate.php';

function register($array){
    include '../connection.php';
    $con = connect();
    $user_id=$array['index_number'];
    $stmt=$con->prepare("select user_id from user_details where user_id=?");
    $stmt->bind_param('s',$user_id);
    $stmt->execute();
    $dis=$stmt->get_result();

    if(($dis->num_rows)==0){


        //set parameters
        $first_name=$array['first_name'];
        $last_name=$array['last_name'];
        $gender=$array['gender'];
        $street=$array['street'];
        $town=$array['town'];
        $city=$array['city'];
        $current_year=$array['accomodation_year'];
        $pwd= md5($array['password']);
        $email=$array['email'];
        $dept_name=$array['department'];
        $faculty=$array['faculty'];
        $aca_year=$array['academic_year'];
        $contact1=$array['contact_number1'];
        $contact2=$array['contact_number2'];
        $type='Student';

       try{
           $con->begin_transaction();
           //prepared statement for inserting data into user details
           $stmt1 = $con->prepare("insert into user_details (user_id, first_name, last_name, gender, street, town, city, current_year) values (?, ?, ?, ?, ?, ?, ?, ?)");
           //bind parameters
           $stmt1->bind_param("sssssssi", $user_id, $first_name, $last_name , $gender, $street, $town, $city, $current_year );
           $stmt1->execute();

           //prepared statement for insert data into loin_details
           $stmt2 = $con->prepare("insert into login_details (user_id, pwd, member_type,email) values (?, ?, ?, ?)");
           //bind parameters
           $stmt2->bind_param("ssss",$user_id, $pwd, $type, $email  );
           $stmt2->execute();

           //prepared statement for insert data into student
           $stmt3 = $con->prepare("insert into student (user_id, dept_name, faculty,academic_year) values (?, ?, ?, ?)");
           //bind parameters
           $stmt3->bind_param("ssss",$user_id, $dept_name, $faculty,$aca_year );
           $stmt3->execute();

           //prepared statement for insert data into user_telephone_number
           $stmt4 = $con->prepare("insert into user_telephone_number (user_id, telephone_num) values (?, ?)");
           //bind parameters
           $stmt4->bind_param("si",$user_id, $contact1 );
           //enter first contact number
           $stmt4->execute();
           $stmt4->bind_param("si",$user_id, $contact2 );
           //enter second contact number
           $stmt4->execute();

           //assign hostal rooms for newly registered people
           assign_rooms($array,$con);




           //commit transaction
           $con->commit();
           session_start();
           $_SESSION['id']=$user_id;
           header("Location:../Student/index.php");
           exit();

       }
       catch (Exception $e){
           $con->rollback();
           header("Location:../index.html");
           exit();


       }
        mysqli_close($con);

    }
    else {
        mysqli_close($con);
        echo "<script language='javascript'>";
        echo "alert('You are already registered')";
        echo "</script>";
        header("Location:../Log-in-form/index.php");
        exit();

    }


}
register($_POST);

?>

