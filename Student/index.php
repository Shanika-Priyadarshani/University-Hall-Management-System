<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
session_start();
$ui=$_SESSION['id']
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Student window</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
                    <script>
                        previous="profile";
                        function showhide(current) {
                                document.getElementById(current).style.display = "block";
                                if(previous!==current){
                                    document.getElementById(previous).style.display = "none";
                                }

                                previous=current;
                        }
                    </script>
                    <li>
                        <a href="#"   onclick=showhide("profile") >
                            <i class="icon1"></i>
                            <strong>profile</strong>

                        </a>
                    </li>
                    <li>
                        <a href="#" onclick=showhide("accomadation")
                        >

                            <i class="icon2"></i>
                            <strong>Accomadation history</strong>

                        </a>

                    </li>
                    <li>
                        <a href="#" onclick=showhide("payment")>
                            <i class="icon3"></i>
                            <strong>Payment details</strong>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick=showhide("room")>
                            <i class="icon4"></i>
                            <strong>Room details</strong>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick=showhide("hall")>
                            <i class="icon5"></i>
                            <strong>Hall details</strong>
                        </a>
                    </li>
                </ul>
            </div><!-- end menu -->
            <div class="grids_of_2"><!-- start grids_of_2 -->
                <div class="slider"><!-- start slider -->


                     <?php //$ui='St170010' ?>
                      <div class="profileText" id="profile" >
                          <h1>Student Information</h1>
                          <?php
                          include 'profile.php';
                          ?>
                          <ul class="listw">

                              <li><a href="#">user id :<span><?php echo $uid ?></span> </a></li>
                              <li><a href="#">department name :<span><?php echo $array ?></span> </a></li>
                              <li><a href="#">Faculty :<span><?php echo $fct ?></span> </a></li>
                              <li><a href="#">academic year : <span><?php echo $acdmic ?></span> </a></li>
                              <li><a href="#">year balance : <span><?php echo $year_b?></span> </a></li>
                              <li><a href="#">first name : <span><?php echo $fname."<br>"?></span> </a></li>
                              <li><a href="#">last name : <span><?php echo $lname?></span> </a></li>
                              <li><a href="#">street : <span><?php echo $street?></span> </a></li>
                              <li><a href="#">town : <span><?php echo $town?></span> </a></li>
                              <li><a href="#">city : <span><?php echo $city?></span> </a></li>
                          </ul>
                      </div>

                      <div class ="accomadateText" id="accomadation"  >
                          <h1>Acccomadate HIstory</h1>
                          <?php
                               include 'accomadatehistory.php';
                          ?>
                      </div>

                    <div class ="accomadateText" id="payment"  >
                        <h1>Payment Details</h1>
                        <?php
                             include 'paymentDetails.php';
                        ?>
                        <ul class="listw">

                            <li><a href="#">  amount to be paid :   <?php echo $year_b ?></a></li>

                        </ul>
                    </div>

                    <div class ="accomadateText" id="room"  >
                        <h1>Room Details</h1>
                        <?php
                            include 'room.php';
                        ?>
                        <ul class="listw">

                            <li><a href="#">room no:<span><?php echo $room_no ?></span> </a></li>
                            <li><a href="#">room type :<span><?php echo $room_type ?></span> </a></li>
                            <li><a href="#">cost :<span><?php echo $cost ?></span> </a></li>
                            <li><a href="#">roommate name :<span><?php echo $roommate ?></span> </a></li>
                            <li><a href="#">hall name :<span><?php echo $hname ?></span> </a></li>

                        </ul>
                    </div>

                    <div class ="accomadateText1" id="hall"  >
                        <h1>Hall Details</h1>
                        <?php
                            include 'hall.php';
                        ?>

                    </div>




                </div><!-- end slider -->
                <div  class="grid_right">
                    <ul>
                        <li class="color3"><img src="images/stdy2.jpg" alt=""/></li>
                        <li class="color1"><img src="images/bed.jpg" alt=""/></li>
                        <li class="color2"><img src="images/uni1.jpg" alt=""/></li>
                    </ul>
                </div>
                <div class="clear"></div>
                <div  class="grid_bottom">

                </div>
            </div><!-- end grids_of_2 -->
        </div><!-- end grid1_of_1 -->
        <div class="grid1_of_2"><!-- start grid1_of_2 -->
            <div class="grid1_of_list1"><!-- start grid1_of_list1 -->
                <div class="grid_img">
                    <img src="images/student.jpg"  alt=""/>
                </div>
                <div class="grid_text">
                    <div class="grid_text1">
                        <h4><?php echo $fname."  ".$lname?></h4>
                        <h5>undergraduate</h5>
                    </div>
                    <ul class="list1">
                        <ul>
                            <li><a href="contact-us">Edit profile</a></li>
                            <li><a href="../index.html" onclick=showhide()>Logout</a></li>
                            <li><a href="../Home/index.html">Home</a></li>
                            <li><a href="contact-us" onclick=showhide()>Contact Us</a></li>
                        </ul>
                        <div class="clear"></div>
                    </ul>

                </div>

            </div>

        </div><!-- end grid1_of_2 -->

        <div class="copy"><!-- start copy -->
            <p class="link"><span>© All rights reserved | &nbsp;<a > LifeWare</a></span></p>
        </div>
    </div><!-- end main -->
</div>
</body>
</html>