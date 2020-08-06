<?php
include('config.php');

function post($url,$data,$ua) {
$ch = curl_init ();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
$result = curl_exec ($ch);
curl_close($ch);
return $result;
}
function get($url,$ua) {
$ch = curl_init ();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec ($ch);
curl_close($ch);
return $result;
}
system('clear');
$m="\033[1;30m[\033[1;32m•\033[1;30m] \033[0;37m";
$js=json_decode($acc,true)["data"];
$akun =count($js);
echo "\033[1;30m[\033[1;32m•\033[1;30m] \033[0;37mTotal account ".$akun."\n\n";
for($ak=0;$ak<$akun;$ak++){
echo $m;
$ua=array();
$ua[]="Host: ai2.caping.co.id";
$ua[]='accept: application/json';
$ua[]="user-agent: Mozilla/5.0 (Linux; Android 9; RMX1911 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.101 Mobile Safari/537.36;CapingNews/5.2.4";
$u = "u=".$js[$ak]['u'].";n=".$js[$ak]['n'];
$ua[]="cookie: ".$u;
$ua[]='content-type: application/json';
$url1="https://ai2.caping.co.id/v2/event/signin";
  $url = 'https://ai2.caping.co.id/v2/user/login/visitor';
  $data='{"city":"Jakarta"}';
  $name=json_decode(post($url,$data,$ua),true)['data']['user_name'];
  echo "\033[0;32m".json_decode(post($url,$data,$ua),true)['data']['user_name'];
  $url=$url1;
  echo " \033[0;37mSign \033[0;32m".json_decode(get($url,$ua),true)['message'];
$url="https://ai2.caping.co.id/v2/event/random";
echo " \033[0;37mBonus \033[0;32m".json_decode(get($url,$ua),true)['data']['get_coin']."\n";
}
system('clear');
for($misi=0;$misi<2;$misi++){
if($misi==0){ echo "\033[0;32m"; system('figlet News'); $up=45; }else{ echo "\033[0;32m"; system('figlet Videos'); $up=20; }
for($xx=0;$xx<$up;$xx++){
for($ak=0;$ak<$akun;$ak++){

$url='https://ai2.caping.co.id/v2/news/getNewsList2';
$page=$xx+1;
$data1=array('{"articleType":1,"channelId":0,"count":10,"isUpQuery":0,"lastId":0,"page":'.$page.',"publishdate":""}','{"articleType":512,"channelId":0,"page":'.$page.'}');
$data=$data1[$misi];
$a = json_decode(post($url,$data,$ua),true)['data']['list'];
$ua=array();
$ua[]="Host: ai2.caping.co.id";
$ua[]="user-agent: Mozilla/5.0 (Linux; Android 9; RMX1911 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.101 Mobile Safari/537.36;CapingNews/5.2.4";
$u = "u=".$js[$ak]['u'].";n=".$js[$ak]['n'];
$aut=$js[$ak]['aut'];
$ts=$js[$ak]['ts'];
$index=$js[$ak]['index'];
$ua[]="cookie: ".$u;
$ua[]='authorization: '.$aut;
$ua[]='ts: '.$ts;
$ua[]='index: '.$index;
$ua[]='content-type: application/json';
echo "\033[1;30m[\033[1;32m•\033[1;30m] \033[0;37m";
 $id=$a[0]['NewsId'];
 $url='https://ai2.caping.co.id/v2/event/report';
 $data1=array('{"reports":[{"action":"browse_news","list":[{"articleType":1,"newsId":'.$id.',"status":1,"times":2,"totalms":38}]}]}','{"reports":[{"action":"watch_video","list":[{"articleType":512,"newsId":'.$id.',"status":1,"times":2,"totalms":22}]}]}');
 $data=$data1[$misi];
 if(json_decode(post($url,$data,$ua),true)['message'] == "OK") {
 $url='https://ai2.caping.co.id/v2/user/ccsp/detail';
 $json =json_decode(get($url,$ua),true)['data'];
 $uid = $json['uid'];
 $coin = $json['coin'];
 $money = $json['money'];
 $url = 'https://ai2.caping.co.id/v2/user/login/visitor';
  $data='{"city":"Jakarta"}';
  $name=json_decode(post($url,$data,$ua),true)['data']['user_name'];
 echo $name." \033[0;37m".$uid." Coin \033[0;33m".$coin."  \033[0;32mRp\033[1;30m: \033[0;37m".$money."\n";
 }else{
echo $name."\n";
//    echo "\r";
    } //else
   } //ak
echo "\033[0;37m - - - - - - - - - - - - - - - - - - - \n";
sleep(10);
 } //xx
} //misi
system('exit');
