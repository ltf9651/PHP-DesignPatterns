<?php
/**
 * Created by PhpStorm.
 * User: LTF
 * Date: 2018/12/11
 * Time: 22:49
 */
/*> 1. 在客户端与实体之间建立一个代理对象（proxy），客户端对实体进行的操作全部委派给代理对象，隐藏实体的具体实现细节。
> 2. Proxy还可以与业务代码分离，部署到另外的服务器，业务代码中通过RPC来委派任务。
应用： 不修改业务代码（分配主从读写）对mysql实现读写分离*/
namespace Modes;


class Proxy implements UserProxy
{
    public function getUserName($id)
    {
        $db = Factory::createDatabase('slave');
        $db->query('select');
    }

    public function setUserName($id, $name)
    {
        $db = Factory::createDatabase('master');
        $db->query('update');
    }
}