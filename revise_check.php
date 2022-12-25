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
    <script>let card_used = "0";</script>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        body {
            font-family: "Roboto", "PingFang TC", AppleGothic, "微軟正黑體", "Microsoft JhengHei";
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


<br><br><br><br>
<center>
    <div class="demo-card-square mdl-card mdl-shadow--2dp" style="alignment: center">
        <div class="mdl-card__title mdl-card--expand"
             style="background: url('source/welcome_rounded.png') center no-repeat #9CACCD; ">
        </div>
        <div class="mdl-card__supporting-text">
            <h2 class="mdl-card__title-text" style="color:#000;font-size: x-large;font-weight: bold">
                會員資料修改結果</h2><br>
            <p id="card_message" style="text-align: left;color:#000;font-size: 16px;"></p>
        </div>
        <div class="mdl-card__actions mdl-card--border" id="card_button"></div>
    </div>
</center>

<?php
$id = $_COOKIE["id"];
if ($_POST["name"] == "" || $_POST["phone"] == "" || $_POST["address"] == "") {
    echo '<script>
card_used="1";
document.getElementById("card_message").innerHTML = "會員資料修改失敗。<br>請完成會員資料填寫。";
document.getElementById("card_button").innerHTML = `<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="history.back();" >
                好
            </button>`;
</script>';

} else if ($_POST["password"] == "") {
    $name = $_POST["name"];
    if (mb_strlen($name) >= 2 and mb_strlen($name) <= 10) {
        $phone = $_POST["phone"];
        if (strlen($phone) <= 10) {
            $address = $_POST["address"];
            if (mb_strlen($address) <= 100) {
// 建立資料連接
                require_once("dbtools.inc.php");
                header("Content-type: text/html; charset=utf-8");
                $link = create_connection();
                $sql = "UPDATE user_data SET name = '$name',  phone = '$phone', address = '$address' WHERE account='$id'";
                $result = execute_sql($link, "papaya", $sql);
//    $host = 'localhost';
//    $dbuser = 'root';
//    $dbpassword = '';
//    $dbname = 'papaya';
//    $link = mysqli_connect($host, $dbuser, $dbpassword, $dbname);

//if($link){
//    mysqli_query($link,'SET NAMES utf8');
//    echo "正確連接資料庫";
//}
//else {
//    echo "不正確連接資料庫</br>" . mysqli_connect_error();
//}

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
            } else {
                echo '<script>
    card_used="1";
    document.getElementById("card_message").innerHTML = "會員資料修改失敗。<br>住址長度錯誤。";
    document.getElementById("card_button").innerHTML = `<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="history.back();" >
                好
            </button>`;
</script>';
            }
        } else {
            echo '<script>
    card_used="1";
    document.getElementById("card_message").innerHTML = "會員資料修改失敗。<br>電話格式錯誤。";
    document.getElementById("card_button").innerHTML = `<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="history.back();" >
                好
            </button>`;
</script>';
        }
    } else {
        echo '<script>
    card_used="1";
    document.getElementById("card_message").innerHTML = "會員資料修改失敗。<br>姓名格式錯誤。";
    document.getElementById("card_button").innerHTML = `<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="history.back();" >
                好
            </button>`;
</script>';

    }
} else {
    $password = $_POST["password"];
    $password_c = $_POST["password_c"];

    if ($password == $password_c) {
        if (preg_match('/[a-zA-Z0-9]/', $password) and strlen($password) >= 8 and strlen($password) <= 20) {
            $name = $_POST["name"];
            if (mb_strlen($name) >= 2 and mb_strlen($name) <= 10) {
                $phone = $_POST["phone"];
                if (strlen($phone) <= 10) {
                    $address = $_POST["address"];
                    if (mb_strlen($address) <= 100) {
// 建立資料連接
                        require_once("dbtools.inc.php");
                        header("Content-type: text/html; charset=utf-8");
                        $link = create_connection();
                        $sql = "UPDATE user_data SET password = '$password', name = '$name',  phone = '$phone', address = '$address' WHERE account='$id'";
                        $result = execute_sql($link, "papaya", $sql);
//    $host = 'localhost';
//    $dbuser = 'root';
//    $dbpassword = '';
//    $dbname = 'papaya';
//    $link = mysqli_connect($host, $dbuser, $dbpassword, $dbname);

//if($link){
//    mysqli_query($link,'SET NAMES utf8');
//    echo "正確連接資料庫";
//}
//else {
//    echo "不正確連接資料庫</br>" . mysqli_connect_error();
//}

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
                    } else {
                        echo '<script>
    card_used="1";
    document.getElementById("card_message").innerHTML = "會員資料修改失敗。<br>住址長度錯誤。";
    document.getElementById("card_button").innerHTML = `<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="history.back();" >
                好
            </button>`;
</script>';
                    }
                } else {
                    echo '<script>
    card_used="1";
    document.getElementById("card_message").innerHTML = "會員資料修改失敗。<br>電話格式錯誤。";
    document.getElementById("card_button").innerHTML = `<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="history.back();" >
                好
            </button>`;
</script>';
                }
            } else {
                echo '<script>
    card_used="1";
    document.getElementById("card_message").innerHTML = "會員資料修改失敗。<br>姓名格式錯誤。";
    document.getElementById("card_button").innerHTML = `<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="history.back();" >
                好
            </button>`;
</script>';
            }
        } else {
            echo '<script>
    card_used="1";
    document.getElementById("card_message").innerHTML = "會員資料修改失敗。<br>密碼格式錯誤。";
    document.getElementById("card_button").innerHTML = `<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="history.back();" >
                好
            </button>`;
</script>';
        }
    } else {
        echo '<script>
    card_used="1";
    document.getElementById("card_message").innerHTML = "會員資料修改失敗。<br>兩次輸入的密碼不一致。";
    document.getElementById("card_button").innerHTML = `<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="history.back();" >
                好
            </button>`;
</script>';
    }
}
?>

<script>if (card_used == "0") {
        <?php
        setcookie("id", "訪客");
        setcookie("passed", "guest");
        ?>
        let message = "<?php
            echo $name . "您好<br>恭喜您的資料已修改完成囉!<br>即將自動登出，<br>資料將於下次登入生效。";
            ?>";
        document.getElementById("card_message").innerHTML = message;
        document.getElementById("card_button").innerHTML = `<div class="mdl-spinner mdl-js-spinner is-active"></div>`;
        setTimeout(function() {
            top.window.location.href='index.php';
        }, 5000);
    }
</script>

</body>
</html>
