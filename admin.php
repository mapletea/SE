<!-- 管理員登入後主頁面 -->
<?php
session_start();
require("orderModel.php");
// 確認登入
if (!isSet($_SESSION["loginProfile"])) {
	header("Location: loginUI.php");
}
if ($_SESSION['loginProfile']['uRole'] != 9) {
	header("Location: main.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin page</title>
</head>
<body>
<p>This is the Admin page 
[<a href="logout.php">logout</a>]
</p>
<hr>
<?php
	echo "Hello ", $_SESSION["loginProfile"]["uName"],
	", Your ID is: ", $_SESSION["loginProfile"]["uID"],
	", Your Role is: ", $_SESSION["loginProfile"]["uRole"],"<HR>";
	$result=getConfirmedOrderList(); //orderModel.php
?>
<!-- showOrders -->
<a href="viewItem.php">List All Item</a><hr>
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>name</td>
    <td>date</td>
    <td>+</td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['ordID'] . "</td>";
	echo "<td>{$rs['uID']}</td>";
	echo "<td>" , $rs['orderDate'], "</td>";
	echo "<td><a href='showOrderDetail.php?ID=" , $rs['ordID'] , "'>ShowDetail</a></td></tr>";
}
?>
</table>
</body>
</html>
