<?php
namespace Shop\Controller;
use Think\Controller;
class OrderController extends Controller {

    
	public function detail(){
		$appid = I('appid');

		$url = "https://api.it120.cc/tz//order/detail";
		
		$res = httpRequest($url);
		echo $res;

	}

	public function delivery(){
		$appid = I('appid');
		$url = "https://api.it120.cc/tz/order/delivery";
		$res = httpRequest($url);
		echo $res;

	}

	public function reputation(){
		$appid = I('appid');
		$url = "https://api.it120.cc/tz/order/reputation";
		$res = httpRequest($url);
		echo $res;

	}
	
	
}