<?php
function edit_accommodation($con){
    if(isset($_GET["t1"])) {
        $std_id = $_GET["t1"];
        $view = "create view std as select * from accommodate where user_id = '$std_id'";
        $re = mysqli_query($con, $view);
        $query1 = "select user_id,first_name,last_name,gender,faculty,dept_name,academic_year from student natural join user_details where user_id = '$std_id'";
        $query2 = "select date_of_assignment,hall_id,hall_name,room_no from std natural join  hall";
        $query3 = "select * from accommodate_history where user_id = '$std_id'";
        $result1 = mysqli_query($con, $query1);
        $result2 = mysqli_query($con, $query2);
        $result3 = mysqli_query($con, $query3);
        $output = '';
        $row1 = mysqli_fetch_array($result1);
        $row2 = mysqli_fetch_array($result2);
        $row3 = mysqli_fetch_array($result3);
        if(($row1==FALSE)or ($row2==FALSE)){
            $output.='<div class="wrong">
            <label> Please enter valid student index number </label>
        </div>';
            echo $output;
        }else{
            $output .= ' <link rel="stylesheet" type="text/css" href="css/edit.css"><div class="inneredit"><form action="#" method="get">
                <div class="form-group">
                    <label for="indexnumber">Index Number:</label>
                    <input type="text" class="form-control" id="indexnumber" value= ' . $row1["user_id"] . ' readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name" value=' . $row1["first_name"] . ' readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" value=' . $row1["last_name"] . ' readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <input type="text" class="form-control" id="gender" value=' . $row1["gender"] . ' readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="faculty">Faculty:</label>
                    <input type="text" class="form-control" id="faculty" value=' .$row1["faculty"].' readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" class="form-control" id="department" value=' . $row1["dept_name"] . ' readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="academic_year">Academic Year:</label>
                    <input type="text" class="form-control" id="academic_year" value=' . $row1["academic_year"] . ' readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="hallid">Hall Id:</label>
                    <input type="text" class="form-control" id="hallid" value=' . $row2["hall_id"] . ' readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="hallname">Hall Name:</label>
                    <input type="text" class="form-control" id="hallname" value=' . $row2["hall_name"] . ' readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="date">Date of Assignment:</label>
                    <input type="text" class="form-control" id="date" value=' . $row2["date_of_assignment"] . ' readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="roomid">Room Id:</label>
                    <input type="text" class="form-control" id="roomid" value=' . $row2["room_no"] . ' >
                </div>
        </div>
        <div class="showhistory"><table name = \"accomm_his\">
                                              <thead>
                                          <caption></caption>
                                            </thead><tbody><tr>
                                                  <th>Hall Id</th>
                                                  <th>Room Id</th>
                                                  <th >Date of Assignment</th>';
            if($result3===FALSE){
                echo("eroooooo");
            }else{
                while($row = mysqli_fetch_array($result3)) {
                    $output .=  '<tr><td >'. $row3["hall_id"].'</td> <td>' . $row["room_no"].'</td> <td>'. $row["date_of_assignment"].'</td> ';

                }
            }
            $output.= '</tbody></table>
                
         
        </div>
        <div class="bottombtn">

            <input type="hidden"id="hid1" name="hid1">
            <input type="hidden"  id="hid2" name="hid2">
            <input type="submit" value=" Change" onclick="onc()">
            </form>
            <script >
                function onc() {
                    var roomID=document.getElementById(\'roomid\').value;
                    document.getElementById(\'hid1\').value=roomID;
                    var userID=document.getElementById(\'indexnumber\').value;
                    document.getElementById(\'hid2\').value=userID;




                }
            </script>

        </div>';
            echo $output;
        }

    }else{

    }
    $dropstd = "drop view std";
    $re = mysqli_query($con,$dropstd);
}

function updateroom($con){
    if(isset($_GET['hid1'])){
        $id1=$_GET['hid1'];
        $id2=$_GET['hid2'];
        $que = "UPDATE accommodate SET room_no = '$id1' WHERE user_id='$id2'";
        $re = mysqli_query($con,$que);


    }else{

    }
}