<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/15
 * Time: 18:14
 */

namespace app\index\controller;
use app\index\model\Post;
use think\Controller;
use think\View;
use think\Db;
class Blog extends Controller
{
	public function index(){

		$posts = Post::where('published_at','<',date('y-m-d'))->paginate(5);
		//$posts = Db::table('posts')->where('published_at','<',date('y-m-d'))->select()->paginate();;
		//$posts = Post::get(1);
		$data = ['name'=>'yyh'];
		//var_dump($posts);
		return $this->fetch('index',compact('posts'));
	}
	public function showPost($slug)
	{
		$view = New View([
			'view_suffix'   => 'blade.php',
		]);
		$post = Db::table('posts')->where('slug','=',$slug)->find();
		return $view->fetch('post',compact('post'));
	}

}