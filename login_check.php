<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<style type="text/css">
    body {
        font-family: "Roboto","PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
    }
</style>
</head>

<body>
<h1 align="center">會員登錄</h1>

<?php
require_once("dbtools.inc.php");
header("Content-type: text/html; charset=utf-8");

// 取得表單資料
$account = $_POST["account"];
$password = $_POST["password"];

// 建立資料連接
$host = 'localhost';
$dbuser ='root';
$dbpassword = '';
$dbname = 'papaya';

// 建立資料連接
$link = create_connection();

// 檢查帳號密碼是否正確
$sql = "SELECT * FROM users Where account = '$account' AND password = '$password'";
$result = execute_sql($link, "user_data", $sql);

// 如果帳號密碼錯誤
if (mysqli_num_rows($result) == 0)
{
    // 釋放 $result 佔用的記憶體
    mysqli_free_result($result);

    // 關閉資料連接
    mysqli_close($link);

    // 顯示訊息要求使用者輸入正確的帳號密碼
    echo "<script type='text/javascript'>";
    echo "alert('帳號密碼錯誤，請查明後再登入');";
    echo "history.back();";
    echo "</script>";
}

// 如果帳號密碼正確
else
{
    echo "<script type='text/javascript'>";
    echo "alert('OK');";
    echo "</script>";
    // 取得 id 欄位
    $id = mysqli_fetch_object($result)->id;

    // 釋放 $result 佔用的記憶體
    mysqli_free_result($result);

    // 關閉資料連接
    mysqli_close($link);

    // 將使用者資料加入 cookies
    setcookie("id", $id);
    setcookie("passed", "TRUE");
    header("location:main.php");
}
?>



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
