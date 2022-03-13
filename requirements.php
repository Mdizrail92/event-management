<?php
//To display errors (Use this if the php.ini settings is not set)
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

define('hostname', 'localhost');
define('username','root');
define('password','');
define('database','event-management');

$conn = mysqli_connect(hostname, username, password, database);

if (!$conn) {
  Notify("Database connectivity failed contat admin");
  die();
}


// Start session 
if(!session_id()) session_start(); 
 

function Notify($message)
{
  echo "<SCRIPT>
        alert('$message');
    </SCRIPT>";
}

function RedirectAfterMsg($message, $location)
{
  Notify($message);
  echo "<SCRIPT>window.location = '$location';</SCRIPT>";
}

function UploadImage($dir, $fileName)
{
  $target_dir = $dir;/*directory where file will get uploaded*/
  $target_file = $target_dir . basename($_FILES[$fileName]['name']);
  $fileInfo = array(
    "msg" => null,
    "uploadOk" => true,
    "fileName" => ""
  );
  /*Errors that can occur while processing the file it will get stored in ($_FILES[$fileName]['error']*/
  $phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
  );
  //validations
  /*
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  // Allow certain file formats
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $fileInfo["msg"] .= "Only jpg,jpeg and png File Formats are accepted";
    $fileInfo["uploadOk"] = false;
  }
  */
  //Optional validations
  /*
// Check file size
if ($_FILES[$fileName]["size"] > 500000) {
  echo "Sorry, your file is too large.";
}
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
}
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES[$fileName]["tmp_name"]);
  if ($check !== false) {
    $fileInfo["msg"] .= "The uploaded file is not an image";
    $fileInfo["uploadOk"] = false;
  }
*/
  // Check if $uploadOk is set to 0 by an error
  if ($fileInfo['uploadOk']) {
    if (move_uploaded_file($_FILES[$fileName]['tmp_name'], $target_file)) {
      $fileInfo['fileName'] = htmlspecialchars(basename($_FILES[$fileName]['name']));
    } else {
      $fileInfo['uploadOk'] = false;
      $error = $_FILES[$fileName]['error'];
      $fileInfo['msg'] = $phpFileUploadErrors[$error];
    }
  }

  return $fileInfo;
}

?>