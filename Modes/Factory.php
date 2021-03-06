<?php
/**
 * Created by PhpStorm.
 * 工厂模式
 * 定义一个专门用来创建其它对象的类，在需要调用某个类的时候就不需要去使用 new 关键字实例化这个类，而是通过工厂类调用某个方法得到类的实例。
 * 好处：当对象所对应的类的类名发生变化的时候，只需要改一下工厂类类里面的实例化方法即可。不需要外部改所有的地方
 * User: 18484
 * Date: 2018/12/11
 * Time: 16:05
 */

namespace Modes;

use Publics\Database;

class Factory
{
    static function createDatabase($id = 'master')
    {
        $key = 'database_' . $id;
        if ($id = 'slave') {
            $slaves = Application::getInstance()->config['database']['slave'];
            // 随机取， 实际开发根据特定算法选择最优的库
            $db_conf = $slaves[array_rand($slaves)];
        }else{
            $db_conf = Application::getInstance()->config['database'][$id];
        }
        // 调取单例
//        $db = Database::getInstance();
        // 注册到树上
        $db = Register::get($key);

        if (!$db) {
            $db = new Database\MySQLi();
            $db->connect($db_conf['host'], $db_conf['user'], $db_conf['password'], $db_conf['dbname']);
            Register::set($key, $db);
        }
        return $db;
    }

    static function createUser($id)
    {
        /*$user = new User($id);
        return $user;

        也可以使用单例模式 ，  注册模式适用于较大较复杂的项目
        */
        $key = 'user_' . $id;
        $user = Register::get($key);
        if (!$user) {
            $user = new User();
            Register::set($key, $user);
        }
        return $user;
    }
}