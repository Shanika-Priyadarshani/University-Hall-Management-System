<?php
include '../connection.php';
session_start();
$user_id=$_SESSION['id'];

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Interface</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="css/NewStyle.css" rel="stylesheet" type="text/css" media="all" />
    <!-- start slider -->
    <link rel="stylesheet" type="text/css" href="css/slider.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
    <script type="text/javascript" src="js/jquery.cslider.js"></script>
    <script type="text/javascript">
        $(function() {

            $('#da-slider').cslider({
                autoplay : true,
                bgincrement : 450
            });

        });
    </script>
</head>
<body>
<div class="wrap">
    <div class="main"><!-- start main -->
        <div class="grid1_of_1"><!-- start grid1_of_1 -->
            <div class="menu"><!-- start menu -->
                <ul class="mcd-menu">
                    <li>
                        <a href="" class="active">
                            <i class="icon1"></i>
                            <strong>Employee Assigns</strong>
                        </a>
                    </li>
                    <li>
                        <a href="../Search/student_detail.php" >
                            <i class="icon2"></i>
                            <strong>Student Details</strong>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon3"></i>
                            <strong>Employee Details</strong>
                        </a>
                    </li>
                    <li>
                        <a href="../Search/payment_detail.php">
                            <i class="icon4"></i>
                            <strong>Payment Details</strong>
                        </a>
                    </li>
                    <li>
                        <a href="../Search/hall_detail.php">
                            <i class="icon5"></i>
                            <strong>Hall details</strong>
                        </a>
                    </li>
                </ul>
            </div><!-- end menu -->
            <div class="grids_of_2"><!-- start grids_of_2 -->
                <div class="slider"><!-- start slider -->
                    <!--<div id="da-slider" class="da-slider"><!-- start slider
                        <div class="da-slide">-->
                    <lbl>Current Assignings</lbl>
                    <?php
                      include 'inc/getAssign.php';
                      $con = connect();
                      getCurrentAssignings($con);
                      ?>
                </div>


                <!-- <nav class="da-arrows">
                     <span class="da-arrows-prev"></span>
                     <span class="da-arrows-next"></span>
                 </nav>-->
                <!-- </div><!-- end slider
             </div><!-- end slider -->
                <div  class="grid_right">
                    <!--  <ul>
                          <li class="color1"><img src="images/pic3.jpg" alt=""/></li>
                          <li class="color2"><img src="images/pic4.jpg" alt=""/></li>
                      </ul>-->
                </div>
                <div class="clear"></div>
                <div  class="grid_bottom">

                </div>
            </div><!-- end grids_of_2 -->
        </div><!-- end grid1_of_1 -->
        <div class="grid1_of_2"><!-- start grid1_of_2 -->
            <div class="grid1_of_list1"><!-- start grid1_of_list1 -->
                <div class="grid_img">
                    <img src="images/adminewPic.jpg" alt=""/>
                </div>
                <div class="grid_text">
                    <div class="grid_text1">
                        <?php
                            include 'inc/getAdminDetails.php';

                        showAdminDetails($con,$user_id);

                        ?>

                    </div>

                    <ul class="list1">
                        <li class="active"><a href="#">Edit Profile</a></li>
                        <li><a href="#">Assign Employee</a></li>
                        <li class="active"><a href="#">Add Employee </a></li>
                        <li><a href="edit_student_accomodation.php">Edit Student Accommodation</a></li>
                        <li class="active"><a href="../inc/logout.php" >Logout</a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>

            <div class="clear"></div>
        </div><!-- end grid1_of_2 -->s
    </div><!-- end main -->
</div>
</body>
</html>
