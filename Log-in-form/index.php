<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In Form</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
     <div class="top-bar-heading">
        <h1>Hall Management System</h1>
        <h2>University of Sumanadasa</h2>
     </div>

    <div class="container" id="log-in-form">

        <div class="heading">
            <h1>Log In Your Account</h1>
        </div>
        <form action="../inc/login.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username or e-mail" required>
            </div>
            <div class="form-group">
                <select class="form-control" id="mem_type" name="mem_type" required >
                    <option value="Admin">Admin</option>
                    <option value="Student">Student</option>
                    <option value="Employee">Employee</option>
                </select>
            </div>
            <div class="form-group" >
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password" required>
            </div>
            <div class="form-group form-group-btn">
                <button type="submit" class="btn btn-success btn-lg" >Log In</button>
            </div>
            <div class="message">
                <span id="msg">
                   <h3>
                        <?php
                        //*if( $_SERVER['HTTP_REFERER']!='http://localhost/University-Hall-Management-System/index.html' && $_SERVER['HTTP_REFERER']!='http://localhost/University-Hall-Management-System/Registration-form/index.html' )
                            //echo "Invalied Username,Userser type or Password";
                       // elseif($_SERVER['HTTP_REFERER']=='http://localhost/University-Hall-Management-System/Registration-form/index.html')
                          //  echo  " You have already registered to the System....Please Login"

                       // if ($_SESSION['validitity']=='invalied');
                          //  echo 'Invalied username or password'

                        ?>
                   </h3>
                </span>
            </div>
            <div class="clearfix"></div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me</label>
            </div>
        </form>
    </div>
</body>

</html>
