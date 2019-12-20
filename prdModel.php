<?php
require_once("dbconfig.php");

// main.php
function getPrdList() {
	global $db;
	$sql = "SELECT prdID, name, price, detail FROM product order by prdID";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
	return $result;
}

// addItemControl.php
function addItem($name, $price, $detail){
	global $db;
	$sql1 = "SELECT NAME FROM user WHERE NAME=?";
	$stmt1 = mysqli_prepare($db, $sql1); // prepare
	mysqli_stmt_bind_param($stmt1, "s", $name); // parameters
	mysqli_stmt_execute($stmt1); // execute
	$result1 = mysqli_stmt_get_result($stmt1); // get result
	if ($row = mysqli_fetch_assoc($result1)) { // 有相同name，新增失敗
		return 0;
	} else { // 沒有相同name，DB新增一列
        $sql2 ="INSERT INTO product(name, price, detail) values (?, ?, ?)";
        $stmt2 = mysqli_prepare($db, $sql2);
        mysqli_stmt_bind_param($stmt2, "sss", $name, $price, $detail);
		mysqli_stmt_execute($stmt2);
		return 1;
	}
}

// addItemControl.php
function removeItem($prdID){
	global $db;
	$sql = "delete from product where prdID=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i", $prdID);
	mysqli_stmt_execute($stmt);
}

// modifyItemControl.php
function modifyItem($prdID, $name, $price, $detail){
	global $db;
	$sql = "update product set name=?,price=?,detail=? where prdID=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "sisi", $name, $price, $detail, $prdID);
	return mysqli_stmt_execute($stmt);
}
?>










