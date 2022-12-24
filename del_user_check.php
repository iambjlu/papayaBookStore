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
    <script>function onSubmit(token) {
            location.href="del_user_finish.php";
        }</script>
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
    // 檢查 cookie 中的 passed 變數是否等於 TRUE
    $passed = $_COOKIE["passed"];
    /* 如果 cookie 中的 passed 變數不等於 TRUE
       表示尚未登入網站，將使用者導向首頁 index.html */
    if ($passed != "TRUE") {
        header("location:login.php");
        exit();
    }?>
</head>

<body>
<br><br><br><br>
<center>
    <div class="demo-card-square mdl-card mdl-shadow--2dp" style="alignment: center">
        <div class="mdl-card__title mdl-card--expand"
             style="background: url('source/welcome_rounded.png') center no-repeat #9CACCD; ">
        </div>
        <div class="mdl-card__supporting-text">
            <h2 class="mdl-card__title-text" style="color:#F00;font-size: x-large;font-weight: bold">警告</h2><br>
            <p style="text-align: left;color:#F00;font-size: 16px;">確定要刪除會員帳號嗎?<br>此動作不可逆。<br>若要繼續，請勾選核取方塊。</p><br>
            <div class='g-recaptcha' data-sitekey='6LflQ50jAAAAAIVCPUx0qb_Pft1ktxeeVqYp8Ib_' data-callback="onSubmit"></div>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a class='mdl-button mdl-js-button mdl-button--primary' href="revise.php" style="font-size: x-large">取消</a>
        </div>
    </div>
</center>
</body>



