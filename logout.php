<?php
require_once 'requirements.php';
if(isset($_SESSION['email'])){
    unset($_SESSION['email']);
    RedirectAfterMsg("Log out succesfull","login.php");
}
?>