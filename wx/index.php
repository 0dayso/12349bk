<?php
//定义TOKEN
define("TOKEN", "glivia");
include("./sdk/phpSDK.php");
include("./sdk/jsSDK.php");

 
$wechatObj = new wechatCallbackapiTest();

if (isset($_GET['echostr'])) {
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}

class wechatCallbackapiTest{
    //是否有效
    public function valid(){
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }
    //检查签名
    private function checkSignature(){
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce     = $_GET["nonce"];
        $token     = TOKEN;
        $tmpArr    = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr    = implode( $tmpArr );
        $tmpStr    = sha1( $tmpStr );
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
    //返回信息
    public function responseMsg(){
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        if (!empty($postStr)){
            $postObj      = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername   = $postObj->ToUserName;
            $keyword      = trim($postObj->Content);
            $time         = time();
            $msgType      = trim($postObj->MsgType);


            switch ($msgType){
                case "event":
                    $result = $this->receiveEvent($postObj);
                    break;
                case "text":
                    $result = $this->receiveText($postObj);
                    break;
            }

            echo $result;

        }else{
            echo "";
            exit;
        }
    }

    //接收为文本
    private function receiveText($object){
        
        //判断当前时间
        
        //$hour=date('G',time());

        $nowH = date('G',time());

        if( $nowH > 20 || $nowH < 9 ){

            $content = "我们的工作时间为:早上9点至晚上8点,您的需求我们会在明天的工作日中帮您处理!";
            $result = $this->transmitText($object, $content);
            return $result;

        }
    


    }


     
    //响应事件
    private function receiveEvent($object){
        $contentStr   = "";
        $fromUserName = $object->FromUserName;

        //获取openid
        $weixin    = new class_weixin_adv();
        $userInfo     = $weixin->get_user_info($fromUserName);
        $userName     = $userInfo["nickname"];

        switch ($object->Event){
            //订阅事件 
            case "subscribe":
                //$contentStr = "亲爱的{$userName},欢迎关注楼口12349公众平台!目前正在测试开发中!";
                //套餐介绍
                $contentStr[] = array(
                    "Title" =>"12349便民服务家政套餐,100元包全年。", 
                    "Description" =>"常州12349智慧生活服务平台", 
                    "PicUrl" =>"http://wx.12349.loukou.com/assets/images/shareBigPic.jpg", 
                    "Url" =>"http://wx.12349.loukou.com/pay/100.php"
                );
                //平台介绍
                $contentStr[] = array(
                    "Title" =>"亲爱的{$userName},欢迎关注楼口12349公众平台.", 
                    "Description" =>"常州市12349便民服务平台（以下简称12349平台）建于2010年9月7日，是由市、区两级人民政府共同打造的以“为老服务、公益服务、便民服务和生活咨询”为一体的公共服务信息平台。", 
                    "PicUrl" =>"http://wx.12349.loukou.com/assets/images/sharePic.jpg", 
                    "Url" =>"http://wx.12349.loukou.com/home.php"
                );
                break;
            //取消订阅事件
            case "unsubscribe":
                $contentStr = "期待您的下次关注，谢谢!";
                break;
            //CLICK事件
            case "CLICK":
                //自定义菜单的事件
                switch ($object->EventKey){ 
                    case "newAct":
                        $contentStr[] = array("Title" =>"12349便民服务家政套餐,100元包全年。", 
                        "Description" =>"常州12349智慧生活服务平台", 
                        "PicUrl" =>"http://wx.12349.loukou.com/assets/images/shareBigPic.jpg", 
                        "Url" =>"http://wx.12349.loukou.com/pay/100.php");
                        break;
                   // default:
                        // $contentStr[] = array("Title" =>"默认菜单回复", 
                        // "Description" =>"您正在使用的是方倍工作室的自定义菜单测试接口", 
                        // "PicUrl" =>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg", 
                        // "Url" =>"weixin://addfriend/pondbaystudio");
                        // break;
                }
                break;
            //发送地址
            case "LOCATION":
                //print_r();
                //$contentStr = "纬度 ".$object->Location_X." 经度".$object->Location_Y;
                break;
            default:
                break;      

        } 

       // print_r($contentStr);

        //如果是数组
        if (is_array($contentStr)){
            $resultStr = $this->transmitNews($object, $contentStr);
        }else{
            $resultStr = $this->transmitText($object, $contentStr);
        }
        return $resultStr;

    }

    //传输文本
    private function transmitText($object, $content, $funcFlag = 0){
        $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[text]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>%d</FuncFlag>
                    </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $funcFlag);
        return $resultStr;
    }

    //传输新闻
    private function transmitNews($object, $arr_item, $funcFlag = 0){
        //首条标题28字，其他标题39字
        if(!is_array($arr_item)){
            return;
        }

        $itemTpl = "<item>
                        <Title><![CDATA[%s]]></Title>
                        <Description><![CDATA[%s]]></Description>
                        <PicUrl><![CDATA[%s]]></PicUrl>
                        <Url><![CDATA[%s]]></Url>
                    </item>";
        $item_str = "";
        foreach ($arr_item as $item){
            $item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);
        }

        $newsTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
                        <Content><![CDATA[]]></Content>
                        <ArticleCount>%s</ArticleCount>
                        <Articles>$item_str</Articles>
                        <FuncFlag>%s</FuncFlag>
                    </xml>";

        $resultStr = sprintf($newsTpl, $object->FromUserName, $object->ToUserName, time(), count($arr_item), $funcFlag);
        return $resultStr;
    }
}
?>
