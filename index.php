<?php
define('BASEDIR', __DIR__);

include BASEDIR . '/Publics/Loader.php';

spl_autoload_register('\\Publics\\Loader::autoload');

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
$page->index();

// 数据映射
$user = new \Modes\User(1);
var_dump($user); // 查询
// 修改
$user->name = 'jack';
$user->phone = '15601234567';

// 结合工厂、注册、映射
class Pages
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

$page = new Pages();
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

$canvas = new \Publics\Canvas();
$canvas->init();
$canvas->rect(3, 6, 4, 12);
$canvas->draw();

$canvas = new \Publics\Canvas();
$canvas->init();
$canvas->draw();

//原型模式
//1. 与工厂模式作用类似，都是用来创建对象
//2. 与工厂模式的实现不懂，原型模式是首先创建好一个原型对象，然后通过clone原型对象来创建新的对象。这样就免去了类创建是重复的初始化操作
//3. 原型模式适用于大对象的创建。创建一个大对象需要很大的开销，如果每次new就会消耗很大，原型模式仅需内存拷贝即可

$prototype = new \Publics\Canvas();
$prototype->init();
$canvas1 = clone $prototype;
$canvas2 = clone $prototype;
//装饰器
$canvas1->addDecorator(new \Modes\ColorDrawDecorator('blue'));
//$canvas1->addDecorator(new \Modes\SizeDrawDecorator('18px'));
$canvas1->draw();
$canvas2->rect(5, 2, 7, 9);
$canvas2->draw();

//迭代
$users = new \Modes\User_all();
foreach ($users as $user) {
    var_dump($user->name);
    $this->name = rand(1, 100); //修改数据
}

// 代理模式
$proxy = new \Modes\Proxy();
$proxy->getUserName('1');
$proxy->setUserName('1', 'lily');

// 读取配置
$config = new \Publics\Config(__DIR__.'/configs');
var_dump($config['database']);