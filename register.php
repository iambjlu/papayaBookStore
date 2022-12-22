<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <link rel=icon href="source/welcome_rounded.png" sizes="16x16" type="image/png">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no;" name="viewport"/>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        body {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }
    </style>
</head>
<body>
<center><h3 align="center">木瓜會員註冊</h3>
    <form id="form1" name="form1" method="post" action="register_check.php">
        <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
            <thead>
            <tr>
                <th style="text-align: left;">歡迎註冊木瓜會員</th>
                <th>
                    <div style="visibility: hidden"><label class="mdl-radio mdl-js-radio mdl-js-ripple-effect"
                                                           for="option-1">
                            <input type="radio" id="not_robot" class="mdl-radio__button" name="not_robot" value="false">
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">姓名</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="name" id="name" style="font-size: 16px;">
                        <label class="mdl-textfield__label" for="sample2">姓名</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">建立帳號</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="account" id="account"
                               style="font-size: 16px;">
                        <label class="mdl-textfield__label" for="sample2">建立帳號 (英數最多15字)</label>
                        <span class="mdl-textfield__error">請輸入有效的電話</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">設定密碼</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" name="password" id="password"
                               style="font-size: 16px;">
                        <label class="mdl-textfield__label" for="sample2">設定密碼 (英數8~20字)</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">確認密碼</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" name="password_c"
                               id="password_c" style="font-size: 16px;">
                        <label class="mdl-textfield__label" for="sample2">確認密碼</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">生理性別</span></td>
                <td style="text-align:left">


                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                        <input type="radio" id="option-1" class="mdl-radio__button" name="sex" value="m" checked>
                        <span class="mdl-radio__label" style="font-size: 16px;">男</span>
                    </label>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                        <input type="radio" id="option-2" class="mdl-radio__button" name="sex" value="f">
                        <span class="mdl-radio__label" style="font-size: 16px;">女</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">電話</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="phone"
                               id="phone" style="font-size: 16px;">
                        <label class="mdl-textfield__label" for="sample2">電話</label>
                        <span class="mdl-textfield__error">請輸入有效的電話</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">地址</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="address" id="address"
                               style="font-size: 16px;">
                        <label class="mdl-textfield__label" for="sample2">地址</label>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <br><br><span style="text-align: left;color:#000;font-size: 16px;">註冊即表示您閱畢並同意<a href="eula.php">使用條款</a>。<br>確認填寫資料無誤後，勾選核取方塊即可完成註冊流程。</span><br><br>
        <!--reCAPTCHA 公鑰-->
        <div class="g-recaptcha" data-sitekey="6LflQ50jAAAAAIVCPUx0qb_Pft1ktxeeVqYp8Ib_" data-callback="onSubmit"></div>
        <script>
            function onSubmit(token) {
                document.getElementById("form1").submit();
            }
        </script>
    </form><br>
    <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
            onclick="location.href='login.php'">
        返回
    </button>
    <p>&nbsp;</p>

</center>
</body>
</html>