<?php
session_start();

require("prdModel.php");
$name=$_POST['NAME'];
$price=$_POST['PRICE'];
$detail=$_POST['DETAIL'];
if (!empty($name) && !empty($price) && !empty($detail)){
    if (addItem($name, $price, $detail)==1){ // prdModel.php
    	echo "Add Success! <br>";
    	echo "<a href='viewItem.php'>View</a>";
    } else {
    	echo "Add failed.<br>name 不得相同!<br/>";
    	echo "<a href='addItemUI.php'>Return</a>";
    }
} else {
	echo "name, price, detail 不得有一為空<br/>";
	echo "<a href='addItemUI.php'>Please try again.</a>";
}
?>