<?php
namespace Vr\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function index(){
	  
		$type = M('list')->field('id,name')->select();
		$this->assign('type',$type);
		

		if(IS_POST){

			$post = I('post.');

			if($post['title']==''){
				$this->error("标题不能为空");
				exit;
			}
			if($post['body']==''){
				$this->error("内容不能为空");
				exit;
			}
			$images = trim($post['images']);
			//去掉两边空白

			if(substr($images,0,4) !== 'http'){
				$this->error("图片URL错误");
				exit;
			}
			$article_data['tid'] = $post['type'];
			$article_data['title'] = $post['title'];
			$article_data['images'] = $images;

			$id = M('article')->add($article_data);


			$detail_data['id'] = $id;
			$detail_data['title'] = $post['title'];
			$detail_data['body'] = $post['body'];
			$detail_data['image_source'] = $images;

			M('detail')->add($detail_data);

			$this->success("增加成功");
			exit;
		}
		$this->display();
		
    }
}