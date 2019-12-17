<?php
require_once("dbconfig.php");

function getOrderList($uID) {
	global $db;
	$sql = "SELECT ordID, date, status FROM userOrder WHERE uID=?";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "s", $uID); //bind parameters with variables
	mysqli_stmt_execute($stmt);  //執行SQL
    $result = mysqli_stmt_get_result($stmt); //get the results
	return $result;
}

function _getCartID($uID) {
	//get an unfished order (status=0) from userOrder
	global $db;
	$sql = "SELECT ordID FROM userorder WHERE uID=? and status=0";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "s", $uID); //bind parameters with variables
	mysqli_stmt_execute($stmt);  //執行SQL
    $result = mysqli_stmt_get_result($stmt); //get the results
	if ($row=mysqli_fetch_assoc($result)) {
		return $row["ordID"];
	} else {
		//no order with status=0 is found, which means we need to creat an empty order as the new shopping cart
		$sql = "insert into userOrder ( uID, status ) values (?,0)";
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "s", $uID); //bind parameters with variables
		mysqli_stmt_execute($stmt);  //執行SQL
		$newOrderID=mysqli_insert_id($db);
		return $newOrderID;
	}
}

function addToCart($uID, $prdID) {
	global $db;
	$ordID= _getCartID($uID);
	$sql = "insert into orderItem (ordID, prdID, quantity) values (?,?,1);";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ii", $ordID, $prdID); //bind parameters with variables
	mysqli_stmt_execute($stmt);  //執行SQL
}

function removeFromCart($uID, $prdID) {
	return false;
}

function checkout($ordID, $address) {
	return false;
}

function getCartDetail($uID) {
	global $db;
	$ordID= _getCartID($uID);
	$sql="select orderItem.serno, product.name, product.price, orderItem.quantity from orderItem, product where orderItem.prdID=product.prdID and orderItem.ordID=?";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $ordID); //bind parameters with variables
	mysqli_stmt_execute($stmt);  //執行SQL
    $result = mysqli_stmt_get_result($stmt); //get the results
	return $result;
}
?>










