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
        $sex=$row["sex"];
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
                <th style="text-align: left;color:#000;font-size: 16px;">收件資料</th>
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
                        <input type="radio" name=s id="m" value="先生" class="mdl-radio__button" value="1">
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
                <th style="text-align:left;font-size: 16px;width:600px" >程式設計</th>
                <th style="text-align:left;font-size: 16px;">價格</th>
                <th style="text-align:left;font-size: 16px;">數量</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="a1t">
                        <input type="checkbox" name="a1t" id="a1t"
                               value="Python零基礎最強入門之路\-王者歸來" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">Python零基礎最強入門之路-王者歸來
</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 520</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="a1n" id="a1n" style="font-size: 16px;" value="0">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="a2t">
                        <input type="checkbox" name="a2t" id="a2t"
                               value="輕鬆學會Android Kotlin實作開發：精心設計20個Lab讓你快速上手(第二版)" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">輕鬆學會Android Kotlin實作開發：精心設計20個Lab讓你快速上手(第二版)</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 600</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="a2n" id="a2n" style="font-size: 16px;" value="0">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="a3t">
                        <input type="checkbox" name="a3t" id="a3t"
                               value="iOS 15程式設計實戰：Storyboard與SwiftUI快速上手的開發技巧200\+" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">iOS 15程式設計實戰：Storyboard與SwiftUI快速上手的開發技巧200+
</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 540</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="a3n" id="a3n" style="font-size: 16px;" value="0">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="a4t">
                        <input type="checkbox" name="a4t" id="a4t"
                               value="PHP8 & MariaDB\/MySQL網站開發-超威範例集" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">PHP8 & MariaDB/MySQL網站開發-超威範例集</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 560</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="a4n" id="a4n" style="font-size: 16px;" value="0">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr></tbody></table><br><br>

        <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
            <thead>
            <tr>
                <th style="text-align:left;font-size: 16px;width:590px" >翻譯小說</th>
                <th style="text-align:left;font-size: 16px;">價格</th>
                <th style="text-align:left;font-size: 16px;">數量</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="b1t">
                        <input type="checkbox" name="b1t" id="b1t" value="阿特拉斯聳聳肩（繁體中文10周年紀念版\/3冊合售） (Atlas Shrugged)" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">阿特拉斯聳聳肩（繁體中文10周年紀念版/3冊合售） (Atlas Shrugged)
</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 1100</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="b1n" id="b1n" style="font-size: 16px;" value="0">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="b2t">
                        <input type="checkbox" name="b2t" id="b2t" value="漢娜的遺言 (Thirteen Reasons Why)" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">漢娜的遺言 (Thirteen Reasons Why)</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 260</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="b2n" id="b2n" style="font-size: 16px;" value="0">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="b3t">
                        <input type="checkbox" name="b3t" id="b3t" value="以前，我死去的家 (むかし僕が死んだ家)" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">以前，我死去的家 (むかし僕が死んだ家)</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 300</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="b3n" id="b3n" style="font-size: 16px;" value="0">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="b4t">
                        <input type="checkbox" name="b4t" id="b4t" value="火星任務 The Martian" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">火星任務 (The Martian)</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 380</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="b4n" id="b4n" style="font-size: 16px;" value="0">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr>
            </tbody></table><br><br>
        <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
            <thead>
            <tr>
                <th style="text-align:left;font-size: 16px;width:600px" >中文小說</th>
                <th style="text-align:left;font-size: 16px;">價格</th>
                <th style="text-align:left;font-size: 16px;">數量</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="c1t">
                        <input type="checkbox" name="c1t" id="c1t" value="輕吻星芒(全2冊)" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">輕吻星芒(全2冊)</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 390</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="c1n" id="c1n" style="font-size: 16px;" value="0">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="c2t">
                        <input type="checkbox" name="c2t" id="c2t" value="思念的布朗尼" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">思念的布朗尼</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 180</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="c2n" id="c2n" style="font-size: 16px;" value="0">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="c3t">
                        <input type="checkbox" name="c3t" id="c3t" value="白色橄欖樹（上下）" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">白色橄欖樹（上下）</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 419</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="c3n" id="c3n" style="font-size: 16px;" value="0">
                        <label class="mdl-textfield__label" for="sample2">購買數量</label>
                        <span class="mdl-textfield__error">請輸入數字</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align:left">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="c4t">
                        <input type="checkbox" name="c4t" id="c4t" value="那個不為人知的故事" class="mdl-checkbox__input">
                        <span class="mdl-checkbox__label" style="font-size: 16px;">那個不為人知的故事</span>
                    </label></td>
                <td style="text-align:left" ><span class="mdl-list__item-primary-content" style="font-size: 16px;">NT$ 252</span></td>
                <td style="text-align:left">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="c4n" id="c4n" style="font-size: 16px;" value="0">
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
                if(a1t.checked==false){
                    a1n.value="0";
                }
                if(a2t.checked==false){
                    a2n.value="0";
                }
                if(a3t.checked==false){
                    a3n.value="0";
                }
                if(a4t.checked==false){
                    a4n.value="0";
                }
                if(b1t.checked==false){
                    b1n.value="0";
                }
                if(b2t.checked==false){
                    b2n.value="0";
                }
                if(b3t.checked==false){
                    b3n.value="0";
                }
                if(b4t.checked==false){
                    b4n.value="0";
                }
                if(c1t.checked==false){
                    c1n.value="0";
                }
                if(c2t.checked==false){
                    c2n.value="0";
                }
                if(c3t.checked==false){
                    c3n.value="0";
                }
                if(c4t.checked==false){
                    c4n.value="0";
                }
                document.getElementById("form1").submit();
            }

        </script>

        <br><br><br><br>
        <div style="visibility: hidden"><input type="radio" name="s" id='no' value="no" checked></div>
    </form>
</center>
</body>
</html>
