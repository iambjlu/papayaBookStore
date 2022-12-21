<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <link rel=icon href="source/welcome_rounded.png" sizes="16x16" type="image/png">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no;" name="viewport"/>

    <style type="text/css">
        body {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }
    </style>
</head>
<body>
<center><h3 align="center">註冊頁面</h3>
    <form id="form1" name="form1" method="post" action="register_check.php">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="account" id="account" style="font-size: 16px;">
            <label class="mdl-textfield__label" for="sample2">帳號</label>
        </div>
<br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="password" name="password" id="password" style="font-size: 16px;">
            <label class="mdl-textfield__label" for="sample2">密碼</label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="name" id="name" style="font-size: 16px;">
            <label class="mdl-textfield__label" for="sample2">姓名</label>
        </div>
        <br>
       <div>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="m">
                <input type="radio" name="sex" value="m" class="mdl-radio__button"  checked>
                <span class="mdl-radio__label" style="font-size: 16px;">男</span>
            </label>&nbsp;&nbsp;

            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="f">
                <input type="radio" name="sex" value="f" class="mdl-radio__button" >
                <span class="mdl-radio__label" style="font-size: 16px;">女</span>
            </label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="phone" id="phone" style="font-size: 16px;">
            <label class="mdl-textfield__label" for="sample2">電話</label>
            <span class="mdl-textfield__error">請輸入有效的電話</span>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="address" id="address" style="font-size: 16px;">
            <label class="mdl-textfield__label" for="sample2">地址</label>
        </div>
        <br><br><br>
        <p>

            <input type="submit" name="register" id="register"
                   class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  mdl-button--colored"
                   value="註冊" style="font-size:x-large;width:180px;height:60px;"/><br><br><br>
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
               href="login.php" target="imain">
                返回
            </a>
        </p>
    </form>
    <p>&nbsp;</p>

    <?php
    //$account = $_POST["account"];
    //$password = $_POST["password"];
    //$name = $_POST["name"];
    //$sex = $_POST["sex"];
    //$phone = $_POST["phone"];
    //$address = $_POST["address"];
    //
    //$host = 'localhost';
    //$dbuser ='root';
    //$dbpassword = '';
    //$dbname = 'papaya';
    //$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
    //if($link){
    //    mysqli_query($link,'SET NAMES utf8');
    //    echo "正確連接資料庫";
    //}
    //else {
    //    echo "不正確連接資料庫</br>" . mysqli_connect_error();
    //}
    //
    //$sql = "INSERT INTO user_data (account, password, name, sex,
    //    phone, address) VALUES ('$account','$password','$name' ,'$sex','$phone','$address')";
    //
    //$result = mysqli_query($link,$sql);
    //// 如果有異動到資料庫數量(更新資料庫)
    //if (mysqli_affected_rows($link)>0) {
    //// 如果有一筆以上代表有更新
    //// mysqli_insert_id可以抓到第一筆的id
    //    $new_id= mysqli_insert_id ($link);
    //    echo "新增後的id為 {$new_id} ";
    //}
    //elseif(mysqli_affected_rows($link)==0) {
    //    echo "無資料新增";
    //}
    //else {
    //    echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
    //}


    ?></center>
</body>
</html>