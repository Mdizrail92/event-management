<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plugins/css/mdb.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


    <link rel="stylesheet" href="css/admin.css">
    <title>Manage Event</title>
</head>
<body>
    <?php
    require_once 'requirements.php';
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM event WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Event Deleted Successfully');</script>";
            $_POST['delete'] = null;
            $_SERVER['REQUEST_METHOD']=null;
            unset($_POST['delete']);
            unset($_SERVER['REQUEST_METHOD']);
        } else {
            echo "<script>alert('Some Error Occured while Deleting Event');</script>";
        }
    }
    ?>
    <div class="spacer" style="height:10px;"></div>
    <header>

        <h2 style="text-align: center;">Manage Events</h2>
    </header>
    <div class="spacer" style="height:10px;"></div>

    <table class="table">
        <thead class="black white-text">
            <tr>
                <th scope="col">Title</th>
                <th>Event date</th>
                <th>Event time</th>
                <th>Event Description</th>
                <th>Fees</th>
                <th>Speaker name</th>
                <th>Speaker Description</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM `event` ORDER BY `date` DESC";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="table-content" style="font-size: large;">
                    <tr>
                        <th scope="row"><?php echo $row['title']; ?></th>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['from_time']; ?></td>
                        <td>
                            <div id="summary">
                                <p class="collapse" id="collapseSummary"><?php echo $row['description']; ?> </p>
                                <a class="collapsed" data-toggle="collapse" href="#collapseSummary" aria-expanded="false" aria-controls="collapseSummary"></a>
                            </div>
                        </td>
                        <td>&#8377; <?php echo $row['fees']; ?></td>
                        <td><?php echo $row['speaker_name']; ?></td>
                        <td>
                            <div id="s-description">
                                <p class="collapse" id="collapseS"><?php echo $row['speaker_description']; ?> </p>
                                <a class="collapsed" data-toggle="collapse" href="#collapseS" aria-expanded="false" aria-controls="collapseSummary"></a>
                            </div>
                        </td>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <td><button type="submit" name="delete" class="btn btn-danger">Delete</button></td>
                        </form>
                    </tr>
                </div>
            <?php
            }
            ?>
        </tbody>

    </table>
    <div class="spacer" style="height:30px;"></div>
    <div class="container text-center">
        <button type="button" class="btn btn-primary">Add Event</button>
    </div>
    </div>
    <div class="spacer" style="height:10px;"></div>

    <div class="footer">

        <div class="spacer" style="height:2px;"></div>
        <a href="index.html"><i class="fas fa-home"></i></a>
        <div class="spacer" style="height:0px;"></div>
        <h5>Copyright &copy; CSI-SAKEC 2020-21 All Rights Reserved</h5>
        <div class="spacer" style="height:1px;"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>