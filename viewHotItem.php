<!-- 查看 -->
<?php
session_start();
require("prdModel.php");
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
<title>View Hot Item UI</title>
</head>
<body>
<p>View Hot Item UI</p>
<hr>
<!-- addItem & addProduct -->
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>name</td>
    <td>quantity</td>
    <td>total sold</td>
  </tr>
<?php
$result=getHotPrdList(); // prdModel.php
while ($rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['serno'] . "</td>";
  echo "<td>{$rs['name']}</td>";
  echo "<td>{$rs['quantity']}</td>";
	echo "<td>" , $rs['total'] , "</td>";
}
?>
</table>
<hr>
<a href="admin.php">Back to admin page</a>
</body>
</html>
