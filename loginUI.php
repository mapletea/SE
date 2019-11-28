<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Basic HTML Examples</title>
</head>
<body>
<p>This is a Pargraph</p>
<hr>
<!-- form -->
<p>表單</p>
<form method="post" action="loginControl.php" target="_blank">
ID: <input type="text" name="ID" > <br>
Password: <input type="password" name="PWD" > <br>
<input type="submit">
</form>
<hr>

<p>超連結</p>
<!-- hyper link -->
<a href="000.php">simple link</a> <br>
<a href="000.php?a=<?php echo $tot;?>&b=okok">link with parameter</a> <br>
<a href="000.php" target="_blank">link with a target window</a><br>
</body>
</html>
