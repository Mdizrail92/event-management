<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css'
        integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <link rel="stylesheet" href="css/login.css">
    <title>CSI-SAKEC</title>
</head>
<?php
require_once 'requirements.php';
?>
<body>
         <!-- Login starts -->

         <div class="form-container sign-in-container">
            <!-- Login PHP -->
                                       <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['loginbtn'])) {
                    unset($_POST['loginbtn']);
                    if (isset($_SESSION['email'])) {
                        echo "<div class='alert alert-danger'>
                    <strong>Error!</strong> You are already logged \n Please log out before logging to another account.
                    </div>";
                    } else if (!(empty($_POST['emailid']) || empty($_POST['password']))) {
                        $username = $_POST['emailid'];
                        $password = $_POST['password'];
                        $sql = "SELECT `email_id`, `password`,`name` FROM `ipr_users` WHERE `email_id`= '$username'";
                        $query = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($query);
                        if ($count) {
                            $rows = mysqli_fetch_assoc($query);
                            if ($rows['password'] == $password) {
                                $_SESSION['email'] = $username;
                                $_SESSION['user_name']=$rows['name'];
                                RedirectAfterMsg('Login Successfull','index.php');
                            } else {
                                echo "<div class='alert alert-danger'>
                        <strong>Error!</strong> Invalid Password.
                        </div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Invalid credentials <br> Account Does not exist .
                            </div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>
                <strong>Error!</strong> inputs empty found.
                </div>";
                    }
                }
            
                ?>



    <div class="container text-center">

        <div class="spacer" style="height:50px;"></div>
        <div id="user-login">
            <p class="login"><b>USER LOGIN</b></br></br><i class="fas fa-user-circle" style="font-size:80px;"></i></p>
            </br>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <i class="far fa-user-circle" style="font-size:30px;"></i>

                <input data-toggle="tooltip" data-placement="bottom" title="your username" id="text" type="text"
                    class="g" name="user" required="required" placeholder=" Username"></br>
                <i class="fas fa-lock" style="font-size:30px;"></i>
                <input data-toggle="tooltip" data-placement="bottom" title="your password" id="pass" type="password"
                    class="g" name="password"required="required" placeholder=" Input Password"></br>

                <input class="me" type="checkbox">Remember me</br>
                <button type="submit" value="submit" class="btn btn-primary">Login<iclass="fas fa-sign-in-alt"></i></button>
            </form>
            </br></br>
            <p>Don't have an account</p> <br>
            <p><a style="color: rgb(168, 192, 212);" href="signup.html">Sign Up</a></p>
           
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            //image height
            var winHeight = $(window).height();
            var winHeightImg = $(window).height() - 50;
            $('#user-login').css('height', winHeightImg);
        })
    </script>
</body>

</html>