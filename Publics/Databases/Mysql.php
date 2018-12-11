<?php
/**
 * Created by PhpStorm.
 * User: 18484
 * Date: 2018/12/11
 * Time: 16:31
 */

namespace Publics\Databases;

use Publics\IDatabase;

class Mysql implements IDatabase
{
    protected $conn;

    public function connect($host, $user, $password, $dbname)
    {
        $conn = mysql_connect($host, $user, $password);
        mysql_select_db($dbname);
        $this->conn = $conn;
    }

    public function query($sql)
    {
        $res = mysql_query($sql, $this->conn);
        return $res;
    }

    public function close()
    {
        mysql_close($this->conn);
    }
}