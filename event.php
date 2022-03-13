<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   	<link rel="stylesheet" href="css/event.css">
	<title>Event</title>

  <?php
require_once 'requirements.php';
?>



</head>
<body>

<?php
  $id=$_GET['id'];
if(!isset($_GET['id'])){
  RedirectAfterMsg('Invalid Event Id','index.php');
  die();
}
  // fetching from event table
  $sql = "SELECT * FROM `event` WHERE `id`='$id'";
  $query = mysqli_query($conn, $sql);
  if (!mysqli_num_rows($query)) {
    echo '<h3>No Records Found</h3>';
  } else {
    $event_row = mysqli_fetch_assoc($query);
  }
  ?>

	<div class="spacer" style="height:20px;"></div>
    <div class="container ">
            <h1 ><?php echo $event_row['title']; ?></h1>
            <div class="spacer" style="height:20px;"></div>
<img class="main-img" src="images/<?php echo $event_row['banner'];?>" alt="">
<div class="spacer" style="height:35px;"></div>

<div class="event-header">
    <div class="spacer" style="height:20px;"></div>
    <h2><span id="demo" style="color: rgb(145, 0, 0);">8 </span><span style="color: rgb(120 134 5)s;">Days <span style="color: rgb(0, 99, 16);">Go</span></h2>
<h1><?php echo $event_row['title']; ?></h1>
<h4><span style="color: #a10f95;"><?php echo $event_row['date']; ?> <span style="color: rgb(173, 173, 0);"><?php echo $event_row['from_time']; ?></span> to <span style="color: rgb(173, 173, 0);"><?php echo $event_row['to_time']; ?></span></h4>
<div class="spacer" style="height:20px;"></div>
<a href="<?php echo $event_row['registration_link'] ?>" action="" type="button" class="btn btn-primary">Register Now</a>


<div class="spacer" style="height:40px;"></div>
</div>
<div class="row">
    <div class="spacer" style="height:40px;"></div>
    <p class="description"><?php echo $event_row['description']; ?></p>
</div>

<div class="spacer" style="height:90px;"></div>
<div class="row">

    <div class="col-sm-6">
        <div class="spacer" style="height:150px;"></div>
        <div class="know-more">
<h3><b style="color: #941616;">Registration Fees</b>  <i class="fas fa-dollar-sign"></i></h3>
<div class="spacer" style="height:20px;"></div>
<p>Fess – <?php echo $event_row['fees']; ?><br>
    <div class="spacer" style="height:50px;"></div>
    <hr class="supp1">
  <div class="spacer" style="height:50px;"></div>         
<h3><b style="color: #729416;">For Any Queries </b><i class="fas fa-question-circle"></i></h3>
<br>
<div class="spacer" style="height:0px;"></div>
<p><b>Contact:</b>
<br>
<br>
<?php echo $event_row['coordinator_name']; ?> - <?php echo $event_row['coordinator_number']; ?><br>
</p>
</div>
    </div>
    <div class="col-sm-6">
        <div class="speakers">
          
        <h1>Speakers</h1>
        <hr class="supp">
<br>

<!-- Card Regular -->
<div class="card card-cascade">

    <!-- Card image -->
    <div class="view view-cascade overlay">
      <img class="card-img-top" src="images/<?php echo $event_row['speaker_img'];?>" alt="Card image cap">
      <a>
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>
  
  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">

    <!-- Title -->
    <h4 class="card-title"><strong><?php echo $event_row['speaker_name']; ?></strong></h4>
    <!-- Subtitle -->
    <h6 class="font-weight-bold indigo-text py-2"><?php echo $event_row['speaker_description']; ?></h6>
    <!-- Text -->
    <p class="card-text">
      <?php echo $event_row['speaker_description']; ?>
    </p>
    <div class="social-sites">
					
   <a href=""><img class="social" src="images/instagram (1).png" alt="instagram"></a>  
   <a href=""><img class="social"  src="images/linkedin1.png" alt="linkedin"></a>
   <a href=""> <img class="social"  src="images/facebook.png" alt="facebook"></a>  
      </div>
    </div>
    </div>
</div>
</div>
    </div>
    </div>

    <div class="spacer" style="height:90px;"></div>
    <div class="container-fluid">
    <div class="copyright">
      <div class="spacer" style="height:8px;"></div>
     <a href="index.html"><i class="fas fa-home"></i></a> 
      <div class="spacer" style="height:10px;"></div>
  <h5>Copyright &copy; Event- management 2021-22 All Rights Reserved</h5>
  <div class="spacer" style="height:5px;"></div>     

</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>

</body>
</html>