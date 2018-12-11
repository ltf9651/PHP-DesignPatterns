<?php
/**
 * Created by PhpStorm.
 * 数据对象映射模式
 * User: 18484
 * Date: 2018/12/11
 * Time: 17:19
 */

/*数据对象映射模式，是将对象和数据存储映射起来，对一个对象的操作会映射为对数据存储的操作，
比如我们在代码中new一个对象，那么使用该模式就可以将对对象的一些操作，比如说我们设置的一些属性，它就会自动保存到数据库，跟数据库中表的一条记录对应起来

   实例，在代码中实现数据对象映射模式，我们将写一个ORM类，将复杂的SQL语句映射成对象属性的操作

   结合使用数据对象映射模式，工厂模式，注册模式*/

namespace Modes;

use Publics\Databases\Mysql;

class User
{
    public $id;
    public $name;
    public $phone;

    protected $db;

    function __construct($id)
    {
        $this->db = new Mysql();
        $this->db->connect('', '', '', '');
        $res = $this->db->query('select ..');
        $data = $res->fetch_assoc();

        // 赋值
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->phone = $data['phone'];
    }

    // 对象的所有引用都被删除或者当对象被显式销毁时执行
    function __destruct()
    {
        $this->db->query("updade .. set name='{$this->name}', phone='{$this->phone}' where id = '{$this->id}' limit 1");
    }
}
