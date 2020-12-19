<?php

namespace App\Controller;

/**
 * Use Class Here
 */
use App\Support\Database;

/**
** Student class here
*/
class Students extends Database
{
    // Add student in table
    public function AddNewStudent($name, $email, $cell, $img){
        
        $queryData = $this -> insert('students', [
            "name" => $name,
            "email"=> $email,
            "cell"=> $cell,
            "photo"=> $img,
        ]);
        
        // $queryData == true means: data successfully table a chole gese
        if ($queryData == true) {
            return '<p class="alert alert-success">Data added successfully! <button class="close" data-dismiss="alert">&times;</button></p>';
        }
    }
}
