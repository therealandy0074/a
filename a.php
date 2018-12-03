
<?php
error_reporting(0);
function signup($socks){
	$arr = array("\r","	");
	$url = "http://yousrewards.com/api/v3/account.signUp.php";
	$h = explode("\n",str_replace($arr,"","Content-Type: application/x-www-form-urlencoded; charset=UTF-8
	User-Agent: Dalvik/2.1.0 (Linux; U; Android 6.0.1; Redmi Note 4 MIUI/V8.2.10.0.MCFMIDL)
	Host: yousrewards.com
	Connection: Keep-Alive"));
	$user = "andykkali".rand(01234,99999);
	$body = "email=$user@gmail.com&fullname=andyk kali&clientId=1&password=$user&username=$user&";
	return curl($url,$h,$body,$socks);
}
function curl($url,$h,$body,$socks=null){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
	curl_setopt($ch, CURLOPT_PROXY, $socks);
	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$x = curl_exec($ch); curl_close($ch);
	return json_decode($x,true);
}
function refer($reff,$socks){
	$arr = array("\r","	");
	$data = signup($socks);
	$aid = $data['accountId'];
	$atok = $data['accessToken'];
	$user = $data['account'][0]['username'];
	$body = 'data={"clientId":"1","accountId":"'.$aid.'","accessToken":"'.$atok.'","user":"'.$user.'","name":"refer","value":"'.$reff.'","dev_name":"Redmi Note 4","dev_man":"Xiaomi","ver":"3.0","pckg":"com.yousrewards.app"}&';
	$url = "http://yousrewards.com/api/v3/account.Refer.php";
	$h = explode("\n",str_replace($arr,"","Content-Type: application/x-www-form-urlencoded; charset=UTF-8
	User-Agent: Dalvik/2.1.0 (Linux; U; Android 6.0.1; Redmi Note 4 MIUI/V8.2.10.0.MCFMIDL)
	Host: yousrewards.com
	Connection: Keep-Alive"));
	return curl($url,$h,$body,$socks);
}
echo "############\n#  @xptra  #\n# SGB-Team #\n############\n";
echo "?Filesocks		";
$file = '';
$ref = '2U8AZI';
$socks = explode("\n",str_replace("\r","",file_get_contents($file))); $a=0;
while($a<count($socks)){
	$proxy = $socks[$a];
	$submit = refer($ref,$proxy)['response_title'];
	echo "[$a] $submit\n";
	$a++;
}
