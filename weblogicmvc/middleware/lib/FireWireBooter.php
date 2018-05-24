<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 15-04-2017
 * Time: 22:51
 */
// Microcontroller class

class FireWireBooter
{
    private static $_pipeline = [];
    private static $_returnedData = [];

    public static function addToPipeline($processorComponent){

        array_push(static::$_pipeline, $processorComponent);
    }

    public static function processAll(){

        foreach (self::$_pipeline as $component){

            $data = $component->fireStart();

            static::$_returnedData[get_class( $component )] = $data ;
        }
    }

    public static function destroyPipeline(){

        foreach (static::$_pipeline as $component){
            unset($component);
        }
    }

    public static function destroyData(){

        foreach (static::$_returnedData as $component){
            unset($component);
        }
    }

    public static function getDataFrom($processorName){

        return self::$_returnedData[$processorName];
    }


}