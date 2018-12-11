<?php
/**
 * Created by PhpStorm.
 * 策略模式：
 * 策略模式，将一组特定的行为和算法封装成类，以适应某些特定的上下文环境，这种模式就是策略模式
 * 实际应用举例，假如一个电商网站系统，针对男性女性用户要各自跳转到不同的商品类名，并且所有广告位展示不同的广告，传统的做法是加入if...else... 判断。
 * 如果新增加一种用户类型，只需要新增加一种策略即可
 * User: 18484
 * Date: 2018/12/11
 * Time: 16:56
 */

namespace Modes;


interface Strategy
{
    function showAd();
    function showCate();
}

/*
紧耦合：
首先在 page 类中与 Strategy 的实例，以及策略的具体实现来达到策略的具体实现，这样是不是 page 与 Strategy 紧密相关，
也就是说 如果 Strategy 的实现修改了，例如：去掉了 showAd() 方法。page 自然需要做相应修改，这就叫做 紧耦合（依赖性太强）。

依赖倒置和控制翻转：
page 类里不需要 Strategy 的具体实现，只需要知道 page 场景下需要 UserStrategy 的策略，
具体策略下实现那些方法，不需要知道。这样 page 与 Strategy 是离散的、低耦合的。这样代码的就更加稳定，可维护，以拓展。*/