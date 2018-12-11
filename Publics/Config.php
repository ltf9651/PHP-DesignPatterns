<?php
/**
 * Created by PhpStorm.
 * 实现$config['my_config'] 自动加载配置
 * User: LTF
 * Date: 2018/12/11
 * Time: 23:08
 */

namespace Publics;

class Config implements \ArrayAccess
{
    protected $path;
    protected $configs = array(); // 保存加载过的配置

    function __construct($path)
    {
        $this->path = $path;
    }

    // 获取数组key
    function offsetGet($key)
    {
        if (empty($this->configs[$key])) {
            $file_path = $this->path . '/' . $key . '.php';
            $config = require $file_path;
            $this->configs[$key] = $config;
        }
        return $this->configs[$key];
    }

    // 设置数组key
    function offsetSet($key, $value)
    {
        throw new \Exception("cannot write config file.");
    }

    // 检测数组key
    function offsetExists($key)
    {
        return isset($this->configs[$key]);
    }

    // 删除数组key
    function offsetUnset($key)
    {
        unset($this->configs[$key]);
    }
}