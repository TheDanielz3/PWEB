<?php

namespace ArmoredCore\WebKernel;
use ContainerInterface;
use Exception;


/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 13-04-2017
 * Time: 16:39
 *
 * PSR-11 Compliant Container
 *
 */
class ArmoredCoreContainer implements ContainerInterface
{
    protected $_componentInstances = [];
    protected $_constructorConfigTable = [];
    protected $_setterConfigTable = [];
    protected $_initInvokeConfigTable = [];
    protected $_lazyLoadTable = [];
    protected $_lockTable = [];

    /**
     * @param string $id
     * @return mixed
     */
    public function get($id)
    {
        //if it does not exist return false
        if (array_key_exists($id, $this->_componentInstances)) {

            //check if object is created
            if ($this->objectIsInstantiated($id)) {

                //return instance
                return $this->_componentInstances[$id];

            } else {

                //lazyload object
                return $this->buildCompleteInstance($id);
            }

        } else {
            return null;
        }
    }

    /**
     * @param $id name
     * @param $params array
     * @throws
     **/

    public function setConstructParams($id, $params)
    {
        if (!is_array($params)) {
            throw New Exception('$params constructor parameters expects an array.');
        }

        $this->_constructorConfigTable[$id] = $params;
    }

    public function setSetterParams($id, $setter)
    {
        if (!is_array($setter)) {
            throw New Exception('$setter parameters expects an associative array.');
        } else {
            $this->_setterConfigTable[$id] = $setter;
        }
    }


    public function createInstance($id, $lazyLoad = true, $lock = true)
    {

        //1. Registry of object
        //lazy load registry
        $this->_lazyLoadTable[$id] = true;

        //lock registry
        $this->_lockTable[$id] = $lock;

        //if not lazy load create the object now
        if (!$lazyLoad) {
            $this->buildCompleteInstance($id);
        } //object creation

    }


    private function buildCompleteInstance($id)
    {

        //2. check if we have constructor params
        if ($this->hasConstructorParams($id)) {

            //check if the object is instantiated
            if (!$this->objectIsInstantiated($id)) {

                //get constructor params
                $params = $this->_constructorConfigTable[$id];
                //create instance
                $this->_componentInstances[$id] = new $this->_componentInstances[$id](...$params);
            } else {
                throw new Exception('Container: you have set constructor parameters for an already created instance.');
            }

        } else { //create instance without parameters
            //create instance
            $this->_componentInstances[$id] = new $this->_componentInstances[$id];
        }
        //3. check if we have setter params
        if ($this->hasSetterParams($id)) {
            $instance = $this->_componentInstances[$id];
            $setterpair = $this->_setterConfigTable[$id];
            $seterName = key($setterpair);
            $seterValue = $setterpair[$seterName];
            $instance->$seterName = $seterValue;
        }
    }

    private function hasConstructorParams($id)
    {
        return array_key_exists($id, $this->_constructorConfigTable);
    }

    private function hasSetterParams($id)
    {
        return array_key_exists($id, $this->_setterConfigTable);
    }

    private function objectIsInstantiated($id)
    {
        if (is_string($this->_componentInstances[$id])) {
            return false;
        } else {
            return true;
        }

    }

    private function objectIsLocked($id)
    {

        if (!array_key_exists($id, $this->_lockTable)) {
            // an instance is in use and is autolocked
            return true;
        } else {
            return $this->_lockTable[$id];
        }
    }


    public function setInstance($id, $object)
    {

        //check in lock table
        if ($this->objectIsLocked($id)) {
            throw New Exception('MicroKernel: It is not allowed to change container objects after locking.');
        } else {

            $this->_componentInstances[$id] = $object;
        }

    }

    /**
     * @param string $id
     * @return mixed
     */
    public function has($id)
    {
        return array_key_exists($id, $this->_componentInstances);
    }

}