<?php
require_once("dbtools.inc.php");
$id = $_COOKIE["id"];
$link = create_connection();
$sql = "SELECT * FROM order_data WHERE account = '$id'";
$result = execute_sql($link, "papaya", $sql);
$row = mysqli_fetch_assoc($result);
?>

<?php
mysqli_free_result($result);
mysqli_close($link);
?>
