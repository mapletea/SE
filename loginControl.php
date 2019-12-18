<!-- 是否能夠登入 -->
<?php
session_start();
require("userModel.php");
$ID=$_POST['ID'];
$pwd=$_POST['PWD'];

$userProfile = getUserProfile($ID, $pwd); // userModel.php
if ($userProfile) {
	$_SESSION['loginProfile'] = $userProfile;
	if ($_SESSION['loginProfile']['uRole']==9) {
		header("Location: admin.php");
	} else {
		header("Location: main.php");
	}
} else {
	echo "login failed <br>";
	$_SESSION['loginProfile'] = NULL;
	echo "<a href='loginUI.php'>Login again</a>";
}
?>