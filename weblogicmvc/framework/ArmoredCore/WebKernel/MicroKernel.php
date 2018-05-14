<?php

namespace ArmoredCore\WebKernel;
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 13-04-2017
 * Time: 15:50
 *
 * PSR-11 Complaint Container
 */

use Exception;
use PSR;
use \Psr\Container\ContainerInterface;
use ArmoredCore\SplClassLoader;

class MicroKernel implements ContainerInterface
{
    protected $_components = array();
    protected $_locked = false;

    /**
     * MicroKernel constructor.
     * @param $psr4ConfigArray PSR-4 Autoloader config array
     *
     * example: $psr4ConfigArray = ['namespace' => 'pathtonamespace', 'name2' => 'path2']
     */
    public function __construct()
    {

    }

    /**
     * @throws Exception
     * Boots all PSR-4 class folders
     */
    public function PSR4register($basepath, $namespaces)
    {
        //sets up the spl_autoload_register for each namespace

        foreach ($namespaces as $ns) {
            $classLoader = new SplClassLoader($ns, $basepath);
            $classLoader->register();
        }
}


    /**
     * @param string $id
     * @return mixed
     */
    public function get($id)
    {
        if (array_key_exists($id, $this->_components)) {
            return $this->_components[$id];
        } else {
            return null;
        }
    }

    public function set($id, $object)
    {
        if ($this->_locked) {
            throw New Exception('MicroKernel: It is not allowed to change container objects after locking.');
        }

        if (is_string($object)) {

            //check build params
            $object = new $object();

        }

        $this->_components[$id] = $object;
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function has($id)
    {
        return array_key_exists($id, $this->_components);
    }

    public function lock()
    {
        $this->_locked = true;
    }


}