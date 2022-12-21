<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <style type="text/css">
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
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">姓名</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="T1" id="T1">
                        <label class="mdl-textfield__label" for="sample2">姓名</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">地址</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="T2" id="T2">
                        <label class="mdl-textfield__label" for="sample2">地址</label>
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
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="Book[700]">
                        <input type="checkbox" name="Book[700]" value="Python零基礎最強入門之路-王者歸來 　　　NT.700"
                               id="Book[700]" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">Python零基礎最強入門之路-王者歸來</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 700</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="B5" id="B5" style="font-size: 16px;">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <br><br><br><br>


        <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  mdl-button--colored"
               type="submit" value="下訂單" name="Btn1" style="font-size:x-large;width:240px;height:80px;"/>

        <br><br><br><br>

    </form>
</center>
</body>
</html>
