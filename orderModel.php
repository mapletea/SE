<?php
require_once("dbconfig.php");

// showOrder.php
function getOrderList($uID) {
	global $db;
	$sql = "SELECT ordID, date, status FROM userOrder WHERE uID=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "s", $uID);
	mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
	return $result;
}

// showOrder.php
function getOldOrderList($uID) {
	global $db;
	$sql = "SELECT ordID, orderDate, status FROM userOrder WHERE uID=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "s", $uID);
	mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
	return $result;
}

// admin.php
function getConfirmedOrderList() {
	global $db;
	$sql = "SELECT ordID, uID, orderDate FROM userOrder WHERE status=1";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
	return $result;
}

// function addToCart($uID, $prdID)
function _getCartID($uID) {
	//get an unfished order (status=0) from userOrder
	global $db;
	$sql = "SELECT ordID FROM userorder WHERE uID=? and status=0";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "s", $uID);
	mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
	if ($row=mysqli_fetch_assoc($result)) {
		return $row["ordID"];
	} else {
		$sql = "insert into userOrder (uID, status) values (?,0)";
		$stmt = mysqli_prepare($db, $sql);
		mysqli_stmt_bind_param($stmt, "s", $uID);
		mysqli_stmt_execute($stmt);
		$newOrderID=mysqli_insert_id($db);
		return $newOrderID;
	}
}

function _getQuantity($ordID, $prdID){
	global $db;
    $sql = "SELECT quantity FROM orderItem WHERE ordID = ? AND prdID = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii", $ordID, $prdID);
	mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
	if ($row=mysqli_fetch_assoc($result)) {
		return $row["quantity"];
	} else {
		$sql = "insert into orderItem (ordID, prdID, quantity) values (?,?,1)";
		$stmt = mysqli_prepare($db, $sql);
		mysqli_stmt_bind_param($stmt, "ii", $ordID, $prdID);
		mysqli_stmt_execute($stmt);
		return 0;
	}
}

// addToChart.php
function addToCart($uID, $prdID) {
	global $db;
	$ordID= _getCartID($uID);
	$have = _getQuantity($ordID, $prdID);
	if ($have != 0){
        $sql = "update orderItem set ordID=?, prdID=?, quantity=?";
	    $stmt = mysqli_prepare($db, $sql);
	    $now = $have+1;
	    mysqli_stmt_bind_param($stmt, "iii", $ordID, $prdID, $now);
	    mysqli_stmt_execute($stmt);
	}
}

// addFromCart.php
function removeFromCart($serno) {
	global $db;
	$sql = "delete from orderItem where serno=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i", $serno);
	mysqli_stmt_execute($stmt);
}

// checkoutControl.php
function checkout($uID, $address) {
	global $db;
	$ordID= _getCartID($uID);
	// checkout the order, modify status to 1
	$sql = "update userorder set orderDate=now(),address=?,status=1 where ordID=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "si", $address, $ordID);
	return mysqli_stmt_execute($stmt);
}

// setShipped.php
function shipout($ordID) {
	global $db;
	// company check the order, modify status to 2
	$sql = "update userorder set status=2 where ordID=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i", $ordID);
	return mysqli_stmt_execute($stmt);
}

// showCartDetail.php
function getCartDetail($uID) {
	global $db;
	$ordID= _getCartID($uID);
	$sql="select orderItem.serno, product.name, product.price, orderItem.quantity from orderItem, product where orderItem.prdID=product.prdID and orderItem.ordID=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i", $ordID);
	mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
	return $result;
}

// showOrderDetail.php
function getOrderDetail($ordID) {
	global $db;
	$sql="select orderItem.serno, product.name, product.price, orderItem.quantity from orderItem, product where orderItem.prdID=product.prdID and orderItem.ordID=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i", $ordID);
	mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
	return $result;
}
?>










