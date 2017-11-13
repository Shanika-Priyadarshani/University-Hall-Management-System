<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Hall Details </title>
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



    <form method="get" ACTION=hall_detail.php>

        <select class="hall" name="halls">

            <option hidden value="">Select Hall...</option>
            <option value="Swarana Jayanthi">Swarana Jayanthi Hall</option>
            <option value="Arunachalam">Arunachalam Hall</option>
            <option value="Jayathilake">Jayathilake Hall</option>
            <option value="Sarasaviuyana">Sarasaviuyana Hall</option>
            <option value="Marcus Fernando">Marcus Fernando Hall</option>
        </select>

        <select class="room" name="rooms">
            <option hidden value="" >Select Room...</option>
            <option value="1">Room 1</option>
            <option value="2">Rooom 2</option>
            <option value="3">Room 3</option>
            <option value="4">Rooom 4</option>
            <option value="5">Room 5</option>
        </select>
        <input class="button" id="button" type="submit" value="Search" name="search"> <br>
    </form>

    <?php
    if(isset($_GET['search']) ) {
        $hall = $_GET['halls'];
        $room = $_GET['rooms'];
        include '../connection.php';
        $con = connect();

        if ($hall == "") {
            ?>
            <p class="text">Please select a Hall Name </p>
            <?php
        } else {

            $query = "select hall_type,capacity,street,town,maintainance_cost,hall_id from hall where hall_name='$hall'";
            mysqli_set_charset($con, 'utf8');
            $data = mysqli_query($con, $query);

            while ($row = mysqli_fetch_array($data)) {
                $hall_id=$row["hall_id"];

                ?>
                <ul class="text">
                    <p class="title">Hall Details----> </p>
                    <li><?php echo "Hall Name : " . $hall; ?></li>
                    <li><?php echo "Hall Type : " . $row["hall_type"]; ?></li>
                    <li><?php echo "Hall Capacity : " . $row["capacity"]; ?></li>
                    <li><?php echo "Location : " . $row["street"] . ", " . $row["town"]; ?></li>
                    <li><?php echo "Maintenance Cost : " . $row["maintainance_cost"]; ?></li>
                </ul>
                <?php

                if ($room != "") {
                    echo "";
                    $query2 = "select cost,room_type from room where hall_id='$hall_id' AND room_no='$room'";
                    mysqli_set_charset($con, 'utf8');
                    $data2 = mysqli_query($con, $query2);

                    while ($row2 = mysqli_fetch_array($data2)) {
                        ?>
                        <ul class="text">
                            <p class="title">Room Details----> </p>
                            <li><?php echo "Room Number : " . $room; ?></li>
                            <li><?php echo "Room Type : " . $row2["room_type"]; ?></li>
                            <li><?php echo "Cost per Year : Rs." . $row2["cost"]; ?></li>
                        </ul>
                        <?php
                    }

                }
            }
        }
    }

    ?>
    <script src='https://use.edgefonts.net/amaranth.js'></script>

</div>
</body>
</html>
