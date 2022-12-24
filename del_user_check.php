<?php
require_once("dbtools.inc.php");
$id = $_COOKIE["id"];
$link = create_connection();

$sql = "DELETE FROM user_data where account = '$id'";
$result = execute_sql($link, "papaya", $sql);

mysqli_close($link);
setcookie("id", "訪客");
setcookie("passed", "guest");
?>


