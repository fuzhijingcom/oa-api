<?php
namespace Shop\Controller;
use Think\Controller;
class DiscountsController extends Controller {

   
	public function noticelist(){
		//url: 'https://api.it120.cc/' + app.globalData.subDomain + '/notice/list',
		$appid = I('appid');

		$url = "https://api.it120.cc/tz/notice/list";

		$res = httpRequest($url);
		echo $res;

	}
	
	
	public function coupons(){
		////url: 'https://api.it120.cc/' + app.globalData.subDomain + '/discounts/coupons',
		$appid = I('appid');

		$url = "https://api.it120.cc/tz//discounts/coupons";

		$res = httpRequest($url);
		echo $res;

	}
	public function fetch(){
		//url: 'https://api.it120.cc/' + app.globalData.subDomain + '/discounts/fetch',
		$appid = I('appid');

		$url = "https://api.it120.cc/tz//discounts/fetch";

		$res = httpRequest($url);
		echo $res;

	}

	
	
}