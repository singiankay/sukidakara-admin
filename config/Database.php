<?php
class Database
{
    private $_conn;
    private static $_instance;
    private $_host = DB_HOST;
    private $_username = DB_USER;
    private $_password = DB_PASSWORD;
    private $_database = DB_DB;

    public static function getInstance()
    {
        if(!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        try {
            $this->_conn = new mysql($this->_host, $this->_username, $this->_password, $this->_database);

            if(mysqli_connect_error()) {
                trigger_error("Failed to connect to MySQL: " . mysql_connect_error(), E_USER_ERROR);
            }
        }
    }

    private function __clone()
    {
    }

    public function getConnection()
    {
        return $this->_conn;
    }
}