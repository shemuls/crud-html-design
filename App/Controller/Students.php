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
    public function AddNewStudent($name, $email, $cell, $photo){

        $fileName= $this -> fileUpload($photo, 'Media/students/img/'); /**get file name with formate from fileupload function */
        $queryData = $this -> insert('students', [
            "name" => $name,
            "email"=> $email,
            "cell"=> $cell,
            "photo"=> $fileName,
        ]);
        
        // $queryData == true means: data successfully table a chole gese
        if ($queryData == true) {
            return '<p class="alert alert-success">Data added successfully! <button class="close" data-dismiss="alert">&times;</button></p>';
        }
    }

    // Show all student from database table
    public function showAllstudent()
    {
        $allData = $this -> all('students', 'DESC');
        if ($allData) {
            return $allData;
        }
    }
    // Delete student data
    public function deleteStudentData($deletId)
    {
        $data = $this -> delete('students',$deletId);
        if ($data) {
            return '<p class="alert alert-success">Data delete successfully! <button class="close" data-dismiss="alert">&times;</button></p>';
        }
    }

    // Show single student
    public function showSingleStudent($id)
    {
        $queryData = $this -> find('students', $id);
        return $queryData -> fetch_assoc();
    }


}
