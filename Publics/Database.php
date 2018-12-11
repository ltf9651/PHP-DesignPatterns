<?php

namespace Publics;

// 适配接口
/* 可以将截然不同的函数接口封装成统一的API
实际应用举例：PHP的数据库操作有mysql/mysqli/pdo 三种，可以用适配器模式统一成一致。类似的场景还有cache适配器，可以将memcache/redis/file/apc等不同的缓存函数统一成一致的接口。
*/
interface IDatabase
{
    function connect($host, $user, $password, $dbname);
    function query($sql);
    function close();
}

class Database
{
    private $_instance;

    private function __construct()
    {
        /* 单例模式：类只允许创造一次，

         1：类的构造方法__construct声明为private;

         2：再创造一个静态方法去new自己；

         3：再设置一个保护protected或私有private的属性，把new自己的对象赋给这个属性;*/
    }

    static function getInstance()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    function where($where)
    {
        return $this;
    }

    function order($order)
    {
        return $this;
    }

    function limit($limit)
    {
        return $this;
    }
}