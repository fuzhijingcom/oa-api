<?php
namespace Lang\Controller;
use Think\Controller;
class LoginController extends Controller {


	//不成功

	/**
	 * 检验数据的真实性，并且获取解密后的明文.
	 * @param $encryptedData string 加密的用户数据
	 * @param $iv string 与用户数据一同返回的初始向量
	 * @param $data string 解密后的原文
     *
	 * @return int 成功0，失败返回对应的错误码
	 */


	public function decryptData($appid, $sessionKey,$encryptedData, $iv, $data )
	{
		if (strlen($sessionKey) != 24) {
			return -41001;
		}
		$aesKey=base64_decode($sessionKey);

		if (strlen($iv) != 24) {
			return -41002;
		}

		$aesIV = base64_decode($iv);

		$aesCipher = base64_decode($encryptedData);

		$result = openssl_decrypt( $aesCipher, "AES-128-CBC", $aesKey, 1, $aesIV);

		$dataObj=json_decode( $result );


		if( $dataObj  == NULL )
		{
			return -41003;
		}
		if( $dataObj->watermark->appid != $appid )
		{
			return -41003;
		}
		$data = $result;
		return 0;
	}



    public function getunionid(){
		header("Content-type:text/html;charset=utf-8");

		$appid = 'wx2c985a73e416f727';
		$sessionKey = 'rClAiFQBJ2JaVUuVTRhLBQ==';
	

		$e = urldecode(I('e'));
		$v = urldecode(I('v'));

		$e = str_replace(" ","+",$e);
		$v = str_replace(" ","+",$v);

		dump($v);

		$d = base64_decode($v);

		echo ($d);

		exit;

		$errCode = $this->decryptData($appid, $sessionKey,$e, $v, $data);

		if ($errCode == 0) {
			print($data . "\n");
		} else {
			print($errCode . "\n");
		}

		
		// echo $e.$v;
	
	}
	
	//public function jscode2session(){

	// 	$appid = I('appid');
	// 	$secret = I('secret');
	// 	$js_code = I('js_code');

	// 	$url = "https://api.weixin.qq.com/sns/jscode2session?appid=".$appid."&secret=".$secret."&js_code=".$js_code."&grant_type=authorization_code";

	// 	echo httpRequest($url);

	// }

	// public function thirdSessionId(){
	// 	echo create_code();
		
	// }
	

}
