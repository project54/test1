<?php

namespace components;

class DB {

    private static $instance = null;
    private static $config;

    private function __construct () {}
    private function __clone () {}
    private function __wakeup () {}

    public static function getInstance() : \PDO {
        if (self::$instance === null) {
            self::createInstance();
        }

        return self::$instance;
    }

    public static function setConfig($config) : void {
        self::$config = $config;
    }

    private static function createInstance() : void {
        self::$instance = new \PDO(self::$config['dsn'], self::$config['username'], self::$config['password']);
    }
}