<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>木瓜書城</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <link rel=icon href="source/welcome_rounded.png" sizes="16x16" type="image/png">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }
        .demo-card-square.mdl-card {
            width: 400px;
            height: 400px;
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
    if ($passed != "TRUE")
    {
        header("location:login.php");
        exit();
    }
    ?>
</head>

<body><center>

    <h3>我的訂單</h3>
    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option1">
        <input type="radio" id="option1" class="mdl-radio__button" name="options" value="1" onclick="location.href='order.php'">
        <span class="mdl-radio__label">從新到舊排序</span>
    </label>&nbsp;&nbsp;
    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option2">
        <input type="radio" id="option2" class="mdl-radio__button" name="options" value="2" checked>
        <span class="mdl-radio__label">從舊到新排序</span>
    </label>&nbsp;
    <?php
    //建立資料庫連接
    require_once("dbtools.inc.php");
    header("Content-type: text/html; charset=utf-8");
    $link = create_connection();
    $id =  $_COOKIE["id"];

    if($id=="Administrator"){
        $sql = "SELECT * FROM order_data ORDER BY time ASC";
        $result = execute_sql($link, "papaya", $sql);
    }else {
        $sql = "SELECT * FROM order_data WHERE account = '$id' ORDER BY time ASC";
        $result = execute_sql($link, "papaya", $sql);
    }

    // 如果帳號無人使用
    if (mysqli_num_rows($result) == 0) {
        echo '<br><br><br>
<div class="demo-card-square mdl-card mdl-shadow--2dp" style="alignment: center">
        <div class="mdl-card__title mdl-card--expand"
             style="background: url(source/welcome_rounded.png) center no-repeat #9CACCD; ">
        </div>
        <div class="mdl-card__supporting-text">
            <h2 class="mdl-card__title-text" style="color:#000;font-size: x-large;font-weight: bold"></h2><br>
            <p style="text-align: center;color:#000;font-size: x-large;font-weight: bold">空空如也</p>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="introduction.php"">
                看看書籍介紹
            </a><br><a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="buy.php"">
                立刻下單
            </a>
        </div>
    </div>
';
    }else{
        echo "<h3 style='font-size: 18px'>登入身分: ".$id."</h3><hr/>";

        while($row=mysqli_fetch_assoc($result)){


            $order_n = $row["order_number"];

            echo "<br><br>
<form action='del_check.php' method='post' name='formdel' id='formdel'>
    <table class='mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp'>
    <thead>
    <tr>
        <th style='text-align: left;color:#000;font-size: 14px'>訂單隨機碼</th>
        <th style='text-align: left;color:#000;font-size: 14px'>
        <label class='mdl-radio mdl-js-radio mdl-js-ripple-effect' for='order'>
                        <input name='order' type='radio' id='order' value=".$order_n." class='mdl-radio__button' checked/>
                    </label>&nbsp;&nbsp;".$order_n."</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style='text-align:left' ><span class='mdl-list__item-primary-content' style='font-size: 16px;'>訂購帳號</span></td>
        <td style='text-align:left'><span class='mdl-list__item-primary-content' style='font-size: 16px;'>".$row["account"]."</span></td>
    </tr>
    <tr>
        <td style='text-align:left' ><span class='mdl-list__item-primary-content' style='font-size: 16px;'>最後修改時間</span></td>
        <td style='text-align:left'><span class='mdl-list__item-primary-content' style='font-size: 16px;'>".$row["time"]."</span></td>
    </tr>
    <tr>
        <td style='text-align:left' ><span class='mdl-list__item-primary-content' style='font-size: 16px;'>收件人</span></td>
        <td style='text-align:left'><span class='mdl-list__item-primary-content' style='font-size: 16px;'>".$row["name"]." ".$row["sex"]."</span></td>
    </tr>
    <tr>
        <td style='text-align:left' ><span class='mdl-list__item-primary-content' style='font-size: 16px;'>收件地址</span></td>
        <td style='text-align:left'><span class='mdl-list__item-primary-content' style='font-size: 16px;'>".$row["address"]."</span></td>
    </tr>
    <tr>
        <td style='text-align:left' ><span class='mdl-list__item-primary-content' style='font-size: 16px;'>電話</span></td>
        <td style='text-align:left'><span class='mdl-list__item-primary-content' style='font-size: 16px;'>".$row["phone"]."</span></td>
    </tr>
    <tr>
        <td style='text-align:left' ><span class='mdl-list__item-primary-content' style='font-size: 16px;'>付款方式</span></td>
        <td style='text-align:left'><span class='mdl-list__item-primary-content' style='font-size: 16px;'>".$row["payment_method"]."</span></td>
    </tr>
    <tr>
        <td style='text-align:left' ><span class='mdl-list__item-primary-content' style='font-size: 16px;'>訂購項目</span></td>
        <td style='text-align:left'><span class='mdl-list__item-primary-content' style='font-size: 16px;'>".$row["book"]."</span></td>
    </tr>
    </tbody>
</table><br><br>
    <input type='submit' value='取消訂單'  class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect' />
</form><form action='revise_order.php' method='post' name='formedit' id='formedit'>
<label class='mdl-radio mdl-js-radio mdl-js-ripple-effect' for='order' style='visibility: hidden;width:0px;height: 0px'>
                        <input name='order' type='radio'  value=".$order_n." class='mdl-radio__button' checked/>
                    </label><br>
                    <input type='submit' value='修改訂單'  class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect' />
</form>
<br><br>
<hr/><br><br>";
        }
    }
    ?>



</center>
</body>
</html>