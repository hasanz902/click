<?php
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('Asia/Makassar');
include('bahan.php');
system('clear');
if(file_exists("cookie.txt")){ system('rm cookie.txt'); }
include('akun.php');
$jumlah = count($akun);
echo "  Jumlah Account =] ";
$x=trim(fgets(STDIN));
for($x=$x;$x<$jumlah;$x++){

$a1="\033[1;30m[\033[1;32m•\033[1;30m] \033[0;37m";
$a2="\033[1;30m[\033[1;31mx\033[1;30m] \033[0;37m";

$name = $akun[$x];

$ua=array();
$ua[]="Host: 399shop-api.ahzhongy.com";
$ua[]="Connection: keep-alive";
$ua[]="Access-Control-Request-Method: POST";
$ua[]="Access-Control-Request-Headers: content-type,ip,language";
$ua[]="Origin: https://399shop-www.ahzhongy.com";
$ua[]="Referer: https://399shop-www.ahzhongy.com/";
$ua[]="User-Agent: Mozilla/5.0 (Linux; Android 10; RMX1911) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36";
$ua[]="Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7";
option($ua);
echo "\033[0;37m- - - - - - - - - - - - - - - - \n";
$x1 = $x+1;
echo $a1.$name."   account \033[1;30m: \033[1;32m".$x1."\033[0;37m|\033[1;30m".$jumlah." \n";
echo "\033[0;37m- - - - - - - - - - - - - - - - \n";
$file = file('cookie.txt');
$data = $file[4];
$sub  = substr($data,69);
$session = str_replace('
', "",$sub);

$ua = array();
$ua[]="Host: 399shop-api.ahzhongy.com";
$ua[]="language: id";
$ua[]="User-Agent: Mozilla/5.0 (Linux; Android 10; RMX1911) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36";
$ua[]="Content-Type: application/json;charset=UTF-8";
$ua[]="Origin: https://399shop-www.ahzhongy.com";
$ua[]="Referer: https://399shop-www.ahzhongy.com/";
$ua[]="Cookie: ASP.NET_SessionId=".$session;
$url = "https://399shop-api.ahzhongy.com/api/PlayerVue/Login";
$data = '{"username":"'.$name.'","password":"martapura","IsKeepPWD":true}';
$result = json_decode(post($url,$data,$ua),true);
$token = json_decode($result,true)["data"]["Message"];
/*$cek_balance error*/
for( $cek_balance=0;$cek_balance < 100;$cek_balance++){
$ua = array();
$ua[]="Host: 399shop-api.ahzhongy.com";
$ua[]="Connection: keep-alive";
$ua[]="language: id";
$ua[]="User-Agent: Mozilla/5.0 (Linux; Android 10; RMX1911) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36";
$ua[]="token: ".$token;
$ua[]="Origin: https://399shop-www.ahzhongy.com";
$ua[]="Referer: https://399shop-www.ahzhongy.com/";
$ua[]="Cookie: ASP.NET_SessionId=".$session;
$url = "https://399shop-api.ahzhongy.com/api/PlayerVue/Index";
$data = "";
$result = json_decode(post($url,$data,$ua),true);
$balance = json_decode($result,true)["data"]["pModel"]["balance"];
if($balance != null or $name == "lungko_babat8396" or $name == "lungko_babat1306"){
echo $a1."cek_balance ";
$cek_balance=100;
}else{
 $ua = array();
 $ua[]="Host: 399shop-api.ahzhongy.com";
 $ua[]="Connection: keep-alive";
 $ua[]="language: id";
 $ua[]="User-Agent: Mozilla/5.0 (Linux; Android 10; RMX1911) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36";
 $ua[]="token: ".$token;
 $ua[]="Origin: https://399shop-www.ahzhongy.com";
 $ua[]="Referer: https://399shop-www.ahzhongy.com/";
 $ua[]="Cookie: ASP.NET_SessionId=".$session;
 $url = "https://399shop-api.ahzhongy.com/api/PlayerVue/Index";
 $data = "";
 $result = json_decode(post($url,$data,$ua),true);
 echo $a2."memulai ulang ";
 sleep(3);
 $balance = json_decode($result,true)["data"]["pModel"]["balance"];

 }
echo "\r                                    \r";
}

echo $a1."balance \033[1;30m: \033[0;32m".$balance."\n";
$url = "https://399shop-api.ahzhongy.com/api/MY/GetUserAddr";
$data = "{}";
$result = json_decode(post($url,$data,$ua),true);
if(json_decode($result,true)["data"]["list"][0] != null){
echo "\r";
}else{
$url = "https://399shop-api.ahzhongy.com/api/MY/UpdateUserAddr";
$data = '{"uaid":"0","name":"Mr","tel":"081122334455","postcode":null,"area":"Jl.","addr":null,"issuggest":true}';
$result = json_decode(post($url,$data,$ua),true);
echo $a1."Addr \033[1;30m: \033[0;37m".json_decode($result,true)["msg"]."\n";
}

for($limit=0; $limit < 100;$limit++){
$ua = array();
$ua[]="Host: 399shop-api.ahzhongy.com";
$ua[]="Connection: keep-alive";
$ua[]="Accept: application/json, text/plain, */*";
$ua[]="User-Agent: Mozilla/5.0 (Linux; Android 10; RMX1911) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36";
$ua[]="token: ".$token;
$ua[]="Origin: https://399shop-www.ahzhongy.com";
$ua[]="Referer: https://399shop-www.ahzhongy.com/";
$ua[]="Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7";
$ua[]="Cookie: ASP.NET_SessionId=".$session;
$url = "https://399shop-api.ahzhongy.com/api/MY/GetTop2Order";
$data = "";
$js = json_decode(post($url,$data,$ua),true);
$guid = json_decode($js,true)['data'][0]['guid'];

if($balance > 10000 ){echo "\r";

$ua =array();
$ua[]="Host: 399shop-api.ahzhongy.com";
$ua[]="Connection: keep-alive";
$ua[]="User-Agent: Mozilla/5.0 (Linux; Android 10; RMX1911) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36";
$ua[]="Content-Type: application/json;charset=UTF-8";
$ua[]="token: ".$token;
$ua[]="Origin: https://399shop-www.ahzhongy.com";
$ua[]="Referer: https://399shop-www.ahzhongy.com/";
$ua[]="Cookie: ASP.NET_SessionId=".$session;
$url = "https://399shop-api.ahzhongy.com/api/MY/Grab";
$data = '{"guid":'.$guid.',"cid":"1"}';
$js = json_decode(post($url,$data,$ua),true);
$guid = json_decode($js,true)['data'];
$info = json_decode($js,true)["msg"];


if($info == "抢单失败,有订单未完成支付"){
echo $a1.$info."\n";
$url = "https://399shop-api.ahzhongy.com/api/MY/GetUserOrder";
$date = date('Y-m-d');
$data = '{"page":1,"state":"","starttime":"2020-9-01","endtime":"'.$date.'"}';
$js = json_decode(post($url,$data,$ua),true);
$guid = json_decode($js,true)['data']["list"][0]["guid"];
}
if($info == "抢单失败,已超过当日上限 60 单" or $balance == 0){
echo $a2."Pesanan Telah Mencapai 60x\n";
if(file_exists("cookie.txt")){
        system('rm cookie.txt');
}
$limit =100;
}else{
$url = "https://399shop-api.ahzhongy.com/api/MY/GetOrderByID";
$data = '{"guid":'.$guid.'}';
$js = json_decode(post($url,$data,$ua),true);
$guid = json_decode($js,true)["data"]["model"]["guid"];
echo $a1."Komisi \033[1;30m: \033[0;32m".json_decode($js,true)["data"]["model"]["csumtry"]."\n";
sleep(1);
$url = "https://399shop-api.ahzhongy.com/api/MY/GetUserAddrModelByIssuggest";
$data = "{}";
post($url,$data,$ua);
$url = "https://399shop-api.ahzhongy.com/api/MY/PayOrder";
$data = '{"guid":'.$guid.'}';
$js = json_decode(post($url,$data,$ua),true);
$info = json_decode($js,true)['msg'];
if($info == "支付成功"){
  echo $a1."Pembelian \033[0;32mSucces\n";
  }else{
  echo $a2."Pembelian \033[0;31mGagal\n";
  } }
echo "   \033[0;37m- - - - - - - - - - -\n";
}else{$limit =100;}
sleep(1);
 }
}

