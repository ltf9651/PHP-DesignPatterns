<?php
/**
 * Created by PhpStorm.
 * User: 18484
 * Date: 2018/12/11
 * Time: 16:31
 */

use Publics\IDatabase;

class Mysqli implements IDatabase
{
    protected $conn;

    public function connect($host, $user, $password, $dbname)
    {
        $conn = mysqli_connect($host, $user, $password, $dbname);
        $this->conn = $conn;
    }

    public function query($sql)
    {
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }

    public function close()
    {
        mysqli_close($this->conn);
    }
}