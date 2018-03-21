<?php
namespace Lang\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
	  
		echo "oa";
    	// $this->assign('serverInfo',$serverInfo);
    	// $this->display();
	}
	
	// public function jscode2session(){
	// 	$appid = I('appid');
	// 	$secret = I('secret');
	// 	$js_code = I('js_code');
	// 	$url = "https://api.weixin.qq.com/sns/jscode2session?appid=".$appid."&secret=".$secret."&js_code=".$js_code."&grant_type=authorization_code";
	// 	$res = httpRequest($url);
	// 	$arr = json_decode($res,true);
	// 	$openid = $arr['openid'];
	// 	$this->save_openid($appid,$openid);
	// 	echo $res;
	// }

	public function getuid(){
		$appid = I('appid');
		$secret = I('secret');
		$js_code = I('js_code');
		$url = "https://api.weixin.qq.com/sns/jscode2session?appid=".$appid."&secret=".$secret."&js_code=".$js_code."&grant_type=authorization_code";
		$res = httpRequest($url);
		$arr = json_decode($res,true);
		$openid = $arr['openid'];
		$user_id = $this->save_openid($appid,$openid);
		echo $user_id;
	}

	private function save_openid($appid,$openid){
		$cun = M('users_xcx')->where(array('appid'=>$appid,'openid'=>$openid))->find();
		$c = M('users_xcx')->field('user_id')->select();
		if(!$cun){
			$user_id = 10000 + (int)count($c);
			M('users_xcx')->data(array('user_id'=>$user_id,'appid'=>$appid,'openid'=>$openid))->add();
			return $user_id;
		}else{
			return $cun['user_id'];
		}
	} 

	public function kd(){
		header("Content-type: text/html; charset=utf-8"); 

		$kd = M('kd')->field('kuaidi_name')->where(array('send'=>1))->select();

		echo '["请选择","';

		$c = count($kd);

		for($i=0;$i<$c;$i++){
			echo $kd[$i]["kuaidi_name"];
			
			if($i<$c-1){
				echo '", "';
			}
			
		}
		echo '"]';


	}

	public function send(){
		$uid = I('uid');
		$num = I('num');
		$addr = I('addr');
		$kd = I('kd');
		$time = I('time');

		$value = M('kd')->where(array('kuaidi_name'=>$kd))->getField('value');

		$id = M('send')->data(array('type'=>$value,'number'=>$num,'address'=>$addr,'time'=>$time,'user_id'=>$uid))->add();

		// $url = "http://c3w.cc/send/api/send_msg?id=".$id;
		// $res = httpRequest($url);

		echo "OK";
		
	}
	
	public function history(){
		$uid = I('uid');
		$his = M('send')->where(array('user_id'=>$uid))->select();
		echo json_encode($his,JSON_UNESCAPED_UNICODE);
	}
}
