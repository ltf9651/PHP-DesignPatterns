<?php
/**
 * Created by PhpStorm.
 * User: LTF
 * Date: 2018/12/11
 * Time: 22:15
 */

namespace Modes;


class ColorDrawDecorator implements Decorator
{
    protected $color;

    public function __construct($color = 'red')
    {
        $this->color = $color;
    }

    public function afterDraw()
    {
        echo "<div style='color:{$this->color};'>";
    }

    public function beforeDraw()
    {
        echo '</div>';
    }
}