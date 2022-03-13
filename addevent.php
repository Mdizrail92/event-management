<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <link rel="stylesheet" href="css/membership.css" <?php echo time(); ?>>
    <title> Add Event</title>
</head>

<body style="background:#c4cbff">
    <?php
    require_once 'requirements.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addEvent'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $fromTime = $_POST['from_time'];
        $toTime = $_POST['to_time'];

        // $banner = base64_encode(addslashes(file_get_contents($_FILES['banner']['tmp_name'])));
        $banner = UploadImage("images/", "banner");

        $fees = $_POST['fees'];
        $speaker = $_POST['speaker_name'];
        
        $speakerImg = UploadImage("images/", "speaker_img");
        
        $speakerDesignation = $_POST['speaker_designation'];
        $speakerDescription = $_POST['speaker_description'];
        $coordinatorName= $_POST['coordinator_name'];
        $coordinatorContact = $_POST['coordinator_contact'];
        $regLink = $_POST['reg_link'];
        if ($speakerImg['uploadOk'] || $banner['uploadOk']) {
            $banner = $banner['fileName'];
            $speakerImg = $speakerImg['fileName'];
            // $speakerImg = base64_encode(addslashes(file_get_contents($_FILES['speaker_img']['tmp_name'])));

            $sql = "INSERT INTO `event` (`title`, `description`, `banner`, `date`, `from_time`, `to_time`, `fees`, `speaker_img`,`speaker_name`, `speaker_designition`, `speaker_description`, `coordinator_name`, `coordinator_number`, `registration_link`)
                             VALUES ('$title', '$description', '$banner', '$date', '$fromTime', '$toTime', '$fees','$speakerImg', '$speaker', '$speakerDesignation', '$speakerDescription','$coordinatorName','$coordinatorContact', '$regLink')";

            $query = mysqli_query($conn, $sql);
            if ($query) {
                Notify("Event Added Successfully)");
            } else {
                Notify("Some Error Occured in Adding Event");
            }
        }else{
            Notify("Error uploading image : ".$banner['error']." ".$speakerImg['error']);
        }
    }
    ?>
    <div class="spacer" style="height:30px;"></div>
    <h2>Add a new event</h2>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <div class="container text-left">
            <div class="spacer" style="height:50px;"></div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="labels">
                        <label for="rnumber">Event Title :</label>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="texts">
                        <input type="text" id="title" name="title" placeholder="Title" required>
                    </div>
                </div>
            </div>
            <div class="spacer" style="height:40px;"></div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="labels">
                        <label for="banner-img">Banner Image :</label>
                    </div>
                </div>
                <div class="col-sm-7">
                    <input type="file" id="img" name="banner" required>
                </div>
            </div>
            <div class="spacer" style="height:40px;"></div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="labels">
                        <label for="rnumber"> Date :</label>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="texts">
                        <input type="date" id="date" name="date" required>
                    </div>
                </div>
            </div>
            <div class="spacer" style="height:40px;"></div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="labels">
                        <label for="rnumber"> From Time :</label>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="texts">
                        <input type="time" id="time" name="from_time" required>
                    </div>
                </div>
            </div>
            <div class="spacer" style="height:40px;"></div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="labels">
                        <label for="rnumber"> To Time :</label>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="texts">
                        <input type="time" id="time" name="to_time" required>
                    </div>
                </div>
            </div>
            <div class="spacer" style="height:40px;"></div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="labels">
                        <label for="rnumber"> Event Description :</label>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="texts">
                        <textarea name="description" data-toggle="tooltip" data-placement="bottom" title="Any Queries? Write us " type="text-area" placeholder="Event Description" class="form-control" rows="4" columns="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="spacer" style="height:50px;"></div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="labels">
                        <label for="rnumber">Fees :</label>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="texts">
                        <label for="appt">&#8377;</label>
                        <input type="text" id="title" name="fees" placeholder="Fees " required>
                    </div>
                </div>
            </div>

            <div class="spacer" style="height:40px;"></div>
            <div id="speaker">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="labels">
                            <label for="banner-img"> Speaker Name : </label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="texts">
                            <input type="text" id="title" name="speaker_name" placeholder="Speaker Name" required>
                        </div>
                    </div>
                </div>
                <div class="spacer" style="height:40px;"></div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="labels">
                            <label for="banner-img"> Speaker Designition : </label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="texts">
                            <input type="text" id="title" name="speaker_designation" placeholder="Speaker Name" required>
                        </div>
                    </div>
                </div>
                <div class="spacer" style="height:40px;"></div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="labels">
                            <label for="banner-img"> Speaker Image :</label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <input type="file" id="img" name="speaker_img" required>
                    </div>
                </div>
                <div class="spacer" style="height:40px;"></div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="labels">
                            <label for="rnumber"> Speakers Description :</label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="texts">
                            <textarea name="speaker_description" data-toggle="tooltip" data-placement="bottom" title="Any Queries? Write us " type="text-area" placeholder="Speakers Description" class="form-control" rows="4" columns="3" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="spacer" style="height:40px;"></div>
            <div id="speaker">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="labels">
                            <label for="banner-img"> Co-ordinator Name : </label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="texts">
                            <input type="text" id="title" name="coordinator_name" placeholder="Co-ordinator Name" required>
                        </div>
                    </div>
                </div>
                <div class="spacer" style="height:40px;"></div>
            <div id="speaker">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="labels">
                            <label for="banner-img"> Co-ordinator Contact : </label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="texts">
                        <input type="tel" name="coordinator_contact" placeholder="888 888 8888" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" maxlength="10"  required/>
                        </div>
                    </div>
                </div>
                <div class="spacer" style="height:40px;"></div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="labels">
                            <label for="reg_link"> Registration Link :</label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <input type="url" name="reg_link" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer" style="height:40px;"></div>
        <button name="addEvent" class="btn btn-primary">Sumbit</button>
        <div class="spacer" style="height:40px;"></div>
    </form>

    <div class="footer">
        <div class="spacer" style="height:2px;"></div>
        <a href="index.html"><i class="fas fa-home"></i></a>
        <div class="spacer" style="height:0px;"></div>
        <h5>Copyright &copy; CSI-SAKEC 2020-21 All Rights Reserved</h5>
        <div class="spacer" style="height:1px;"></div>
    </div>
</body>

</html>