<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="user_validation.js"></script>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/editstyles.css">
</head>

<body>
    <div class="container" id="registration-form">
        <div class="top-bar">
            <h1>Hall Management System</h1>
            <h2>University of Sumanadasa</h2>
        </div>
        <div class="frm">
            <h1>Edit Profile</h1>
            <form action="../inc/register.php" method="post" name="register_frm" id="register_frm">
                <div class="form-group">
                    <label for="index_number">Index Number:</label>
                    <input type="text" class="form-control" name="index_number" id="index_number"  placeholder="Enter Index Number" required>
                </div>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select class="form-control" id="gender" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="faculty">Faculty:</label>
                    <select class="form-control" id="faculty" name="faculty" x-placement="Faculty of Engineering" required>
                        <option value="Faculty of Engineering">Faculty of Engineering</option>
                        <option value="Faculty of Law">Faculty of Law</option>
                        <option value="Faculty of  Management">Faculty of  Management</option>
                        <option value="Faculty of Medicine">Faculty of Medicine</option>
                        <option value="Faculty of Science">Faculty of Science</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <select class="form-control" id="department" name="department" x-placement="Department of Accountancy">
                        <option value="Department of Accountancy">Department of Accountancy</option>
                        <option value="Department of Anatomy">Department of Anatomy</option>
                        <option value="Department of Civil Engineering">Department of Civil Engineering</option>
                        <option value="Department of Commercial Law	">Department of Commercial Law	</option>
                        <option value="Department of Computer Science and Engineering">Department of Computer Science and Engineering</option>
                        <option value="Department of Finance">Department of Finance</option>
                        <option value="Department of Food Science">Department of Food Science</option>
                        <option value="Department of Public & International Law ">Department of Public & International Law </option>
                        <option value="Department of Psychology">Department of Psychology</option>
                        <option value="Department of Surgery">Department of Surgery</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="academic_year">Academic Year:</label>
                    <input type="number" min="0" max="5" class="form-control" name="academic_year" id="academic_year" placeholder="Academic Year" required>
                </div>
                <div class="form-group">
                    <label for="accomodation_year">Expected year for Accomodation:</label>
                    <input type="number" min="2017" class="form-control" name="accomodation_year" id="accomodation_year" placeholder="Accomodation Year" required>
                </div>
                <div class="form-group-address">
                    <label for="email">Home Address:</label>
                   <ul>
                       <li><label for="street">Street/ Steet No.</label></li>
                       <li><label for="town">Town</label></li>
                       <li> <label for="city">City</label></li>

                   </ul>
                    <ul class="home_address">
                        <li><input type="text" class="form-control_2" name="street" id="street" placeholder="Enter Street"></li>
                        <li><input type="text" class="form-control_2" name="town" id="town" placeholder="Enter Town" required></li>
                        <li><input type="text" class="form-control_2" name="city" id="city" placeholder="Enter City " required></li>
                    </ul>
                </div>
                <div class="form-group">
                    <label for="contact_number1">Contact Numbers:</label><span id="message2"></span>
                    <ul>
                        <li><input type="tel" class="form-control_2" name="contact_number1" id="contact_number1" placeholder="Enter Contact Number-1" onkeyup="check_tel()" required></li>
                        <li><input type="tel" class="form-control_2" name="contact_number2" id="contact_number2" placeholder="Enter Contact Number-2" onkeyup="check_tel()"></li>
                    </ul>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label> <span id="message1"></span>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" onkeyup='check();' required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>  <span id="message"></span>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" onkeyup='check();' required>
                </div>

                <div class="form-group">
                    <button type="submit" id="submit_btn" name="submit_btn" class="btn btn-success btn-lg" onclick="">Submit</button>
                </div>

            </form>


        </div>

    </div>




</body>

</html>


