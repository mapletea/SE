<!-- 登入介面 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login UI</title>
</head>
<body>
<p>Login UI</p>
<hr>
<!-- form -->
<p>Enter ID and Password to login</p>
<table>
<form method="post" action="loginControl.php" >
<tr><td>ID: </td><td><input type="text" name="ID" ></td></tr>
<tr><td>Password: </td><td><input type="password" name="PWD" ></td></tr>
<tr><td><input type="button" value="還沒註冊嗎？" onclick="javascript:location.href='registerUI.php'"></td>
<td><input type="submit" value="登入"></td></tr>
</form>
</table>
<hr>
</body>
</html>
