<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>木瓜書城</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <link rel=icon href="source/welcome_rounded.png" sizes="16x16" type="image/png">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        body {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }

        .demo-card-square.mdl-card {
            width: 400px;
            height: 600px;
        }

        .demo-card-square > .mdl-card__title {
            color: #FFF;
        }

    </style>

    <?php
    require_once("dbtools.inc.php");
    $id = $_COOKIE["id"];
    $link = create_connection();

    $sql = "DELETE FROM user_data where account = '$id'";
    $result = execute_sql($link, "papaya", $sql);

    $sql = "DELETE FROM order_data where account = '$id'";
    $result = execute_sql($link, "papaya", $sql);

    mysqli_close($link);
    ?>

</head>

<body>
<script>
    setTimeout(function() {
        top.window.location.href='index.php';
    }, 3000);
</script>
<br><br><br><br>
<center>
    <div class="demo-card-square mdl-card mdl-shadow--2dp" style="alignment: center">
        <div class="mdl-card__title mdl-card--expand"
             style="background: url('source/welcome_rounded.png') center no-repeat #9CACCD; ">
        </div>
        <div class="mdl-card__supporting-text">
            <h2 class="mdl-card__title-text" style="color:#000;font-size: x-large;font-weight: bold">木瓜書城</h2><br>
            <p style="text-align: left;color:#000;font-size: 16px;">帳號已刪除，期待再相見。<br>即將自動登出。</p><br>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <div class="mdl-spinner mdl-js-spinner is-active"></div>
        </div>
    </div>
</center>
</body>





