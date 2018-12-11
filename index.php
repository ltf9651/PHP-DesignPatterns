<?php
define('BASEDIR', __DIR__);

include BASEDIR . '/Publics/Loader.php';

spl_autoload_register('\\Publics\\Loader::autoload');

$db = new Publics\Database();
$db->where('a=1')->order('id desc')->limit(1);