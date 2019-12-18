<?php
session_start();
if (!isSet($_SESSION["loginProfile"] )) {
	header("Location: loginUI.php");
}
require("orderModel.php");
$ordID=(int)$_GET['id'];

if (shipout($ordID)) {
	echo "訂單已處理";
} else {
	echo "sorry, internal error, please try again..";	
}
?><br/>
<a href="admin.php">OK</a>
