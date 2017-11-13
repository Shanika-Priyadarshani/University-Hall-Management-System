<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/9/2017
 * Time: 12:57 AM
 */

  function assign_rooms($array){
      include '../connection.php';
      include 'hostals.php';
      $con = connect();

      $gender=$array['gender'];
      $acc_year=$array['academic_year'];


      if ($gender=='Female'){
          $hostals=women_hostal_acc_year();
      }
      else{
          $hostals=men_hostal_acc_year();
      }

      $hostal=$hostals[$acc_year];
      $stamt='Select sum(vacancies) from ';




  }
  $array=[];
  assign_rooms($array);