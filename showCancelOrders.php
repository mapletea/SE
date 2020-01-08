<!-- 列出歷史order -->
<?php
session_start();
// 確認是否已登入
if (!isSet($_SESSION["loginProfile"])) {
	header("Location: loginUI.php");
}
require("orderModel.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Show Order</title>
</head>
<body>
<p>This is your order list you can cancel</p>
<hr>
<?php
	//echo $_SESSION["loginProfile"]['uID'];
	$result=getCancelOrderList($_SESSION["loginProfile"]['uID']); // orderModel.php
?>
<table width="200" border="1">
  <tr>
    <td>order ID</td>
    <td>Date</td>
    <td>Status</td>
    <td>Cancel</td>
  </tr>
<?php
while ($rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['ordID'] . "</td>";
	echo "<td>" . $rs['orderDate'] . "</td>";
    echo "<td>" , $rs['status'], "</td>";
    echo "<td><a href='removeOrder.php?ordID=" . $rs['ordID'] . "'>Cancel</a></td>";
    echo "</tr>";
}
?>
</table>
<hr>
<a href="main.php">OK</a>
</body>
</html>
