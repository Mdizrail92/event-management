<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
	<link rel="stylesheet" href="css/signup.css">
	<title>CSI-SAKEC</title>
</head>
<?php
require_once 'requirements.php';
?>
<body>
    
      <!-- sinUp PHP starts here -->
      <?php
      if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['signup'])) {
          //optionally checking all the input fields are not empty because html can get manipulated
          unset($_POST['signup']);
          if (!(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirmPassword']))) {
              $name = $_POST['name'];
              $email = $_POST['email'];
              $sql = "SELECT * FROM `users` WHERE `email`='$email'";
              $result = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($result);
              if (!$count) {
                  $password = $_POST['password'];
                  $confirmPassword = $_POST['confirmPassword'];
                  if ($password == $confirmPassword) {
                      // insert into database
                      $sql = "INSERT INTO `users`(`name`, `password`, `email`)
                                         VALUES ('$name','$password','$email')";
                      $result = mysqli_query($conn, $sql);
                      if ($result) {
                          echo "<div class='alert alert-danger'>
              <strong>Success!</strong> You have been registered successfully.
              </div>";
                          RedirectAfterMsg("You have been registered successfully.",'index.php');
                      } else {
                          echo "<div class='alert alert-danger'>
              <strong>Error!</strong> Some Error Occured
              </div>";
                      }
                  } else {
                      echo "<div class='alert alert-danger'>
          <strong>Error!</strong> Password and Confirm Password does not match.
          </div>";
                  }
              } else if ($count) {
                  echo "<div class='alert alert-danger'>
      <strong>Error!</strong> User Exist <br> Contact admin if you think this is a mistake.
      </div>";
              }
          } else {
              echo "<div class='alert alert-danger'>
  <strong>Error!</strong> inputs cannot be empty.
  </div>";
          }
      }
      ?>







    <div class="container text-center">
        	
	<div class="spacer" style="height:50px;"></div>
    <div id="user-login">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <p class="login"><b>WELCOME !</b></p> 
            <div class="spacer" style="height:30px;"></div>
           
         <i class="fas fa-file-signature" style="font-size:30px;"></i>
         <input name="name" data-toggle="tooltip" data-placement="bottom" title="Your name" id="text" type="text" class="g" placeholder="Name" required/></br>
         
        <i class="far fa-envelope" style="font-size:30px;"></i>
        <input name="email" data-toggle="tooltip" data-placement="bottom" title="Type your email" id="text" type="text" class="g" placeholder=" Email" required/></br>
       
        <i class="fas fa-lock" style="font-size:30px;"></i>
        <input name="password" data-toggle="tooltip" data-placement="bottom"   title="8 characters minimum" id="pass" type="password" class="g" placeholder=" Create Password" required/></br>
        
        <i class="fas fa-lock" style="font-size:30px;"></i>
        <input name="confirmPassword" data-toggle="tooltip" data-placement="bottom"   title="8 characters minimum" id="pass" type="password" class="g" placeholder=" Create Password" required/></br>
        
        <!-- <input class="me" type="checkbox">Remember me</br> -->
        <button class="btn btn-primary" name="signup">Sign Up <i class="fas fa-user-plus "></i></button></br></br>
    </form>

<p>Existing User <a style="color: rgb(168, 192, 212)"; href="login.php">Login</a></p>
<div class="spacer" style="height:30px;"></div>
    </div>
    </div>

    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script>
     $(document).ready(function () {
  //image height
  var winHeight = $(window).height();
  var winHeightImg = $(window).height();
  $('#user-login').css('height', winHeightImg);
	    }  )
</script>
</body>
</html>
