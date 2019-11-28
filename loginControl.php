<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Basic HTML Examples</title>
</head>
<body>
<p>This is login Control</p>
<hr>
<?php
require("userModel.php");
$ID=$_POST['ID'];
$pwd=$_POST['PWD'];
// echo getUserStatus('user1'), $br;
// if (addUser( 'testID','321','New User',999)) {
if (checkIDPWD($ID, $pwd)) {
	echo "Login Success!";
	$status = getUserStatus($ID);
	//Keep the login status
	//keep the user ID in session as a mark of login
	$_SESSION['uID'] = $ID;
	$_SESSION['status'] = $status;
	echo "<a href='main.php'>Goto Main Page</a>";
} else {
	echo "login failed";
	echo "<a href='loginUI.php'>Login again</a>";
}
?>

</body>
</html>
