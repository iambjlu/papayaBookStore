<?php
require_once("dbtools.inc.php");

$id = $_COOKIE["id"];
$password = $_POST["password"];
$name = $_POST["name"];
$sex = $_POST["sex"];
$phone = $_POST["phone"];
$address = $_POST["address"];

$link = create_connection();
$sql = "UPDATE user_data SET password = '$password', name = '$name', sex = '$sex', phone = '$phone', address = '$address'";
$result = execute_sql($link, "papaya", $sql);

mysqli_close($link);
?>