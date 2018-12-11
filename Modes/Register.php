<?php
/**
 * Created by PhpStorm.
 * 注册模式
 * 用于全局调用,将实例化的对象存储在树上(即一个数组变量中)，每次使用不必再使用单例模式判断，直接调取注册树中存储的对象即可
 * User: 18484
 * Date: 2018/12/11
 * Time: 16:18
 */

namespace Modes;

class Register
{
    protected static $objects;

    function set($name, $object)
    {
        self::$objects[$name] = $object;
    }

    static function get($name)
    {
        return self::$objects[$name];
    }

    function _unset($name)
    {
        unset(self::$objects[$name]);
    }
}