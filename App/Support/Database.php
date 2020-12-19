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
    private function connection()
    {
         return $this -> connection =  new mysqli($this -> hostName, $this -> userName, $this -> Password, $this-> dbName);
    }
    
    /**
     * Insert Data in Table
     */
    protected function insert($tableName, array $values)
    {

        // get array key
        $arrayKeyGet = array_keys($values);
        $tableCol = implode(',', $arrayKeyGet);

        // Get array Val
        $arrayVal = array_values($values);
        foreach ($arrayVal as $val) {
            $valuesWith_Invertate_Komma[] =  "'".$val."'";
        }

        // Insert Data in table
        $tableData = implode(',', $valuesWith_Invertate_Komma);
        $sql = "INSERT INTO $tableName ($tableCol) VALUES ($tableData)";
        $queryData = $this -> connection() -> query($sql);

        // Data check
        if ($queryData == true) {
            return true;
        }
      
    }


}
