<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 11-04-2017
 * Time: 11:31
 */

use ArmoredCore\WebObjects\Asset;
use ArmoredCore\WebKernel\Services;

// Asset manager configuration and loading

$assetBundles = [
    'base' => [
        'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
        'http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js',
        Asset::js ( 'headroom.min.js' ),
        Asset::js ( 'jQuery.headroom.min.js' ),
        Asset::js ( 'template.js' ),
        Asset::js ( 'highlight.pack.js' ),
        Asset::css ( 'bootstrap.min.css' ) ,
        Asset::css ( 'font-awesome.min.css' ),
        Asset::css ( 'hlstyles/default.css' ),
        Asset::css ( 'main.css' ),
        Asset::css ( 'bootstrap.icon-large.min.css' )
    ],
    'form-controls'	=> Asset::css('form.css'),
];


$config = [
    'collections' => $assetBundles,
    'autoload' => ['base'],
    'pipeline' => false,
    'public_dir' => WL_PUBLIC_FOLDER_URL
];

$assetManager = new Stolz\Assets\Manager($config);

/**
 * Debugger configuration and loading
 */

Services::set('Assetmanager', $assetManager);
Services::set('ErrorManager', 'ArmoredCore\ErrorManager');

Services::run();




