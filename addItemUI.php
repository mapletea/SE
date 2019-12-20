<!-- 新增商品介面 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Item UI</title>
</head>
<body>
<p>Add Item UI</p>
<hr>
<!-- form -->
<p></p>
<table>
<form method="post" action="addItemControl.php" >
<tr><td>Name: </td><td><input type="text" name="NAME"></td></tr>
<tr><td>Price: </td><td><input type="text" name="PRICE"></td></tr>
<tr><td>Detail: </td><td><input type="text" name="DETAIL"></td></tr>
<tr><td><a href="viewItem.php">Return</a></td><td><input type="submit" value="新增"></td></tr>
</form>
</table>
<hr>
</body>
</html>