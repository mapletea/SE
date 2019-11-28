<?php
require_once("dbconfig.php");

function checkIDPwd($ID, $passWord) {
	global $db;
    $isValid = false;
    $sql = "SELECT count(*) C FROM user WHERE ID=? and password=?";
    	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
    	mysqli_stmt_bind_param($stmt, "ss", $ID, $passWord); //bind parameters with variables
    	mysqli_stmt_execute($stmt);  //執行SQL
        $result = mysqli_stmt_get_result($stmt); //get the results	
    	if ($row=mysqli_fetch_assoc($result)) {
    		if ($row['C'] == 1) {
    			//keep the user ID in session as a mark of login
    			//$_SESSION['uID'] = $row['id'];
    			//provide a link to the message list UI
    			$isValid = true;
    		}
    	}
    return $isValid;
}
function getUserStatus($ID){
	if (!empty($_SESSION['uID'])){
        return "true";
	}
	return "false";
}