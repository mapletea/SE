<!-- 客戶登入後主頁面 -->
<?php
session_start();
// 確認是否已登入
if (!isSet($_SESSION["loginProfile"] )) {
	header("Location: loginUI.php");
}
require("prdModel.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin page</title>
</head>
<body>
<p>This is the MAIN page [<a href="logout.php">logout</a>]</p>
<hr>
<!-- 個人資訊 -->
<?php
	echo "Hello ", $_SESSION["loginProfile"]["uName"],
	", Your ID is: ", $_SESSION["loginProfile"]["uID"],
	", Your Role is: ", $_SESSION["loginProfile"]["uRole"],"<HR>";
	$result=getPrdList(); // prdModel.php
?>
<!-- showOrders -->
<a href="showOrders.php">List My Orders</a><hr>
<!-- showProduct & addProduct -->
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>name</td>
    <td>price</td>
    <td>+</td>
  </tr>
<?php
while ($rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['prdID'] . "</td>";
	echo "<td>{$rs['name']}</td>";
	echo "<td>" , $rs['price'], "</td>";
	echo "<td><a href='addToCart.php?prdID=" , $rs['prdID'] , "'>Add</a></td></tr>";
}
?>
</table>
<!-- showCartDetail and go checkout page -->
<a href="showCartDetail.php">Checkout cart</a><hr>
</body>
</html>
