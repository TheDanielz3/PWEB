<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 17-04-2017
 * Time: 16:46
 */

// Framework
$spl = New SplClassLoader('ArmoredCore', WL_FRAMEWORK_DIR);
$spl->register();

// PSR Interfaces
$spl = new SplClassLoader("Psr",  WL_VENDOR_BASE_DIR);
$spl->register();

// PSR-8 Hugger
$spl = new SplClassLoader("Dave1010",  WL_VENDOR_BASE_DIR);
$spl->register();