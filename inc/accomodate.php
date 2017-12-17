<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/9/2017
 * Time: 12:57 AM
 */

  function assign_rooms($array,$con)
  {

      $gender = $array['gender'];
      $acc_year = $array['academic_year'];
      $user_id = $array['index_number'];
      $vacan=0;

      //select available room list
      $stmt=$con->prepare("SELECT hall_id,room_no FROM hall NATURAL JOIN room WHERE allocated_aca_year=? AND hall_type=? AND vacancies>?
      AND NOT EXISTS(SELECT hall_id,room_no FROM accommodate_history WHERE user_id=?) ORDER BY room_no");
      $stmt->bind_param('isis',$acc_year,$gender,$vacan,$user_id);
      $stmt->execute();
      $rooms=$stmt->get_result();
;

      if(mysqli_num_rows($rooms)>0){
          $ava_vacancy=$rooms->fetch_array();


          try{
              $con->begin_transaction();

              //insert in accomodate table
              $stmt1=$con->prepare('INSERT INTO accommodate(user_id,hall_id,room_no,date_of_assignment,date_of_leaving) VALUES (?,?,?,?,?)');
              $assig_date=date('Y-m-d');
              $endDate = new DateTime('1st January Next Year');
              $leaving_date=$endDate->format('Y-m-d');
              $stmt1->bind_param('sssss',$user_id, $ava_vacancy['hall_id'], $ava_vacancy['room_no'],$assig_date,$leaving_date);
              $stmt1->execute();

              //update room table
              $count=1;
              $stmt2=$con->prepare('UPDATE room SET vacancies=vacancies-? WHERE hall_id=? AND room_no=?');
              $stmt2->bind_param('iss',$count,$ava_vacancy['hall_id'],$ava_vacancy['room_no']);
              $stmt2->execute();

              $con->commit();


          }
          catch (Exception $e){
              $con->rollback();

          }
      }
      else{
          throw new Exception('Not available Space');
      }

  }


  function update_accommodation($con){
     // include '../connection.php';
     // $con=connect();

      try{
         // $con->begin_transaction();
          $stmt=$con->prepare('INSERT INTO accommodate_history SELECT * from accommodate');
          $stmt->execute();

          $stmt1=$con->prepare('SELECT user_id,academic_year,gender FROM user_details NATURAL JOIN student WHERE user_id IN (SELECT user_id from accommodate)');
          $stmt1->execute();
          $result=$stmt1->get_result();

          $single=1;
          $singletxt='Single';
          $double=2;
          $doubletxt='Double';
          $stmt3=$con->prepare('UPDATE room SET vacancies=? WHERE room_type=?');
          $stmt3->bind_param('is',$single,$singletxt);
          $stmt3->execute();
          $stmt3->bind_param('is',$double,$doubletxt);
          $stmt3->execute();


          while ($row = $result->fetch_array()) {

              if ($row['academic_year']=='4'){
                  $stmt2=$con->prepare('DELETE FROM accommodate WHERE user_id=?');
                  $stmt2->bind_param('s',$row['user_id']);
                  $stmt2->execute();

              }
              else{
                  try{
                      $con->begin_transaction();
                      $gender = $row['gender'];
                      $acc_year = (int)$row['academic_year']+1;
                      echo $acc_year;
                      $user_id = $row['user_id'];
                      $vacan=0;

                      //select available room list
                      $stmt4=$con->prepare('SELECT hall_id,room_no FROM hall NATURAL JOIN room WHERE allocated_aca_year=? AND hall_type=? AND vacancies>?');
                      $stmt4->bind_param('isi',$acc_year,$gender,$vacan);
                      $stmt4->execute();
                      $rooms=$stmt4->get_result();

                      /*$stmt_1=$con->prepare('SELECT hall_id,room_no FROM accommodate_history WHERE user_id=?');
                      $stmt_1->bind_param('s',$user_id);
                      $stmt_1->execute();
                      $res=$stmt_1->get_result();

                      //echo '<br>';
                      //print_r($rooms);
                      //echo '<br>';
                      //print_r($res);
                     // echo ($rooms->fetch_array())['hall_id'];
                      $availables=[];
                      $past_rooms=[];

                      while ($rm=$rooms->fetch_array()){
                          //echo '<br>';
                          //echo '<br>**********************';
                          echo $rm['hall_id'];
                          $availables[]=$rm;
                      }

                      while ($rm=$res->fetch_array()){
                          //echo '<br>**********************';
                          //echo $rm['hall_id'];
                          $past_rooms[]=$rm;
                      }

                      $available_rooms=array_diff($availables,$past_rooms);

                    //  print_r($available_rooms[0]['room_no']);
                      echo '<br>**********************';*/
                      $ava_vacancy=$rooms->fetch_array();
                      echo 'selected room';
                      echo $ava_vacancy->num_rows;
                      echo $ava_vacancy['hall_id'];
                      echo $ava_vacancy['room_no'];




                      echo '<br>';
                      echo '#####################';
                      echo $ava_vacancy['hall_id'];
                      echo $ava_vacancy['room_no'];
                      echo '<br>';

                      $hall_id=$ava_vacancy['hall_id'];
                      $room_no= $ava_vacancy['room_no'];


                      //update accomodate table
                      $stmt5=$con->prepare('UPDATE accommodate SET hall_id=? , room_no=?, date_of_assignment=?, date_of_leaving=? WHERE user_id=? ');
                      //echo print_r($stmt5);
                      $assig_date=date('Y-m-d');
                      $endDate = new DateTime('1st January Next Year');
                      $leaving_date=$endDate->format('Y-m-d');
                      $stmt5->bind_param('sssss',$hall_id, $room_no,$assig_date,$leaving_date,$user_id);
                      $stmt5->execute();

                      //update room table
                      $count=1;
                      $stmt6=$con->prepare('UPDATE room SET vacancies=vacancies-? WHERE hall_id=? AND room_no=?');
                      $stmt6->bind_param('iss',$count,$hall_id,$room_no);
                      $stmt6->execute();

                      $stmt7=$con->prepare('UPDATE student SET academic_year = academic_year + ? WHERE user_id=?');
                      $stmt7->bind_param('is',$count,$user_id);
                      $stmt7->execute();


                      $con->commit();

                  }
                  catch (ErrorException $exp){
                      //  $con->rollback();
                      //throw Exception('Error');

                  }
              }

          }
          /*$stmt7=$con->prepare('UPDATE student SET academic_year = academic_year + ?');
          $final_year=4;
          $stmt7->bind_param('i',$count);
          $stmt7->execute();*/

      }
      catch (ErrorException $e){
         // $con->rollback();
      }
  }



  function assign($row,$con){


  }

