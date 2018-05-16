<?php
// 获取访客系统
function getOS(){
	$os='';
	$Agent=$_SERVER['HTTP_USER_AGENT'];
	//return $Agent;
	if(preg_match('/Win/',$Agent)&&preg_match('/NT 5.0/',$Agent))
		$os='Win 2000';
	elseif(preg_match('/Win/',$Agent)&&preg_match('/NT 6.1/',$Agent))
		$os='Win 7';
	elseif(preg_match('/Win/',$Agent)&&preg_match('/NT 5.1/',$Agent))
		$os='Win XP';
	elseif(preg_match('/Win/',$Agent)&&preg_match('/NT 6.2/',$Agent))
		$os='Win 8';
	elseif(preg_match('/Win/',$Agent)&&preg_match('/NT 6.3/',$Agent))
		$os='Win 8.1';
	elseif(preg_match('/Win/',$Agent)&&preg_match('/NT 10/',$Agent))
		$os='Win 10';
	elseif(preg_match('/Win/',$Agent)&&preg_match('/NT/',$Agent))
		$os='Win';
	elseif(preg_match('/Win/',$Agent)&&ereg('/32/',$Agent))
		$os='Win 32';
	elseif(preg_match('/Mi/',$Agent))
		$os='小米';
	elseif(preg_match('/Android/',$Agent)&&ereg('/LG/',$Agent))
		$os='LG';
	elseif(preg_match('/Android/',$Agent)&&ereg('/M1/',$Agent))
		$os='魅族';
	elseif(preg_match('/Android/',$Agent)&&ereg('/MX4/',$Agent))
		$os='魅族4';
	elseif(preg_match('/Android/',$Agent)&&ereg('/M3/',$Agent))
		$os='魅族';
	elseif(preg_match('/Android/',$Agent)&&ereg('/M4/',$Agent))
		$os='魅族';
	elseif(preg_match('/Android/',$Agent)&&ereg('/H/',$Agent))
		$os='华为';
	elseif(preg_match('/Android/',$Agent)&&ereg('/vivo/',$Agent))
		$os='Vivo';
	elseif(preg_match('/Android/',$Agent))
		$os='Android';
	elseif(preg_match('/Linux/',$Agent))
		$os='Linux';
	elseif(preg_match('/Unix/',$Agent))
		$os='Unix';
	elseif(preg_match('/iPhone/',$Agent))
		$os='iPhone';
	elseif($os=='')
		$os='Unknown';	
	return $os;
}
// 获取发布时间
function getTime($time) {   
    $rtime = date("m-d H:i",$time);   //09-23 11:13
    $rtime2 = date("Y-m-d H:i",$time);  //2017-09-23 11:13 
    $htime = date("H:i",$time); //11:13
    $time = time() - $time;   //1506149726-1506136385
    if ($time < 60) {   
        $str = '刚刚';    
    }    
    elseif ($time < 60 * 60) {    
        $min = floor($time/60);   
        $str = $min.' 分钟前';    
    }   
    elseif ($time < 60 * 60 * 24) {   
        $h = floor($time/(60*60));   
        $str = $h.'小时前 ';   
    }else {   
        $str = $rtime2;    
    }    
    return $str;   
}
//获取最近时间
function getIntTime($time) {   
    $rtime = date("m-d H:i",$time);   //09-23 11:13
    $rtime2 = date("Y-m-d H:i",$time);  //2017-09-23 11:13 
    $htime = date("H:i",$time); //11:13
    $time = time() - $time;   //1506149726-1506136385
    if ($time < 60) {   
        $str = '刚刚';    
    }    
    elseif ($time < 60 * 60) {    
        $min = floor($time/60);   
        $str = $min.' 分钟前';    
    }   
    elseif ($time < 60 * 60 * 24) {   
        $h = floor($time/(60*60));   
        $str = $h.'小时前';   
    }  
    elseif ($time < 60 * 60 * 24 * 3) {    
        $d = floor($time/(60*60*24));   
        if($d==1)   
            $str = '昨天'.$htime;  
        else   
            $str = '前天'.$htime;   
    }  
    elseif ($time < 60 * 60 * 24 * 7) {  
        $d = floor($time/(60*60*24));  
        $str = $d.' 天前'.$htime;  
    } elseif ($time < 60 * 60 * 24 * 30) {  
        $str = $rtime;  
    }   
    else {   
        $str = $rtime2;    
    }    
    return $str;   
}
// 写入图片
function makeImg($str){
	$time = time();
	$s = base64_decode(str_replace('data:image/png;base64,', '', $str));
	file_put_contents('Uploads/comment/'.$time.'.jpg',$s);
	$url = '/Uploads/comment/'.$time.'.jpg';
	return $url;
}
//截取字符
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=false){

 if(function_exists("mb_substr")){

  if($suffix)

   return mb_substr($str, $start, $length, $charset)."...";

  else

   return mb_substr($str, $start, $length, $charset);

 }elseif(function_exists('iconv_substr')) {

  if($suffix)

   return iconv_substr($str,$start,$length,$charset)."...";

  else

   return iconv_substr($str,$start,$length,$charset);

 }

 $re['utf-8'] = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";

 $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";

 $re['gbk'] = "/[x01-x7f]|[x81-xfe][x40-xfe]/";

 $re['big5'] = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";

 preg_match_all($re[$charset], $str, $match);

 $slice = join("",array_slice($match[0], $start, $length));

 if($suffix) return $slice."…";

 return $slice;

}
// 设置缓存
function setS($key,$value){
    S($key,$value,C('S_TIME'));
}
// 替换表情
function reFace($str){
    for($i=0;$i<84;$i++){
        $str = str_replace("[em_$i]","<img src='".C('BLOG_URL')."/Public/Home/arclist/$i.gif' style='display:inline-block;width:20px;height:20px;'/>",$str);
    }
    return $str;
}
// 替换表情
function reFaceMy($str){
    for($i=0;$i<84;$i++){
        $str = str_replace("[mr:/$i]","<img src='".C('BLOG_URL')."/Public/Home/face/mr/$i.gif' style='display:inline-block;width:20px;height:20px;'/>",$str);
        $str = str_replace("[lxh:/$i]","<img src='".C('BLOG_URL')."/Public/Home/face/lxh/$i.gif' style='display:inline-block;width:20px;height:20px;'/>",$str);
        $str = str_replace("[gnl:/$i]","<img src='".C('BLOG_URL')."/Public/Home/face/gnl/$i.gif' style='display:inline-block;width:20px;height:20px;'/>",$str);
        $str = str_replace("[bzmh:/$i]","<img src='".C('BLOG_URL')."/Public/Home/face/bzmh/$i.gif' style='display:inline-block;width:20px;height:20px;'/>",$str);
    }
    return $str;
}

