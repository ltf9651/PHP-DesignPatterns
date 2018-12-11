<?php
define('BASEDIR', __DIR__);

include BASEDIR . '/Publics/Loader.php';

spl_autoload_register('\\Publics\\Loader::autoload');
/*
class Page
{
    protected $strategy;

    function index()
    {
        // 传统
        if (isset($_GET['female'])) {

        } else {

        }

        // 策略模式，无需进行 if else
        $this->strategy->showAd();
        $this->strategy->showCate();
    }

    function setStrategy(\Modes\Strategy $strategy)
    {
        $this->strategy = $strategy;
    }
}

$page = new Page();
if (isset($_GET['female'])) {
    $strategy = new \Modes\FemaleStrategy();
} else {
    $strategy = new \Modes\MaleStrategy();
}
$page->setStrategy($strategy);
$page->index();*/

// 数据映射
$user = new \Modes\User(1);
var_dump($user); // 查询
// 修改
$user->name = 'jack';
$user->phone = '15601234567';

// 结合工厂、注册、映射
class Page
{
    function index()
    {
        $user = \Modes\Factory::createUser(1);
        $user->name = 'ben';
        $this->test();
    }

    function test()
    {
        $user = \Modes\Factory::createUser(1);
        $user->phone = '987654321';
    }
}

$page = new Page();
$page->index();

//观察者模式
class Event extends \Modes\EventGenerator
{
    function trigger()
    {
        echo 'Event start';

        //传统  process1 -> process2 -> ....

        $this->notify(); //通知所有观察者
    }
}

class Observer1 implements \Modes\Observer
{
    function update($event_info = null)
    {
        echo 'process1';
    }
}

class ObserverN implements \Modes\Observer
{
    function update($event_info = null)
    {
        echo 'processN';
    }
}

$event = new Event();
$event->addObserver(new Observer1());// 添加观察者
$event->addObserver(new ObserverN());// 添加观察者
$event->trigger();// 通知观察者
