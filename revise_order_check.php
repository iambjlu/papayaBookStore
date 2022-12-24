<?php
require_once("dbtools.inc.php");

$id = $_COOKIE["id"];
$name = $_POST["name"];
$sex = $_POST["sex"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$payment_method = $_POST["payment_method"];
$book_name = $_POST["book_name"];

date_default_timezone_set('Asia/Taipei');
$time = date('Y/m/d H:i:s');

$link = create_connection();
$sql = "UPDATE order_data SET name = '$name', sex = '$sex', phone = '$phone', address = '$address', payment_method = '$payment_method', book_name = $book_name, time = '$time'";
$result = execute_sql($link, "papaya", $sql);

mysqli_close($link);
?>
