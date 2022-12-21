<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>木瓜書城首頁</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no;" name="viewport"/>
    <style type="text/css">
        body {
            background-color: #9CACCD;
            font-family: "Roboto","PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }

        .menu_text {
            font-family: "Roboto","PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
            color: #FFFFFF;
            font-size: 24px;

        }

        .content {
            font-family: "Roboto","PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
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
			background-size:100% 100%;
        }

    </style>
</head>

<body>


<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">

        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">木瓜書城</span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="introduction.php" target="imain">書籍介紹</a>
                <a class="mdl-navigation__link" href="buy.php" target="imain">訂購書籍</a>
                <a class="mdl-navigation__link" href="order.php" target="imain">訂單查詢</a>
                <a class="mdl-navigation__link" href="login.php" target="imain">登入/註冊</a>
                <a class="mdl-navigation__link" href="index.php" target="_top">登出書城</a>
            </nav>
        </div>
    </header>

    <main class="mdl-layout__content">
        <div class="page-content" background="source/Rectangle 2.png"
             style="background-repeat: no-repeat; font-size: 10px; color: #FFFFFF;">
            <!-- Your content goes here --><br/><br/><span style="font-size: 10px"></span>
            <table width="99%" border="0">
                <td width="318" height="818" align="center" valign="top" background="source/Rectangle 1.png"
                    style="background-repeat: no-repeat; font-size: 10px; color: #FFFFFF; background-size:100% 100%"><span
                            style="text-align: center"><br/>
      <br/>
      <img src="source/welcome_rounded.png" width="200" height="200"/><br/>
      <br/>
      </span>
                    <table border="0" cellspacing="10"><br/>
                        <tr background="source/Rectangle 2.png" style="background-repeat: no-repeat; 
			background-size:100% 100%;">
                            <td id="menu_item" width="280" height="60" align="center" class="menu_text"><a
                                        href="introduction.php" target="imain" class="menu_text">書籍介紹</a></td>
                        </tr>
                        <tr background="source/Rectangle 2.png" style="background-repeat: no-repeat; 
			background-size:100% 100%;">
                            <td id="menu_item" width="280" height="60" align="center" class="menu_text"><a
                                        href="buy.php" target="imain"><span class="menu_text">購買書籍</span></a></td>
                        </tr>
                        <tr background="source/Rectangle 2.png" style="background-repeat: no-repeat; 
			background-size:100% 100%;">
                            <td id="menu_item" width="280" height="60" align="center" class="menu_text 
			background-size:100% 100%;"><a
                                        href="order.php" target="imain"><span class="menu_text">訂單查詢</span></a></td>
                        </tr>
                        <tr background="source/Rectangle 2.png" style="background-repeat: no-repeat; 
			background-size:100% 100%;">
                            <td id="menu_item" width="280" height="60" align="center" class="menu_text"><a
                                        href="login.php" target="imain"><span class="menu_text">登入/註冊</span></a>
                            </td>
                        </tr>
                        <tr background="source/Rectangle 2.png" style="background-repeat: no-repeat; 
			background-size:100% 100%;">
                            <td id="menu_item2" height="60" align="center" class="menu_text"><a href="index.php"
                                                                                                target="_top"><span
                                            class="menu_text">登出書城</span></a></td>
                        </tr>
                    </table>

                <td width="1579" height="818" align="center" valign="top"
                    style="background-image: url(source/Rectangle%203.png);
	background-repeat: no-repeat;
	background-size:100% 100%;;"><div style="margin: 25px;">
                  <iframe src="introduction.php" name="imain" width="100%" height="800px" scrolling="true"
                                frameborder="0"></iframe>
                </div>
                    </tr></td>
            </table>
            </center>
        </div>

    </main>
</div>


</body>
</html>