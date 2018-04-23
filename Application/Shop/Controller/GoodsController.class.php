<?php
namespace Shop\Controller;
use Think\Controller;
class GoodsController extends Controller {

    public function index(){
	  
		echo "oa";
    	// $this->assign('serverInfo',$serverInfo);
    	// $this->display();
	}
	
	public function category(){
		$appid = I('appid');

		$url = "https://api.it120.cc/tz/shop/goods/category/all";

		$res = httpRequest($url);
		echo $res;

	}


	public function goodslist(){
		$appid = I('appid');

		$url = "https://api.it120.cc/tz/shop/goods/list";

		$res = httpRequest($url);
		echo $res;
	}
	
}