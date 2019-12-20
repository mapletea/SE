<!-- 訂單處理頁面 -->
<?php
session_start();
if ( ! isSet($_SESSION["loginProfile"] )) {
	header("Location: loginUI.php");
}
require("orderModel.php");
$address = $_POST['address'];
if (checkout($_SESSION["loginProfile"]["uID"], $address)){
    echo "Thank you. 訂單處理中<br/>";
} else {
    echo "sorry. 請再試一次<br/>";
}
?>
<a href='main.php'>Return to MAIN page</a>