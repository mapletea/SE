<?php
require_once("dbconfig.php");

// main.php
function getPrdList() {
	global $db;
	$sql = "SELECT prdID,name, price FROM product order by prdID";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	//mysqli_stmt_bind_param($stmt, "ss", $ID, $passWord); //bind parameters with variables
	mysqli_stmt_execute($stmt);  //執行SQL
    $result = mysqli_stmt_get_result($stmt); //get the results
	return $result;
}

?>










