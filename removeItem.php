<!-- 移出商品 -->
<?php
session_start();
// 確認登入
if (!isSet($_SESSION["loginProfile"])) {
	header("Location: loginUI.php");
}
if ($_SESSION['loginProfile']['uRole'] != 9) {
	header("Location: main.php");
}
require("prdModel.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Remove From Cart</title>
</head>
<body>
<?php
//$uID=$_SESSION['loginProfile']['uID'];
$prdID=(int)$_GET['prdID'];

removeItem($prdID); // prdModel.php
?>
Item Remove!! <br>
<a href="viewItem.php">Back to viewItem Page</a>

</body>
</html>