function getAThumb($str,$width=50,$height=50){
        $image = new \Think\Image(); 
        $image->open('.'.$str);
        $name = time();
        $image->thumb($width,$height,\Think\Image::IMAGE_THUMB_SCALE)->save('./Uploads/comment/'.$name.'.png');
        $url = '/Uploads/comment/'.$name.'.png';
        return $url;
}
//获取当前浏览器
function getBrowser() {
    $user_OSagent = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($user_OSagent, "Maxthon") && strpos($user_OSagent, "MSIE")) {
        $visitor_browser = "Maxthon(Microsoft IE)";
    } elseif (strpos($user_OSagent, "Maxthon 2.0")) {
        $visitor_browser = "Maxthon 2.0";
    } elseif (strpos($user_OSagent, "Maxthon")) {
        $visitor_browser = "Maxthon";
    } elseif (strpos($user_OSagent, "Edge")) {
        $visitor_browser = "Edge";
    } elseif (strpos($user_OSagent, "Trident")) {
        $visitor_browser = "IE";
    } elseif (strpos($user_OSagent, "MSIE")) {
        $visitor_browser = "IE";
    } elseif (strpos($user_OSagent, "MSIE")) {
        $visitor_browser = "MSIE 较高版本";
    } elseif (strpos($user_OSagent, "NetCaptor")) {
        $visitor_browser = "NetCaptor";
    } elseif (strpos($user_OSagent, "Netscape")) {
        $visitor_browser = "Netscape";
    } elseif (strpos($user_OSagent, "Chrome")) {
        $visitor_browser = "Chrome";
    } elseif (strpos($user_OSagent, "Lynx")) {
        $visitor_browser = "Lynx";
    } elseif (strpos($user_OSagent, "Opera")) {
        $visitor_browser = "Opera";
    } elseif (strpos($user_OSagent, "MicroMessenger")) {
        $visitor_browser = "微信浏览器";
    } elseif (strpos($user_OSagent, "Konqueror")) {
        $visitor_browser = "Konqueror";
    } elseif (strpos($user_OSagent, "Mozilla/5.0")) {
        $visitor_browser = "Mozilla";
    } elseif (strpos($user_OSagent, "Firefox")) {
        $visitor_browser = "Firefox";
    } elseif (strpos($user_OSagent, "U")) {
        $visitor_browser = "Firefox";
    } else {
        $visitor_browser = "其它";
    }
    return $visitor_browser;
}
function getIp($ip){
   $Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
   $area = $Ip->getlocation($ip);
   return $area['country'];
}
?>