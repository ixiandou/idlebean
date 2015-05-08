<?php namespace App\Services;

class Sms
{
	const URL = 'http://106.ihuyi.cn/webservice/sms.php?method=Submit';
	public function send($mobile, $content)
	{
		file_put_contents('/tmp/sms', var_export(['mobile' => $mobile, 'msg' => $content], true));
		$account = env('SMS_ACCOUNT');
		$password = env('SMS_PASSWORD');
		$content = "您的验证码是：".$content."。请不要把验证码泄露给其他人。";
		$postFields = [
			'account' => $account,
			'password' => $password,
			'mobile' => $mobile,
			'content' => $content,
		];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, self::URL);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		$retXml = curl_exec($ch);
		$ret = new \SimpleXMLElement($retXml);

		return array('errcode' => intval($ret->code), 'errmsg' => strval($ret->msg), 'msgid' => strval($ret->smsid));
	}
}
