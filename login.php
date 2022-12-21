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
</head>

<body><center>
<h3 align="center">會員登入</h3><br>
<form id="form2" name="form2" method="post" action="login_check.php">
    <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
    <thead>
    <tr>
        <th style="text-align: left;">歡迎回來</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">帳號</span></td>
        <td style="text-align:left">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="account" id="account">
                <label class="mdl-textfield__label" for="sample2">帳號</label>
            </div>
        </td>
    </tr>
    <tr>
        <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">密碼</span></td>
        <td style="text-align:left">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="password" name="password" id="password">
                <label class="mdl-textfield__label" for="sample2">密碼</label>
            </div>
        </td>
    </tr>
    </tbody>
</table><br><br>
    <input type="submit" name="login" id="login" value="登入"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  mdl-button--colored" style="font-size:x-large;width:180px;height:60px;"/>
    <br><br><br>
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
       href="register.php" target="imain">
        註冊
    </a>
</form></center>



<?php
//以下5a8g0004

//header("Content-type: text/html; charset=utf-8");
//
//// 取得表單資料
//$account = $_POST["account"];
//$password = $_POST["password"];
//
//// 建立資料連接
//$host = 'localhost';
//$dbuser ='root';
//$dbpassword = '';
//$dbname = 'papaya';
//$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
//if($link){
//    mysqli_query($link,'SET NAMES utf8');
//    echo "正確連接資料庫";
//}
//else {
//    echo "不正確連接資料庫</br>" . mysqli_connect_error();
//}
//
//// 檢查帳號密碼是否正確
//$sql = "SELECT * FROM users Where account = '{$account}' AND password = '{$password}'";
//$result = execute_sql($link, 'userdata', $sql);
//echo $result;
//// 如果帳號密碼錯誤
//if ($result = mysqli_query($link, $sql))
//{
//    $val = mysqli_num_rows($result);
//    // 釋放 $result 佔用的記憶體
//    mysqli_free_result($result);
//
//    // 關閉資料連接
//    mysqli_close($link);
//
//    // 顯示訊息要求使用者輸入正確的帳號密碼
//    echo "<script type='text/javascript'>";
//    echo "alert('帳號密碼錯誤，請查明後再登入');";
//    echo "history.back();";
//    echo "</script>";
//}
//
//// 如果帳號密碼正確
//else
//{
//    // 取得 id 欄位
//    $id = mysqli_fetch_object($result)->id;
//
//    // 釋放 $result 佔用的記憶體
//    mysqli_free_result($result);
//
//    // 關閉資料連接
//    mysqli_close($link);
//
//    // 將使用者資料加入 cookies
//    setcookie("id", $id);
//    setcookie("passed", "TRUE");
//    header("location:main.php");
//}
//?>
</body>
</html>
