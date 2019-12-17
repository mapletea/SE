<?php
session_start();

require("userModel.php");
$ID=$_POST['ID'];
$pwd=$_POST['PWD'];
$name=$_POST['NAME'];

//echo getUserStatus('user1'), $br;
//if (addUser( 'testID','321','New User',999)) {
if (addUser($ID, $pwd, $name)==1){
	echo "Register Success! <br>";
	echo "<a href='loginUI.php'>Please login.</a>";
	//header("Location: login.php");
} else {
	echo "Register failed.<br>";
	//$_SESSION['loginProfile'] = NULL;
	echo "<a href='registerUI.php'>Register again.</a>";
}


?>