<?php

namespace ArmoredCore;

use Aura\Di\Exception;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 20:59
 */
class FileReader
{
    public function getFilesFromDir($dir)
    {
        try {
            return scandir($dir);
        } catch (Exception $e){
            return [];
        }
    }


    public function readFile2Array($filename)
    {
        $file = fopen("$filename", "r");
        $textArray = array();

        while (!feof($file)) {
            array_push($textArray, fgets($file));
        }

        fclose($file);

        return $textArray;
    }

}