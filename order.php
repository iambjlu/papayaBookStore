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
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
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

<body><center>

    <h3>查詢訂單</h3>

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
    echo "<h3 style='font-size: 18px'>".$id." 的訂單資料</h3>";

    while($row=mysqli_fetch_assoc($result)){
        $order_n = $row["order_number"];

        echo "
<form action='del_check.php' method='post' name='formdel' id='formdel'>
    <table class='mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp'>
    <thead>
    <tr>
        <th style='text-align: left;color:#000;font-size: 14px'>訂單隨機碼</th>
        <th style='text-align: left;color:#000;font-size: 14px'>
        <label class='mdl-radio mdl-js-radio mdl-js-ripple-effect' for='order'>
                        <input name='order' type='radio' id='order' value=".$order_n." class='mdl-radio__button' checked/>
                    </label>&nbsp;&nbsp;".$order_n."</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style='text-align:left' ><span class='mdl-list__item-primary-content' style='font-size: 16px;'>收件人</span></td>
        <td style='text-align:left'><span class='mdl-list__item-primary-content' style='font-size: 16px;'>".$row["name"]." ".$row["sex"]."</span></td>
    </tr>
    <tr>
        <td style='text-align:left' ><span class='mdl-list__item-primary-content' style='font-size: 16px;'>收件地址</span></td>
        <td style='text-align:left'><span class='mdl-list__item-primary-content' style='font-size: 16px;'>".$row["address"]."</span></td>
    </tr>
    <tr>
        <td style='text-align:left' ><span class='mdl-list__item-primary-content' style='font-size: 16px;'>電話</span></td>
        <td style='text-align:left'><span class='mdl-list__item-primary-content' style='font-size: 16px;'>".$row["phone"]."</span></td>
    </tr>
    <tr>
        <td style='text-align:left' ><span class='mdl-list__item-primary-content' style='font-size: 16px;'>付款方式</span></td>
        <td style='text-align:left'><span class='mdl-list__item-primary-content' style='font-size: 16px;'>".$row["payment_method"]."</span></td>
    </tr>
    <tr>
        <td style='text-align:left' ><span class='mdl-list__item-primary-content' style='font-size: 16px;'>訂購項目</span></td>
        <td style='text-align:left'><span class='mdl-list__item-primary-content' style='font-size: 16px;'>".$row["book_name"]."</span></td>
    </tr>
    </tbody>
</table><br><br>
    <input type='submit' value='取消訂單'  class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect' />
</form>
<br><br>
<hr/><br><br><br><br>";
    }
}
?>



</center>
</body>
</html>