<?php

/**
 * Created by PhpStorm.
 * User: don-szpion
 * Date: 01.02.17
 * Time: 20:01
 */
class ProductCreator
{
    protected static $_instance = null;
    private $config = [];

    private function __construct()
    {
        $config = include "config.php";
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function getInctance()
    {
        if (null === self::$_inctance) {
            self::$_inctance = new self();
        }
        return self::$_instance = new self();
    }

    public function make(string $prod, array $params)
    {
        if (array_key_exists($prod, $this->config)) {
            $className = $this->config[$prod];
            if (class_exists($className)) {
                return new $className($params);
            } else {
                throw new ClassNotFoundException("Class $className not found!");
            }
        } else {
            throw new InvalidPostKeyException("Key $prod not found in config!");
        }
        //$config = include "config.php";
        /*if(array_key_exists($prod, $this->config)) {

             //new $this->config[$prod]($params);
         }else {
             echo InvalidPostKeyException();
         }*/
        /*if($prod === "iPhone" && $prod === $config){
            $Phone = IPhoneProduct::__construct($params);
            return $Phone;
        } else if($prod === "iPad" && $prod === $config){
            $Pad = IPadProduct::__construct($params);
            return $Pad;
        } else if ($prod === "MacBook" && $prod === $config){
            $Mbook = MacBookProduct::__construct($params);
            return $Mbook;
        }*/
    }

}