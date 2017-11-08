<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Payment Details </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <div class="main-img">
        <img src="../img/head.jpg" alt="Hall Management System - UoS ">
    </div><!--main-image-->
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Antic'>

    <link rel="stylesheet" href="css/style_search_box.css">

</head>

<body>
<div align="left">

    <div class="text"></div>

    <form method="get" ACTION=payment_detail.php>
        <input class="pay" name="payment_id" type="text" placeholder="Payment ID">
        <input class="pay" name="user_id" type="text" placeholder="Student ID">
        <input class="pay"  type="date" name="payment_date" id="payment_date"/>

        <input class="button" id="button" type="submit" value="Search" name="search"> <br>
    </form>

    <?php

    if(isset($_GET['search']) ) {
        $payment_id = $_GET['payment_id'];
        $user_id = $_GET['user_id'];
        $payment_date = $_GET['payment_date'];
        include '../connection.php';
        $con = connect();
        $query=null;
        $data=null;
        if (empty($payment_id)  and empty($payment_date) and empty($user_id)) {
          ?> <p class="title">Please enter at least one searching criteria</p><?php
        }
        else{
            $view="CREATE VIEW student_pays AS SELECT user_details.first_name,user_details.last_name,payment.payment_id,payment.user_id,payment.payment_date,payment.amount FROM payment INNER JOIN user_details on payment.user_id=user_details.user_id";
            mysqli_set_charset($con, 'utf8');
            $dat = mysqli_query($con, $view);

        if (!empty($payment_date) and !empty($payment_id) and !empty($payment_date)) {

            $query = "select * from student_pays where payment_id='$payment_id' and payment_date='$payment_date' and payment_date='$payment_date' ORDER by payment_id";
            mysqli_set_charset($con, 'utf8');
            $data = mysqli_query($con, $query);
        }

        elseif (!empty($payment_date) and !empty($payment_id)) {

            $query = "select * from student_pays where payment_id='$payment_id' and payment_date='$payment_date' ORDER by payment_id";
            mysqli_set_charset($con, 'utf8');
            $data = mysqli_query($con, $query);
        }

        elseif (!empty($user_id) and !empty($payment_id)) {

            $query = "select * from student_pays where payment_id='$payment_id' and user_id='$user_id' ORDER by payment_id";
            mysqli_set_charset($con, 'utf8');
            $data = mysqli_query($con, $query);
        }

        elseif (!empty($user_id) and !empty($payment_date)) {
            $query = "select * from student_pays where user_id='$user_id' and payment_date='$payment_date'  ORDER by payment_id";
            mysqli_set_charset($con, 'utf8');
            $data = mysqli_query($con, $query);
        }

        elseif (!empty($payment_id)) {

            $query = "select * from student_pays where payment_id='$payment_id' ORDER by payment_id";
            mysqli_set_charset($con, 'utf8');
            $data = mysqli_query($con, $query);
        }

        elseif (!empty($user_id)) {
            $query = "select * from student_pays where user_id='$user_id' ORDER by payment_id";
            mysqli_set_charset($con, 'utf8');
            $data = mysqli_query($con, $query);
        }

        elseif (!empty($payment_date)) {
            $query = "select * from student_pays where payment_date='$payment_date' ORDER by payment_id";
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

   <?php
                echo '<table width="80%" border="2" cellpadding="6" cellspacing="5" class="text" >
         <tr class="title">
             <th>Payment ID</th>
             <th>Student Name</th>
             <th>Student ID</th>
             <th>Paid Amount (Rs.)</th>
             <th>Date</th>
         </tr>';

            foreach ($data as $row) {
                echo '<tr>  
             <td>' . $row["payment_id"] . '</td>
             <td>' . $row["first_name"] ." ".$row["last_name"] . '</td>
             <td>' . $row["user_id"] . '</td>
             <td>' . $row["amount"] . '</td>
             <td>' . $row["payment_date"] . '</td>  
  
           </tr>';
            }
            echo '</table>';
        }
    }

    }

    ?>
    <script src='https://use.edgefonts.net/amaranth.js'></script>

</div>
</body>
</html>
