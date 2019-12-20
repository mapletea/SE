<!-- 查看所有商品 -->
<?php
session_start();
require("prdModel.php");
// 確認登入
if (!isSet($_SESSION["loginProfile"])) {
	header("Location: loginUI.php");
	if ($_SESSION['loginProfile']['uRole'] != 9) {
		header("Location: main.php");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Item UI</title>
</head>
<body>
<p>View Item UI</p>
<hr>
<!-- addItem & addProduct -->
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>name</td>
    <td>price</td>
    <td>detail</td>
    <td>modify</td>
    <td>-</td>
  </tr>
<?php
$result=getPrdList(); // prdModel.php
while ($rs=mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $rs['prdID'] . "</td>";
    echo "<td>". $rs['name'] . "</td>";
    echo "<td>" . $rs['price'] . "</td>";
    echo "<td>" . $rs['detail'] . "</td>";
    echo "<td><a href='modifyItem.php?prdID=" , $rs['prdID'] , "&name=" , $rs['name'] , "&price=" , $rs['price'], "&detail=" , $rs['detail'], "'>Modifiy</a></td>";
    echo "<td><a href='removeItem.php?prdID=" , $rs['prdID'] , "'>Remove</a></td>";
}
?>
</table>
<hr>
<a href="admin.php">Back to admin page</a>
<?php 
echo "<a href='addItemUI.php?'>Add</a>";
?>
</body>
</html>
