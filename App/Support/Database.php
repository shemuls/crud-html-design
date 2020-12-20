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
     * File upload method
     */
    protected function fileUpload($file, $location = '', $fileType = ['jpg', 'jpeg', 'png', 'gif'])
    {
        // File info get
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];

        // Find file formate ex: png, jpg etc
        $getFileFormateName = explode('.', $fileName); /**Its a array */
        $fileExtension = strtolower(end($getFileFormateName));

        // Make file name unique
        $uniqueFileName = md5(time().rand()) .'.' . $fileExtension;

        // file upload in folder
        move_uploaded_file($fileTmpName, $location . $uniqueFileName);

        return $uniqueFileName;

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

    /**
     * All data get from table
     */
    protected function all($tableName, $orderBy){
        $sql = "SELECT * FROM $tableName ORDER BY id $orderBy";
        $queryData = $this -> connection() -> query($sql);

        if ( !empty($queryData->num_rows) ) { /**Jodi $queryData ar vitor data thake tahole return */
            return $queryData;
        }
    }


}
