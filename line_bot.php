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
//    $config = parse_ini_file("config.ini", true); //解析配置檔
//    if ($config['Channel']['Token'] == null || $config['Channel']['Secret'] == null) {
//        error_log("config.ini 配置檔未設定完全！", 0); //輸出錯誤
//    } else {
//        $channelAccessToken = $config['Channel']['Token'];
//        $channelSecret = $config['Channel']['Secret'];
//    }
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
$client = new LINEBotTiny($channelAccessToken, $channelSecret);


foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message': //訊息觸發
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    //訊息為文字
//                    require_once('includes/text.php'); //Type: Text
//                    require_once('includes/image.php'); //Type: Image
//                    require_once('includes/video.php'); //Type: Video
//                    require_once('includes/audio.php'); //Type: Audio
//                    require_once('includes/location.php'); //Type: Location
//                    require_once('includes/sticker.php'); //Type: Sticker
//                    require_once('includes/imagemap.php'); //Type: Imagemap
//                    require_once('includes/template.php'); //Type: Template
//                    require_once('includes/flex.php'); //Type: Flex

                    if (strtolower($message['text']) == "buttons template" || $message['text'] == "按鈕模板") {
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'template', //訊息類型 (模板)
                                    'altText' => 'Example buttons template', //替代文字
                                    'template' => array(
                                        'type' => 'buttons', //類型 (按鈕)
                                        'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', //圖片網址 <不一定需要>
                                        'title' => 'Example Menu', //標題 <不一定需要>
                                        'text' => 'Please select', //文字
                                        'actions' => array(
                                            array(
                                                'type' => 'postback', //類型 (回傳)
                                                'label' => 'Postback example', //標籤 1
                                                'data' => 'action=buy&itemid=123' //資料
                                            ),
                                            array(
                                                'type' => 'message', //類型 (訊息)
                                                'label' => 'Message example', //標籤 2
                                                'text' => 'Message example' //用戶發送文字
                                            ),
                                            array(
                                                'type' => 'uri', //類型 (連結)
                                                'label' => 'Uri example', //標籤 3
                                                'uri' => 'https://github.com/GoneToneStudio/line-example-bot-tiny-php' //連結網址
                                            )
                                        )
                                    )
                                )
                            )
                        ));
                    }
                    switch($message['text']){
                        case '登入帳號':
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
                        break;

                        case '選單':
                            $client->replyMessage(array(
                                'replyToken' => $event['replyToken'],
                                'messages' => array(
                                    array(
                                        'type' => 'text',
                                        'text' => '您好，歡迎使用木瓜書城官方帳號
請選擇要進行的操作'
                                    ),
                                    array(
                                        'type' => 'template', //訊息類型 (模板)
                                        'altText' => '', //替代文字
                                        'template' => array(
                                            'type' => 'buttons', //類型 (按鈕)
                                            'thumbnailImageUrl' => 'https://887a-59-120-242-190.jp.ngrok.io/phpClass/FinalExam/source/welcome_square.png', //圖片網址 <不一定需要>
                                            'title' => '木瓜書城', //標題 <不一定需要>
                                            'text' => '您稍後可以傳送「選單」重新喚出此選單', //文字
                                            'actions' => array(
                                                array(
                                                    'type' => 'message', //類型 (回傳)
                                                    'label' => '登入帳號', //標籤 1
                                                    'text' => '登入帳號' //資料
                                                ),
                                                array(
                                                    'type' => 'message', //類型 (訊息)
                                                    'label' => '真人客服', //標籤 2
                                                    'text' => '真人客服' //用戶發送文字
                                                ),
                                                array(
                                                    'type' => 'message', //類型 (連結)
                                                    'label' => '訂單編號查詢', //標籤 3
                                                    'text' => '訂單編號查詢' //連結網址
                                                )
                                            )
                                        )

                                    )
                                )
                            ));
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
                        'text' => '您好，歡迎使用木瓜書城官方帳號
請選擇要進行的操作'
                    ),
                    array(
                        'type' => 'template', //訊息類型 (模板)
                        'altText' => '', //替代文字
                        'template' => array(
                            'type' => 'buttons', //類型 (按鈕)
                            'thumbnailImageUrl' => '![](source/welcome_square.png)', //圖片網址 <不一定需要>
                            'title' => '木瓜書城', //標題 <不一定需要>
                            'text' => '您稍後可以傳送「選單」重新喚出此選單', //文字
                            'actions' => array(
                                array(
                                    'type' => 'message', //類型 (回傳)
                                    'label' => '登入帳號', //標籤 1
                                    'text' => '登入帳號' //資料
                                ),
                                array(
                                    'type' => 'message', //類型 (訊息)
                                    'label' => '真人客服', //標籤 2
                                    'text' => '真人客服' //用戶發送文字
                                ),
                                array(
                                    'type' => 'message', //類型 (連結)
                                    'label' => '訂單編號查詢', //標籤 3
                                    'text' => '訂單編號查詢' //連結網址
                                )
                            )
                        )
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

