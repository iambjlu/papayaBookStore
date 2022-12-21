<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script>let card_used = "0";</script>
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
        <div class="mdl-card__actions mdl-card--border" id="card_button"></div>
    </div>
</center>

<?php

if ($_POST["account"] == "" || $_POST["password"] == "" || $_POST["name"] == "" || $_POST["sex"] == "" || $_POST["phone"] == "" || $_POST["address"] == "") {
    echo '<script>
card_used="1";
document.getElementById("card_message").innerHTML = "註冊失敗。<br>請完成會員資料填寫。";
document.getElementById("card_button").innerHTML = `<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="history.back();" >
                好
            </button>`;
</script>';

} else {
    $password = $_POST["password"];
    $password_c = $_POST["password_c"];

    if ($password == $password_c) {
        $account = $_POST["account"];
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

// 建立資料連接
        require_once("dbtools.inc.php");
        header("Content-type: text/html; charset=utf-8");
        $link = create_connection();
//    $host = 'localhost';
//    $dbuser = 'root';
//    $dbpassword = '';
//    $dbname = 'papaya';
//    $link = mysqli_connect($host, $dbuser, $dbpassword, $dbname);

//if($link){
//    mysqli_query($link,'SET NAMES utf8');
//    echo "正確連接資料庫";
//}
//else {
//    echo "不正確連接資料庫</br>" . mysqli_connect_error();
//}
        // 檢查帳號是否有人申請
        $sql = "SELECT * FROM user_data Where account = '$account'";
        $result = execute_sql($link, "papaya", $sql);

        // 如果帳號無人使用
        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO user_data (account, password, name, sex,
    phone, address) VALUES ('$account','$password','$name' ,'$sex','$phone','$address')";
            $result = mysqli_query($link, $sql);
        } else {
            echo '<script>
    card_used="1";
    document.getElementById("card_message").innerHTML = "註冊失敗。<br>已經有人使用過這個帳號了。<br>請換一個再試一次。";
    document.getElementById("card_button").innerHTML = `<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="history.back();" >
                好
            </button>`;
</script>';

        }
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

    } else {
    echo '<script>
    card_used="1";
    document.getElementById("card_message").innerHTML = "註冊失敗。<br>兩次輸入的密碼不一致。";
    document.getElementById("card_button").innerHTML = `<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="history.back();" >
                好
            </button>`;
</script>';
    }
}
?>

<script>if (card_used == "0") {
        let message = "<?php
            echo $name . " " . $sex_zhtw . "您好<br>恭喜您已註冊完成囉!<br>立刻前往登入吧~";
            ?>";
        document.getElementById("card_message").innerHTML = message;
        document.getElementById("card_button").innerHTML = `<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="location.href='login.php'" id="alert_btn_login">前往登入</button>`;
    }
</script>

</body>
</html>
