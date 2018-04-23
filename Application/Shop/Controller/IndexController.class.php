<?php
namespace Shop\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
	  
		echo "oa-api";
    	
	}
	
	public function banner(){
		$appid = I('appid');
		$url = "https://api.it120.cc/tz/banner/list";
		$res = httpRequest($url);
		echo $res;

	}
	
}