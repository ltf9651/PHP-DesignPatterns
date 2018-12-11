<?php
/**
 * Created by PhpStorm.
 * User: 18484
 * Date: 2018/12/11
 * Time: 16:31
 */

namespace Publics\Databases;

use Publics\IDatabase;

class PDO implements IDatabase
{
    protected $conn;

    public function connect($host, $user, $password, $dbname)
    {
        $conn = new \PDO("mysql:host = $host; dbname=$dbname", $user, $password);
        $this->conn = $conn;
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function close()
    {
        unset($this->conn);
    }
}