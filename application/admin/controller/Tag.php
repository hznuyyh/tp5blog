<?php

namespace app\admin\controller;

use think\Controller;

use think\Model;
class Tag extends Controller
{
    protected $fields = [
        'tag' => '',
        'title' => '',
        'subtitle' => '',
        'meta_description' => '',
        'page_image' => '',
        'layout' => 'blog.layouts.index',
        'reverse_direction' => 0,
    ];
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
       $tags = \app\admin\model\Tag::all();
      //  var_dump($tags);
       return $this->fetch('tag/tag',compact('tags'));
    }
    public function create()
    {
        $data = [];
        return $this->fetch('tag/create',compact('data'));
    }

    public function store()
    {
       $rules =[
           'tag' => 'required|min:2|max:3',
           'title' => 'required|min:2|max:16',
           'subtitle' => 'required|min:2|max:24',
           'description'=>"required|min:6|max:120",
       ] ;
    }

}
