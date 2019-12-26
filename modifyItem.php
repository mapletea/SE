<!-- 修改商品 -->
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
<title>Modify Item</title>
</head>
<body>
<p>Modify Item UI</p>
<hr>
<table>
<form method="post" action="modifyControl.php?" >
  <tr>
    <td>id</td>
    <td>name</td>
    <td>price</td>
    <td>detail</td>
  </tr>
<?php
//$uID=$_SESSION['loginProfile']['uID'];
$prdID=(int)$_GET['prdID'];
$name=$_GET['name'];
$price=(int)$_GET['price'];
$detail=$_GET['detail'];
$_SESSION["prdID"] = $prdID;
$_SESSION["name"] = $name;
$_SESSION["price"] = $price;
$_SESSION["detail"] = $detail;
echo "<tr><td>" . $prdID . "</td>";
echo "<td>". $name . "</td>";
echo "<td>" . $price. "</td>";
echo "<td>" . $detail . "</td></tr>";
echo "<tr><td>" . $prdID . "</td>";
?>
<td><input type="text" name="name"></td>
<td><input type="text" name="price"></td>
<td><input type="text" name="detail"></td></tr>
<tr><td colspan='2'><a href="viewItem.php">Back to viewItem Page</a></td><td colspan='2'><input type="submit" value="送出"></td></tr>
</form>
</table>
</body>
</html>