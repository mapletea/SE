<?php
session_start();

require("userModel.php");
$ID=$_POST['ID'];
$pwd=$_POST['PWD'];
$name=$_POST['NAME'];

if (!empty($ID) && !empty($pwd) && !empty($name)){
    if (addUser($ID, $pwd, $name)==1){ // userModel.php
    	echo "Register Success! <br>";
    	echo "<a href='loginUI.php'>Please login.</a>";
    } else {
    	echo "Register failed.<br>請換個ID!<br/>";
    	echo "<a href='registerUI.php'>Register again.</a>";
    }
} else {
	echo "ID, Password, Name 不得有一為空<br/>";
	echo "<a href='registerUI.php'>Register again.</a>";
}
?>