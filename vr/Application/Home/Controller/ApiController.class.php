<?php
namespace Home\Controller;
use Think\Controller;
class ApiController extends Controller {
    public function index(){
		header("Content-type:text/html;charset=utf-8");
		echo "这里是api列表";
		
	}
	
	public function vrlist(){
		header("Content-type:text/html;charset=utf-8");
		$vrlist = M('list')->select();
		$json = json_encode($vrlist,JSON_UNESCAPED_UNICODE);
		echo $json;
	}

	public function article(){
		header("Content-type:text/html;charset=utf-8");
		$tid = I('tid');

		$vrlist = M('article')->where(array('tid'=>$tid))->select();

		$json = json_encode($vrlist,JSON_UNESCAPED_UNICODE);
		
		echo $json;
	}

	public function detail(){
		header("Content-type:text/html;charset=utf-8");
		$id = I('id');

		$detail = M('detail')->where(array('id'=>$id))->find();

		$json = json_encode($detail,JSON_UNESCAPED_UNICODE);
		
		echo $json;
	}
}