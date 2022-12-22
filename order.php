<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <style type="text/css">

        body {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }
    </style>
    <?php
    // 檢查 cookie 中的 passed 變數是否等於 TRUE
    $passed = $_COOKIE["passed"];
    /* 如果 cookie 中的 passed 變數不等於 TRUE
       表示尚未登入網站，將使用者導向首頁 index.html */
    if ($passed != "TRUE")
    {
        header("location:login.php");
        exit();
    }
    ?>
</head>

<body>
<div align="center">
  <h3>查詢訂單</h3>
</div>
<?php
//建立資料庫連接
require_once("dbtools.inc.php");
header("Content-type: text/html; charset=utf-8");
$link = create_connection();
$id =  $_COOKIE["id"];

// 檢查帳號是否有人申請
$sql = "SELECT * FROM order_data WHERE account = '$id'";
$result = execute_sql($link, "papaya", $sql);

// 如果帳號無人使用
if (mysqli_num_rows($result) == 0) {
    echo "空空如也。快去下單吧!";
}else{

    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>
<td>".$row["order_number"]."</td>
<td>".$row["name"]."</td>
<td>".$row["sex"]."</td>
<td>".$row["phone"]."</td>
<td>".$row["address"]."</td>
<td>".$row["payment_method"]."</td>
<td>".$row["book_name"]."</td></tr>";
        /*顯示資料結果*/
    }
}
?>
</body>
</html>
