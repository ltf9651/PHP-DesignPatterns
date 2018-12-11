<?php
/**
 * Created by PhpStorm.
 * User: 18484
 * Date: 2018/12/11
 * Time: 17:49
 */

namespace Modes;


abstract class EventGenerator
{
    private $observers = array();

    function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}