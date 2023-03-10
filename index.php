<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>歡迎來到木瓜書城</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <link rel=icon href="source/welcome_rounded.png" sizes="16x16" type="image/png">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>let login = false;
        function AutoOrientate() {
            if (screen.width >= screen.height) {
            } else {
                document.location.href = "mobile_index.php";
            }
        }</script>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body {
            background-color: #9CACCD;
            font-family: "Roboto","PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }
    </style>
    <?php
    setcookie("id", "訪客");
    setcookie("passed", "guest");
    ?>
</head>
<body onload="AutoOrientate()">
<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">歡迎來到木瓜書城</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
        <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a class="mdl-navigation__link" href="eula.php" style="font-size: 16px">木瓜書城使用條款</a>
            <a class="mdl-navigation__link" href="javascript: dialog.showModal();" style="font-size: 16px">關於木瓜書城</a>
        </nav>
    </div>
</header>

<center><br><img src="source/welcome.jpg" width="1366" height="768" usemap="#Map" border="0"/>
    <map name="Map" id="Map">
        <area shape="rect" coords="925,548,1149,629" href="home.php"/>
    </map>
</center>


<dialog class="mdl-dialog">
    <h4 class="mdl-dialog__title">關於木瓜書城</h4>
    <div class="mdl-dialog__content">
        <p style="color: #000"><br/>
            本網站由PHP第五小組製作<br/>
            小組成員: 周欣妤、盧柏均、陳俊翰<br/>
            指導老師: 陳芸仙 老師<br />
        </p>
        <div jsname="XZAv8" class="ITMfpb by1Bgd" style="">本網站採用 reCAPTCHA 驗證技術。<br>用戶須遵守Google《<a href="https://www.google.com/policies/privacy/" target="_blank">隱私權政策</a>》和《<a href="https://www.google.com/policies/terms/" target="_blank">使用條款</a>》的規範。</div>
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
