<?php
session_start();

require("userModel.php");
$ID=$_POST['ID'];
$pwd=$_POST['PWD'];
$name=$_POST['NAME'];

//echo getUserStatus('user1'), $br;
//if (addUser( 'testID','321','New User',999)) {
if (isSet($ID) && isSet($pwd) && isSet($name)){
    if (addUser($ID, $pwd, $name)==1){ // userModel.php
    	echo "Register Success! <br>";
    	echo "<a href='loginUI.php'>Please login.</a>";
    	//header("Location: login.php");
    } else {
    	echo "Register failed.<br>";
    	//$_SESSION['loginProfile'] = NULL;
    	echo "<a href='registerUI.php'>Register again.</a>";
    }
} else {
	echo "ID, Password, Name 不得有一為空<br/>";
	echo "<a href='registerUI.php'>Register again.</a>";
}
?>