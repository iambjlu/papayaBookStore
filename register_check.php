<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>訂購結果</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <style type="text/css">

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

</head>

<body>


<br><br><br><br>
<center>
    <div class="demo-card-square mdl-card mdl-shadow--2dp" style="alignment: center">
        <div class="mdl-card__title mdl-card--expand"
             style="background: url('source/welcome_rounded.png') center no-repeat #9CACCD; ">
        </div>
        <div class="mdl-card__supporting-text">
            <h2 class="mdl-card__title-text" style="color:#000;font-size: x-large;font-weight: bold">註冊結果</h2><br>
            <p id="card_message" style="text-align: left;color:#000;font-size: 16px;"></p>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
               href="login.php" target="imain">
                好
            </a>
        </div>
    </div>
</center>

<?php

if ($_POST["account"] == "" || $_POST["password"] == "" || $_POST["name"] == "" || $_POST["sex"] == "" || $_POST["phone"] == "" || $_POST["address"] == "") {
    echo '<script>
document.getElementById("card_message").innerHTML = "註冊失敗<br>請完成會員資料填寫";
dialog.showModal();</script>';

} else {

    $account = $_POST["account"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $sex = $_POST["sex"];
    $sex_zhtw = "";
    if ($sex == "m") {
        $sex_zhtw = "先生";
    } else {
        $sex_zhtw = "小姐";
    }

    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $host = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $dbname = 'papaya';
    $link = mysqli_connect($host, $dbuser, $dbpassword, $dbname);

//if($link){
//    mysqli_query($link,'SET NAMES uff8');
//    echo "正確連接資料庫";
//}
//else {
//    echo "不正確連接資料庫</br>" . mysqli_connect_error();
//}

    $sql = "INSERT INTO user_data (account, password, name, sex,
    phone, address) VALUES ('$account','$password','$name' ,'$sex','$phone','$address')";

    $result = mysqli_query($link, $sql);
//// 如果有異動到資料庫數量(更新資料庫)
//if (mysqli_affected_rows($link)>0) {
//// 如果有一筆以上代表有更新
//// mysqli_insert_id可以抓到第一筆的id
//    $new_id= mysqli_insert_id ($link);
//    echo "新增後的id為 {$new_id} ";
//}
//elseif(mysqli_affected_rows($link)==0) {
//    echo "無資料新增";
//}
//else {
//    echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
//}
}
?>

<script>
    let message = "<?php
        echo $name . $sex_zhtw . "您好<br>恭喜您已註冊完成囉!<br>立刻前往登入吧~";
        ?>";
    document.getElementById("card_message").innerHTML = message;
</script>

</body>
</html>
