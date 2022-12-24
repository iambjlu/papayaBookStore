<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>木瓜書城</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
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
    if ($passed != "TRUE")
    {
        header("location:login.php");
        exit();
    }

    require_once("dbtools.inc.php");
    header("Content-type: text/html; charset=utf-8");
    $link = create_connection();
    $id = $_COOKIE["id"];

    // 檢查帳號是否有人申請
    $sql = "SELECT * FROM user_data WHERE account = '$id'";
    $result = execute_sql($link, "papaya", $sql);


    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row["name"];
        $password = $row["password"];
        $phone = $row["phone"];
        $address = $row["address"];
    }

    mysqli_free_result($result);
    mysqli_close($link);
    setcookie("buy", 1);
    ?>
</head>


<body>
<center>
    <h3>購物車 </h3>


    <form action="buy_check.php" method="post" name="form1" id="form1">
        <h4>步驟1: 填入收件資料</h4>
        <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
            <thead>
            <tr>
                <th style="text-align: left;color:#000;font-size: 16px;">收件資訊</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">收件人</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="T1" id="T1" value="<?php echo $name ?>">
                        <label class="mdl-textfield__label" for="sample2">收件人</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">生理性別</span></td>
                <td style="text-align:left">
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="m">
                        <input type="radio" name=s id="m" value="先生" class="mdl-radio__button" value="1" checked>
                        <span class="mdl-radio__label" style="font-size: 16px;">男</span>
                    </label>&nbsp;&nbsp;

                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="f">
                        <input type="radio" name="s" id="f" value="小姐" class="mdl-radio__button" >
                        <span class="mdl-radio__label" style="font-size: 16px;">女</span>
                    </label>

                </td>
            </tr>
            <tr>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">電話</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="phone"
                               id="phone" style="font-size: 16px;" value="<?php echo $phone ?>">
                        <label class="mdl-textfield__label" for="sample2">電話</label>
                        <span class="mdl-textfield__error">請輸入有效的電話</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">收件地址</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="T2" id="T2" value="<?php echo $address ?>">
                        <label class="mdl-textfield__label" for="sample2">收件地址</label>
                    </div>
                </td>
            </tr>

            <tr>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">付款方式</span></td>
                <td style="text-align:left">
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="ap">
                        <input name="Tpay" type="radio" id="ap" value="Apple Pay" class="mdl-radio__button" checked/>
                        <span class="mdl-radio__label" style="font-size: 16px;">Apple Pay</span>
                    </label>&nbsp;&nbsp;

                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="lp">
                        <input name="Tpay" type="radio" id="lp" value="LINE Pay" class="mdl-radio__button" />
                        <span class="mdl-radio__label" style="font-size: 16px;">LINE Pay</span>
                    </label>&nbsp;&nbsp;

                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="cc">
                        <input name="Tpay" type="radio" id="cc" value="信用卡" class="mdl-radio__button" />
                        <span class="mdl-radio__label" style="font-size: 16px;">信用卡</span>
                    </label>&nbsp;&nbsp;

                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="pod">
                        <input name="Tpay" type="radio" id="pod" value="貨到付款" class="mdl-radio__button" />
                        <span class="mdl-radio__label" style="font-size: 16px;">貨到付款</span>
                    </label>&nbsp;&nbsp;
                </td>
            </tr>
            </tbody>
        </table>
        <br><br><br>


        <h4>步驟2: 選擇喜愛的項目</h4>
        <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
            <thead>
            <tr>
                <th style="text-align:left;font-size: 16px;" >選擇項目</th>
                <th style="text-align:left;font-size: 16px;">價格</th>
                <th style="text-align:left;font-size: 16px;">數量</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="booka1t">
                        <input type="checkbox" name="booka1t" id="booka1t" value="Python零基礎最強入門之路-王者歸來" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">Python零基礎最強入門之路-王者歸來</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 700</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="booka1n" style="font-size: 16px;">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="booka2t">
                        <input type="checkbox" name="booka2t" id="booka2t" value="Python零基礎最強入門之路-王者歸來" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">Python零基礎最強入門之路-王者歸來</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 700</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="booka2n" style="font-size: 16px;">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <br><br><br><h4>步驟3: 完成下單</h4>
        <span style="text-align: left;color:#000;font-size: 16px;">勾選核取方塊即可完成下單流程。</span><br><br>
        <!--reCAPTCHA 公鑰-->
        <div class="g-recaptcha" data-sitekey="6LflQ50jAAAAAIVCPUx0qb_Pft1ktxeeVqYp8Ib_" data-callback="onSubmit"></div>
        <script>
            function onSubmit(token) {
                document.getElementById("form1").submit();
            }
        </script>

        <br><br><br><br>
        <div style="visibility: hidden"><input type="radio" name="s" id='no' value="no" checked></div>
    </form>
</center>
</body>
</html>
