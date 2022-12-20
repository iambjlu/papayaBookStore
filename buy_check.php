<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>訂購結果</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <style type="text/css">

        body {
            font-family: "Roboto","PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }

        .demo-card-square.mdl-card {
            width: 600px;
            height: 600px;
        }
        .demo-card-square > .mdl-card__title {
            color: #FFF;
        }

    </style>

</head>

<body>


<br><br><br><br><center>
    <div class="demo-card-square mdl-card mdl-shadow--2dp" style="alignment: center">
        <div class="mdl-card__title mdl-card--expand" style="background: url('source/welcome_rounded.png') center no-repeat #9CACCD; ">
        </div>
        <div class="mdl-card__supporting-text">
            <h2 class="mdl-card__title-text" style="color:#000;font-size: x-large;font-weight: bold">訂購結果</h2><br>
            <p id="card_message" style="text-align: left;color:#000;font-size: 16px;"></p>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
               href="buy.php" target="imain">
                好
            </a>
        </div>
    </div></center>

<?php


if ($_POST["T1"]=="" || $_POST["T2"]==""){
    echo '<script>
document.getElementById("card_message").innerHTML = "訂購失敗<br>請完成收件資料填寫";
dialog.showModal();</script>';

}else {


    $total = 0;
    $tcount = 0;
    $book="";
    $B1=intval($_POST["B1"]);
    $B2=intval($_POST["B2"]);
    $B3=intval($_POST["B3"]);
    $B4=intval($_POST["B4"]);
    $B5=intval($_POST["B5"]);
    foreach ($_POST["Book"] as $key => $value) {

        switch ($key) {
            case 380 :
                $book= $book."- ". $value . "<br/>";
                $tcount = $tcount + $B1;
                $total = $total + 380*$B1;
                break;
            case 250 :
                $book= $book."- ". $value . "<br/>";
                $tcount = $tcount + $B2;
                $total = $total + 250*$B2;
                break;
            case 580 :
                $book= $book."- ". $value . "<br/>";
                $tcount = $tcount + $B3;
                $total = $total + 580*$B3;
                break;
            case 300:
                $book= $book."- ". $value . "<br/>";
                $tcount = $tcount + $B4;
                $total = $total + 300*$B4;
                break;
            case 700:
                $book= $book."- ". $value . "<br/>";
                $tcount = $tcount + $B5;
                $total = $total + 700*$B5;
                break;
        }

    }
}
?>

<script>
    let message = "<?php
        echo "<b>".$_POST["T1"]." ".$_POST["s"];
        echo "您好! 我們已收到您的訂單</b><p>";
        echo "收件地址︰".$_POST["T2"]."<br>";
        echo "付款方式︰".$_POST["Tpay"]."<br><br>";
        echo "您買了︰<br>".$book."<br>";
        echo "總共︰" . $tcount . "本書<br>";
        echo "總計新台幣︰" . $total . "元<br>";
        ?>";
    document.getElementById("card_message").innerHTML = message;</script>

</body>
</html>
