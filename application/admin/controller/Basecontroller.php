<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10 0010
 * Time: 16:52
 */

namespace app\admin\controller;

class Basecontroller extends \app\common\controller\Commoncontroller
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        if (!session('adminUser', '', 'adminUser') && !session('adminUser', '', 'adminUser')['username']) {
            $this->error('请先登录', '/index.php/admin/login/index');
        }
    }
}
