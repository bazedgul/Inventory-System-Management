<?php include "../user/connection.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADMIN Login - BG Inventory Management System</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-login.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <div id="loginbox">
        <form name="form1" class="form-vertical" action="" method="post">
            <div class="control-group normal_text">
                <h3>Admin Login Up</h3>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text"
                            placeholder="Username" name="username" required/>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password"
                            placeholder="Password" name="password" required/>

                    </div>
                </div>
            </div>
            <div class="form-actions">
                <center>
                    <input type="submit" name="submit1" value="Login" class="btn btn-success">
                </center>

            </div>
        </form>

        <?php
        if (isset($_POST['submit1'])) {
            $username = mysqli_escape_string($link, $_POST['username']);
            $password = mysqli_escape_string($link, $_POST['password']);

            $count = 0;
            $res = mysqli_query($link, "SELECT  * FROM user_register
            WHERE username='$username' && password='$password' && role='admin' && status = 'active'");
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                ?>
                <script type="text/javascript">
                    window.location = "demo.php";
                </script>
                <?php
            } else {
                ?>
                <div class="alert alert-danger">
                   Invalid Username or Password...
                </div>
            <?php
            }
        }
        ?>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/matrix.login.js"></script>
</body>

</html>