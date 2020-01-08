<!-- 移出商品 -->
<?php
session_start();
// 確認登入
if (!isSet($_SESSION["loginProfile"])) {
	header("Location: loginUI.php");
}
require("orderModel.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Remove Order</title>
</head>
<body>
<?php
$uID=$_SESSION['loginProfile']['uID'];
$ordID=(int)$_GET['ordID'];

removeOrder($uID, $ordID); // ordModel.php
addBadguyPoint($uID); // ordModel.php
?>
Order Remove!! <br>
<a href="main.php">Back to MAIN Page</a>

</body>
</html>