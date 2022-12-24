<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>木瓜書城</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }
    </style>
    <?php
    if ($_COOKIE["passed"]=="guest"){}
    else{
        if($_COOKIE["passed"]=="TRUE"){
            header("location:login_check.php");
            exit();
        }else {
            header("location:operation_failed.php");
            exit();
        }
    }
    ?>
    <script>
        function AutoOrientate() {
            if (screen.width >= screen.height) {
            }
            </script>
    <script>
        function guest_Snackbar(){
            var notification = document.querySelector('.mdl-js-snackbar');
            var data = {
                message: '登入或註冊才能享有完整體驗',
                actionHandler: function(event) {location.href = "introduction.php";},
                actionText: '仍要以訪客繼續',
                timeout: 3000
            };
            notification.MaterialSnackbar.showSnackbar(data);
        }
    </script>
</head>

<body onload="AutoOrientate()"><center>
<h3 align="center">木瓜會員登入</h3><br>

    <div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button type="button" class="mdl-snackbar__action"></button>
    </div>

<form id="form2" name="form2" method="post" action="login_check.php">
    <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
    <thead>
    <tr>
        <th colspan="2" style="text-align: center;color:#000;font-size: 16px">登入或註冊才能享有完整體驗</th>
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
    <span style="text-align: left;color:#000;font-size: 16px;">勾選核取方塊即可登入。若忘記密碼請洽管理員重置。</span><br><br>
    <!--reCAPTCHA 公鑰-->
    <div class="g-recaptcha" data-sitekey="6LflQ50jAAAAAIVCPUx0qb_Pft1ktxeeVqYp8Ib_" data-callback="onSubmit"></div>
    <script>
        function onSubmit(token) {
            document.getElementById("form2").submit();
        }
    </script>
    <br><br>
</form><a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
          href="register.php" target="imain">
        註冊
    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
               onclick='guest_Snackbar()'>以訪客身分繼續
    </button></center>
</body>
</html>
