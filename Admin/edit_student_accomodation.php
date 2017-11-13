<html>
<head>

    <meta charset="utf-8">
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>
    <div class="topform" id="topform">
        <form action="edit_student_accomodation.php" method="get">
            <label for="btn1">
                <input type="text" id= "t1" name="t1" class="t1" placeholder="Enter student id number" required>
            </label>
            <input type="submit" class="btn1" value="submit" onclick= "displaydiv()" >

        </form>
        <script>
            function displaydiv() {
                mydiv = document.getElementById('editform');
                mydiv.style.display = 'block';

            }
        </script>
    </div>
    <div class="editform" id="editform">

        <?php
        include '../connection.php';
        include  'inc/edit_accommodation_inc.php';
        $con = connect();
        edit_accommodation($con);
        ?>
    </div>
      <?php
         updateroom($con);

      ?>


</body>
</html>