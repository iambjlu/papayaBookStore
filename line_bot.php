<?php
date_default_timezone_set("Asia/Taipei"); //設定時區為台北時區

require_once('LINEBotTiny.php');

//------資料庫撈Token和Secret
require_once("dbtools.inc.php");
header("Content-type: text/html; charset=utf-8");
$link = create_connection();
$sql = "SELECT * FROM line_api_key";
$result = execute_sql($link, "line_api_key", $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $channelAccessToken = $row["Token"];
    $channelSecret = $row["Secret"];
}
mysqli_free_result($result);
mysqli_close($link);
//-----資料庫結束


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
//; 請在雙引號內輸入您的 Line Bot "Channel access token"
//Token = ""
//; 請在雙引號內輸入您的 Line Bot "Channel secret"
//Secret = ""
//';
//    fwrite($configFile, $configFileContent); //建立文件並寫入
//    fclose($configFile); //關閉文件
////    error_log("config.ini 配置檔建立成功，請編輯檔案填入資料！", 0); //輸出錯誤
//}
$message = null;
$event = null;
$status = "none";
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
                    switch ($status) {
                        case'none':
                            switch ($message['text']) {

                                case '選單':
                                    $client->replyMessage(array(
                                        'replyToken' => $event['replyToken'],
                                        'messages' => array(
                                            array(
                                                'type' => 'text',
                                                'text' => '您好，歡迎使用木瓜書城官方帳號
請輸入文字進行操作:
1) 綁定木瓜書城帳號
2) 近三筆登入紀錄
3) 查詢近三筆訂單
4) 前往書城首頁(網址可能隨時更新)
5) 轉接Messenger真人客服

輸入[選單]可隨時呼叫此選單。')
                                        )
                                    ));
                                    break;

                                case '1':
                                    $status = "account";
                                    $client->replyMessage(array(
                                        'replyToken' => $event['replyToken'],
                                        'messages' => array(
                                            array(
                                                'type' => 'text', //訊息類型 (文字)
                                                'text' => '請輸入帳號。
如欲取消，請輸入取消。' //回覆訊息
                                            )
                                        )
                                    ));
                                    $status = "password";
                                    break;

                                case '2':
                                    $status = "account";
                                    $client->replyMessage(array(
                                        'replyToken' => $event['replyToken'],
                                        'messages' => array(
                                            array(
                                                'type' => 'text', //訊息類型 (文字)
                                                'text' => '請輸入帳號。
如欲取消，請輸入取消。' //回覆訊息
                                            )
                                        )
                                    ));
                                    $status = "password";
                                    break;

                                default:
                                    $client->replyMessage(array(
                                        'replyToken' => $event['replyToken'],
                                        'messages' => array(
                                            array(
                                                'type' => 'text', //訊息類型 (文字)
                                                'text' => '哈囉。' //回覆訊息
                                            )
                                        )
                                    ));
                                    break;
                            }
                            break;


                        default:
                            //error_log("Unsupporeted message type: " . $message['type']);
                            break;
                    }
                case 'account':
                    $status = "password";
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text', //訊息類型 (文字)
                                'text' => '請輸入密碼。
如欲取消，請輸入取消。' //回覆訊息
                            )
                        )
                    ));
                    $status = "password";
                    break;

                case 'password':
                    $status = "password";
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text', //訊息類型 (文字)
                                'text' => '請輸入密碼。
如欲取消，請輸入取消。' //回覆訊息
                            )
                        )
                    ));
                    $status = "password";
                    break;

                default:
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
                        'text' => '您好，這是一個範例 Bot OuO
範例程式開源至 GitHub (包含教學)：
https://github.com/GoneTone/line-example-bot-php'
                    )
                )
            ));
            break;
        case 'join': //加入群組觸發
            $client->replyMessage(array(
                'replyToken' => $event['replyToken'],
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => '大家好，這是一個範例 Bot OuO
範例程式開源至 GitHub (包含教學)：
https://github.com/GoneTone/line-example-bot-php'
                    )
                )
            ));
            break;
        default:
            //error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
}

