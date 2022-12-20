<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>訂購結果</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <style type="text/css">

        bbody {
            font-family: "Roboto","PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }
    </style>

</head>

<body>

<dialog class="mdl-dialog">
    <h4 class="mdl-dialog__title">提示</h4>
    <div class="mdl-dialog__content">
        <p style="color: #000"><br/>
            姓名或地址未填寫，訂購失敗。
        </p>
    </div>
    <div class="mdl-dialog__actions">
        <button type="buttonOK" class="mdl-button mdl-js-button mdl-button--primary" onClick="location.href='buy.php';">好
        </button>
    </div>
</dialog>
<script>
    var dialog = document.querySelector('dialog');</script>

<?php


if ($_POST["T1"]=="" || $_POST["T2"]==""){
    echo '<script>dialog.showModal();</script>';

}else {

    echo "<b>".$_POST["T1"].$_POST["s"];
    echo "您好!</b><p>";
    echo "您的寄貨地址是︰".$_POST["T2"]."<br>";
    echo "付款方式為︰".$_POST["Tpay"]."<br>";
    echo "您買了︰<br>";


    $total = 0;
    $tcount = 0;
    $B1=intval($_POST["B1"]);
    $B2=intval($_POST["B2"]);
    $B3=intval($_POST["B3"]);
    $B4=intval($_POST["B4"]);
    $B5=intval($_POST["B5"]);
    foreach ($_POST["Book"] as $key => $value) {

        switch ($key) {
            case 380 :
                echo $value . "<br/>";
                $tcount = $tcount + $B1;
                $total = $total + 380*$B1;
                break;
            case 250 :
                echo $value . "<br/>";
                $tcount = $tcount + $B2;
                $total = $total + 250*$B2;
                break;
            case 580 :
                echo $value . "<br/>";
                $tcount = $tcount + $B3;
                $total = $total + 580*$B3;
                break;
            case 300:
                echo $value . "<br/>";
                $tcount = $tcount + $B4;
                $total = $total + 300*$B4;
                break;
            case 700:
                echo $value . "<br/>";
                $tcount = $tcount + $B5;
                $total = $total + 700*$B5;
                break;
        }

    }
    echo "總共︰" . $tcount . "本書<br>";
    echo "總計新台幣︰" . $total . "元<br>";


}
?>
<p><a href="index.php">回上頁</a></p>


</body>
</html>
