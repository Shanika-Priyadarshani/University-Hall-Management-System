<?php
/**
 * Created by PhpStorm.
 * User: Supimi Gamage
 * Date: 11/8/2017
 * Time: 5:46 PM
 */

function login($array){
    include '../connection.php';
    $con = connect();
    $user_name=$array['username'];
    $mem_type=$array['mem_type'];
    $password=md5($array['pwd']);
    $query1="Select pwd,member_type from login_details where user_id='$user_name' or user_id='$user_name'";
    $result=mysqli_query($con,$query1);
    $res = $result->fetch_array();
    //echo $query1;
    mysqli_close($con);
    session_start();
    if($password==$res['pwd'] && $mem_type==$res['member_type']){
        if ( $res['member_type']=='Admin'){
            $_SESSION['id']=$user_name;
            header("Location:../Admin/AdminNew.php");
            exit();
        }
        elseif ($res['member_type']=='Student'){
            $_SESSION['id']=$user_name;
            header("Location:../Student/index.php");
            exit();
        }
        elseif ($res['member_type']=='Employee'){
            $_SESSION['id']=$user_name;
            header("Location:../Employee/index.html");
            exit();
        }
    }
    else{
        $_SESSION['validity']='invalied';
        header("Location:../Log-in-form/index.php");
        exit();
    }


}

login($_POST);

?>