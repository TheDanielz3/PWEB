<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 09:19
 */

namespace ArmoredCore\Interfaces;
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 10-05-2016
 * Time: 14:04
 */
interface AssetInterface
{
    public function css($filenameCSS);

    public function js($filenameJS);

    public function Image($filenameImage);
}