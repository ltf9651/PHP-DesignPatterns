<?php
/**
 * Created by PhpStorm.
 * User: LTF
 * Date: 2018/12/11
 * Time: 21:55
 */

namespace Publics;

// 适配接口，方便以后在不同的数据库切换而不用改底层代码
/* 可以将截然不同的函数接口封装成统一的API
实际应用举例：PHP的数据库操作有mysql/mysqli/pdo 三种，可以用适配器模式统一成一致。类似的场景还有cache适配器，可以将memcache/redis/file/apc等不同的缓存函数统一成一致的接口。
*/

interface IDatabase
{
    function connect($host, $user, $password, $dbname);

    function query($sql);

    function close();
}
