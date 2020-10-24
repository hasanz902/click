<?php
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
function Cpost($url,$data,$ua) {
$ch = curl_init ();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt ($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt ($ch, CURLOPT_COOKIEFILE, "cookie.txt");
$result = curl_exec ($ch);
curl_close($ch);
return $result;
}

function option($ua) {
$ch = curl_init ();
curl_setopt ($ch, CURLOPT_URL, "https://399shop-api.ahzhongy.com/api/PlayerVue/Login");
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, 'OPTIONS');
curl_setopt ($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_POSTFIELDS, "");
curl_setopt ($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt ($ch, CURLOPT_COOKIEFILE, "cookie.txt");
$result = curl_exec ($ch);
curl_close($ch);
return $result;
}

