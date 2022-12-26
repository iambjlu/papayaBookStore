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
            <h2 class="mdl-card__title-text" style="color:#000;font-size: x-large;font-weight: bold">訂購結果</h2><br>
            <p id="card_message" style="text-align: left;color:#000;font-size: 16px;"></p>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="location.href='buy.php'">
                好
            </button>
        </div>
    </div>
</center>

<?php
if ($_POST["T1"]=="" || $_POST["T2"]=="" || $_POST["s"]=="no"){
    $message="訂購失敗<br>請完成收件資料填寫";

}else {

    $total = 0;
    $tcount = 0;
    $book = "";

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

    $a1n = intval($_POST["a1n"]);
    $a2n = intval($_POST["a2n"]);
    $a3n = intval($_POST["a3n"]);
    $a4n = intval($_POST["a4n"]);
    $b1n = intval($_POST["b1n"]);
    $b2n = intval($_POST["b2n"]);
    $b3n = intval($_POST["b3n"]);
    $b4n = intval($_POST["b4n"]);
    $c1n = intval($_POST["c1n"]);
    $c2n = intval($_POST["c2n"]);
    $c3n = intval($_POST["c3n"]);
    $c4n = intval($_POST["c4n"]);

    $tcount = $a1n + $a2n + $a3n + $a4n + $b1n + $b2n + $b3n + $b4n + $c1n + $c2n + $c3n + $c4n;
    $total = $a1n * 520 + $a2n * 600 + $a3n * 540 + $a4n * 560 + $b1n * 1100 + $b2n * 260 + $b3n * 300 + $b4n * 380 + $c1n * 390 + $c2n * 180 + $c3n * 419 + $c4n * 252;

    $account = $_COOKIE["id"];
    $name = $_POST["T1"];
    $phone = $_POST["phone"];
    $address = $_POST["T2"];
    $payment_method = $_POST["Tpay"];
    $sex = $_POST["s"];

    if ($a1n == 0) {
        $a1t = "";
    } else {
        $a1t = $_POST["a1t"] . "  [" . $a1n . "本]<br>";
    }
    if ($a2n == 0) {
        $a2t = "";
    } else {
        $a2t = $_POST["a2t"] . "  [" . $a2n . "本]<br>";
    }
    if ($a3n == 0) {
        $a3t = "";
    } else {
        $a3t = $_POST["a3t"] . "  [" . $a3n . "本]<br>";
    }
    if ($a4n == 0) {
        $a4t = "";
    } else {
        $a4t = $_POST["a4t"] . "  [" . $a4n . "本]<br>";
    }
    if ($b1n == 0) {
        $b1t = "";
    } else {
        $b1t = $_POST["b1t"] . "  [" . $b1n . "本]<br>";
    }
    if ($b2n == 0) {
        $b2t = "";
    } else {
        $b2t = $_POST["b2t"] . "  [" . $b2n . "本]<br>";
    }
    if ($b3n == 0) {
        $b3t = "";
    } else {
        $b3t = $_POST["b3t"] . "  [" . $b3n . "本]<br>";
    }
    if ($b4n == 0) {
        $b4t = "";
    } else {
        $b4t = $_POST["b4t"] . "  [" . $b4n . "本]<br>";
    }
    if ($c1n == 0) {
        $c1t = "";
    } else {
        $c1t = $_POST["c1t"] . "  [" . $c1n . "本]<br>";
    }
    if ($c2n == 0) {
        $c2t = "";
    } else {
        $c2t = $_POST["c2t"] . "  [" . $c2n . "本]<br>";
    }
    if ($c3n == 0) {
        $c3t = "";
    } else {
        $c3t = $_POST["c3t"] . "  [" . $c3n . "本]<br>";
    }
    if ($c4n == 0) {
        $c4t = "";
    } else {
        $c4t = $_POST["c4t"] . "  [" . $c4n . "本]<br>";
    }


    $book = $a1t . $a2t . $a3t . $a4t . $b1t . $b2t . $b3t . $b4t . $c1t . $c2t . $c3t . $c4t. "<br>總共︰" . $tcount . "本書<br>總計新台幣︰" . $total . "元";


//隨機取數
    $seed = time();// 使用时间作为种子源
    srand($seed);// 播下随机数发生器种子
    $order_number = rand();// 根据种子生成 0~32768 之间的随机数。如果 $seed 值固定，则生成的随机数也不变

    $host = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $dbname = 'papaya';
    $link = mysqli_connect($host, $dbuser, $dbpassword, $dbname);
//    if($link){
//        mysqli_query($link,'SET NAMES uff8');
//        echo "正確連接資料庫";
//    }
//    else {
//        echo "不正確連接資料庫</br>" . mysqli_connect_error();
//    }
    date_default_timezone_set('Asia/Taipei');
    $time = date('Y/m/d H:i:s');
    //$time = "SELECT NOW() FROM order_data";
    //$time = `Select Getdate()`;
    //echo "$time";
    $sql = "INSERT INTO order_data (order_number, account, name, sex, phone,
    address, payment_method, tcount, a1n, a2n, a3n, a4n, b1n, b2n, b3n, b4n, c1n, c2n, c3n, c4n,total, time,book) VALUES ('$order_number','$account','$name','$sex' ,'$phone','$address','$payment_method','$tcount', '$a1n','$a2n','$a3n','$a4n','$b1n','$b2n','$b3n','$b4n','$c1n','$c2n','$c3n','$c4n','$total','$time','$book')";


    $result = mysqli_query($link, $sql);


// 如果有異動到資料庫數量(更新資料庫)
//    if (mysqli_affected_rows($link)>0) {
// 如果有一筆以上代表有更新
// mysqli_insert_id可以抓到第一筆的id
//        $new_id= mysqli_insert_id ($link);
//        echo "新增後的id為 {$new_id} ";
//    }
//    elseif(mysqli_affected_rows($link)==0) {
//        echo "無資料新增";
//    }
//    else {
//        echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
//    }


    $message = "<b>" . $_POST["T1"] . " " . $_POST["s"] . "您好! 我們已收到您的訂單</b><p><br>電話︰" . $_POST["phone"] . "<br>收件地址︰" . $_POST["T2"] . "<br>付款方式︰" . $_POST["Tpay"] . "<br><br>您買了︰<br>" . $book ."<br>訂單隨機碼︰" . $order_number . "<br>";
}
?>

<script>
    let message = "<?php echo $message ?>";
    document.getElementById("card_message").innerHTML = message;
</script>
<br><br>
</body>
</html>