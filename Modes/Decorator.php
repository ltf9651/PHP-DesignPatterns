<?php
/**
 * Created by PhpStorm.
 * User: LTF
 * Date: 2018/12/11
 * Time: 22:07
 */

/*
1.装饰模式,可以动态的添加修改类的功能
2.一个类提供了一项功能,如果要在修改并添加额外的功能,传统的编程模式,需要写一个之类集成它,并重新实现类的方法
3.使用装饰模式,仅需在运行时天灾一个装饰对象即可实现,可以实现最大的灵活性
*/
namespace Modes;

interface Decorator
{
    function beforeDraw();
    function afterDraw();
}