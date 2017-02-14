<?php
/*
نوشته شده توسط @MikailVigeo
تیم @PBotTeam
لطفا حق نشر رعایت شود!
*/
define('API_KEY','********');
//----######------
function funbot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$result=json_decode($message,true);
//##############=--API_REQ
function apiRequest($method, $parameters) {
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }
  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }
  foreach ($parameters as $key => &$val) {
    // encoding to JSON array parameters, for example reply_markup
    if (!is_numeric($val) && !is_string($val)) {
      $val = json_encode($val);
    }
  }
  $url = "https://api.telegram.org/bot".API_KEY."/".$method.'?'.http_build_query($parameters);
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  return exec_curl_request($handle);
}
//----######------
//---------
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
//=========
$chat_id = $update->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$from_id = $update->message->from->id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$t = isset($update->message->text)?$update->message->text:'';
$reply = $update->message->reply_to_message->forward_from->id;
$sticker = $update->message->sticker;
$text = $update->message->text;
$result = json_decode($message,true);
$data = $update->callback_query->data;
$forward = $update->message->forward_from;
$reply = $update->message->reply_to_message->forward_from->id;
$admin = 195651268;
$joke = file_get_contents("https://api.codesupport.ir/joke.php");
$fal = file_get_contents("http://api.roonx.com/falhafez/index.php");
$love = file_get_contents("http://api.roonx.com/textlove/index.php");
$dastan = file_get_contents("http://api.roonx.com/dastankotah/index.php");
$chistan = file_get_contents("http://api.roonx.com/chistan/index.php");
$danstaniha = file_get_contents("http://api.roonx.com/danstaniha/index.php");
$time = file_get_contents("https://api.codesupport.ir/td?td=time");
$date = file_get_contents("https://api.codesupport.ir/td?td=date");

//-------


function SendMessage($ChatId, $TextMsg)
{
 funbot('sendMessage',[
'chat_id'=>$ChatId,
'text'=>$TextMsg,
'parse_mode'=>"MarkDown"
]);
}
function SendM($ChatId, $TextMsg)
{
 funbot('sendMessage',[
'chat_id'=>$ChatId,
'text'=>$TextMsg,
'parse_mode'=>"html"
]);
}
function SendSticker($ChatId, $sticker_ID)
{
 funbot('sendSticker',[
'chat_id'=>$ChatId,
'sticker'=>$sticker_ID
]);
}
function bots($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function typing($chat_id)
{
file_get_contents(API_TELEGRAM.'sendChatAction?chat_id='.$chat_id.'&action=typing');
}
function Forward($KojaShe,$AzKoja,$KodomMSG)
{
funbot('ForwardMessage',[
'chat_id'=>$KojaShe,
'from_chat_id'=>$AzKoja,
'message_id'=>$KodomMSG
]);
}
function save($filename,$TXTdata)
  {
  $myfile = fopen($filename, "w") or die("Unable to open file!");
  fwrite($myfile, "$TXTdata");
  fclose($myfile);
  }
//==========
if($t == "/start"){
var_dump(funbot('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"سلام $name عزیز😶
من یک ربات تفریحی هستم😋
میتونم سرگرمت کنم:
برات جوک بگم
یک حدیث بهت بگم
فال حافظ برات بگیرم و چیزهای دیگه😁
فقط کافیه انتخاب کنی دوست من😍",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"😂جوک😂"],['text'=>"📜فال📜"],['text'=>"❤️متن عاشقانه❤️"]
              ],
			  [
			  ['text'=>"❓چیستان❔"],['text'=>"⏰زمان⏰"],['text'=>"😱دانستنی😱"]
			  ],
              [
                ['text'=>"📔داستان📔"],['text'=>"📲تاریخ📲"]
              ]
            ]
        ])
    ]));  
}
elseif($t == "😂جوک😂"){
var_dump(funbot('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>$joke,
        'parse_mode'=>'html',
    ]));  
}
elseif($t == "📜فال📜"){
var_dump(funbot('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>$fal,
        'parse_mode'=>'html',
    ]));  
}
elseif($t == "❤️متن عاشقانه❤️"){
var_dump(funbot('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>$love,
        'parse_mode'=>'html',
    ]));  
}
elseif($t == "📔داستان📔"){
var_dump(funbot('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>$dastan,
        'parse_mode'=>'html',
    ]));  
}
elseif($t == "❓چیستان❔"){
var_dump(funbot('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>$chistan,
        'parse_mode'=>'html',
    ]));  
}
elseif($t == "⏰زمان⏰"){
var_dump(funbot('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>$time,
        'parse_mode'=>'html',
    ]));  
}
elseif($t == "😱دانستنی😱"){
var_dump(funbot('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>$danstaniha,
        'parse_mode'=>'html',
    ]));  
}
elseif($t == "📲تاریخ📲"){
var_dump(funbot('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>$date,
        'parse_mode'=>'html',
    ]));  
}
?>
