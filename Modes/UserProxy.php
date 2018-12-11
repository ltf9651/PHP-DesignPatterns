<?php
/**
 * Created by PhpStorm.
 * User: LTF
 * Date: 2018/12/11
 * Time: 22:50
 */

namespace Modes;


interface UserProxy
{
    function getUserName($id);
    function setUserName($id, $name);
}