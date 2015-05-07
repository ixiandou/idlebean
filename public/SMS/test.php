<?php
$url = 'http://106.ihuyi.cn/webservice/sms.php?method=Submit';
$mobile = '18610734056';
$message = 'hello world';
$mobile_code = '1234';
$post_data = "account=cf_wangchuan&password=br1sjhhrh6&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$xml_ret = curl_exec($ch);
$ret = new SimpleXMLElement($xml_ret);
var_dump($ret);
?>
