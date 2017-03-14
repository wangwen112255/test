<?php
define("TOKEN","wxabcdaa");
define("appid"    , "wx9e0d7eef1936b445"); //新增 +
define("appsecret", "90adba97c4a95586e5993e2050e9b8ae"); //新增
$wechatObj = new weChat();
//$wechatObj->TextMsg();
//$wechatObj->NewsMsg();
//接收消息的一个测试
//$wechatObj->getAccessToken();
//echo $wechatObj->accessToken;
//echo $wechatObj->getWxIp();
$wechatObj->Event();
$wechatObj->createMenus();

class weChat{
    public $accessTokenFile = 'accessToken.txt'; //accessToken文件地址 新增+
    public $accessToken;
    public $postObj;      //接收到的xml对象
    public $openId;       //客户的openId
    public $ourOpenId;    //我方公众号的openId
    public $msgType;      //客户消息的类型
    public $creatTime;
    public $re;
    //YONHU
    //构造函数用于接收消息
    public function __construct(){
        if(!empty($GLOBALS["HTTP_RAW_POST_DATA"])){
            //将xml转换成对象
            $postStr=$GLOBALS["HTTP_RAW_POST_DATA"];
            libxml_disable_entity_loader(true);
            $this->postObj      = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $this->openId       = $this->postObj->FromUserName;
            $this->ourOpenId    = $this->postObj->ToUserName;
            $this->msgType      = $this->postObj->MsgType;
            $this->creatTime    = $this->postObj->CreateTime;
            $this->re='<xml><ToUserName><![CDATA['.$this->openId.']]></ToUserName><FromUserName><![CDATA['.$this->ourOpenId.']]></FromUserName><CreateTime>time()</CreateTime>';
            $nowtime=date("Y-m-d H:i:s",time());

            $str='日期：'.$nowtime.'类型'.$this->msgType.'内容：'.$this->postObj->Content.'事件：'.$this->postObj->Event."\r\n";
            file_put_contents('slog.txt',$str,FILE_APPEND);
//            $handle = fopen("slog.txt", "a");
//            if ($handle) {
//                fwrite($handle, $str."\r\n");
//                fclose($handle);
//            }
        }
    }
    public function Event(){
        if($this->msgType == 'event'){
            //关注
            if($this->postObj->Event == 'subscribe'){
                $this->TextMsg('感谢您的关注');
            }
            //取消关注
            else if($this->postObj->Event == 'subscribe'){
                //取消关注功能代码可以写在这里
            }
        }
//客户发送地理位置
        else if($this->msgType == 'location'){
            $str = 'Location_X：'.$this->postObj->Location_X.' Location_Y:'.$this->postObj->Location_Y.' Label: '.$this->postObj->Label;
            //回推给客户
            $this->TextMsg($str);
        }
    }
    public function TextMsg($str){
    $xml='<MsgType><![CDATA[text]]></MsgType><Content><![CDATA['.$str.']]></Content></xml>';
    $this->ReMsg($xml);
    }

    public function NewsMsg(){
    $arlist=array(
        array('图文信息','这是一个图文信息','http://p2.so.qhimgs1.com/t014d3503dd2d67d728.jpg','http://www.baidu.com'),
        array('图文信息','这是一个图文信息','http://p2.so.qhimgs1.com/t014d3503dd2d67d728.jpg','http://www.baidu.com'),

        array('图文信息','这是一个图文信息','http://p2.so.qhimgs1.com/t014d3503dd2d67d728.jpg','http://www.baidu.com')
    );
        $xml='<MsgType><![CDATA[news]]></MsgType><ArticleCount>'.count($arlist).'</ArticleCount><Articles>';
      foreach($arlist as $item){
            $xml.='<item><Title><![CDATA['.$item[0].']]></Title><Description><![CDATA['.$item[1].']]></Description><PicUrl><![CDATA['.$item[2].']]></PicUrl><Url><![CDATA['.$item[3].']]></Url></item>';
        }
        $xml.='</Articles></xml>';
        file_put_contents('new.text',$xml);
        $this->ReMsg($xml);
    }
    public function ReMsg($msg){
        echo $this->re.$msg;
    }

