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

    <script>
        let id = "<?php echo $_COOKIE["id"] ?>";
        let message="我不是機器人，我想要刪除我的木瓜會員帳號"+id+"。";
</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        body {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }

        .demo-card-square.mdl-card {
            width: 500px;
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
<div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
    <div class="mdl-snackbar__text"></div>
    <button type="button" class="mdl-snackbar__action"></button></div>
<script>
    function onSubmit(token) {
        if (message == form1.check_input.value){
            location.href='del_user_finish.php'
        }else {
            var notification = document.querySelector('.mdl-js-snackbar');
            var data = {
                message: '輸入錯誤，你不是真的想刪除帳號。',
                actionHandler: function (event) {
                    location.href='introduction.php'
                },
                actionText: '回首頁',
                timeout: 3000
            };
            notification.MaterialSnackbar.showSnackbar(data);
            setTimeout(function() {
                var notification = document.querySelector('.mdl-js-snackbar');
                var data = {
                    message: '你要重新驗證嗎?',
                    actionHandler: function (event) {
                        location.href='del_user_check.php'
                    },
                    actionText: '重新驗證',
                    timeout: 3000
                };
                notification.MaterialSnackbar.showSnackbar(data);
            }, 3000);

        }
    }
</script>
<br><br><br><br>
<center>
    <div class="demo-card-square mdl-card mdl-shadow--2dp" style="alignment: center">
        <div class="mdl-card__title mdl-card--expand"
             style="background: url('source/welcome_rounded.png') center no-repeat #9CACCD; ">
        </div>
        <div class="mdl-card__supporting-text">
            <h2 class="mdl-card__title-text" style="color:#F00;font-size: x-large;font-weight: bold">警告</h2><br>
            <p style="text-align: left;color:#F00;font-size: 16px;">確定要刪除會員帳號嗎?<br>所有的訂單都將被清空，請謹慎考慮，此動作不可逆。</p>
            <p style="text-align: left;color:#000;font-size: 16px;">若要繼續，請輸入下方文字後，再勾選核取方塊。</p><br>
            <form id="form1" name="form1" method="post" action="register_check.php">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 100%;alignment: center">
                <input class="mdl-textfield__input" type="text" name="del_label"
                       id="check_input" style="color:#000;">
                <label class="mdl-textfield__label" for="sample2" id='check_label'  >我不是機器人，我想要刪除我的木瓜會員帳號id。</label>
                <script>document.getElementById('check_label').innerText=message;</script>
            </div></form>
            <div class='g-recaptcha' data-sitekey='6LflQ50jAAAAAIVCPUx0qb_Pft1ktxeeVqYp8Ib_' data-callback="onSubmit" ></div>
            <script></script>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a class='mdl-button mdl-js-button mdl-button--primary' href="revise.php" style="font-size: x-large">取消</a>
        </div>
    </div>
</center>
</body>



