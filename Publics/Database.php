<?php

namespace Publics;

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

    function query($sql)
    {
        echo "SQL: $sql\n";
    }
}