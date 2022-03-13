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
  Notify("Database connectivity failed contact admin");
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
