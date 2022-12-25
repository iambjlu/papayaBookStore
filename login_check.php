<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>木瓜書城</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <link rel=icon href="source/welcome_rounded.png" sizes="16x16" type="image/png">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }

        .demo-card-square.mdl-card {
            width: 600px;
            height: 600px;
        }

        .demo-card-square > .mdl-card__title {
            color: #FFF;
        }

    </style>
    <?php
    if ($_COOKIE["passed"]=="guest"){
        //header("location:login.php");
       // exit();
       }
    else{
        if($_COOKIE["passed"]=="TRUE"){

        }else {
            header("location:operation_failed.php");
            exit();
        }
    }
    ?>
</head>

<body>


<br><br><br><br>
<center>
    <div class="demo-card-square mdl-card mdl-shadow--2dp" style="alignment: center">
        <div class="mdl-card__title mdl-card--expand"
             style="background: url('source/welcome_rounded.png') center no-repeat #9CACCD; ">
        </div>
        <div class="mdl-card__supporting-text">
            <h2 class="mdl-card__title-text" style="color:#000;font-size: x-large;font-weight: bold">木瓜會員</h2><br>
            <p id="card_message" style="text-align: left;color:#000;font-size: 16px;"></p>
        </div>
        <div class="mdl-card__actions mdl-card--border" id="card_button"></div>
    </div>
</center>

<?php
if ($_COOKIE["passed"] == "TRUE") {
    $id = $_COOKIE["id"];
} else {
    require_once("dbtools.inc.php");
    header("Content-type: text/html; charset=utf-8");

// 取得表單資料
    $account = $_POST["account"];
    $password = $_POST["password"];

// 建立資料連接
    $link = create_connection();
// 檢查帳號密碼是否正確
    $sql = "SELECT * FROM user_data Where account = '$account' AND password = '$password'";
    $result = execute_sql($link, "papaya", $sql);
// 如果帳號密碼錯誤
    if (mysqli_num_rows($result) == 0) {
        // 釋放 $result 佔用的記憶體
        mysqli_free_result($result);

        // 關閉資料連接
        mysqli_close($link);

        // 顯示訊息要求使用者輸入正確的帳號密碼
        echo "<script type='text/javascript'>document.getElementById('card_message').innerHTML = '登入失敗。<br>請檢查帳號或密碼，然後再試一次。'
document.getElementById('card_button').innerHTML = `<a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect' href='login.php';'>
                好
            </a>`;</script>";

    } else { // 如果帳號密碼正確
        // 取得 id 欄位
        $id = mysqli_fetch_object($result)->account;

        // 釋放 $result 佔用的記憶體
        mysqli_free_result($result);

        // 關閉資料連接
        mysqli_close($link);

        // 將使用者資料加入 cookies
        setcookie("id", $id);
        setcookie("passed", "TRUE");
        echo '<script>
if (screen.width >= screen.height) {
        top.window.location.reload();
}
</script>';

    }
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

<script>
    let ip = "<?php echo $_SERVER['REMOTE_ADDR']; ?>";
    if(ip=="::1"){
        ip="ngrok.io 或 localhost"
    }
    let message = "<?php
        echo $id . " 您好<br>您已經成功的登入本系統。<br>登入IP: ";
        ?>" + ip;
    document.getElementById("card_message").innerHTML = message;
    if (screen.width >= screen.height) {
        document.getElementById('card_button').innerHTML = `<a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect' href="introduction.php" target="imain">
                好
            </a>`;
    } else {
        document.getElementById('card_button').innerHTML = `<a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect' href="mobile.php">
                好
            </a>`;
    }

</script>

</body>
</html>