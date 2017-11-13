
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Student Details </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <div class="main-img">
        <img src="css/head.jpg" alt="Hall Management System - UoS ">
    </div><!--main-image-->
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Antic'>

    <link rel="stylesheet" href="css/style_search_box.css">

</head>

<body>
<div align="left">

    <div class="text"></div>

    <form method="get" ACTION=student_detail.php>
        <select class="hall" name="criteria">

            <option hidden value="">Select a Criteria...</option>
            <option value="user_id">Student ID</option>
            <option value="first_name">First Name</option>
            <option value="last_name">Last Name</option>
            <option value="dept_name">Department Name</option>
            <option value="faculty">Faculty</option>
        </select>
        <input class="hall" name="keyword" type="text" hidden value="" placeholder="Type Here...">
        <input class="button" id="button" type="submit" value="Search" name="search"> <br>
    </form>

    <?php

    if(isset($_GET['search']) ) {

        $criteria = $_GET['criteria'];
        $keyword = $_GET['keyword'];


        include '../connection.php';
        $con = connect();
        if ($criteria == "") {
            ?>
            <p class="text">Please select a Criteria First... </p>
            <?php
        } elseif ($keyword == "") {
            ?>
            <p class="text">Please Enter a Keyword... </p>
            <?php
        } else {

            $first_view="CREATE VIEW student_detail_all AS SELECT student.user_id,student.dept_name,student.faculty,
            student.year_balance,student.academic_year,
            user_details.first_name,user_details.last_name,user_details.gender,user_details.street,user_details.town,user_details.city
             FROM student  FULL OUTER JOIN user_details on student.user_id=user_details.user_id";
            mysqli_set_charset($con, 'utf8');
            $data1 = mysqli_query($con, $first_view);



            $second_view="CREATE VIEW more_details AS SELECT login_details.user_id,login_details.email, accommodate.hall_id,accommodate.room_no,
            accommodate.date_of_assignment,accommodate.date_of_leaving
            FROM login_details FULL OUTER JOIN accommodate on accommodate.user_id=login_details.user_id;";
            mysqli_set_charset($con, 'utf8');
            $data2 = mysqli_query($con, $second_view);




            $third_view="CREATE VIEW all_details AS SELECT * FROM student_detail_all   FULL OUTER JOIN more_details where
             more_details.user_id=student_detail_all.user_id";
            mysqli_set_charset($con, 'utf8');
            $data3 = mysqli_query($con, $third_view);



            if($criteria=="user_id"){
                $query = "select * from all_details where user_id LIKE'%$keyword%'  ORDER by user_id";
                mysqli_set_charset($con, 'utf8');
                $data = mysqli_query($con, $query);
            }

            elseif ($criteria=="first_name"){
                $query = "select * from all_details where first_name LIKE'%$keyword%'  ORDER by user_id";
                mysqli_set_charset($con, 'utf8');
                $data = mysqli_query($con, $query);
            }

            elseif ($criteria=="last_name"){
                $query = "select * from all_details where last_name LIKE'%$keyword%'  ORDER by user_id";
                mysqli_set_charset($con, 'utf8');
                $data = mysqli_query($con, $query);
            }

           elseif ($criteria=="dept_name"){

                $query = "select * from all_details where dept_name LIKE'%$keyword%' ORDER by user_id";
                mysqli_set_charset($con, 'utf8');
                $data = mysqli_query($con, $query);

            }

            elseif ($criteria=="faculty"){
                $query = "select * from all_details where faculty LIKE'%$keyword%'  ORDER by user_id";
                mysqli_set_charset($con, 'utf8');
                $data = mysqli_query($con, $query);

            }

            $array=mysqli_fetch_array($data);

            if(empty($array)){
                ?>
                <p class="text">No matching Results! </p>
                <?php
            }
            else {?>
                <p class="title"> <?php  echo $data->num_rows; ?> Matching Results found.</p>
                <div class="table">
                <?php
                echo '<table width="40%" border="2" cellpadding="6" cellspacing="5" class="text" >
         <tr class="title">
             <th> </th>
             <th>Student ID</th>
             <th>Student Name</th>
             <th>Gender</th>
             
             <th>Address</th>
             <th>Department</th>
             <th>Faculty</th>
             <th>Year Balance</th>
            
         </tr>';

                foreach ($data as $row) {
                    echo '<tr>  
              <td> 
                   <img src="css/user.jpg"/> </td>
              <td>' . $row["user_id"] . '</td>
             <td>' . $row["first_name"] ." ".$row["last_name"] . '</td>
            
              <td>' . $row["email"] . '</td>
               <td>' . $row["street"] .", ". $row["town"] .", ". $row["city"] . '</td>
             <td>' . $row["dept_name"] . '</td>
             <td>' . $row["faculty"] . '</td>
             <td>' . $row["year_balance"] . '</td>
          
             
           </tr>';
                }
                echo '</table>';
                ?></div> <!--table-->
                <?php
            }
     }

    }

    ?>
<script src='https://use.edgefonts.net/amaranth.js'></script>

</div>
</body>
</html>



