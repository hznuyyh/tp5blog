<?php

namespace app\auth\controller;
use app\admin\controller\post;
use think\response\View;
use think\Validate;
use think\Controller;
use think\Request;
use app\auth\model\User;
use think\Session;

class Login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        if(Session::get('login_status')=='succeed'){
            return redirect('/admin/post');
        }
        $this->assign('error','');
        $this->assign('result',false);
        return $this->fetch('/login');
    }
    public function getLogin(Request $request)
    {
        $rules =[
            'username'=>'require|max:16',
            'password'=>'require|min:6|max:16'
        ];
        $messages =[
          'username.require'=>'UserName can not be null',
           'username.max'=>'UserName can no longer than 16',
            'password.require' => 'Password can not be null',
            'password.min' => 'Password must between 6 and 16',
            'password.max' => 'Password must between 6 and 16'

        ];
        $data = [
            'username' => $request->post('username'),
            'password' => $request->post('password')
        ];

        $validate = new Validate($rules, $messages);
        $result   = $validate->check($data);
        if(!$result){
            $this->assign('result',true);
            $this->assign('error',$validate->getError());
//
            return $this->fetch('/login');
        }
        if($user = User::getByName(quotemeta($_POST['username']))){
          if(strcmp($user['password'],md5(quotemeta($_POST['password'])))){
              Session::set('login_status','succeed');
              Session::set('user_name',$request->post('username'));
              return redirect('/admin/post');
          }
          else{
              Session::set('login_status','defeat');
              $this->assign('result',true);
              $this->assign('error','Error Password,please try again');
//
              return $this->fetch('/login');
          }
        }
        else{
            $this->assign('result',true);
            $this->assign('error','Not find this user');
//
            return $this->fetch('/login');
        }
    }
    public function getLogout(){
        Session::delete('login_status');
        Session::delete('user_name');
        return redirect('/auth/login');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
