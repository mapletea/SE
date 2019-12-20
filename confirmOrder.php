<!-- 列出購物清單，並確認購買 -->
<?php
session_start();
// 確認是否已登入
if (!isSet($_SESSION["loginProfile"] )) {
	header("Location: loginUI.php");
}
require("orderModel.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm Order</title>
</head>
<body>
<p>This is the Shopping Cart Detail 
[<a href="logout.php">logout</a>]
</p>
<hr>
<!-- 個人資訊 -->
<?php
	echo "Hello ", $_SESSION["loginProfile"]["uName"],
	", Your ID is: ", $_SESSION["loginProfile"]["uID"],
	", Your Role is: ", $_SESSION["loginProfile"]["uRole"],"<HR>";
	$result=getCartDetail($_SESSION["loginProfile"]["uID"]); // orderModel.php
?>
<!-- showOrders -->
<a href="showOrders.php">List My Cart Items</a><hr>
<table border="1">
  <tr>
    <td>id</td>
    <td>Prd Name</td>
    <td>price</td>
    <td>Quantity</td>
    <td>Amount</td>
  </tr>
<?php
$total=0;
while ($rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['serno'] . "</td>";
	echo "<td>{$rs['name']}</td>";
	echo "<td>" , $rs['price'], "</td>";
	echo "<td>" , $rs['quantity'], "</td>";
	$total += $rs['quantity'] *$rs['price'];
	echo "<td>" , $rs['quantity'] *$rs['price'] , "</td><tr/>";
}
echo "<tr><td>Total: </td><td colspan='4'>$total</td></tr>";
?>
</table>
<hr>
<!-- checkout -->
<form action="checkoutControl.php" method="post">
請輸入寄送地址：<input type="text" name="address">
<input type="submit"><a href="main.php"><br>No, keep shopping</a>
</form>
</body>
</html>