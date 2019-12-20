<?php
session_start();
$prdID = $_SESSION["prdID"];
$name = $_SESSION["name"];
$price = $_SESSION["price"];
$detail = $_SESSION["detail"];

require("prdModel.php");
$Mname=$_POST['name'];
$Mprice=$_POST['price'];
$Mdetail=$_POST['detail'];
if (!empty($Mname) || !empty($Mprice) || !empty($Mdetail)){
    if (!empty($Mname)){
        $name = $Mname;
    }
    if (!empty($Mprice)){
        $price = $Mprice;
    }
    if (!empty($Mdetail)){
        $detail = $Mdetail;
    }
    if (modifyItem($prdID, $name, $price, $detail)){ // prdModel.php
        echo "Modify Success! <br>";
    }
} else {
    echo "至少需修改一欄位！<br/>";
}
?>
<a href='viewItem.php'>Back to viewItem Page</a>