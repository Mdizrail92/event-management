<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plugins/css/mdb.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


    <link rel="stylesheet" href="css/query.css">
    <title>Query</title>
</head>

<?php
 require_once 'requirements.php';
?>

<body>


<!-- deleting a message -->
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM query WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Message Deleted Successfully');</script>";
            $_POST['delete'] = null;
            $_SERVER['REQUEST_METHOD']=null;
            unset($_POST['delete']);
            unset($_SERVER['REQUEST_METHOD']);
        } else {
            echo "<script>alert('Some Error Occured while Deleting Event');</script>";
        }
    }
    ?>



    <header>

        <h2 style="text-align: center;">Queries</h2>
    </header>
    <div class="spacer" style="height:10px;"></div>
   
    <table class="table">
        
           
        <thead class="black white-text">
            <tr>

                <th scope="col">Name</th>

                <th>Email ID</th>

                <th>Message</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>



            <div class="table-content" style="font-size: large;">
           


            <?php
 // fetching from event table
 $sql = "SELECT * FROM `query`";
 $query = mysqli_query($conn, $sql);
 if (!mysqli_num_rows($query)) {
   echo '<h3>No Records Found</h3>';
 } else {


  while($query_row = mysqli_fetch_assoc($query)){
    ?>
  <tr>

<td scope="row"><?php echo $query_row['name'] ?></td>

<td><?php echo $query_row['email'] ?></td>
<td>
    <div id="summary">
        <p class="collapse" id="collapse1">
        <?php echo $query_row['message'] ?> </p>
        <a class="collapsed" data-toggle="collapse" href="#collapse1
        " aria-expanded="false"
            aria-controls="collapseSummary"></a>
    </div>
</td>

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $query_row['id']; ?>">
                            <td><button type="submit" name="delete" class="btn btn-danger">Delete</button></td>
                        </form>
                    
                

</tr>
  <?php
  }
 }
  ?>            
                

            </div>
        </tbody>
      
        
    
    </table>
    <div class="spacer" style="height:10px;"></div>

    <div class="footer">

        <div class="spacer" style="height:2px;"></div>
        <a href="index.html"><i class="fas fa-home"></i></a>
        <div class="spacer" style="height:0px;"></div>
        <h5>Event-management 2022-23 &copy; All Rights Reserved</h5>
        <div class="spacer" style="height:1px;"></div>
    </div>
<script type="text/javascript">
   function addTextArea(){
            var div = document.getElementById('reply');
            div.innerHTML += "<textarea  rows='5' cols='20' name='new_quote[]' />";
            var div1 = document.getElementById('send');
            div1.innerHTML += `<button class="btn btn-primary">Send</button>`;
            el=document.getElementById("foo");
           el.remove();
   }
   
        
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>