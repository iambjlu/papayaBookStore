<?php
date_default_timezone_set("Asia/Taipei"); //設定時區為台北時區
require_once('LINEBotTiny.php');
$website="https://887a-59-120-242-190.jp.ngrok.io/phpClass/FinalExam/index.php";
$menu="👋 您好
歡迎使用木瓜書城官方LINE帳號

—————————————————   
🌏 木瓜書城網址
—————————————————
$website


—————————————————
⭐ 功能
—————————————————
- 傳送 [選單] 可喚出此選單

- 傳送您的秘密通行碼在此進行簡易會員查詢操作。


—————————————————
ℹ 說明
—————————————————
- 網址若更新，會公告在選單

- 您可以在 書城主畫面>[您的用戶名稱] 找到秘密通行碼
—————————————————";

//$channelAccessToken = '';
//$channelSecret = '';

//採用config.ini方案的話
//if (file_exists(__DIR__ . '/config.ini')) {
$config = parse_ini_file("config.ini", true); //解析配置檔
if ($config['Channel']['Token'] == null || $config['Channel']['Secret'] == null) {
    error_log("config.ini 配置檔未設定完全！", 0); //輸出錯誤
} else {
    $channelAccessToken = $config['Channel']['Token'];
    $channelSecret = $config['Channel']['Secret'];
}
//} else {
//    $configFile = fopen("config.ini", "w") or die("Unable to open file!");
//    $configFileContent = '
//; Line Bot
//; 官方文檔：https://developers.line.biz/en/reference/messaging-api/
//[Channel]
//; 請在雙引號內傳送您的 Line Bot "Channel access token"
//Token = ""
//; 請在雙引號內傳送您的 Line Bot "Channel secret"
//Secret = ""
//';
//    fwrite($configFile, $configFileContent); //建立文件並寫入
//    fclose($configFile); //關閉文件
////    error_log("config.ini 配置檔建立成功，請編輯檔案填入資料！", 0); //輸出錯誤
//}
$message = null;
$event = null;

require_once("dbtools.inc.php");
header("Content-type: text/html; charset=utf-8");
// 建立資料連接
$link = create_connection();
$client = new LINEBotTiny($channelAccessToken, $channelSecret);

foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message': //訊息觸發
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
// //訊息為文字
//                    require_once('includes/text.php'); //Type: Text
//                    require_once('includes/image.php'); //Type: Image
//                    require_once('includes/video.php'); //Type: Video
//                    require_once('includes/audio.php'); //Type: Audio
//                    require_once('includes/location.php'); //Type: Location
//                    require_once('includes/sticker.php'); //Type: Sticker
//                    require_once('includes/imagemap.php'); //Type: Imagemap
//                    require_once('includes/template.php'); //Type: Template

                    switch ($message['text']) {

                        case '選單':
                            $client->replyMessage(array(
                                'replyToken' => $event['replyToken'],
                                'messages' => array(
                                    array(
                                        'type' => 'text',
                                        'text' => "$menu")
                                )
                            ));
                            break;

                        default:
                            $got_msg = $message['text'];
                            require_once("dbtools.inc.php");
                            header("Content-type: text/html; charset=utf-8");
                            $link = create_connection();
                            $sql = "SELECT * FROM user_data Where line_user_key = '$got_msg'";
                            $result = execute_sql($link, "papaya", $sql);
                            if (mysqli_num_rows($result) == 0) {
                                mysqli_free_result($result);
                                mysqli_close($link);

                                $client->replyMessage(array(
                                    'replyToken' => $event['replyToken'],
                                    'messages' => array(
                                        array(
                                            'type' => 'text', //訊息類型 (文字)
                                            'text' => "很抱歉，此訊息無效。
傳送[選單]以獲得功能說明
或是前往木瓜書城官網:
$website" //回覆訊息
                                        )
                                    )
                                ));

                            } else {
                                $id = mysqli_fetch_object($result)->account;
                                $sql = "SELECT * FROM order_data WHERE account = '$id' ORDER BY time DESC";
                                $result = execute_sql($link, "papaya", $sql);
                                if (mysqli_num_rows($result) == 0) {
                                    $order="查無訂單。
歡迎到書城網站下單";
                                }else{
                                    $order_n= mysqli_fetch_object($result)->order_number;
                                    $sql = "SELECT * FROM order_data WHERE order_number = '$order_n'";
                                    $result = execute_sql($link, "papaya", $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row["account"];
                                        $name = $row["name"];
                                        $phone = $row["phone"];
                                        $address = $row["address"];
                                        $sex=$row["sex"];
                                        $payment_method=$row["payment_method"];
                                        $tcount=$row["tcount"];
                                        $total=$row["total"];
                                        $order="訂單隨機碼:
$order_n
 
收件人:
$name $sex
 
電話:
$phone
 
收件地址:
$address

付款方式: 
$payment_method

訂單金額:
$tcount 本書 / 總金額 $total 元";
                                }

                                    $sql = "SELECT * FROM user_data WHERE account = '$id'";
                                    $result = execute_sql($link, "papaya", $sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $login1 = $row["login1"];
                                        $login2= $row["login2"];
                                        $login3=$row["login3"];
                                    }

                                    $message="👋 $id 您好
歡迎使用木瓜書城LINE查詢系統

————————————                                    
🌏 網站最近三筆登入資料
————————————
$login1;
$login2;
$login3;


————————————                              
📝 最近一筆訂單資料
————————————
$order


————————————
🔔 貼心提醒
————————————
- 資料以書城網站為準。
- 請時常更換密碼，保持帳號安全。
- 您可以在書城網站修改資料或密碼。
- 傳送 [選單] 以獲得功能說明和書城網址
- 重新傳送秘密通行碼，可以重新查詢最新資料
$website";

                                    $client->replyMessage(array(
                                        'replyToken' => $event['replyToken'],
                                        'messages' => array(
                                            array(
                                                'type' => 'text', //訊息類型 (文字)
                                                'text' => $message //回覆訊息
                                            )
                                        )
                                    ));
                                }

                            }
                            break;

                    }


                default:
                    //error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        case 'postback': //postback 觸發
            //require_once('postback.php'); //postback
            break;
        case 'follow': //加為好友觸發
            $client->replyMessage(array(
                'replyToken' => $event['replyToken'],
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "$menu")
                )
            ));
            break;
        case 'join': //加入群組觸發
            $client->replyMessage(array(
                'replyToken' => $event['replyToken'],
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => "大家好，歡迎使用木瓜書城官方帳號
木瓜書城最新的網址為 $website"
                    )
                )
            ));
            break;
        default:
            //error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
}

