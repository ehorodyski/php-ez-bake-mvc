<?php

/**
 * DatabaseConnection.class.php
 *
 * Connects to the database and keeps the connection open.
 * Singleton
 *
 * @version 1.0
 * @author Eric Horodyski
 */

namespace Singletons{
    
    use Helpers\Config as Config;

    class DatabaseConnection {

        private static $instance;

        private function __construct(){ }

        private function __clone() { }

        public static function getInstance()
        {
            if(!isset(self::$instance))  
            {
                self::$instance = new \MySQLi(Config::$database_hostname, Config::$database_user, Config::$database_password, Config::$database_name);
                if(self::$instance->connect_error)
                    throw new Exception('MySQL connection failed: '.self::$instance->connect_error);
            }
            return self::$instance;
        }
    }
}