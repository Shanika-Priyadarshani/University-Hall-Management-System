<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/14/2017
 * Time: 6:27 AM
 */

function err_display(){
    session_start();
    try{
        echo $_SESSION['validity'];
    }
    catch (ErrorException $ex){

    }
    $_SESSION['validity']='';
}