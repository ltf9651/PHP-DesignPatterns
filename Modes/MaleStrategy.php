<?php
/**
 * Created by PhpStorm.
 * User: 18484
 * Date: 2018/12/11
 * Time: 16:58
 */

namespace Modes;

class MaleStrategy implements Strategy
{
    public function showAd()
    {
        echo 'Male Ad';
    }

    public function showCate()
    {
        echo 'Male Cate';
    }
}