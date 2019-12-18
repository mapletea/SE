<?php
require("dbconfig.php");
// registerControl.php
function addUser($id, $password, $name){
	global $db;
	$sql1 = "SELECT ID FROM user WHERE ID=?";
	$stmt1 = mysqli_prepare($db, $sql1); // prepare
	mysqli_stmt_bind_param($stmt1, "s", $id); // parameters
	mysqli_stmt_execute($stmt1); // execute
	$result1 = mysqli_stmt_get_result($stmt1); // get result
	if ($row = mysqli_fetch_assoc($result1)) { // 有相同ID，註冊失敗
		$ret = 0;
	} else { // 沒有相同ID，註冊(DB新增一列)
		$role = 1;
	    $sql2 ="INSERT INTO user(ID, password, name, role) values (?, ?, ?, ?)";
	    $stmt2 = mysqli_prepare($db, $sql2);
	    mysqli_stmt_bind_param($stmt2, "sssi", $id, $password, $name, $role);
	    mysqli_stmt_execute($stmt2);
	    $result2 = mysqli_stmt_get_result($stmt2);
	    $ret=1;
	}
	return $ret;
}

// loginControl.php
function getUserProfile($ID, $passWord) {
	global $db;
	$sql = "SELECT name, role FROM user WHERE ID=? and password=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ss", $ID, $passWord);
	mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
	if ($row=mysqli_fetch_assoc($result)) { // 查找的到，回傳個人資訊
		$ret=array('uID' => $ID, 'uName' => $row['name'], 'uRole' => $row['role']);
	} else { // 沒有個人資訊
		$ret=NULL;
	}
	return $ret;
}
?>










