<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>木瓜書城</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <link rel=icon href="source/welcome_rounded.png" sizes="16x16" type="image/png">
    <link rel="apple-touch-icon" href="source/welcome_square.png">
    <link rel="apple-touch-startup-image" href="source/welcome_square.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no;" name="viewport"/>
    <script>let login = false;

        function AutoOrientate() {
            if (screen.width >= screen.height) {
                document.location.href = "index.php";
            } else {

            }
            setTimeout(function () {
                if(window.navigator.standalone==true){}else{
                    var notification = document.querySelector('.mdl-js-snackbar');
                    var data = {
                        message: '我們有Web App唷',
                        actionHandler: function (event) {
                            location.href = "webapp_guide.php";
                        },
                        actionText: '安裝教學',
                        timeout: 10000
                    };
                    notification.MaterialSnackbar.showSnackbar(data);
                }, 500);
        }</script>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        body {
            background-color: #9CACCD;
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }

        .menu_text {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
            color: #FFFFFF;
            font-size: 24px;

        }

        .content {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
            font-size: 24px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            font-weight: bolder;
            color: #FFDF2D;
        }

        .menu_text:hover {
            font-weight: bolder;
            color: #FFDF2D;
            background-image: url(source/Rectangle%205.png);
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
    </style>
    <?php
    setcookie("id", "訪客");
    setcookie("passed", "guest");
    ?>

</head>

<body onload="AutoOrientate()">
<div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
    <div class="mdl-snackbar__text"></div>
    <button type="button" class="mdl-snackbar__action"></button>
</div>
<div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
    <div class="mdl-snackbar__text"></div>
    <button type="button" class="mdl-snackbar__action"></button>
</div>

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">


    <main class="mdl-layout__content">
        <!-- Your content goes here -->
        <script>
            let id = "<?php echo $_COOKIE["id"] ?>";
            document.getElementById("username_bar").innerHTML = id;
            document.getElementById("username_menu").innerHTML = id;
            setTimeout(function () {
                //homeSnackbar();
            }, 500);
        </script>
        <br>

        <table width="360" border="0" align="center">
            <tr>
                <td width="360" height="500" align="center" valign="top" background="source/Rectangle 1.png"
                    style="background-repeat: no-repeat; font-size: 10px; color: #FFFFFF; background-size:100% 100%"><span
                            style="text-align: center"><br/>
          <br/>
          <img src="source/welcome_rounded.png" width="200" height="200"/><br/>
          <br/>
          </span>
                    <table border="0" cellspacing="10">
                        <br/>
                        <tr background="source/Rectangle 2.png" style="background-repeat: no-repeat;
			background-size:100% 100%;">
                            <td width="280" height="60" align="center">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #FFFFFF;
            font-size: 24px;width:280px;height:60px;"
                                        onclick="location.href='mobile.php';">開始使用
                                </button>
                                </a></td>
                        </tr>
                        <tr>
                            <td><br><br></td>
                        </tr>
                        <tr>
                            <td>
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #FFFFFF;width:280px;
            font-size: 16px;"
                                        onclick="location.href='eula.php'">使用條款
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #FFFFFF;width:280px;
            font-size: 16px;"
                                        onclick="dialog.showModal();">關於木瓜書城
                                </button>
                            </td>
                        </tr>
                    </table>
                    <br><br>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </main>
</div>

<dialog class="mdl-dialog">
    <h4 class="mdl-dialog__title">關於木瓜書城</h4>
    <div class="mdl-dialog__content">
        <p style="color: #000"><br/>
            本網站由PHP第五小組製作<br/>
            小組成員: 周欣妤、盧柏均、陳俊翰<br/>
            指導老師: 陳芸仙 老師<br/>
        </p>
        <div jsname="XZAv8" class="ITMfpb by1Bgd" style="">本網站採用 reCAPTCHA 驗證技術。<br>用戶須遵守Google《<a
                    href="https://www.google.com/policies/privacy/" target="_blank">隱私權政策</a>》和《<a
                    href="https://www.google.com/policies/terms/" target="_blank">使用條款</a>》的規範。
        </div>
    </div>
    <div class="mdl-dialog__actions">
        <button class="mdl-button mdl-js-button mdl-button--primary" onClick="dialog.close();">好
        </button>
    </div>
</dialog>
<script>
    var dialog = document.querySelector('dialog');
</script>

</body>
</html>