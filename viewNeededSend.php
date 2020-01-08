<!-- 查看所有商品 -->
<?php
session_start();
require("ordModel.php");
// 確認登入
if (!isSet($_SESSION["loginProfile"])) {
  header("Location: loginUI.php");
}
if ($_SESSION['loginProfile']['uRole'] != 0) {
	header("Location: main.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Needed Send Item UI</title>
</head>
<body>
<p>View Needed Send Item UI</p>
<hr>
<!-- addItem & addProduct -->
<table width="200" border="1">
  <tr>
  <td>id</td>
    <td>name</td>
    <td>date</td>
    <td>place</td>
    <td>-</td>
  </tr>
<?php
//*$result=getPrdList(); // ordModel.php
while ($rs=mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $rs['prdID'] . "</td>";
    echo "<td>". $rs['name'] . "</td>";
    echo "<td>" . $rs['price'] . "</td>";
    echo "<td>" . $rs['detail'] . "</td>";
}
?>
</table>
<hr>
<a href="log.php">Back to log page</a>
</body>
</html>
