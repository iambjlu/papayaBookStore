<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>木瓜書城</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <link rel=icon href="source/welcome_rounded.png" sizes="16x16" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }

        .demo-card-square.mdl-card {
            width: 600px;
            height: 850px;
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
    if ($passed != "TRUE"){
        header("location:login.php");
        exit();
    }
    $buy = $_COOKIE["buy"];
    if ($buy=1){
        setcookie("buy",0);
    }else{
        header("location:buy.php");
        exit();
    }
    ?>
</head>

<body>


<br><br><br><br>
<center>
    <div class="demo-card-square mdl-card mdl-shadow--2dp" style="alignment: center">
        <div class="mdl-card__title mdl-card--expand"
             style="background: url('source/welcome_rounded.png') center no-repeat #9CACCD; ">
        </div>
        <div class="mdl-card__supporting-text">
            <h2 class="mdl-card__title-text" style="color:#000;font-size: x-large;font-weight: bold">修改結果</h2><br>
            <p id="card_message" style="text-align: left;color:#000;font-size: 16px;"></p>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="location.href='order.php'">
                好
            </button>
        </div>
    </div>
</center>

<?php
require_once("dbtools.inc.php");
if ($_POST["T1"]=="" || $_POST["T2"]==""){
    echo '<script>
document.getElementById("card_message").innerHTML = "修改失敗<br>請完成收件資料填寫";
</script>';

}else {
$p1=$_POST["order"];
$order_number=$p1;
$total = 0;
$tcount = 0;
$book="";

//    $a1t=intval($_POST["a1t"]);
//    $a2t=intval($_POST["a2t"]);
//    $a3t=intval($_POST["a3t"]);
//    $a4t=intval($_POST["a4t"]);
//    $b1t=intval($_POST["b1t"]);
//    $b2t=intval($_POST["b2t"]);
//    $b3t=intval($_POST["b3t"]);
//    $b4t=intval($_POST["b4t"]);
//    $c1t=intval($_POST["c1t"]);
//    $c2t=intval($_POST["c2t"]);
//    $c3t=intval($_POST["c3t"]);
//    $c4t=intval($_POST["c4t"]);

$a1n=intval($_POST["a1n"]);
$a2n=intval($_POST["a2n"]);
$a3n=intval($_POST["a3n"]);
$a4n=intval($_POST["a4n"]);
$b1n=intval($_POST["b1n"]);
$b2n=intval($_POST["b2n"]);
$b3n=intval($_POST["b3n"]);
$b4n=intval($_POST["b4n"]);
$c1n=intval($_POST["c1n"]);
$c2n=intval($_POST["c2n"]);
$c3n=intval($_POST["c3n"]);
$c4n=intval($_POST["c4n"]);

$tcount=$a1n+$a2n+$a3n+$a4n+$b1n+$b2n+$b3n+$b4n+$c1n+$c2n+$c3n+$c4n;
$total=$a1n*520+$a2n*600+$a3n*540+$a4n*560+$b1n*1100+$b2n*260+$b3n*300+$b4n*380+$c1n*390+$c2n*180+$c3n*419+$c4n*252;

$account = $_COOKIE["id"];
$name = $_POST["T1"];
$phone = $_POST["phone"];
$address = $_POST["T2"];
$payment_method = $_POST["Tpay"];

if($a1n==0){
    $a1t="";
}else{
    $a1t=$_POST["a1t"]."  [".$a1n."本]<br>";
}
if($a2n==0){
    $a2t="";
}else{
    $a2t=$_POST["a2t"]."  [".$a2n."本]<br>";
}
if($a3n==0){
    $a3t="";
}else{
    $a3t=$_POST["a3t"]."  [".$a3n."本]<br>";
}
if($a4n==0){
    $a4t="";
}else{
    $a4t=$_POST["a4t"]."  [".$a4n."本]<br>";
}
if($b1n==0){
    $b1t="";
}else{
    $b1t=$_POST["b1t"]."  [".$b1n."本]<br>";
}
if($b2n==0){
    $b2t="";
}else{
    $b2t=$_POST["b2t"]."  [".$b2n."本]<br>";
}
if($b3n==0){
    $b3t="";
}else{
    $b3t=$_POST["b3t"]."  [".$b3n."本]<br>";
}
if($b4n==0){
    $b4t="";
}else{
    $b4t=$_POST["b4t"]."  [".$b4n."本]<br>";
}if($c1n==0){
    $c1t="";
}else{
    $c1t=$_POST["c1t"]."  [".$c1n."本]<br>";
}
if($c2n==0){
    $c2t="";
}else{
    $c2t=$_POST["c2t"]."  [".$c2n."本]<br>";
}
if($c3n==0){
    $c3t="";
}else{
    $c3t=$_POST["c3t"]."  [".$c3n."本]<br>";
}
if($c4n==0){
    $c4t="";
}else{
    $c4t=$_POST["c4t"]."  [".$c4n."本]<br>";
}


$book=$a1t.$a2t.$a3t.$a4t.$b1t.$b2t.$b3t.$b4t.$c1t.$c2t.$c3t.$c4t;



date_default_timezone_set('Asia/Taipei');
$time = date('Y/m/d H:i:s');

$link = create_connection();
$sql = "UPDATE order_data SET name = '$name',phone = '$phone', address = '$address', tcount='$tcount', a1n='$a1n', a2n='$a2n', a3n='$a3n', a4n='$a4n', b1n='$b1n', b2n='$b2n', b3n='$b3n', b4n='$b4n', c1n='$c1n', c2n='$c2n', c3n='$c3n', c4n='$c4n',total='$total', time = '$time',book='$book' WHERE order_number='$p1'";
$result = execute_sql($link, "papaya", $sql);

mysqli_close($link);
}
$message="<b>" . $_POST["T1"] . "您好! 我們已收到您的訂單修改請求</b><p><br>電話︰" . $_POST["phone"] . "<br>收件地址︰" . $_POST["T2"] . "<br>付款方式︰" . $_POST["Tpay"] . "<br><br>您買了︰<br>" . $book . "<br>總共︰" . $tcount . "本書<br>總計新台幣︰" . $total . "元<br>訂單隨機碼︰" . $p1 . "<br>";
?>

<script>
    let message = "<?php echo $message ?>";
    document.getElementById("card_message").innerHTML = message;
</script>
<br><br>
</body>
</html>