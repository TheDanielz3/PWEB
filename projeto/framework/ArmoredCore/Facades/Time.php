<?php

namespace ArmoredCore\Facades;

use ArmoredCore\Facades\Facade;
use ArmoredCore\WebKernel\ArmoredCore;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 12-04-2017
 * Time: 02:04
 *
 */
class Time extends Facade
{
    protected static function getName()
    {
        return 'Profiler';
    }

    public static function startMeasure($muid, $message)
    {
        $instance = ArmoredCore::get('Debugger');
        $instance['time']->startMeasure($muid, $message);
    }

    public static function stopMeasure($muid)
    {
        $instance = ArmoredCore::get('Debugger');
        $instance['time']->stopMeasure($muid);
    }

    //public static function measure($message, closure )

}