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
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script>let login = false;let welcome="0"</script>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
        }

        .demo-card-square.mdl-card {
            width: 500px;
            height: 625px;
        }

        .demo-card-square > .mdl-card__title {
            color: #FFF;
        }
        a{
            text-decoration: none;
        }
        a:visited{
            text-decoration: none;
        }
    </style>
</head>

<body>

<script>
    let id = "<?php echo $_COOKIE["id"] ?>";
    setTimeout(function() {
        var notification = document.querySelector('.mdl-js-snackbar');
        var data = {
            message: '都看這麼久了，心動了嗎?',
            actionHandler:function (event){
                location.href = "buy.php";
            },
            actionText: '下單去',
            timeout: 300000
        };
        notification.MaterialSnackbar.showSnackbar(data);
    }, 120000);
</script>
<div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
    <div class="mdl-snackbar__text"></div>
    <button type="button" class="mdl-snackbar__action"></button>
</div>
<center>
    <h3>書籍介紹</h3>
    <?php
    if ($_COOKIE["passed"] == "guest") {
        echo '<script>login=false;</script>';
        echo '<a href="login.php">登入</a>以獲得專屬推薦';
    } else {
        if ($_COOKIE["passed"] == "TRUE") {
            echo '<script>login=true;</script>';
            require_once("dbtools.inc.php");
            header("Content-type: text/html; charset=utf-8");
            $link = create_connection();
            $id = $_COOKIE["id"];
            // 檢查帳號是否有人申請
            $sql = "SELECT * FROM user_data WHERE account = '$id'";
            $result = execute_sql($link, "papaya", $sql);


            while ($row = mysqli_fetch_assoc($result)) {
                $sex = $row["sex"];
                if ($sex == "m") {
                    echo '哈囉 '.$row['name'].'，推薦你看: 程式設計、翻譯小說';
                } else {
                    echo '哈囉 '.$row['name'].'，推薦妳看: 中文小說、翻譯小說';
                }
            }

            mysqli_free_result($result);
            mysqli_close($link);
        } else {
            header("location:operation_failed.php");
            exit();
        }
    }
    ?>
    <script>setTimeout(function() {
            if (login == false) {
                var notification = document.querySelector('.mdl-js-snackbar');
                var data = {
                    message: '訪客您好，登入或註冊即可享有完整體驗',
                    actionHandler: function (event) {
                        location.href = "login.php";
                        top.window.location.reload();
                    },
                    actionText: '立刻前往',
                    timeout: 10000
                };
            } else {
                var notification = document.querySelector('.mdl-js-snackbar');
                var data = {
                    message: '歡迎回來，' + id,
                    actionHandler: function (event) {

                    },
                    actionText: ' ',
                    timeout: 10000
                };
            }

            notification.MaterialSnackbar.showSnackbar(data);
        }, 1000);</script>
    <div class="mdl-tabs mdl-js-tabs" align="center">
        <div class="mdl-tabs__tab-bar" align="center">
            <a href="#coding" class="mdl-tabs__tab is-active" style="font-size: 16px">程式設計</a>
            <a href="#translated_novel" class="mdl-tabs__tab" style="font-size: 16px">翻譯小說</a>
            <a href="#chinese_novel" class="mdl-tabs__tab" style="font-size: 16px">中文小說</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="coding">
            <table width="80%" border="0" cellpadding="20" cellspacing="20">
                <tr>
                    <td>
                        <div class="demo-card-square mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title mdl-card--expand"
                                 style="background: url('https://flipclass.stust.edu.tw/sysdata/attach/note.2792/f78fb93b19ca39a8399a4ef8c484114b.jpg') bottom no-repeat #9CACCD; ">
                            </div>
                            <div class="mdl-card__supporting-text">
                                <h2 class="mdl-card__title-text" style="color:#000">
                                    Python零基礎最強入門之路-王者歸來</h2><br>
                                作者：洪錦魁 <br>
                                出版日期：2018/07/05<br>
                                語言：繁體中文<br>
                                書號：XB1828<br>
                                ISBN：9789865002237<br>
                                裝訂：平裝<br>
                                定價：520元<br>
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="http://www.deepstone.com.tw/list/0j219225074512548190" target="_blank">
                                    查看介紹
                                </a>
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="buy.php" target="imain">
                                    購買書籍
                                </a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="demo-card-square mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title mdl-card--expand"
                                 style="background: url('https://im2.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/089/12/0010891230_bc_01.jpg&v=60893975k&w=375&h=375') bottom no-repeat #9CACCD; ">
                            </div>
                            <div class="mdl-card__supporting-text">
                                <h2 class="mdl-card__title-text" style="color:#000">輕鬆學會Android
                                    Kotlin實作開發：精心設計20個Lab讓你快速上手(第二版)</h2><br>
                                作者： 黃士嘉, 周映樵<br>
                                出版社：博碩<br>
                                出版日期：2021/05/12<br>
                                語言：繁體中文<br>
                                定價：600元
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="https://www.books.com.tw/products/0010891230" target="_blank">
                                    查看介紹
                                </a>
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="buy.php" target="imain">
                                    購買書籍
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="demo-card-square mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title mdl-card--expand"
                                 style="background: url('https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/090/52/0010905224.jpg&v=615c2972k&w=375&h=375') bottom no-repeat #9CACCD; ">
                            </div>
                            <div class="mdl-card__supporting-text">
                                <h2 class="mdl-card__title-text" style="color:#000">iOS
                                    15程式設計實戰：Storyboard與SwiftUI快速上手的開發技巧200+</h2><br>
                                作者： 朱克剛<br>
                                出版社：碁峰<br>
                                出版日期：2021/10/18<br>
                                語言：繁體中文<br>
                                定價：540元
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="https://www.books.com.tw/products/0010905224?sloc=main" target="_blank">
                                    查看介紹
                                </a>
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="buy.php" target="imain">
                                    購買書籍
                                </a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="demo-card-square mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title mdl-card--expand"
                                 style="background: url('https://im2.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/090/90/0010909025.jpg&v=619236c5k&w=375&h=375') bottom no-repeat #9CACCD; ">
                            </div>
                            <div class="mdl-card__supporting-text">
                                <h2 class="mdl-card__title-text" style="color:#000">PHP8 &
                                    MariaDB/MySQL網站開發-超威範例集</h2><br>
                                作者： 陳惠貞, 陳俊榮<br>
                                出版社：碁峰<br>
                                出版日期：2021/11/25<br>
                                語言：繁體中文<br>
                                定價：560元
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="https://www.books.com.tw/products/0010909025" target="_blank">
                                    查看介紹
                                </a>
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="buy.php" target="imain">
                                    購買書籍
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>

            </table>
        </div>
        <div class="mdl-tabs__panel" id="translated_novel">
            <table width="80%" border="0" cellpadding="20" cellspacing="20">
                <tr>
                    <td>
                        <div class="demo-card-square mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title mdl-card--expand"
                                 style="background: url('https://im2.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/083/88/0010838831.jpg&v=5dbc0931k&w=375&h=375') bottom no-repeat #9CACCD; ">
                            </div>
                            <div class="mdl-card__supporting-text">
                                <h2 class="mdl-card__title-text" style="color:#000">阿特拉斯聳聳肩（繁體中文10周年紀念版/3冊合售）
                                    (Atlas Shrugged)</h2><br>
                                原文作者： 艾茵．蘭德<br>
                                譯者： 楊格<br>
                                出版社：早安財經<br>
                                出版日期：2019/11/04<br>
                                語言：繁體中文<br>
                                定價：1100元<br>
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="https://www.books.com.tw/products/0010838831" target="_blank">
                                    查看介紹
                                </a>
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="buy.php" target="imain">
                                    購買書籍
                                </a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="demo-card-square mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title mdl-card--expand"
                                 style="background: url('https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/050/45/0010504534.jpg&v=4db54f03k&w=400&h=400') bottom no-repeat #9CACCD; ">
                            </div>
                            <div class="mdl-card__supporting-text">
                                <h2 class="mdl-card__title-text" style="color:#000">漢娜的遺言 (Thirteen Reasons
                                    Why)</h2><br>
                                作者： 傑伊．艾夏<br>
                                譯者： 陳宗琛<br>
                                出版社：春天出版社<br>
                                出版日期：2011/04/27<br>
                                語言：繁體中文<br>
                                定價：260元
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="https://www.books.com.tw/products/0010504534" target="_blank">
                                    查看介紹
                                </a>
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="buy.php" target="imain">
                                    購買書籍
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="demo-card-square mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title mdl-card--expand"
                                 style="background: url('https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/068/00/0010680012.jpg&v=557ffb41k&w=390&h=390') bottom no-repeat #9CACCD; ">
                            </div>
                            <div class="mdl-card__supporting-text">
                                <h2 class="mdl-card__title-text" style="color:#000">以前，我死去的家 (むかし僕が死んだ家)</h2>
                                <br>
                                作者： 東野圭吾<br>
                                譯者： 王蘊潔<br>
                                出版社：皇冠<br>
                                出版日期：2015/07/06<br>
                                語言：繁體中文<br>
                                定價：300元
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="https://www.books.com.tw/products/0010680012" target="_blank">
                                    查看介紹
                                </a>
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="buy.php" target="imain">
                                    購買書籍
                                </a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="demo-card-square mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title mdl-card--expand"
                                 style="background: url('https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/063/78/0010637846.jpg&v=5ab2347ek&w=390&h=390') bottom no-repeat #9CACCD; ">
                            </div>
                            <div class="mdl-card__supporting-text">
                                <h2 class="mdl-card__title-text" style="color:#000">火星任務 (The Martian)</h2><br>
                                作者： 安迪‧威爾<br>
                                譯者： 翁雅如<br>
                                出版社：三采<br>
                                出版日期：2014/06/06<br>
                                語言：繁體中文<br>
                                定價：380元
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="https://www.books.com.tw/products/0010637846" target="_blank">
                                    查看介紹
                                </a>
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="buy.php" target="imain">
                                    購買書籍
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>

            </table>
        </div>
        <div class="mdl-tabs__panel" id="chinese_novel">
            <table width="80%" border="0" cellpadding="20" cellspacing="20">
                <tr>
                    <td>
                        <div class="demo-card-square mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title mdl-card--expand"
                                 style="background: url('https://cdnec.sanmin.com.tw/product_images/755/755946631.jpg') bottom no-repeat #9CACCD; ">
                            </div>
                            <div class="mdl-card__supporting-text">
                                <h2 class="mdl-card__title-text" style="color:#000">輕吻星芒(全2冊)</h2><br>
                                出版社：江蘇鳳凰文藝出版社<br>
                                作者：南之情<br>
                                裝訂／頁數：平裝／568頁<br>
                                規格：21cm*14.5cm*3cm (高/寬/厚)<br>
                                本數：2<br>
                                版次：一版<br>
                                出版日：2022/07/31<br>
                                定價：NT$390元<br>
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="https://www.sanmin.com.tw/Product/index/010582812" target="_blank">
                                    查看介紹
                                </a>
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="buy.php" target="imain">
                                    購買書籍
                                </a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="demo-card-square mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title mdl-card--expand"
                                 style="background: url('https://im2.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/063/73/0010637345.jpg&v=539062cak&w=400&h=400') bottom no-repeat #9CACCD; ">
                            </div>
                            <div class="mdl-card__supporting-text">
                                <h2 class="mdl-card__title-text" style="color:#000">思念的布朗尼</h2><br>
                                作者： Smile<br>
                                出版社：商周出版<br>
                                出版日期：2014/06/05<br>
                                語言：繁體中文<br>
                                定價：180元
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="https://www.books.com.tw/products/0010637345" target="_blank">
                                    查看介紹
                                </a>
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="buy.php" target="imain">
                                    購買書籍
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="demo-card-square mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title mdl-card--expand"
                                 style="background: url('https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/CN1/163/35/CN11633584.jpg&v=5e4c8f99k&w=400&h=400') bottom no-repeat #9CACCD; ">
                            </div>
                            <div class="mdl-card__supporting-text">
                                <h2 class="mdl-card__title-text" style="color:#000">白色橄欖樹（上下）</h2><br>
                                作者： 玖月晞<br>
                                出版社：百花洲文藝出版社<br>
                                出版日期：2019/04/01<br>
                                語言：簡體中文<br>
                                定價：419元
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="https://www.books.com.tw/products/CN11633584" target="_blank">
                                    查看介紹
                                </a>
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="buy.php" target="imain">
                                    購買書籍
                                </a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="demo-card-square mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title mdl-card--expand"
                                 style="background: url('https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/CN1/171/83/CN11718326.jpg&v=5f851f3bk&w=400&h=400') bottom no-repeat #9CACCD; ">
                            </div>
                            <div class="mdl-card__supporting-text">
                                <h2 class="mdl-card__title-text" style="color:#000">那個不為人知的故事</h2><br>
                                作者： TWENTINE<br>
                                出版社：四川文藝出版社<br>
                                出版日期：2020/09/01<br>
                                語言：簡體中文<br>
                                定價：252元
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="https://www.books.com.tw/products/CN11718326" target="_blank">
                                    查看介紹
                                </a>
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                                   href="buy.php" target="imain">
                                    購買書籍
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>

            </table>
        </div>
    </div>
</center>
</body>
</html>
