<?php
define('BASEDIR', __DIR__);

include BASEDIR . '/Publics/Loader.php';

spl_autoload_register('\\Publics\\Loader::autoload');

Publics\Objects::test();
App\Controller\Home\Index::test();