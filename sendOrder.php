<!-- 加入購物車頁面 -->
<?php
session_start();
// 確認是否已登入
if (!isSet($_SESSION["loginProfile"] )) {
	header("Location: loginUI.php");
}
if ($_SESSION['loginProfile']['uRole'] != 0) {
	header("Location: main.php");
}
require("orderModel.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send</title>
</head>
<body>
<?php
$uID=$_SESSION['loginProfile']['uID'];
$ordID=(int)$_GET['ordID'];

arrive($uID,$ordID); // orderModel.php
?>
Item arrive!! <br>
<a href="log.php">Back to log Page</a>

</body>
</html>