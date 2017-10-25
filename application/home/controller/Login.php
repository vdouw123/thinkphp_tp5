<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/21
 * Time: 17:20
 */

namespace app\home\controller;

class Login extends \app\home\controller\Basecontroller
{
    public $memberUsername;

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->memberUsername = $this->memberUname;
    }

    public function index()
    {
        $data = input('post.');
        if ($data) {
            $username = $data['username'];
            $password = getVdouwMD5($data['password']);
            if (!trim($username) || !trim($password)) {
                return show(0, '用户名和密码不能为空');
            }
            $ret = model('Member')->getMemberuserByUsername($username);
            if (!$ret) {
                return show(0, '该用户不存在');
            } elseif ($ret['password'] != $password) {
                return show(0, '密码错误');
            }
            session('memberUser', $ret, 'memberUser');
            return show(1, '登录成功');
        } else {
            return $this->fetch('', [
                'memberUsername' => $this->memberUsername
            ]);
        }
    }

    public function logout()
    {
        session(null, 'memberUser');
        $this->redirect('/index.php/home/login/index');
    }
    
}