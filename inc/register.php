<?php
/**
 * Created by PhpStorm.
 * User: Supimi Gamage
 * Date: 11/7/2017
 * Time: 9:17 PM
 */

function register($array){
    include '../connection.php';
    $con = connect();
    $query="select user_id from user_details where user_id='";
    $query.=$array['index_number'];
    $query.="'";
    $dis=mysqli_query($con,$query);
    if(($dis->num_rows)==0){
        $query1="insert into user_details (user_id, first_name, last_name,gender,street,town, city,current_year) values ('";
        $query1 .= $array['index_number'];
        $query1 .= "','";
        $query1 .= $array['first_name'];
        $query1 .= "','";
        $query1 .= $array['last_name'];
        $query1 .= "','";
        $query1 .= $array['gender'];
        $query1 .= "','";
        $query1 .= $array['street'];
        $query1 .="','";
        $query1 .=$array['town'];
        $query1 .= "','";
        $query1 .= $array['city'];
        $query1 .= "','";
        $query1 .= $array['accomodation_year'];
        $query1 .= "')";



        $query2="insert into login_details (user_id, pwd, member_type,email) values ('";
        $query2 .= $array['index_number'];
        $query2 .= "','";
        $query2 .= md5($array['password']);
        $query2 .= "','Student','";
        $query2 .= $array['email'];
        $query2 .= "')";

        $query3="insert into student (user_id, dept_name, faculty,academic_year) values ('";
        $query3 .= $array['index_number'];
        $query3 .= "','";
        $query3 .= $array['department'];
        $query3 .= "','";
        $query3 .= $array['faculty'];
        $query3 .="','";
        $query3 .=$array['academic_year'];
        $query3 .= "')";


        $query4="insert into user_telephone_number (user_id, telephone_num) values ('";
        $query4 .= $array['index_number'];
        $query4 .= "','";
        $query4 .= $array['contact_number1'];
        $query4 .= "')";
        if(isset($array['contact_number2'])){
            $query4 .=",('";
            $query4 .= $array['index_number'];
            $query4 .= "','";
            $query4 .=$array['contact_number2'];
            $query4 .= "')";
        }

        $added1 =mysqli_query($con,$query1);
        $added2 =mysqli_query($con,$query2);
        $added3 =mysqli_query($con,$query3);
        $added3 =mysqli_query($con,$query4);
        $id=$array['index_number'];

        mysqli_close($con);
        header("Location:../Student/index.html?user_id='$id'");
        exit();



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

