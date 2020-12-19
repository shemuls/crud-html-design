<?php

namespace App\Support;
use mysqli;

abstract class Database
{
    
    private $hostName   = 'localhost';
    private $userName   = 'root';
    private $Password   = '';
    private $dbName     = 'oop_simple_crud';

    private $connection;

    /**
     * Database Connection Method
     */
    private function Connection()
    {
         return $this -> connection =  new mysqli($this -> hostName, $this -> userName, $this -> Password, $this-> dbName);
    }


}
