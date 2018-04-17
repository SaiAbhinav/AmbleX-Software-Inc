<?php
//place this code on top of all the pages which you need to authenticate

//--- Authenticate code begins here ---
session_start();
//checks if the login session is true
if(!$_SESSION['username']){
header("location:index.php");
}
$username = $_SESSION['user'];

// --- Authenticate code ends here ---

include ('config.php');
$id = $_POST["id"]; 
$text = $_POST["text"];
$left = $_POST["left"]; 
$top = $_POST["top"]; 
if($text) {
$success_update = mysqli_query($connection,"UPDATE sticky_notes SET message='$text' WHERE username='$username' AND id='$id' ");
}
if($top || $left) {
$success_update = mysqli_query($connection,"UPDATE sticky_notes SET _left='$left', _top='$top' WHERE username='$username' AND id='$id' ");
}

?>