<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>木瓜書城</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <link rel=icon href="source/welcome_rounded.png" sizes="16x16" type="image/png">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no;" name="viewport"/>
    <script>let login = false;
        function AutoOrientate() {
            if (screen.width >= screen.height) {
                document.location.href = "home.php";
            } else {

            }
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
    if ($_COOKIE["passed"] == "guest") {
        echo '<script>login=false;</script>';
    } else {
        if ($_COOKIE["passed"] == "TRUE") {
            echo '<script>login=true;</script>';
        } else {
            header("location:operation_failed.php");
            exit();
        }
    }
    ?>

<body onload="AutoOrientate()">
<div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
    <div class="mdl-snackbar__text"></div>
    <button type="button" class="mdl-snackbar__action"></button>
</div>
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">


    <main class="mdl-layout__content">
        <!-- Your content goes here -->
    <script>
        setTimeout(function() {
            let id = "<?php echo $_COOKIE["id"] ?>";
            document.getElementById("username").innerHTML = id;
        }, 1);
    </script><br><br<br />

    <table width="360" border="0" align="center">
      <tr>
        <td width="318" height="700" align="center" valign="top" background="source/Rectangle 1.png"
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
              <td width="280" height="60" align="center"><button class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #FFFFFF;
            font-size: 24px;width:280px;height:60px;"
                                        onclick="location.href='introduction.php';">書籍介紹 </button>
                </a></td>
            </tr>
            <tr background="source/Rectangle 2.png" style="background-repeat: no-repeat; 
			background-size:100% 100%;">
              <td width="280" height="60" align="center"><button class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #FFFFFF;
            font-size: 24px;width:280px;height:60px;" onclick="location.href='buy.php';">購買書籍 </button>
                </a></td>
            </tr>
            <tr background="source/Rectangle 2.png" style="background-repeat: no-repeat; 
			background-size:100% 100%;">
              <td width="280" height="60" align="center"><button class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #FFFFFF;
            font-size: 24px;width:280px;height:60px;" onclick="location.href='order.php';">我的訂單 </button>
                </a></td>
            </tr>
            <tr background="source/Rectangle 2.png" style="background-repeat: no-repeat; 
			background-size:100% 100%;">
              <td width="280" height="60" align="center">
                  <button class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #FFFFFF;
            font-size: 24px;width:280px;height:60px;text-transform: none"
                                        onclick="location.href='login.php';" id="username"></button>
                </a></td>
            </tr>
            <tr background="source/Rectangle 2.png" style="background-repeat: no-repeat; 
			background-size:100% 100%;">
              <td width="280" height="60" align="center"><button class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #FFFFFF;
            font-size: 24px;width:280px;height:60px;" onclick="location.href='index.php';">登出書城 </button>
                </a></td>
            </tr>
          </table></td>
      </tr>
    </table>
    </main>
    </div>


    </body>
    </html>