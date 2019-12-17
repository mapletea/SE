<?php
session_start();

require("userModel.php");
$ID=$_POST['ID'];
$pwd=$_POST['PWD'];

//echo getUserStatus('user1'), $br;
//if (addUser( 'testID','321','New User',999)) {
$userProfile = getUserProfile($ID, $pwd);
if ($userProfile) {
	//echo "Login Success! <br>";
	$_SESSION['loginProfile'] = $userProfile;
	header("Location: main.php");
} else {
	echo "login failed <br>";
	$_SESSION['loginProfile'] = NULL;
	echo "<a href='loginUI.php'>Login again</a>";
}
?>