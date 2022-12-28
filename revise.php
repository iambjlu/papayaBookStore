<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>木瓜書城</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <link rel=icon href="source/welcome_rounded.png" sizes="16x16" type="image/png">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>let db_password = "";
        let admin = 0;</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        body {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }
    </style>
    <?php
    // 檢查 cookie 中的 passed 變數是否等於 TRUE
    $passed = $_COOKIE["passed"];
    /* 如果 cookie 中的 passed 變數不等於 TRUE
       表示尚未登入網站，將使用者導向首頁 index.html */
    if ($passed != "TRUE") {
        header("location:login.php");
        exit();
    }

    require_once("dbtools.inc.php");
    header("Content-type: text/html; charset=utf-8");
    $link = create_connection();
    $admin = 0;
    $id = $_COOKIE["id"];
    if ($id == "Administrator") {
        $admin = 1;
    }

    // 檢查帳號是否有人申請
    $sql = "SELECT * FROM user_data WHERE account = '$id'";
    $result = execute_sql($link, "papaya", $sql);


    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row["name"];
        $password = $row["password"];
        $sex = $row["sex"];
        if ($sex == "m") {
            $sex = "男";
        } else {
            $sex = "女";
        }
        $phone = $row["phone"];
        $address = $row["address"];
        $line_user_key = $row["line_user_key"];
    }

    mysqli_free_result($result);
    mysqli_close($link);
    ?>
</head>
<body>
<div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
    <div class="mdl-snackbar__text"></div>
    <button type="button" class="mdl-snackbar__action"></button>
</div>
<center><h3 align="center">會員資料</h3>
    <form id="form1" name="form1" method="post" action="revise_check.php">
        <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
            <thead>
            <tr>
                <th style="text-align: left;" colspan="2">若不修改密碼，請留空。</th>
            </tr>
            </thead>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">帳號</span></td>
                <td style="text-align:left">
                    <span class="mdl-list__item-primary-content"
                          style="font-size: 16px;"><?php echo $_COOKIE["id"] ?></span></td>
                </td>
            </tr>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">姓名</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="name" id="name" style="font-size: 16px;"
                               value="<?php echo $name; ?>">
                        <label class="mdl-textfield__label" for="sample2">姓名</label>
                    </div>
                </td>
            </tr>

            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">設定新密碼</span><br><span
                            class="mdl-list__item-primary-content"
                            style="font-size: 1px;">若不修改，請留空</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" name="password" id="password"
                               style="font-size: 16px;">
                        <label class="mdl-textfield__label" for="sample2">設定新密碼 (英數8~20字)</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">確認新密碼</span><br><span
                            class="mdl-list__item-primary-content"
                            style="font-size: 1px;">若不修改，請留空</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" name="password_c"
                               id="password_c" style="font-size: 16px;">
                        <label class="mdl-textfield__label" for="sample2">確認密碼</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">生理性別</span></td>
                <td style="text-align:left">
                    <span class="mdl-list__item-primary-content" style="font-size: 16px;"><?php echo $sex ?></span></td>
                </td>
            </tr>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">電話</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="phone"
                               id="phone" style="font-size: 16px;" value="<?php echo $phone; ?>">
                        <label class="mdl-textfield__label" for="sample2">電話</label>
                        <span class="mdl-textfield__error" id>請輸入有效的電話</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">地址</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="address" id="address"
                               style="font-size: 16px;" value="<?php echo $address; ?>">
                        <label class="mdl-textfield__label" for="sample2">地址</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                                                   for="checkbox1">
                        <input type="checkbox" id="checkbox1" class="mdl-checkbox__input" onclick="
                                db_password= '<?php echo $password; ?>' ;
                                if (db_password == form2.password_current.value){
                                if (line_user_key.type == 'text') {
                                line_user_key.type='password';
                                }
                                else {
                                line_user_key.type='text';
                                }
                                }else {

                                var notification = document.querySelector('.mdl-js-snackbar');
                                var data = {
                                message: '請先確認目前密碼',
                                actionHandler: function (event) {
                                },
                                actionText: ' ',
                                timeout: 5000

                                };
                                notification.MaterialSnackbar.showSnackbar(data);
                                checkbox1.checked=false;
                                }
                                ">
                        <span class="mdl-checkbox__label">LINE好友秘密通行碼</span>
                    </label><br><span
                            class="mdl-list__item-primary-content"
                            style="font-size: 1px;">需先確認目前密碼<br>確保資訊安全，請勿外流</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" name="line_user_key"
                               id="line_user_key" style="font-size: 16px;" value="<?php echo $line_user_key ?>"
                               readonly>
                        <label class="mdl-textfield__label" for="sample2">LINE好友秘密通行碼</label>
                    </div>
                    <span id="key" class="mdl-list__item-primary-content" style="font-size: 16px;"></span></td>
                </td>


            </tr>
            </tbody>
        </table>
    </form>
    <br><br>
    <span style="text-align: left;color:#000;font-size: 16px;">更動會員資料需要驗證目前密碼。<br>確認填寫資料無誤後，勾選核取方塊即可完成修改。</span><br><br>
    <form id="form2" name="form2" method="post">
        <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
            <tbody>
            <tr>
                <td style="text-align:left"><span class="mdl-list__item-primary-content"
                                                  style="font-size: 16px;">確認目前密碼</span>
                </td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" name="password_current"
                               id="password_current">
                        <label class="mdl-textfield__label" for="sample2">密碼</label>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <br><br>
        <!--reCAPTCHA 公鑰-->
        <div class="g-recaptcha" data-sitekey="6LflQ50jAAAAAIVCPUx0qb_Pft1ktxeeVqYp8Ib_"
             data-callback="onSubmit"></div>
        <script>
            function onSubmit(token) {
                db_password = '<?php echo $password; ?>';
                if (db_password == form2.password_current.value) {
                    var dialog = document.querySelector('dialog');
                    document.getElementById("form1").submit();
                } else {
                    var notification = document.querySelector('.mdl-js-snackbar');
                    var data = {
                        message: messageContent,
                        actionHandler: function (event) {
                            location.href = 'revise.php';
                        },
                        actionText: '重試',
                        timeout: 5000
                    };
                    notification.MaterialSnackbar.showSnackbar(data);
                }
            }

        </script>
    </form>
    <br>
    <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
            onclick="history.back();">
        取消
    </button>&nbsp;&nbsp;
    <button id="del_btn" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
            onclick="
                    admin='<?php echo $admin ?>' ;
                    db_password= '<?php echo $password; ?>' ;
                    if (db_password == form2.password_current.value && admin==0){
                    location.href='del_user_check.php'
                    }else {
                    if(admin==1){
                    var notification = document.querySelector('.mdl-js-snackbar');
                    var data = {
                    message: '管理員帳號無法刪除',
                    actionHandler: function (event) {

                    },
                    actionText: ' ',
                    timeout: 5000
                    }
                    }else{
                    var notification = document.querySelector('.mdl-js-snackbar');
                    var data = {
                    message: '請先確認目前密碼',
                    actionHandler: function (event) {
                    location.href = 'revise.php';
                    },
                    actionText: '重試',
                    timeout: 5000
                    }
                    };
                    notification.MaterialSnackbar.showSnackbar(data);

                    }
                    ">刪除會員帳號
    </button>
    <p>&nbsp;</p>

</center>

</body>
</html>



