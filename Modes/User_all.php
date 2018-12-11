<?php
/**
 * Created by PhpStorm.
 * User: LTF
 * Date: 2018/12/11
 * Time: 22:25
 */

/*
1. 迭代器模式，在不需要了解内部实现的前提下，遍历一个聚合对象的内部元素
2. 相比传统的编程模式，迭代器模式可以隐藏遍历元素所需的操作

>>> 应用场景
遍历数据库表，拿到所有的user对象，然后用 foreach 循环，在循环的过程中修改某些字段的值。*/

namespace Modes;


class User_all implements \Iterator
{
    protected $ids;
    protected $data = array();
    protected $index;

    public function __construct()
    {
        $db = Factory::createDatabase();
        $res = $db->query("select id from table");
        $this->ids = $res->fetch_all(MYSQLI_ASSOC);
    }

    // 3 获取当前元素
    public function current()
    {
        $id = $this->ids[$this->index]['id'];
        return Factory::createUser($id);
    }

    // 4 下一个元素
    public function next()
    {
        $this->index++;
    }

    // 2 验证当前是否还有下一个元素
    public function valid()
    {
        return count($this->ids) > $this->index;
    }

    // 1 重置迭代器
    public function rewind()
    {
        $this->index = 0;
    }

    // 5 位置
    public function key()
    {
        return $this->index;
    }

}