    public function createMenus(){
        $this->getAccessToken();
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->accessToken;
        $menuDate = file_get_contents('menu.txt');
//        echo $menuDate;
//        echo "fsda";
        $res = $this->curlPost($url, $menuDate);
        echo $res;
    }
    public function getAccessToken(){
        //判断本地AccessToken是否存在，如果不存在就获取
        if(!file_exists($this->accessTokenFile)){
            $this->getAccessTokenBase();
        }else{
            $str = file_get_contents($this->accessTokenFile);
            $arr = json_decode($str, true);
            if(time() - $arr['get_time'] < ($arr['expires_in'] + 100)){$this->accessToken = $arr['access_token'];}else{$this->getAccessTokenBase();}
        }
    }
    public function getAccessTokenBase(){
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.appid.'&secret='.appsecret;
        $res = $this->curlGet($url); //返回格式 {"access_token":"xxx....","expires_in":7200}
        //将josn转换为数组
        $arr = json_decode($res, true);
        $arr['get_time'] = time();
        file_put_contents($this->accessTokenFile, json_encode($arr));
        $this->accessToken = $arr['access_token'];
    }
    public function getWxIp(){
        $this->getAccessToken();
        $url = 'https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token='.$this->accessToken;
        return $this->curlGet($url);
    }
    public function curlGet($url){
        $ch   = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST , false);
        curl_setopt($ch, CURLOPT_ENCODING       , 'gzip,deflate');
        $res  = curl_exec($ch);
        $this->curlStatus = curl_getinfo($ch);
        curl_close($ch);
        return $res;
    }
    /*
     * curl POST 方式
     * 参数1 $url
     * 参数2 $data 格式 array('name'=>'test', 'age' => 18)
     */
    public function curlPost($url, $data){
        $ch   = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST , false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_ENCODING       , 'gzip,deflate');
        $res  = curl_exec($ch);
        $this->curlStatus = curl_getinfo($ch);
        curl_close($ch);
        return $res;
    }
}
///**
// * Created by ${maomao}.
// * User: ${maomao}
// * Date: 2017/3/12
// * Time: 20:52
// */
//
//
//
//define("TOKEN", "wxabcdaa");
//$wechatObj = new wechatCallbackapiTest();
//if(!isset($_GET["echostr"])){
//    file_put_contents('list.html',$_GET['signature']."*".$_GET['timestamp']."*0".$_GET['echostr']."#1".$_GET['nonce'].'<br>',FILE_APPEND);
//    $wechatObj->responseMsg();
//}
//
//
//else{
//    //file_put_contents('ming.html',$_GET['echostr'],FILE_APPEND);
//   // file_put_contents('ming.html',$_GET['signature']."*".$_GET['timestamp']."*".$_GET['echostr']."#".$_GET['nonce'].'<br>',FILE_APPEND);
//    $wechatObj->valid();
//}
//class wechatCallbackapiTest
//{
//    public function valid()
//    {
//        $echoStr = $_GET["echostr"];
//
//        //valid signature , option
//        if($this->checkSignature()){
//            echo $echoStr;
//            exit;
//        }
//    }
//
//    public function responseMsg()
//    {
//        //get post data, May be due to the different environments
//        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
//
//        //extract post data
//        if (!empty($postStr)){
//            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
//               the best way is to check the validity of xml by yourself */
//            libxml_disable_entity_loader(true);
////            file_put_contents('log.txt',$postStr,FILE_APPEND);
//
//            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
//
//            $fromUsername = $postObj->FromUserName;
//            $toUsername = $postObj->ToUserName;
//            $keyword = trim($postObj->Content);
//            file_put_contents('log.txt',$fromUsername);
//            $time = time();
//            $textTpl = "<xml>
//							<ToUserName><![CDATA[%s]]></ToUserName>
//							<FromUserName><![CDATA[%s]]></FromUserName>
//							<CreateTime>%s</CreateTime>
//							<MsgType><![CDATA[%s]]></MsgType>
//							<Content><![CDATA[%s]]></Content>
//							<FuncFlag>0</FuncFlag>
//							</xml>";
//            if(!empty( $keyword ))
//            {
//                $msgType = "text";
//                $contentStr = "Welcome to wechat world!2013";
//                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
//                echo $resultStr;
//            }else{
//                echo "Input something...";
//            }
//
//        }else {
//            echo "";
//            exit;
//        }
//    }
//
//    private function checkSignature()
//    {
//        // you must define TOKEN by yourself
//        if (!defined("TOKEN")) {
//            throw new Exception('TOKEN is not defined!');
//        }
//
//        $signature = $_GET["signature"];
//        $timestamp = $_GET["timestamp"];
//        $nonce = $_GET["nonce"];
//
//        $token = TOKEN;
//        $tmpArr = array($token, $timestamp, $nonce);
//        // use SORT_STRING rule
//        sort($tmpArr, SORT_STRING);
//        $tmpStr = implode( $tmpArr );
//        $tmpStr = sha1( $tmpStr );
//
//        if( $tmpStr == $signature ){
//            return true;
//        }else{
//            return false;
//        }
//    }
//}
//
//**********************
?>
