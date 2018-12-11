<?php

namespace Publics;

class Loader
{
    static function autoload($class)
    {
        $info = BASEDIR . '/' . str_replace('\\', '/', $class) . '.php';
        require $info;
    }
}