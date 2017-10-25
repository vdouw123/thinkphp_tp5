<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/12 0012
 * Time: 20:11
 */

namespace app\api\controller;

class City extends \think\Controller
{
    public function getCitysByParentId()
    {
        $id = input('post.id');
        if (!$id) {
            return show(0, 'ID不合法');
        }
        $citys = model('City')->getCitysByParentId($id);
        if ($citys) {
            return show(1, "获取二级城市成功", $citys);
        }
        return show(0, '获取二级城市失败', $citys);
    }
}