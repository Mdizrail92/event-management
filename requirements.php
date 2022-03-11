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
?>